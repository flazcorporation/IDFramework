<?php
if(count(get_included_files()) ==1)exit("<meta http-equiv='refresh' content='0;url="."http://".$_SERVER['SERVER_NAME']."'>");

class id_secure extends id
{
    private $classlist     = array();
    private $classreg      = array();
    private $classunreg    = array();

    public function __construct()
    {
        parent::core();
    }
        
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