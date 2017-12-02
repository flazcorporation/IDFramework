<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_error extends id
{
    private  $err_pre;
    private  $err_style;
    private  $err_post;
    
    private  $err_code;
    private  $err_msg;
    private  $err_solution;
    
    public function __construct()
    {
        parent::trans();
        $this->err_style    = "padding: 20px 0px 20px 20px; width: 95%; border-left: 6px solid red;";
        $this->err_pre      = $this->trans->lang("IDFramework Says: ");
    }
    
    public function lib($code = null){
        $this->err_code = $code;
        if($this->err_code !== null)
        {
            switch ($this->err_code) {
                case "1101": // controller
                    $this->err_msg      = $this->trans->lang("Controller is not found");
                    $this->err_solution = $this->trans->lang("Check your Controller");
                    break;
                case "1102": // controller
                    $this->err_msg      = $this->trans->lang("Default Controller is not found");
                    $this->err_solution = $this->trans->lang("Set your default controller on your configuration");
                    break;
                case "1201": // method
                    $this->err_msg      = $this->trans->lang("Method is not found");
                    $this->err_solution = $this->trans->lang("Check your Method");
                    break;
                case "1202": // method
                    $this->err_msg      = $this->trans->lang("Default Method is not found");
                    $this->err_solution = $this->trans->lang("Please create index Method on your class");
                    break;
                case "3001": // Data
                    $this->err_msg      = $this->trans->lang("value is too small");
                    $this->err_solution = $this->trans->lang("Please increase your value");
                    break;
                case "3002": // Data
                    $this->err_msg      = $this->trans->lang("value is too large");
                    $this->err_solution = $this->trans->lang("Please decrease your value");
                    break;
                case "3101": // Data
                    $this->err_msg      = $this->trans->lang("value is not Integer");
                    $this->err_solution = $this->trans->lang("Change your data to Integer");
                    break;
                case "3201": // Data
                    $this->err_msg      = $this->trans->lang("value is not Float");
                    $this->err_solution = $this->trans->lang("Change your data to Float");
                    break;
                case "3301": // Data
                    $this->err_msg      = $this->trans->lang("value is not String");
                    $this->err_solution = $this->trans->lang("Change your data to String");
                    break;
                default:
                    $this->err_msg = $this->trans->lang("Unknown error");
            }
        }else{
            $this->err_msg = $this->trans->lang("Unknown error");            
        }
        $error['code']      = $this->err_code;
        $error['message']   = $this->err_msg;
        $error['solution']  = $this->err_solution;
        return  $error;
    }

    public function code($code = null){        
        $error = $this->lib($code);
        return $error['code'];
    }

    public function message($code = null){
        $error      = $this->lib($code);
        return $error['message'];
    }

    public function solution($code = null){
        $error      = $this->lib($code);
        return $error['solution'];
    }

    public function show($code = null){
        $error      = $this->lib($code);
        $message    = "<div style='$this->err_style'>".$this->err_pre.'<br />'."[Error ".$error['code'].'] '.$error['message'].'<br />[&nbsp; Solution&nbsp;&nbsp;] '.$error['solution']."</div>";
        return $message;
    }
    
}
?>