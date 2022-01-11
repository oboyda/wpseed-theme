<?php

/*
 * Retrieve directory files
 * 
 * @param $dir string
 * @param $full_path bool. Return file full paths
 * @param $skip_dirs bool. Do not include dir files.
 * 
 * @return array
 */
function wptboot_get_dir_files($dir, $full_path=true, $skip_dirs=true)
{
    $dir = rtrim($dir, '/');
    
    $files = [];
    
    $scan_files = scandir($dir);
    foreach($scan_files as $scan_file)
    {
        if(!in_array($file, [".", ".."]) && substr($file, 0, 2) !== '__' && (!$skip_dirs || ($skip_dirs && is_dir($scan_file))))
        {
            $files[] = $full_path ? $dir . '/' . $file : $file;
        }
    }
    
    return $files;
}

function wptboot_require_dir_files($dir)
{
    $files = wptboot_get_dir_files($dir);
    
    if($files)
    {
        foreach($files as $file)
        {
            require_once $file;
        }
    }
}

function wptboot_get_file_class_name($file)
{
    $file_name = basename($file);
    $file_name = substr($file_name, 0, strlen($file_name)-strlen('.php'));
    $file_name = str_replace('-', ' ', $file_name);
    $file_name = ucwords($file_name);
    $file_name = str_replace(' ', '_', $file_name);
    
    return $file_name;
}

function wptboot_load_dir_classes($dir, $namespace='', $load_files=false)
{
    $files = wptboot_get_dir_files($dir);
    
    if($files)
    {
        foreach($files as $file)
        {
            if($load_files)
            {
                require_once $file;
            }
            
            $class_name =  $namespace . '\\' . wptboot_get_file_class_name($file);
            
            if(class_exists($class_name))
            {
                new $class_name();
            }
        }
    }
}
