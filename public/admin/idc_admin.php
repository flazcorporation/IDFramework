<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class idc_admin extends id_controller{

	public $model;
	public $view;

	public function __construct(){
		$this->model 	= new idm_admin();
		$this->view 	= new id_view();
		parent::uri();
		parent::crypt();
	}

	function index(){
		$this->view->back('idv_index.php');
		echo $this->crypt->en('admin');
		echo "<br />";
		echo $this->crypt->en('encrypt');
	}
	  
	function model(){
		$this->model->test();
	}

	function tampilkan(){
		$data['data'] = $this->model->getall();
		$this->view->back('idv_admin.php',$data);
	}
	
	function encrypt(){
		$string 	= "Mulyawan Sentosa";
		$result = $this->crypt->en($string);
		echo $result."<br />";

		$result1 = $this->crypt->de($result);
		echo $result1."<br />";
		var_dump($this->uri->except(array('admin','saya')));
	}
}
?>