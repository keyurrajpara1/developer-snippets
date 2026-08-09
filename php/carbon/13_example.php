<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    $startDatetime = Carbon::now();
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />";
    
    $startDatetime->year(2025)->month(01)->day(05)->hour(10)->minute(20)->second(30)->toDateTimeString();
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />";
    
    $startDatetime->setDate(2025, 02, 05)->setTime(22, 32, 5)->toDateTimeString();
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />";
    
    $startDatetime->setDateTime(2025, 4, 21, 22, 32, 5)->toDateTimeString();
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />";
    exit;
?>