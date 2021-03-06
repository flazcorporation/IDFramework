<?php
namespace ID;

if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_view extends id
{

	public function __construct()
	{
		parent::uri();
		parent::html();
		parent::theme();
		parent::form();
		parent::config();
		parent::crypt();
	}

	public function index()
	{
		$this->theme->index();
	}

	public function front($file,$data = null)
	{
		if(is_array($data))
		{
			foreach($data as $key => $val)
			{
				${$key} 	= $val;
			}	
		}
		$this->theme->front_header();
		require_once $this->config->id_project_dir.'/'.$this->uri->controller().'/'.$file;
		$this->theme->front_footer();
	}

	public function back($file,$data = null)
	{
		if(is_array($data))
		{
			foreach($data as $key => $val)
			{
				${$key} 	= $val;
			}	
		}
		$this->theme->back_header();
		$this->theme->back_navbar();
		require_once $this->config->id_project_dir.'/'.$this->uri->controller().'/'.$file;
		$this->theme->back_footer();
	}
	
}
?>