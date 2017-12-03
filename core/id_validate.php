<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_validate extends id
{

    public function __construct()
    {
        parent::trans();
        parent::error();
    }
    
    public function int($data, $min = null, $max = null)
    {
        $msg    = null;
        if(is_int((int)$data))
        {
            if($min !== null)
            {
                if($data < $min)
                {
                    $msg  = $this->error->message('3001');
                }    
            }
            if($max !== null)
            {
                if($data > $max){
                    $msg  .= $this->error->message('3002');
                }    
            }
            if($msg == null){
                return $data;
            }else{
                $error['data']        = $data;
                $error['message']     = $msg;
                $error['error']       = true;                    
                return $error;
            }
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3101');
            $error['error']       = true;
            return $error;
        }
    }

    public function float($data, $min = null, $max = null)
    {
        $msg    = null;
        if(is_float((float)$data))
        {
            if($min !== null)
            {
                if($data < $min)
                {
                    $msg  = $this->error->message('3001');
                }
            }
            if($max !== null)
            {
                if($data > $max){
                    $msg  .= $this->error->message('3002');
                }
            }
            if($msg == null){
                return $data;
            }else{
                $error['data']        = $data;
                $error['message']     = $msg;
                $error['error']       = true;                    
                return $error;
            }
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3102');
            $error['error']       = true;
            return $error;
        }
    }

    public function string($data, $min = null, $max = null)
    {
        $msg    = null;
        if(is_string($data))
        {
            if($min !== null)
            {
                if(strlen($data) < $min)
                {
                    $msg  = $this->error->message('3001');
                }
            }
            if($max !== null)
            {
                if(strlen($data) > $max){
                    $msg  .= $this->error->message('3002');
                }
            }
            if($msg == null){
                return $data;
            }else{
                $error['data']        = $data;
                $error['message']     = $msg;
                $error['error']       = true;                    
                return $error;
            }
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3103');
            $error['error']       = true;
            return $error;
        }
    }

    public function email($data)
    {
        if(filter_var($data, FILTER_VALIDATE_EMAIL))
        {
            return $data;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3104');
            $error['error']       = true;
            return $error;
        }
    }

    public function url($data)
    {
        if(filter_var($data, FILTER_VALIDATE_URL))
        {
            return $data;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3105');
            $error['error']       = true;
            return $error;
        }
    }

    private function date_check1($date)
    {
        if(preg_match("/^(\d{4})-(\d{2})-(\d{2})$/", $date, $matches)) 
        {
            if(checkdate($matches[2], $matches[3], $matches[1]))
            { 
                return true;
            }
        }
    }

    private function date_check2($date)
    {
        if(preg_match("/^(\d{2})\/(\d{2})\/(\d{4})$/", $date, $matches))
        {
            if(checkdate($matches[2], $matches[1], $matches[3]))
            {
                return true; 
            }
        }
    }

    private function date_check3($date)
    {
        if(preg_match("/^(\d{2})-(\d{2})-(\d{4})$/", $date, $matches)) 
        {
            if(checkdate($matches[1], $matches[2], $matches[3]))
            {
                return true;
            }
        }
    }


    public function date($data)
    {
        if($this->date_check1($data))
        {
            return $data;
        }elseif($this->date_check2($data)){
            return $data;
        }elseif($this->date_check3($data)){
            return $data;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3106');
            $error['error']       = true;
            return $error;
        }
    }

    public function bool($data)
    {
        if(filter_var($data, FILTER_VALIDATE_BOOLEAN))
        {
            return $data;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3107');
            $error['error']       = true;
            return $error;
        }
    }

    public function ip($data)
    {
        if(filter_var($data, FILTER_VALIDATE_IP))
        {
            return $data;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3108');
            $error['error']       = true;
            return $error;
        }
    }

    public function mac($data)
    {
        if(filter_var($data, FILTER_VALIDATE_MAC))
        {
            return $data;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3109');
            $error['error']       = true;
            return $error;
        }
    }

    public function arr_int($data, $min = null, $max = null)
    {
        if(is_array($data))
        {
            $result     = array();
            foreach($data as $key => $val)
            {
                if(is_array($val))
                {
                    $result[]   = $this->arr_int($val, $min, $max);
                }else{
                    $result[]   = $this->int($val, $min, $max);
                }
            }
            return $result;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3201');
            $error['error']       = true;
            return $error;
        }
    }
    
    public function arr_float($data, $min = null, $max = null)
    {
        if(is_array($data))
        {
            $result     = array();
            foreach($data as $key => $val)
            {
                if(is_array($val))
                {
                    $result[]   = $this->arr_float($val, $min, $max);
                }else{
                    $result[]   = $this->float($val, $min, $max);
                }
            }
            return $result;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3201');
            $error['error']       = true;
            return $error;
        }
    }

    public function arr_string($data, $min = null, $max = null)
    {
        if(is_array($data))
        {
            $result     = array();
            foreach($data as $key => $val)
            {
                if(is_array($val))
                {
                    $result[]   = $this->arr_string($val, $min, $max);
                }else{
                    $result[]   = $this->string($val, $min, $max);
                }
            }
            return $result;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3201');
            $error['error']       = true;
            return $error;
        }
    }

    public function arr_email($data)
    {
        if(is_array($data))
        {
            $result     = array();
            foreach($data as $key => $val)
            {
                if(is_array($val))
                {
                    $result[]   = $this->arr_email($val);
                }else{
                    $result[]   = $this->email($val);
                }
            }
            return $result;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3201');
            $error['error']       = true;
            return $error;
        }
    }

    public function arr_url($data)
    {
        if(is_array($data))
        {
            $result     = array();
            foreach($data as $key => $val)
            {
                if(is_array($val))
                {
                    $result[]   = $this->arr_url($val);
                }else{
                    $result[]   = $this->url($val);
                }
            }
            return $result;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3201');
            $error['error']       = true;
            return $error;
        }
    }

    public function arr_date($data)
    {
        if(is_array($data))
        {
            $result     = array();
            foreach($data as $key => $val)
            {
                if(is_array($val))
                {
                    $result[]   = $this->arr_date($val);
                }else{
                    $result[]   = $this->date($val);
                }
            }
            return $result;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3201');
            $error['error']       = true;
            return $error;
        }
    }

    public function arr_bool($data)
    {
        if(is_array($data))
        {
            $result     = array();
            foreach($data as $key => $val)
            {
                if(is_array($val))
                {
                    $result[]   = $this->arr_bool($val);
                }else{
                    $result[]   = $this->bool($val);
                }
            }
            return $result;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3201');
            $error['error']       = true;
            return $error;
        }
    }

    public function arr_mac($data)
    {
        if(is_array($data))
        {
            $result     = array();
            foreach($data as $key => $val)
            {
                if(is_array($val))
                {
                    $result[]   = $this->arr_mac($val);
                }else{
                    $result[]   = $this->mac($val);
                }
            }
            return $result;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3201');
            $error['error']       = true;
            return $error;
        }
    }
    
}
?>