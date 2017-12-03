<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id
{

	protected $filelib;
	protected $secure;
	protected $trans;
	protected $error;
	protected $config;
	protected $crypt;
	protected $core;
	protected $uri;
	protected $cont;
	protected $mode;
	protected $view;
	protected $html;
	protected $pdo;
	protected $str;
	protected $theme;
	protected $validate;
	protected $form;
	protected $input;
	protected $arr;
	
	public function __construct()
	{
		require_once "config/id_filelib.php";
		require_once "id_secure.php";
		require_once "id_trans.php";
		require_once "id_error.php";
		require_once "config/id_config.php";
		require_once "id_crypt.php";
		require_once "id_core.php";
		require_once "id_uri.php";
		require_once "id_controller.php";
		require_once "id_model.php";
		require_once "id_view.php";
		require_once "id_pdo.php";
		require_once "id_str.php";
		require_once "id_theme.php";
		require_once "id_validate.php";
		require_once "id_form.php";
		require_once "id_input.php";
		require_once "helper/id_html.php";
		require_once "id_arr.php";
		$this->secure 	= new id_secure();
	}

	public function filelib()
	{
		$this->filelib 	= new id_filelib();  		
	}

	public function secure()
	{
		$this->secure 	= new id_secure();  		
	}

	public function trans()
	{
		$this->trans = new id_trans();  		
  	}

	public function error()
  	{
		  $this->error = new id_error();  		
	}

	public function config()
	{
		$this->config = new id_config();  		
  	}

	public function crypt()
	{
		$this->crypt = new id_crypt();  		
  	}

	public function core()
	{
		$this->core = new id_core();  		
  	}

	public function uri()
	{
		$this->uri = new id_uri();  		
  	}

	public function cont()
	{
		$this->cont = new id_controller();  		
  	}

	public function mode()
	{
		$this->mode = new id_model();  		
  	}

	public function view()
	{
		$this->view = new id_view();  		
  	}

	public function html()
	{
		$this->html = new id_html();  		
  	}

	public function pdo()
	{
		$this->pdo = new id_pdo();
  	}

	public function str()
	{
		$this->str = new id_str();
  	}

	public function theme()
	{
		$this->theme = new id_theme();
  	}

	public function validate()
  	{
		  $this->validate = new id_validate();
	}

		public function form()
	{
		$this->form = new id_form();
  	}

	public function input()
	{
	  	$this->input = new id_input();
	}

	public function arr()
	{
	  	$this->arr = new id_arr();
	}
	
	public function run()
	{
		/*
		echo "<pre>";
		$data 	= $this->secure->dirlist('.');
		echo "</pre>";
		foreach($data as $key){
			echo '"'.$key.'",'."<br />";
		}
		*/
		$data 	= $this->secure->dirlist('.');
		$core = new id_core();
		$core->execute();
	}
  
}
?>