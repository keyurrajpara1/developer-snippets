<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    // https://carbon.nesbot.com/docs/#api-addsub

    $startDatetime = Carbon::now();
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->addYear();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->addYears(5);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->subYear();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->subYears(5);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";

    exit;
?>