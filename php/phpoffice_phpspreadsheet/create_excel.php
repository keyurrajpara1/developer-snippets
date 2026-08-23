<?php
require 'vendor/autoload.php';
require 'PhpOffice/PhpSpreadsheetLib.php';
$phpSpreadsheetLibObj = new PhpSpreadsheetLib();
$data = [];
$users = [ [1, 'Liam', 'Test'], [2, 'Noah', 'Test'], [3, 'Oliver', 'Test'], [4, 'Elijah', 'Test'], [5, 'Olivia', 'Test'], [6, 'Emma', 'Test'], [7, 'Ava', 'Test'], [8, 'Charlotte', 'Test'] ];
foreach ($users as $user) {
    $obj = new stdClass();
    $obj->id = $user[0];
    $obj->first_name = $user[1];
    $obj->last_name = $user[2];
    $data[] = $obj;
}
$createExcelRes = $phpSpreadsheetLibObj->createExcel($data);
echo "<pre>";
print_r($createExcelRes);
exit;
?>