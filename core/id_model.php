<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_model extends id{

	public function __construct(){
		parent::pdo();
	}

}
?>