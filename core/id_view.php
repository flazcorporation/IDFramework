<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_view extends id{

	function __construct(){
		parent::uri();
		parent::html();
	}

	public function load($file,$data){
		if(is_array($data)){
			foreach($data as $key => $val){
				${$key} 	= $val;
			}	
		}
		include id_project_dir.'/'.$this->uri->controller().'/'.$file;
	}
}
?>