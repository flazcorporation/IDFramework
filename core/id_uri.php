<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
class id_uri extends id{

	function __construct(){
		parent::str();
	}

	public function controller(){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			$page 		= $url[0];
		}else{
			$page 		= "";
		}
		return $page;
	}

	public function method(){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[1]);
			$page 		= $url[0];
		}else{
			$page 		= "";
		}
		return $page;
	}

	public function segment($id){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			if(sizeof($url)-1 < $id){
				return "";
			}else{
				return $url[$id];
			}
		}else{
			return "";
		}
	}
	public function all(){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			return $url;
		}else{
			return array();
		}
	}
	public function last(){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			return end($url);
		}else{
			return "";
		}
	}
	public function except($remove){
		$get 		= array_keys($_GET);
		if(isset($get[0])){
			$url 		= explode('/',$get[0]);
			foreach($url as $key => $value){
				if(in_array($key,$remove)){
					unset($url[$key]);
				}
			}
			return $url;
		}else{
			return array();
		}
	}
	function link($url){
		$dir 	= explode('/',$this->str->before($_SERVER['PHP_SELF'],'/index.php'));
		if(sizeof($dir)>1){
			$base_dir 	= '/'.end($dir);
		}else{
			$base_dir 	= "";
		}
		if(isset($_SERVER['HTTPS']) && 'on' === $_SERVER['HTTPS']){
			$protocol 	= "https://";
		}else{
			$protocol 	= "http://";
		}
		return $protocol.$_SERVER['HTTP_HOST'].$base_dir.'/'.$url;			
	}
	function file($url){
		if($_SERVER['SERVER_NAME'] == 'localhost'){
			return $url;
		}else{
			$dir 	= explode('/',$this->str->before($_SERVER['PHP_SELF'],'/index.php'));
			if(sizeof($dir)>1){
				$base_dir 	= end($dir);
			}else{
				$base_dir 	= "";
			}
			return $base_dir.'/'.$url;
		}
	}
	function inc($pre,$url){
		$url1  		= explode('/',$url);
		if($url1[0] == ''){
			unset($url1[0]);
			$url 	= implode('/',$url1);
		}
		return $pre.$url;
	}
}
?>