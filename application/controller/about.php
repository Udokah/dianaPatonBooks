<?php

/**
 * Controller about
 */


class About extends Controller{

    public function index(){
        $this->View = new View() ;
        $this->View->setTitle("About") ;
        $this->View->setBody("about.php") ;
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
