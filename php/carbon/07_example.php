<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    $startDatetime = Carbon::create(2024, 3, 31, 0);
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->addMonth();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->addMonthWithoutOverflow();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    exit;
?>