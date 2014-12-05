<?php
/**
 * Created by PhpStorm.
 * User: ud
 * Date: 10/28/14
 * Time: 5:48 PM
 */

class Books extends Controller{

    public function index(){
        $this->View = new View() ;
        $this->View->setnavBar(true) ;
        $this->View->isRestricted(false) ;
        $this->View->setTitle("List of Books") ;
        $this->View->setBody("all_book.php") ;

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

    public function shelf($book_title){
        if( !isset($book_title) || strlen($book_title) < 4){
            $goto = URL . 'books' ;
            header("location: $goto");
        }

        $book = new BookModel();
        $title = implode(" ", explode("-",$book_title))  ;
        $bookData = $book->getBook('title',$title) ;
        if( $bookData == false ){
            echo '<center>Sorry, the book <strong>'. $title.'</strong> was not found !</center>';
        }else{
        $this->View = new View() ;
        $this->View->setnavBar(true) ;
        $this->View->isRestricted(false) ;
        $this->View->setTitle($bookData['title']) ;
        $this->View->setBody("single_book.php") ;
        $this->View->setDesc($bookData['description']) ;
        $this->View->setVar('book',$bookData);
        $this->View->setVar('allbooks', $book->getAllBooks() );
        $this->View->renderView() ;
        }
    }

    public function add(){
        $book = new BookModel();
        $result = $book->addNewBook($_POST,$_FILES);
        print_r($result);
    }


} 