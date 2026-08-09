<?php
exit;
// PHP program to delete all FilesystemIterator from a folder
// Folder path to be flushed
$dir = dirname(__DIR__)."/vendor";

// Assigning files inside the directory
$dir = new RecursiveDirectoryIterator($dir, FilesystemIterator::SKIP_DOTS);

// Reducing file search to given root directory only
$dir = new RecursiveIteratorIterator($dir,RecursiveIteratorIterator::CHILD_FIRST);

// Removing directories and files inside the specified folder
foreach ( $dir as $file ) { 
    $file->isDir() ?  rmdir($file) : unlink($file);
}
exit;
/*
//Delete all files from folder
$files = glob('my_folder/*'); //get all file names
foreach($files as $file){
    if(is_file($file))
    unlink($file); //delete file
}

//Delete specific files from folder
$files = glob('my_folder/*.jpg'); //get all file names
foreach($files as $file){
    if(is_file($file))
    unlink($file); //delete file
}

//Delete time specific files from folder
$files = glob('my_folder/*'); //get all file names
foreach($files as $file){
    $lastModifiedTime = filemtime($file);
    $currentTime = time();
    $timeDiff = abs($currentTime - $lastModifiedTime)/(60*60); //in hours
    if(is_file($file) && $timeDiff > 10) //check if file is modified before 10 hours
    unlink($file); //delete file
}
*/
?>