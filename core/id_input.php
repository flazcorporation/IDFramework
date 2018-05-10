<?php
namespace ID;

if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_input extends id
{

    protected $result = array();
    protected $error  = array();
    
    public function __construct()
    {
        parent::validate();
    }

    public function init($name = null)
    {
        $this->result       = array();
        $this->error        = array();
    }

    public function int($value, $min = null, $max = null)
    {
        $this->result[][]  = $this->validate->int($value, $min, $max);       
    }

    public function float($value, $min = null, $max = null)
    {
        $this->result[][]  = $this->validate->float($value, $min, $max);       
    }

    public function text($value, $min = null, $max = null)
    {
        $this->result[][]  = $this->validate->string($value, $min, $max);       
    }

    public function email($value)
    {
        $this->result[][]  = $this->validate->email($value);
    }
    
    public function url($value)
    {
        $this->result[][]  = $this->validate->url($value);
    }

    public function date($value)
    {
        $this->result[][]  = $this->validate->date($value);
    }

    public function checkbox($value)
    {
        $this->result[][]  = $this->validate->bool($value);
    }

    public function ip($value)
    {
        $this->result[][]  = $this->validate->ip($value);
    }

    public function mac($value)
    {
        $this->result[][]  = $this->validate->mac($value);
    }

    public function arr_int($value, $min = null, $max = null)
    {
        $this->result[][]  = $this->validate->arr_int($value, $min, $max);       
    }

    public function arr_float($value, $min = null, $max = null)
    {
        $this->result[][]  = $this->validate->arr_float($value, $min, $max);       
    }

    public function arr_text($value, $min = null, $max = null)
    {
        $this->result[][]  = $this->validate->arr_string($value, $min, $max);       
    }

    public function arr_email($value)
    {
        $this->result[][]  = $this->validate->arr_email($value);
    }
    
    public function arr_url($value)
    {
        $this->result[][]  = $this->validate->arr_url($value);
    }

    public function arr_checkbox($value)
    {
        $this->result[][]  = $this->validate->arr_bool($value);
    }

    public function arr_ip($value)
    {
        $this->result[][]  = $this->validate->arr_ip($value);
    }

    public function arr_mac($value)
    {
        $this->result[][]  = $this->validate->arr_mac($value);
    }

    private function check($arr)
    {
        $error  = array();
        foreach($arr as $key => $val)
        {
            if(is_array($val))
            {
                $error    = $this->check($val);
            }
            if($key === 'error' && $val === true){
                $this->error[]  = $arr;
            }
    }
        return $this->error;
    }

    public function result()
    {
        return $this->check($this->result);
    }


}
?>