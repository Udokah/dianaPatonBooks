<?php
/**
 * Created by PhpStorm.
 * User: ud
 * Date: 10/28/14
 * Time: 5:23 AM
 */

class Action extends Controller{

    private $model ;

    public function confirm($code,$email){
        $this->model = new UserModel();
        $result = $this->model->confirmEmail($code,$email);
        if($result['status'] == true ){
            $url = URL . 'books' ;
            echo "<center>Your email has been confirmed <br>
                  <a href='$url'>click here to continue</a> </center>" ;
        }else{
            echo "<center>You have not subscribed or this link has expired !<br>
                    <a href='". URL ."'>click here to continue</a>
                   </center>" ;
        }

    }

    /**
     * subscribe for free read
     */
    public function subscribe(){
        $email = $_POST['email'] ;
        $this->model = new UserModel();
        $result = $this->model->subscribe($email) ;
        $this->jsEcho($result) ;
    }


    /**
     * Send email to admin
     */
    public function contact(){
        $email = $_POST['email'] ;
        $name = $_POST['name'] ;
        $message = $_POST['message'] ;
        $this->model = new UserModel();
        $result = $this->model->mailAdmin($email,$name,$message);
        $this->jsEcho($result) ;
    }

} 