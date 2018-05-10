<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

use ID\id_controller;
use ID\id_view;
	
class idc_blog extends id_controller
{

	protected $model;
	protected $view;

	public function __construct()
	{
		$this->model 	= new idm_blog();
		$this->view 	= new id_view();
		parent::uri();
		parent::crypt();
	}

	public function index()
	{
		$this->view->index();
		/*
		echo 'Ini adalah: '.$this->crypt->en('admin');
		echo $this->crypt->en('admin');
		echo "<br />";
		echo $this->crypt->en('encrypt');		
		*/
	}
	  
	public function model()
	{
		$this->model->test();
	}

	function tampilkan()
	{
		$data 	= $this->model->getall();
		$this->view->back('idv_blog.php',$data);
	}
}
?>