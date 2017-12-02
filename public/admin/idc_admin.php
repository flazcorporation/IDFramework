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
		parent::input();
		parent::form();
	}

	public function index()
	{
		echo $this->form->open('login', 'kirim', 'get', "onclick='alert('Saya')'");
		echo $this->form->number('username','',2, 20, "onclick=alert('Mulyawan')");
		echo $this->form->text('username', '',"onclick=alert('Mulyawan')");
		echo $this->form->email('username','',"onclick=alert('Mulyawan')");
		echo $this->form->url('username', '',"onclick=alert('Mulyawan')");
		echo $this->form->checkbox('username', '',"onclick=alert('Mulyawan')");
		echo $this->form->ip('username', '',"onclick=alert('Mulyawan')");
		echo $this->form->mac('username', '',"onclick=alert('Mulyawan')");
		echo $this->form->submit('username','Simpan',"onclick=alert('Mulyawan')");
		$this->view->back('idv_index.php');
		$this->input->init();
		$data['satu'] 		= $this->input->text('Mulyawan',3,8);
		$data['dua'] 		= $this->input->int('',3,8);
		$data['tiga'] 		= $this->input->float(5,3,8);
		$data['empat'] 		= $this->input->email('emhulst@yahoo.co.id');

		echo "<pre>";
		var_dump($this->input->result($data));
		echo "</pre>";

		$this->input->init();
		$data['satu'] 		= $this->input->text('Mulyawan Sentosa',3,8);
		$data['dua'] 		= $this->input->int(5,3,8);
		$data['tiga'] 		= $this->input->float(5.3,3,8);
		$data['empat'] 		= $this->input->email('emhulstyahoo.co.id');

		echo "<pre>";
		var_dump($this->input->result($data));
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