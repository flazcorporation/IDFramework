<?php
namespace ID;

if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_html extends id
{
	function __construct()
	{

	}

	function h1($string)
	{
		return "<h1>$string</h1>";
	}

	function h2($string)
	{
		return "<h2>$string</h2>";
	}

	function h3($string)
	{
		return "<h3>$string</h3>";
	}
	
	function h4($string)
	{
		return "<h4>$string</h4>";
	}

	function h5($string)
	{
		return "<h5>$string</h5>";
	}

	function h6($string)
	{
		return "<h6>$string</h6>";
	}

	function b($string)
	{
		return "<b>$string</b>";
	}

	function i($string)
	{
		return "<i>$string</i>";
	}
	
	function u($string)
	{
		return "<u>$string</u>";
	}

	function img($src,$alt)
	{
		return "<img src='$src' alt='$al'/>";
		?>
			
		<?php
	}
}
?>