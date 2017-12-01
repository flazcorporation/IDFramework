<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class idc_blog extends id_controller{

	public $model;
	public $view;

	public function __construct(){
		$this->model 	= new idm_blog();
		$this->view 	= new id_view();
		parent::uri();
		parent::crypt();
	}

	function index(){
		$this->view->index();
		echo 'Ini adalah: '.$this->crypt->en('admin');
		echo $this->crypt->en('admin');
		echo "<br />";
		echo $this->crypt->en('encrypt');		
	}
	  
	function model(){
		$this->model->test();
	}

	function tampilkan(){
		$data 	= $this->model->getall();
		$this->view->back('idv_blog.php',$data);
	}
}
?>