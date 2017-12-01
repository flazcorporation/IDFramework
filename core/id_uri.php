<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
class id_uri extends id
{

	public function __construct()
	{
		parent::str();
		parent::config();
		parent::crypt();
	}

	public function controller()
	{
		$get 		= array_keys($_GET);
		if(isset($get[0]))
		{
			$url 		= explode('/',$get[0]);
			$page 		= $url[0];
		}else{
			$page 		= "";
		}
		return $this->crypt->de($page);
	}

	public function method()
	{
		$get 		= array_keys($_GET);
		if(isset($get[0]))
		{
			$url 		= explode('/',$get[1]);
			$page 		= $url[0];
		}else{
			$page 		= "";
		}
		return $this->crypt->de($page);
	}

	public function segment($id)
	{
		$get 		= array_keys($_GET);
		if(isset($get[0]))
		{
			$url 		= explode('/',$get[0]);
			if(sizeof($url)-1 < $id)
			{
				return "";
			}else{
				return $this->crypt->de($url[$id]);
			}
		}else{
			return "";
		}
	}
	public function all()
	{
		$get 		= array_keys($_GET);
		if(isset($get[0]))
		{
			$url 		= explode('/',$get[0]);
			return $this->crypt->de_arr_val($url);
		}else{
			return array();
		}
	}
	public function last()
	{
		$get 		= array_keys($_GET);
		if(isset($get[0]))
		{
			$url 		= explode('/',$get[0]);
			return $this->crypt->de(end($url));
		}else{
			return "";
		}
	}
	public function except($remove)
	{
		$get 		= array_keys($_GET);
		if(isset($get[0]))
		{
			$url 		= explode('/',$get[0]);
			foreach($url as $key => $value)
			{
				if(in_array($value,$this->crypt->en_arr_val($remove)))
				{
					unset($url[$key]);
				}
			}
			return $this->crypt->de_arr_val($url);
		}else{
			return array();
		}
	}
	public function link($url = null)
	{
		$get 		= array_keys($_GET);
		if($url !== null)
		{
			$url 		= explode('/',$get[0]);
			$arr 		= $this->crypt->en_arr_val($url);
			$url 		= implode('/',$arr);
		}
		return $this->config->id_base_url.'/'.$url;
	}
	public function file($url = null)
	{
		return $this->config->id_base_url.'/'.$url;
	}
}
?>