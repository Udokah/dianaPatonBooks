<?php
/**
 * Created by PhpStorm.
 * User: ud
 * Date: 10/28/14
 * Time: 6:58 AM
 */


class UserModel {

    private $db ;
    private $table = 'dp_subscribers' ;
    private $lib  ;

    /**
     * Every model needs a database connection, passed to the model
     * Create a new instance of the database
     */
    function __construct() {
        $this->lib = new Library() ;
        try {
            $this->db = new Database() ;
        } catch (Exception $e) {
            exit('Database connection could not be established.');
        }
    }



    public function confirmEmail($code,$email){
        $response = array("status"=>false);
        $c = $this->lib->sanitizeStr($code);
        $e = $this->lib->sanitizeStr($email);
        $select = $this->db->dbSELECT('email',"keycode='$c' AND email='$e'",$this->table);
        if( $select['status'] == true ){
            $response['status'] = true ;
            /* Update active column */
            $this->db->dbUPDATE("active='1'","email='$e'",$this->table);
        }else{
            $response['message'] = $select['result'] ;
        }
        return $response;
    }


    /*
     * Subscribe a person with the email address
     */
    public function subscribe($userEmail){
        $r = array("status" => false , "message"  => "an error occurred");
        $email = $this->lib->sanitizeStr($userEmail);

        $select = $this->db->dbSELECT('email',"email='".$email."'",$this->table);
        if( $select['status'] == true ){
            $r['message'] = "sorry, this email address has already been used.";
        }else{
            $key = $this->lib->rand(10) ;  // Generate random key
            /* insert into database */
            $insert = $this->db->dbINSERT("email = '".$email."' , keycode = '".$key."'",$this->table);
            if($insert['status'] == true){

                /* Send email to user */
                $subj = 'confirm email' ;
                $emailTemplate = new emailTemplate($subj) ;
                $mail_message = $emailTemplate->getMessage(array("code"=>$key,"subject"=>$subj,"email"=>$email));
                $mail = new Email() ;
                $mail->setTo( $email , $email )
                     ->setSubject($subj)
                     ->setMessage($mail_message)
                     ->setFrom( ADMIN_EMAIL , SITENAME )
                     ->addMailHeader('Reply-To', ADMIN_EMAIL , SITENAME )
                     ->addGenericHeader('Content-Type', 'text/html; charset="utf-8"')
                     ->addGenericHeader('X-Mailer', 'PHP/' . phpversion()) ;
                $r['status'] = true ;

                if($mail->send()){
                    $r['message'] = "You have been successfully subscribed, check your email to continue." ;
                }else{
                    $r['message'] = "You have been successfully subscribed, but email failed to send" ;
                }

            }else{
                $r['message'] = $insert['result'] ;
            }
        }
        return $r;
    }


    public function mailAdmin($userEmail,$userName,$userMessage){
        $r = array("status" => false);
        $email = $this->lib->sanitizeStr($userEmail);
        $name = $this->lib->sanitizeStr($userName);
        $message = $this->lib->sanitizeStr($userMessage);
        $subj = 'Visitor From Website' ;
        $mailer = new Email();
        $mailer->setTo( ADMIN_EMAIL , SITENAME )
            ->setSubject($subj)
            ->setMessage($message)
            ->setFrom( $email , $name )
            ->addMailHeader('Reply-To', $email , $name )
            ->addGenericHeader('X-Mailer', 'PHP/' . phpversion()) ;

        if($mailer->send()){
            $r['status'] = true ;
        }
        return $r ;
    }



} 