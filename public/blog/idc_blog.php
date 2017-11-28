<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class idc_blog extends id_controller{

	public $model;
	public $view;

	public function __construct(){
		$this->model 	= new idm_blog();
		$this->view 	= new id_view();
		parent::uri();
	}

	function index(){
  		echo "Hello";
	}
	  
	function model(){
		$this->model->test();
	}

	function tampilkan(){
		$data 	= $this->model->getall();
		$this->view->load('idv_blog.php',$data);
	}
}
?>