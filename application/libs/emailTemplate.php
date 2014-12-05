<?php

/**
*  Generate message templates and contents for email
*/
class emailTemplate {

	private $template ;
	private $message ;
	private $tpl_folder =  'application/inc/email_templates' ;
	private $header_tpl = '/_tpl_header.php' ;
	private $footer_tpl = '/_tpl_footer.php' ;
	private $confirm_email_tpl = '/_tpl_confirm_email.php' ;

	
	function __construct($tpl){
		$this->template = strtolower($tpl) ;
	}

    /**
     * Get message for email from tempate file
     * @param array $params
     * @return array $params list of parameters for different purposes
     */
	public function getMessage($params= array()){
		switch ($this->template) {
			case 'confirm email':
			define( 'CODE', $params['code'] );
            define( 'SUBJECT', $params['subject'] );
            define( 'EMAIL', $params['email'] );
			$header = $this->LoadExecFile($this->header_tpl) ;
			$body = $this->LoadExecFile($this->confirm_email_tpl) ;
			$footer = $this->LoadExecFile($this->footer_tpl) ;
			$this->message  = $header . $body . $footer  ;
			
				break;

		       /*	case 'password reset':
				# code...
				break;

			default:
				# code...
				break;    */
		}
		return $this->message ;
	}

    /**
     * Execute and load file with buffering
     * @param $file
     * @return string $out file contents
     */
        private function LoadExecFile($file){
	                                ob_start();
                                    include $this->tpl_folder . $file ;
                                    $out = ob_get_contents();
                                    ob_end_clean();
                                    return $out ;
       }

}