<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_form extends id{

	function __construct(){

    }

    function open($name = null, $action = null, $method = null, $submit = null){
        return "<form name='$name' action='$action' method='$method' enctype='multipart/form-data' onsubmit='$submit'>";
    }

    function close(){
        return "</form>";
    }
}
?>