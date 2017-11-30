<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class idc_admin extends id_controller{

	public $model;
	public $view;

	public function __construct(){
		$this->model 	= new idm_admin();
		$this->view 	= new id_view();
		parent::uri();
	}

	function index(){
		$this->view->back('idv_index.php');
	}
	  
	function model(){
		$this->model->test();
	}

	function tampilkan(){
		$this->view->back('idv_admin.php');
	}
}
?>