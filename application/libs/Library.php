<?php
/**
 * My custom library of various functions
 *
 * @author UDcreate
 */

class Library {

  /**
     * Is usually called by cleanUP method
     * Sanitize all inputs 
     * @param string $input 
     * @return string $output
     */
  private function cleanIt($input){ 
  $search = array(
    '@<script[^>]*?>.*?</script>@si',   // Strip out javascript
    '@<[\/\!]*?[^<>]*?>@si',            // Strip out HTML tags
    '@<style[^>]*?>.*?</style>@siU',    // Strip style tags properly
    '@<![\s\S]*?--[ \t\n\r]*>@'         // Strip multi-line comments
  );
    $output = preg_replace($search, '', $input);
    return $output;
  }

    /**
     * Sanitize arrays and strings , calls private function cleanIt()
     * @param string $input 
     * @return string $output
     */
  public function sanitizeStr($input) {
   $link = mysqli_connect( DB_HOST , DB_USER , DB_PASS , DB_NAME );
      $output = '' ;

    if (is_array($input)) {
        foreach($input as $var=>$val) {
            $output[$var] = $this->sanitizeStr($val);
        }
    }
    else {
        if (get_magic_quotes_gpc()) {
            $input = stripslashes($input);
        }
        $input  = $this->cleanIt($input);
        $output = mysqli_real_escape_string($link,$input);
    }
        return $output;
    }

    /**
     * generate random strings
     * @param int|string $length of string to be generated  default is 10
     * @return string $string random string
     */
      public function rand($length = 10){
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $randomString = '';
          for ($i = 0; $i < $length; $i++) {
              $randomString .= $characters[rand(0, strlen($characters) - 1)];
          }
          return $randomString;
       }
}