<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_theme extends id{

	public $models;
    
	function __construct(){
		parent::uri();
		parent::pdo();
    }

	public function load($file,$dat = null){
		if(is_array($dat)){
			foreach($dat as $keys => $vals){
				${$keys} 	= $vals;
			}
		}
		require_once id_project_dir.'/'.$file;
	}

	function data(){
		$data['name'] 		= 'IDFramework';
		return $data;		
	}

	function index(){
		$this->front_index();
	}

	//======== FRONT END THEME ========//
	function front_index(){
		$data 	= $this->data();
		$this->front_header();
		$this->load('theme/front/web/content.php',$data);
		$this->front_footer();
	}

  	function front_header(){
		$data 	= $this->data();
		$this->load('theme/front/web/header.php',$data);
  	}

  	function front_footer(){
		$this->load('theme/front/web/footer.php');
  	}
	//======== FRONT END THEME ========//

	//======== BACK END THEME ========//
	function back_index(){
		$data 	= $this->data();
		$this->front_header();
		$this->load('theme/front/web/content.php',$data);
		$this->front_header();
  	}

  	function back_header(){
		$data 	= $this->data();
		$this->load('theme/back/kepala.php',$data);
  	}

  	function back_footer(){
		$this->load('theme/back/kaki.php');
  	}
	//======== BACK END THEME ========//
}
?>