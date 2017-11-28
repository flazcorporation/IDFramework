<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_theme extends id{

	public $models;
    
	function __construct(){
		parent::uri();
        require_once id_project_dir.'/'.$this->uri->controller().'/idm_blog.php';
		$this->models 	= new idm_blog();
    }

	public function load($file,$data){
		if(is_array($data)){
			foreach($data as $key => $val){
				${$key} 	= $val;
			}	
		}
		require_once id_project_dir.'/'.$file;
	}	

    function header(){
		$data 	= $this->models->getall();
		$this->load('theme/back_end/kepala.php',$data);
    }

    function footer(){
		$data 	= $this->models->getall();
		$this->load('theme/back_end/kaki.php',$data);
    }

}
?>