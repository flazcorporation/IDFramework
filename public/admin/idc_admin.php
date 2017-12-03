<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class idc_admin extends id_controller
{

	protected $model;
	protected $view;
	protected $apa;

	public function __construct()
	{
		$this->model 	= new idm_admin();
		$this->view 	= new id_view();
		parent::uri();
		parent::crypt();
		parent::validate();
		parent::input();
		parent::form();
		parent::secure();
		$this->apa  = "Saya Admin";

	}

	public function index()
	{
		/*
		echo $this->form->open('login', $this->uri->link('admin/simpan'), 'post');
		echo $this->form->number('number','',2, 20);
		echo $this->form->text('text', '');
		echo $this->form->email('email','');
		echo $this->form->url('url', '');
		echo $this->form->date('date', '','1986-01-01','2017-12-31');
		echo $this->form->radio('radio', 'Isi');
		echo $this->form->ip('ip', '');
		echo $this->form->mac('mac', '');
		echo $this->form->submit('simpan','Simpan');
		*/
		$this->view->back('idv_index.php');
		
		/*
		echo "<pre>";
		$data = $this->secure->id_class(1);
		foreach($data as $key => $val)
		{
			var_dump($val);
			echo "<hr />";
		}
		//var_dump($this->secure->id_class(2));
		echo "</pre>";
		*/
		//$this->secure->class_unreg();
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

	public function simpan()
	{
		$this->input->init();

		$data['number'] 	= $this->input->int($_POST['number'],3,10);
		$data['text'] 		= $this->input->text($_POST['text'],3,10);
		$data['email'] 		= $this->input->email($_POST['email']);
		$data['url'] 		= $this->input->url($_POST['url']);
		$data['date'] 		= $this->input->date($_POST['date']);
		$data['radio'] 		= $this->input->radio($_POST['radio']);
		$data['ip'] 		= $this->input->ip($_POST['ip']);
		$data['mac'] 		= $this->input->mac($_POST['mac']);

		$result 	= $this->input->result();
		echo "<pre>";
		var_dump($result);
		echo "</pre>";
		$this->view->back('idv_admin.php');
	}
	
}
?>