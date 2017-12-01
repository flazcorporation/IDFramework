<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class idm_admin extends id_model
{
	
	public function __construct()
	{
		parent::pdo();
	}

	public function test()
	{
		echo "Ini Model";
	}

	public function getdata()
	{
		$data['nama'][0] 	= "Mulyawan";
		$data['nama'][1]	= "Sentosa";
		return $data;		
	}

	public function getall()
	{
		$result = $this->pdo->select_all('user');
		return $result;
	}
	
}
?>