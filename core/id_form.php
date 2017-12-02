<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_form extends id
{

    public function __construct()
    {
        parent::trans();
    }

    public function open($name = null, $action = null, $method = 'post', $attr = null)
    {
        $token = bin2hex(openssl_random_pseudo_bytes(64));
        setcookie("CSRF$name", $token, time() + 60 * 60 * 24);
        $form   = "<form name='$name' action='$action' method='$method' enctype='multipart/form-data' $attr>";
        $form   .= "<input name='CSRF$name' type='hidden' value='$token'>";
        return $form;
    }

    public function number($name, $value = null, $min = null, $max = null, $attr = null)
    {
        $field  = "<input type='number' name='$name' id='$name' value='$value' min='$min' max='$max' $attr />";
        return $field;
    }

    public function text($name, $value = null, $attr = null)
    {
        $field  = "<input type='text' name='$name' id='$name'  value='$value' $attr />";
        return $field;
    }

    public function email($name, $value = null, $attr = null)
    {
        $field  = "<input type='email' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function url($name, $value = null, $attr = null)
    {
        $field  = "<input type='url' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function checkbox($name, $value = null, $attr = null)
    {
        $field  = "<input type='checkbox' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }
    
    public function ip($name, $value = null, $attr = null)
    {
        $field  = "<input type='text' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function mac($name, $value = null, $attr = null)
    {
        $field  = "<input type='text' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function submit($name, $value = null, $attr = null)
    {
        if($value == null){
            $value = $this->trans->lang('Process');
        }
        $field  = "<input type='submit' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function close()
    {
        return "</form>";
    }
}
?>