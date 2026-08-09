<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    $startDatetime = Carbon::now();
    echo "Datetime: ".$startDatetime->toDateTimeString()."<br /><br />";

    echo "Date: ".$startDatetime->toDateString()."<br /><br />";
    
    echo "Date formatted: ".$startDatetime->toFormattedDateString()."<br /><br />";

    echo "Time: ".$startDatetime->toTimeString()."<br /><br />";

    echo "Day datetime: ".$startDatetime->toDayDateTimeString()."<br /><br />";

    echo "Custom formatting: ".$startDatetime->format('l jS \of F Y h:i:s A')."<br /><br />";
    exit;
?>