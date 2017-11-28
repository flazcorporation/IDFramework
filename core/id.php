<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id{
	public $core;
	public $uri;
	public $cont;
	public $mode;
	public $view;
	public $html;
	public $pdo;
	public $str;
	public $theme;
	
	public function __construct(){
		require_once "id_core.php";
		require_once "id_uri.php";
		require_once "id_controller.php";
		require_once "id_model.php";
		require_once "id_view.php";
		require_once "helper/id_html.php";
		require_once "helper/id_pdo.php";
		require_once "helper/id_str.php";
		require_once "helper/id_theme.php";
		
		$this->core 	= new id_core();
		$this->uri 		= new id_uri();
		$this->cont 	= new id_controller();
		$this->mode 	= new id_model();
		$this->view 	= new id_view();
		$this->html 	= new id_html();
		$this->pdo 		= new id_pdo();
		$this->str 		= new id_str();
		$this->theme	= new id_theme();
	}

  	public function core(){
		$this->core = new id_core();  		
  	}

  	public function uri(){
		$this->uri = new id_uri();  		
  	}

  	public function cont(){
		$this->cont = new id_controller();  		
  	}

  	public function mode(){
		$this->mode = new id_model();  		
  	}

  	public function view(){
		$this->view = new id_view();  		
  	}

  	public function html(){
		$this->html = new id_html();  		
  	}

  	public function pdo(){
		$this->pdo = new id_pdo();
  	}

  	public function str(){
		$this->str = new id_str();
  	}

  	public function theme(){
		$this->theme = new id_theme();
  	}

  	public function run(){
  		$this->core->execute();
	}
	  
}
?>