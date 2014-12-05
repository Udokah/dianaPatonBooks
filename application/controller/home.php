<?php

/**
 * Class Pages
 */


class Home extends Controller{
    private $View ;

    public function index(){
        $this->View = new View() ;
        $this->View->setTitle("Diana Patons Books Online") ;
        $this->View->setBody("home.php") ;
        $this->View->setnavBar(true) ;
        $this->View->isRestricted(false) ;
        /* get all books */
        $books = new BookModel();
        $allbooks = $books->getAllBooks();
        if( is_array($allbooks) ){
            $this->View->setVar("books",$allbooks);
        }else{
            $this->View->setVar("books",false);
        }
        $this->View->renderView() ;
    }

}
