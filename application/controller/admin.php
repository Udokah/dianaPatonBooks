<?php

/**
 * Controller about
 */


class Admin extends Controller{

    public function index(){
        $this->View = new View() ;
        $this->View->setHeader("/_templates/admin_header.php");
        $this->View->setTitle("Add a book") ;
        $this->View->setBody("add_books.php") ;
        $this->View->setnavBar(true) ;
        $this->View->isRestricted(false) ;
        $this->View->renderView() ;
    }

}
