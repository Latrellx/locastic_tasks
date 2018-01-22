<?php
function getDirContents($dir, $filter = '', &$results = array()) {
    $files = scandir($dir);

    foreach($files as $key => $value){
        $path = realpath($dir.DIRECTORY_SEPARATOR.$value); 

        if(!is_dir($path)) {
            if(empty($filter) || preg_match($filter, $path)) $results[] = $path;
        } elseif($value != "." && $value != "..") {
            getDirContents($path, $filter, $results);
        }
    }

    return $results;
} 

// Simple Call: List all files
var_dump(getDirContents('C:/xampp/htdocs/locastic_task_1/'));

// Regex Call: List php files only
// var_dump(getDirContents('/xampp/htdocs/WORK', '/\.php$/'));