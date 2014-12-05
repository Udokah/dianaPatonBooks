<?php

/**
 * View Class
 * Handles and generates all views
 */

class View{

    private  $dataArr = array();
    private $data ;

	var $title ;
	var $description ;
    var $keywords ;
	var $cssLinks = array() ;
	var $body ;
	var $url = URL ;
	var $cssPath = '/public/css/' ;
	var $navBar = "" ;
	var $viewsPath = "application/views" ;
	var $navbarTemp = "application/views/_templates/navbar.php" ;
	var $header = "application/views/_templates/header.php" ;
	var $footer = "application/views/_templates/footer.php" ;
	var $isRestricted = true ;  // If user has to be logged in to view the page
	var $isLoggedin ;   // is the user logged in 
	var $OUTPUT ;

    /** Set variable to be available in view
     * @param $variable
     * @param $value
     */
    public function setVar($variable,$value){
        $this->dataArr[$variable] = $value;
    }

    public function setHeader($header){
        $this->header = "application/views" . $header ;
    }

    public function setFooter($footer){
        $this->footer = "application/views" . $footer ;
    }

	public function setTitle($title){
		$this->title = $title ;
	}

    public function setKeywords($keywords){
        $this->keywords = $keywords;
    }

	public function setDesc($desc){
		$this->description = $desc ;
	}

	public function setCss($css){
		$array = array() ;
		foreach ($css as $file) {
			$array[] = '<link rel="stylesheet" href="' . $this->url . $this->cssPath . $file .'">' ;
		}
		$this->cssLinks = implode("\n", $array) ;
	}

	public function setnavBar($boolean){
		if($boolean == true ){
		            $this->navBar = $this->loadExecfile($this->navbarTemp) ;
	                     }
	}

	public function setBody($file){		
		$this->body = $this->viewsPath . DIRECTORY_SEPARATOR . $file ;
	}

	public function isRestricted($boolean){		
		$this->isRestricted = $boolean ;
	}

	public function getCssLinks(){
		if(!is_array($this->cssLinks)){
			return $this->cssLinks ;
		}
        return null;
	}

	public function getnavBar(){
		return $this->navBar ;
	}

	public  function loadExecfile($file){
	                 ob_start();
        /** @noinspection PhpIncludeInspection */
        include $file ;
                                    $out = ob_get_contents();
                                    ob_end_clean();
                                    return $out ;
	}

	private function getLoginStatus(){
		$adminUser = new adminModel() ;
		$this->isLoggedin = $adminUser->isLoggedIn() ;
	}

	public function renderView(){
		if( $this->isRestricted == true ){ 
			$this->getLoginStatus() ;
			if( $this->isLoggedin == true ){
                $this->printPage() ;
			}else{
				header("Location: " . URL . "/error/notLoggedIn") ; 
			}			
		}else{
            $this->printPage() ;
		}		
	}


    /**
     * Generate seo url link
     * eg. title-of-the-book
     * @param $s
     * @return string
     */
    protected function generateUrl($s) {
        //Convert accented characters, and remove parentheses and apostrophes
        $from = explode (',', "ç,æ,œ,á,é,í,ó,ú,à,è,ì,ò,ù,ä,ë,ï,ö,ü,ÿ,â,ê,î,ô,û,å,e,i,ø,u,(,),[,],'");
        $to = explode (',', 'c,ae,oe,a,e,i,o,u,a,e,i,o,u,a,e,i,o,u,y,a,e,i,o,u,a,e,i,o,u,,,,,,');
        //Do the replacements, and convert all other non-alphanumeric characters to spaces
        $s = preg_replace ('~[^\w\d]+~', '-', str_replace ($from, $to, trim ($s)));
        //Remove a - at the beginning or end and make lowercase
        return strtolower (preg_replace ('/^-/', '', preg_replace ('/-$/', '', $s)));
    }


    public function printPage(){
        //$this->data = new ArrToObj($this->dataArr);
        foreach($this->dataArr as $key => $value) {
            //$$key = $value;
            $this->$key = $value ;
        }

        $this->OUTPUT .= $this->loadExecfile($this->header) ;
        $this->OUTPUT .= $this->loadExecfile($this->body) ;
        $this->OUTPUT .= $this->loadExecfile($this->footer) ;
        echo $this->OUTPUT ;
    }



	
}