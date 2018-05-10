<?php
namespace ID;

if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_db extends database
{

    public $driver              = 'mysql';
    public $host                = 'localhost';
    public $user                = 'root';
    public $pass                = '';
    public $name                = 'dbuser';
           
    public function __construct(){

	}
	  	  
}

?>