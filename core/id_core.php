<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_core extends id{
	
	function __construct(){
		parent::uri();
		parent::config();
	}

	public function dir_list($dir, $dir_array){
	    $files = scandir($dir);	   
	    if(is_array($files)){
	        foreach($files as $val){
	            if($val == '.' || $val == '..')
	                continue;
	            if(is_dir($dir.'/'.$val)){
	                $dir_array[$dir][] = $val;	               
	                $this->dir_list($dir.'/'.$val, $dir_array);
	            }else{
	                $dir_array[$dir][] = $val;
	            }
	        }
	    }
	    ksort($dir_array);
	    return $dir_array;
	}

	public function check_controller_file($controller){
		if(file_exists($this->config->id_project_dir.'/'.$controller.'/idc_'.$controller.'.php')){
			return true;
		}else{
			return false;
		}
	}

	public function include_controller_file($class){
		$folder_list = array();
		$folder_list = $this->dir_list($this->config->id_project_dir,$folder_list);
		foreach($folder_list as $key => $val){
			foreach($folder_list[$key] as $val1){
				if($val1 === $class){
					if(file_exists($key.'/'.$val1.'/idc_'.$val1.'.php')){
						require_once $key.'/'.$val1.'/idc_'.$val1.'.php';
					}
				}
			}
		}	
	}

	public function check_model_file($controller){
		if(file_exists($this->config->id_project_dir.'/'.$controller.'/idm_'.$controller.'.php')){
			return true;
		}else{
			return false;
		}
	}

	public function include_model_file($class){
		$folder_list = array();
		$folder_list = $this->dir_list($this->config->id_project_dir,$folder_list);
		foreach($folder_list as $key => $val){
			foreach($folder_list[$key] as $val1){
				if($val1 === $class){
					if(file_exists($key.'/'.$val1.'/idm_'.$val1.'.php')){
						require_once $key.'/'.$val1.'/idm_'.$val1.'.php';
					}
				}
			}
		}	
	}

	public function check_class($class){
		if(in_array($class,get_declared_classes())){
			return true;
		}else{
			return false;
		}
	}

	public function check_method($class,$method){
		if(in_array($method,get_class_methods($class))){
			return true;
		}else{
			return false;
		}
	}

	function execute(){
		if($this->uri->controller()){
			$page 	= $this->uri->segment(0);
			//require_once Controller if Exist
			if($this->check_controller_file($page)){
				$this->include_controller_file($page);
				if($this->check_class('idc_'.$page)){
					$this->include_model_file($page);
					$classname 		= 'idc_'.$page;
					$class_file 	= new $classname();
					if($this->check_method('idc_'.$this->uri->segment(0),$this->uri->segment(1))){
						$method = $this->uri->segment(1);
						$class_file->$method();
					}else{
						if($this->check_method('idc_'.$page,'index')){
							$class_file->index();
						}else{
							echo "<div style='padding: 20px 0px 20px 20px; width: 95%; border-left: 6px solid red; background-color: #FFFFCC;'>IDFramework Says: Default Method is not found</div>";
						}
					}
				}else{
					echo "<div style='padding: 20px 0px 20px 20px; width: 95%; border-left: 6px solid red; background-color: #FFFFCC;'>IDFramework Says: Controller is not found</div>";
				}
			}else{
				echo "<div style='padding: 20px 0px 20px 20px; width: 95%; border-left: 6px solid red; background-color: #FFFFCC;'>IDFramework Says: Controller is not found</div>";
			}
		}else{
			$this->default_controller();
		}		
	}

	public function default_controller(){
		//Check to require_once model
		if($this->check_model_file($this->config->id_default_root)){
			$this->include_model_file($this->config->id_default_root);
		}

		//Check to require_once controller file
		if($this->check_controller_file($this->config->id_default_root)){
			$this->include_controller_file($this->config->id_default_root);
			if($this->check_class('idc_'.$this->config->id_default_root)){
				if($this->check_method('idc_'.$this->config->id_default_root,'index')){
					$classname 		= 'idc_'.$this->config->id_default_root;
					$class_file 	= new $classname();
					$class_file->index();
				}else{
					echo "<div style='padding: 20px 0px 20px 20px; width: 95%; border-left: 6px solid red; background-color: #FFFFCC;'>IDFramework Says: Default Method is not found</div>";
				}
			}else{
				echo "<div style='padding: 20px 0px 20px 20px; width: 95%; border-left: 6px solid red; background-color: #FFFFCC;'>IDFramework Says: Default Controller is not found</div>";
			}
		}else{
			echo "<div style='padding: 20px 0px 20px 20px; width: 95%; border-left: 6px solid red; background-color: #FFFFCC;'>IDFramework Says: Default Controller is not found</div>";
		}
	}	
}
?>