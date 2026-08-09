<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    $startDatetime = Carbon::now();
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->addHour();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->addHours(24);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->subHour();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->subHours(24);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    


    $endDatetime = $startDatetime->copy()->addMinute();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->addMinutes(61);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->subMinute();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->subMinutes(61);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    


    $endDatetime = $startDatetime->copy()->addSecond();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->addSeconds(61);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->subSecond();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    
    $endDatetime = $startDatetime->copy()->subSeconds(61);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    exit;
?>