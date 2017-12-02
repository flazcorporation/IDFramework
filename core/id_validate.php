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
        if(is_int($data))
        {
            if($data < $min)
            {
                $msg  = $this->error->message('3001');
            }
            if($data > $max){
                $msg  .= $this->error->message('3002');
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
        if(is_float($data))
        {
            if($data < $min)
            {
                $msg  = $this->error->message('3001');
            }
            if($data > $max){
                $msg  .= $this->error->message('3002');
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
            $error['message']     = $this->error->message('3201');
            $error['error']       = true;
            return $error;
        }
    }

    public function string($data, $min = null, $max = null)
    {
        $msg    = null;
        if(is_string($data))
        {
            if(strlen($data) < $min)
            {
                $msg  = $this->error->message('3001');
            }
            if(strlen($data) > $max){
                $msg  .= $this->error->message('3002');
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
            $error['message']     = $this->error->message('3301');
            $error['error']       = true;
            return $error;
        }
    }

    public function email($data)
    {
        $msg    = null;
        if(filter_var($data, FILTER_VALIDATE_EMAIL))
        {
            return $data;
        }else{
            $error['data']        = $data;
            $error['message']     = $this->error->message('3301');
            $error['error']       = true;
            return $error;
        }
    }
    
}
?>