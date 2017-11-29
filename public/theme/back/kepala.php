<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");
?>
<html>
	<head>
		<title></title>
		<link rel="stylesheet" type="text/css" href="<?php echo $this->uri->base('public/theme/back_end/style.css');?>" />
	</head>
	<body>
		<?php
			echo 'Welcome to: '.$name;
		?>
	</body>
</html>