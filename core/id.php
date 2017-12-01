<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id
{

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
	protected $form;
	
	public function __construct()
	{
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
		require_once "id_form.php";
		require_once "helper/id_html.php";
		
		$this->config 	= new id_config();
		$this->crypt 	= new id_crypt();
		$this->core 	= new id_core();
		$this->uri 		= new id_uri();
		$this->cont 	= new id_controller();
		$this->mode 	= new id_model();
		$this->view 	= new id_view();
		$this->html 	= new id_html();
		$this->pdo 		= new id_pdo();
		$this->str 		= new id_str();
		$this->theme	= new id_theme();
		$this->form		= new id_form();
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

	public function form()
	{
		$this->form = new id_form();
  	}

	public function run()
	{
  		$this->core->execute();
	}  
}
?>