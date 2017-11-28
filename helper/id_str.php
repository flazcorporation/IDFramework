<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_str extends id{

	function __construct(){

    }
    
	function before($string, $substring){
        $pos = strpos($string, $substring);
        if ($pos === false)
         return $string;
        else
         return(substr($string, 0, $pos));
      }
  
      function after($string, $substring) {
        $pos = strpos($string, $substring);
        if ($pos === false)
         return $string;
        else  
         return(substr($string, $pos+strlen($substring)));
      }
  
      function between($string, $start, $end){
          $string = ' ' . $string;
          $ini = strpos($string, $start);
          if ($ini == 0) return '';
          $ini += strlen($start);
          $len = strpos($string, $end, $ini) - $ini;
          return substr($string, $ini, $len);
      }  
}
?>