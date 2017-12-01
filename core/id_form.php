<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_form extends id
{

    public function __construct()
    {

    }

    public function open($name = null, $action = null, $method = null, $custome = null)
    {
        $token = bin2hex(openssl_random_pseudo_bytes(16));
        setcookie("CSRF$name", $token, time() + 60 * 60 * 24);
        $form   = "<form name='$name' action='$action' method='$method' enctype='multipart/form-data' $custome>";
        $form   .= "<input name='CSRF$name' type='hidden' value='$token'>";
        return $form;
    }

    public function close()
    {
        return "</form>";
    }
}
?>