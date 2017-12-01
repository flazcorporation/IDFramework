<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_theme extends id
{

	public $models;
    
	function __construct()
	{
		parent::uri();
		parent::pdo();
		parent::config();
		parent::crypt();
    }

	public function load($file,$dat = null)
	{
		if(is_array($dat))
		{
			foreach($dat as $keys => $vals)
			{
				${$keys} 	= $vals;
			}
		}
		require_once $this->config->id_project_dir.'/'.$file;
	}

	public function data()
	{
		$data['name'] 		= 'IDFramework';
		return $data;		
	}

	public function index()
	{
		$this->front_index();
	}

	//======== FRONT END THEME ========//
	public function front_index()
	{
		$data 	= $this->data();
		$this->front_header();
		$this->load('blog/idv_index.php',$data);
		$this->front_footer();
	}

	public function front_header()
	{
		$data 	= $this->data();
		$this->load('theme/front/web/header.php',$data);
  	}

	public function front_footer()
	{
		$this->load('theme/front/web/footer.php');
  	}
	//======== FRONT END THEME ========//

	//======== BACK END THEME ========//
	public function back_index()
	{
		$data 	= $this->data();
		$this->back_header();
		$this->back_navbar();
		$this->load('theme/back/material/content.php',$data);
		$this->back_footer();
  	}

	public function back_header()
	{
		$this->load('theme/back/material/header.php');
  	}

	public function back_navbar()
	{
		$data 	= $this->data();
		$this->load('theme/back/material/navbar.php',$data);
  	}

	public function back_footer()
	{
		$this->load('theme/back/material/footer.php');
  	}
	//======== BACK END THEME ========//
}
?>