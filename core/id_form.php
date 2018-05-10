<?php
namespace ID;

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

    public function number($name = null, $value = null, $min = null, $max = null, $attr = null)
    {
        $field  = "<input type='number' name='$name' id='$name' value='$value' min='$min' max='$max' $attr />";
        return $field;
    }

    public function text($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='text' name='$name' id='$name'  value='$value' $attr />";
        return $field;
    }

    public function email($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='email' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function url($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='url' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function ip($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='text' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function checkbox($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='checkbox' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }
    
    public function radio($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='radio' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function date($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='date' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function mac($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='text' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function textarea($name = null, $value = null, $attr = null)
    {
        $field  = "<textarea name='$name' id='$name' $attr>$value</textarea>";
        return $field;
    }
    
    public function password($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='password' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function reset($name = null, $attr = null)
    {
        $field  = "<input type='reset' name='$name' id='$name' $attr />";
        return $field;
    }

    public function button($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='button' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function color($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='color' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function range($name = null, $value = null, $min = null, $max = null, $attr = null)
    {
        $field  = "<input type='range' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function datetime($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='datetime-local' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function month($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='month' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function search($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='search' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }
    
    public function tel($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='tel' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function time($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='time' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function week($name = null, $value = null, $attr = null)
    {
        $field  = "<input type='week' name='$name' id='$name' value='$value' $attr />";
        return $field;
    }

    public function submit($name = null, $value = null, $attr = null)
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