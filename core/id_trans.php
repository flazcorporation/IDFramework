<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_trans extends id
{
    private $msg;
    private $from;
    private $to;

    public function __construct()
    {
        parent::config();
    }
    
    private function process($msg, $from, $to){
        return $msg;
    }

    public function to($msg, $to = null){
        $this->msg  = $msg;
        $this->from = $this->config->id_trans_def;
        if($to == null)
        {
            $this->to   = $this->config->id_trans_to;            
        }else{
            $this->to   = $to;
        }
        $this->process($this->msg, $this->from, $this->to);
    }

    public function from($msg, $from = null){
        $this->msg  = $msg;
        $this->to   = $this->config->id_trans_def;
        if($from == null)
        {
            $this->from   = $this->config->id_trans_to;
        }else{
            $this->from   = $from;
        }
        $this->process($this->msg, $this->from, $this->to);
    }

    public function from_to($msg, $from = null, $to = null){
        $this->msg  = $msg;
        if($from == null)
        {
            $this->from   = $this->config->id_trans_def;            
        }else{
            $this->from   = $from;
        }
        if($to == null)
        {
            $this->to   = $this->config->id_trans_to;            
        }else{
            $this->to   = $to;
        }
        $this->process($this->msg, $this->from, $this->to);        
    }

    public function lang($msg)
    {
        $this->msg  = $msg;
        $this->from = $this->config->id_trans_def;            
        $this->to   = $this->config->id_trans_to;
        return $this->process($this->msg, $this->from, $this->to);        
    }

}
?>