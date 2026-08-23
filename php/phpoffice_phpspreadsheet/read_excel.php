<?php
require 'vendor/autoload.php';
require 'PhpOffice/PhpSpreadsheetLib.php';
$phpSpreadsheetLibObj = new PhpSpreadsheetLib();
$excelData = $phpSpreadsheetLibObj->readExcel();
echo "<pre>";
print_r($excelData);
exit;
?>