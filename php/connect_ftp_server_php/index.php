<?php
require_once 'config/constants.php';
require_once 'helpers/common_helper.php';
require_once 'libs/FtpServerLib.php';

$ftpServerLib = new FtpServerLib();

$fileName = "test.xlsx";

$localFilePath  = __DIR__."/public/uploads/".$fileName; // local file path
$remoteFilePath = "/public/uploads/local/".$fileName; // server file path

$ftpSingleFileUploadResult = $ftpServerLib->ftpSingleFileUpload($localFilePath, $remoteFilePath);

if($ftpSingleFileUploadResult["status"]){
    $message = $ftpSingleFileUploadResult["message"];
}
else{
    $message = $ftpSingleFileUploadResult["message"];
}

echo "<h3>".$message."</h3>";
exit;