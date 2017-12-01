<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_crypt extends id{
          
    function __construct(){
        parent::config();
	}

    function en($string){
        if($this->config->id_crypt_status){
            if(is_int($this->config->id_crypt_rot13) && $this->config->id_crypt_rot13 > 0){
                for($i = 0; $i < $this->config->id_crypt_rot13; $i++){
                    $string     = str_rot13($string);                    
                }
            }            
            if(is_int($this->config->id_crypt_base) && $this->config->id_crypt_base > 0){
                for($i = 0; $i < $this->config->id_crypt_base; $i++){
                    $string     = base64_encode($string);
                }
            }            
        }
        return str_replace('/','{',$string);
    }

    function de($string){
        if($this->config->id_crypt_status){
            $string     =  str_replace('{','/',$string);
            if(is_int($this->config->id_crypt_base) && $this->config->id_crypt_base > 0){
                for($i = 0; $i < $this->config->id_crypt_base; $i++){
                    $string     = base64_decode($string);
                }
            }            
            if(is_int($this->config->id_crypt_rot13) && $this->config->id_crypt_rot13 > 0){
                for($i = 0; $i < $this->config->id_crypt_rot13; $i++){
                    $string     = str_rot13($string);                    
                }
            }            
        }
        return $string;
        }
}
?>