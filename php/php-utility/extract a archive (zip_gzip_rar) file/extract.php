<?php
exit;
// Include and initialize Extractor class
require_once 'Extractor.php';
$extractor = new Extractor;

// Path of archive file
//$archivePath = 'archive_files/resources.zip';
//$archivePath = 'archive_files/resources.rar';

$archivePath = __DIR__.'/routes.zip';

// Destination path
$destPath = dirname(__DIR__);

// Extract archive file
$extract = $extractor->extract($archivePath, $destPath);

if($extract){
    echo $GLOBALS['status']['success'];
}else{
    echo $GLOBALS['status']['error'];
}

?>