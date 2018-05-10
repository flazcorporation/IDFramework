<?php
namespace ID;

if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_crypt extends id
{
          
    public function __construct()
    {
        parent::config();
	}

    public function en($string)
    {
        if($this->config->id_crypt_status)
        {
            if(is_int($this->config->id_crypt_rot13) && $this->config->id_crypt_rot13 > 0)
            {
                for($i = 0; $i < $this->config->id_crypt_rot13; $i++)
                {
                    $string     = str_rot13($string);                    
                }
            }            
            if(is_int($this->config->id_crypt_base) && $this->config->id_crypt_base > 0)
            {
                for($i = 0; $i < $this->config->id_crypt_base; $i++)
                {
                    $string     = base64_encode($string);
                }
            }            
        }
        $string     = str_replace('/','{',$string);
        $string     = str_replace('=','}',$string);
        return $string;
    }

    public function en_arr_key($arr)
    {
        $array  = array();
        if(is_array($arr))
        {
            foreach($arr as $key => $val)
            {
                $array[$this->en($key)]    = $val;
            }
        }
        return  $array;
    }

    public function en_arr_val($arr)
    {
        $array  = array();
        if(is_array($arr))
        {
            foreach($arr as $key => $val)
            {
                $array[$key]    = $this->en($val);
            }
        }
        return  $array;
    }

    public function en_arr_key_val($arr)
    {
        if(is_array($arr))
        {
            $array  = array();
            foreach($arr as $key => $val)
            {
                $array[$this->en($key)]    = $this->en($val);
            }
        }
        return  $array;
    }

    public function de($string)
    {
        if($this->config->id_crypt_status)
        {
            $string     =  str_replace('{','/',$string);
            $string     =  str_replace('}','=',$string);
            if(is_int($this->config->id_crypt_base) && $this->config->id_crypt_base > 0)
            {
                for($i = 0; $i < $this->config->id_crypt_base; $i++)
                {
                    $string     = base64_decode($string);
                }
            }            
            if(is_int($this->config->id_crypt_rot13) && $this->config->id_crypt_rot13 > 0)
            {
                for($i = 0; $i < $this->config->id_crypt_rot13; $i++)
                {
                    $string     = str_rot13($string);                    
                }
            }            
        }
        return $string;
    }

    public function de_arr_key($arr)
    {
        $array  = array();
        if(is_array($arr))
        {
            foreach($arr as $key => $val)
            {
                $array[$this->de($key)]    = $val;
            }
        }
        return  $array;
    }

    public function de_arr_val($arr)
    {
        $array  = array();
        if(is_array($arr))
        {
            foreach($arr as $key => $val)
            {
                $array[$key]    = $this->de($val);
            }
        }
        return  $array;
    }

    public function de_arr_key_val($arr)
    {
        $array  = array();
        if(is_array($arr))
        {
            foreach($arr as $key => $val)
            {
                $array[$this->de($key)]    = $this->de($val);
            }
        }
        return  $array;
    }    
}
?>