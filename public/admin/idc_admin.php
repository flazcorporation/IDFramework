<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class idc_admin extends id_controller
{

	protected $model;
	protected $view;

	public function __construct()
	{
		$this->model 	= new idm_admin();
		$this->view 	= new id_view();
		parent::uri();
		parent::crypt();
		parent::validate();
	}

	public function index()
	{
		$this->view->back('idv_index.php');
		$isi 	= 'emhulst@yahoo.com';
		$data 	= array($isi,2,5.5,array(40,3.5,array(30,56)));
		echo "<pre>";
		var_dump($this->validate->arr_string($data));
		echo "</pre>";
	}
	  
	public function model()
	{
		$this->model->test();
	}

	public function tampilkan()
	{
		$data['data'] = $this->model->getall();
		$this->view->back('idv_admin.php',$data);
	}
	
	public function encrypt()
	{
		$string 	= "Mulyawan Sentosa";
		$result = $this->crypt->en($string);
		echo $result."<br />";

		$result1 = $this->crypt->de($result);
		echo $result1."<br />";
		var_dump($this->uri->except(array('admin','saya')));
	}

	public function form()
	{
		$this->view->back('idv_admin.php');
	}
	
}
?>