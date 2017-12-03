<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_secure extends id
{
    private $classlist     = array();
    private $classreg      = array();
    private $classunreg    = array();

    public function __construct()
    {
        parent::classlib();
        parent::arr();
        $this->classreg        = $this->classlib->class_reg;
    }
    
    /*
    public function class_check($classunreg, $classreg)
    {
        echo "<pre>";
        var_dump($classunreg);
        echo "";
        var_dump($classreg);
        echo "</pre>";
        $this->classunreg      = $this->arr->compare($classunreg, $classreg);
        return $this->classunreg;
    }

    public function class_reg(){
        return $this->classreg;
    }

    public function class_id()
    {
        $class = $this->class_id_active(2);
        return $class['object'];
    }

    private function class_id_active($id){
        $trace = debug_backtrace();
        if (isset($trace[1])) {
            return $trace[$id];
        }
    }

    public function class_array($data)
    {
        $class      = array();
		foreach($data as $key => $val)
		{
			if($key == 'secure')
			{
				foreach($val as $key1 => $val1){
					if($key1 == 'classlib')
					{
						$class = $val1->{'class_reg'};
					}else{
						continue;
					}
				}
			}else{
				continue;
			}
		}
		return $class;
    }
    */
    
    public function dirlist($rootDir, $allData=array())
    {
        // set filenames invisible if you want
        $invisibleFileNames = array(".", "..", ".htaccess", ".htpasswd",".git");
        // run through content of root directory
        $dirContent = scandir($rootDir);
        foreach($dirContent as $key => $content) {
            // filter all files not accessible
            $path = $rootDir.'/'.$content;
            if(!in_array($content, $invisibleFileNames)) {
                // if content is file & readable, add to array
                if(is_file($path) && is_readable($path)) {
                    $path = str_replace("\\","/",$path);
                    // save file name with path
                    $allData[] = $path;
                    // if content is a directory and readable, add path and name
                }elseif(is_dir($path) && is_readable($path)) {
                    $path = str_replace("\\","/",$path);
                    // recursive callback to open new directory
                    $allData = $this->dirlist($path, $allData);
                }
            }
        }
        return $allData;
    }


}


?>