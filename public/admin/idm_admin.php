<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class idm_admin extends id_model{
	
	function __construct(){
		parent::pdo();
	}

	function test(){
		echo "Ini Model";
	}

	function getdata(){
		$data['nama'][0] 	= "Mulyawan";
		$data['nama'][1]	= "Sentosa";
		return $data;		
	}

	function getall(){
		$result = $this->pdo->select_all('user');
		return $result;
	}
	
}
?>