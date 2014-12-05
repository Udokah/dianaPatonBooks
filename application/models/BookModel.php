<?php
/**
 * Created by PhpStorm.
 * User: ud
 * Date: 10/29/14
 * Time: 2:42 PM
 */

class BookModel {

    private $db ;
    private $table = 'dp_books' ;
    private $lib  ;
    private $uploads_path = 'application/uploads/' ;

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


    /**
     * Get book from column
     * @param $column
     * @param $value
     * @return bool
     */
    public function getBook($column,$value){
        $c = $this->lib->sanitizeStr($column);
        $v = $this->lib->sanitizeStr($value);
        $books = $this->db->dbSELECT(" * ","$c='".$v."'", $this->table);
        if($books['status'] == true){
            return $books['result'] ;
        }else{
            return false ;
        }
    }


    public function getAllBooks(){
        $data = array() ;
        $q = $this->db->query("SELECT * FROM ".$this->table);
        while( $r = $q->fetch_assoc() ){
            $data[$r['bid']] = $r ;
        }
        return $data ;
    }


    /**
     * Add new book
     * @param $array String data to be added
     * @param $files
     * @return array
     */
    public function addNewBook($array,$files){
        $result = array("status"=>false);
        $datas = array() ;
        /* Clean up the data */
        foreach($array as $key => $value ){
            $datas[$key] = $this->lib->sanitizeStr($value);
        }

        // first upload images
        $array['thumbnail'] = $this->lib->rand(10) ;
        $array['full_cover'] = $this->lib->rand(10) ;
        $thumbnail = new Upload($files['thumbnail']);
        $full_cover = new Upload($files['full_cover']);
        $thumbnail->file_new_name_body = $array['thumbnail'] ;
        $full_cover->file_new_name_body = $array['full_cover'] ;
        if ($thumbnail->uploaded) {
            $thumbnail->Process($this->uploads_path);
            if ($thumbnail->processed) {
                $array['thumbnail'] .= '.'.$thumbnail->file_dst_name_ext ;
                // upload the next thumbnail
                if( $full_cover->uploaded ){
                    $full_cover->Process($this->uploads_path);
                    if($full_cover->processed){
                        $array['full_cover'] .= '.'.$full_cover->file_dst_name_ext ;

                        /* Now add items to the database */
                        $set = array() ;
                        foreach($array as $key => $val){
                            $set[] = $key . "='" . $val . "'" ;
                        }

                        $insertData = implode(" , " , $set) ;
                        $insert = $this->db->dbINSERT($insertData,$this->table);
                        if( $insert['status'] == true ){
                            $result['status'] = true ;
                            $result['message'] = "book has been added successfully";
                        }else{
                            $result['message'] = $insert['result'] ;
                        }

                    }else{
                        $result['message'] = 'full_cover error : ' . $thumbnail->error;
                    }
                }

            } else {
                $result['message'] = 'Thumbnail error : ' . $thumbnail->error;
            }
        }

        return $result;
    }


} 