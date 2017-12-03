<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_config extends id
{

    public $id_default_root  = "blog";
    public $id_project_dir   = "public";
    public $id_base_url      = "http://localhost:88/idframework";
    
    //=== ENCRYPTION ===//
    public $id_crypt_status  = false;
    public $id_crypt_rot13   = 5;
    public $id_crypt_base    = 5;
    //=== ENCRYPTION ===//

    //=== TRANSLATION ===//
    public  $id_trans_status = true;
    public  $id_trans_def    = 'en';
    public  $id_trans_to     = 'id';
    //=== TRANSLATION ===//

    public function __construct()
    {

	}
	  	  
}

?>