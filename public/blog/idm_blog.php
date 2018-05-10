<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

use ID\id_model;

class idm_blog extends id_model
{
	
	function __construct()
	{
		parent::pdo();
	}

	function test()
	{
		echo "Ini Model";
	}

	function get_data()
	{
		$data['nama'] 	= "Mulyawan Sentosa";
		$data['alamat']	= "Rangkasbitung";
		return $data;		
	}

	function getall()
	{
		$result = $this->pdo->select_all('user');
	}
}
?>