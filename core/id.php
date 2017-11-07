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
	
	public function __construct(){
		include "id_core.php";
		include "id_uri.php";
		include "id_controller.php";
		include "id_model.php";
		include "id_view.php";
		include "helper/id_html.php";
		include "helper/id_pdo.php";
		$this->core = new id_core();
		$this->uri 	= new id_uri();
		$this->cont = new id_controller();
		$this->mode = new id_model();
		$this->view = new id_view();
		$this->html = new id_html();
		$this->pdo 	= new id_pdo();
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

  	public function run(){
  		$this->core->execute();
  	}
}
?>