<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    // https://carbon.nesbot.com/docs/#api-addsub

    // ----------------------- First Scenario: Mutable Carbon Instance -----------------------

    $startDatetime = Carbon::now(); // Get the current date and time
    // echo "Start datetime: ".$startDatetime."<br /><br />"; // Outputs the current datetime
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />"; // Outputs the current datetime

    // Add 30 days to the original datetime
    // Note: This modifies the $startDatetime variable itself
    $endDatetime = $startDatetime->addDays(30);
    // echo "Start datetime: ".$startDatetime."<br /><br />"; // Outputs the updated datetime (30 days added)
    // echo "End datetime: ".$endDatetime."<br /><br />"; // Outputs the same updated datetime as $startDatetime
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />"; // Outputs the updated datetime (30 days added)
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />"; // Outputs the same updated datetime as $startDatetime

    // ----------------------- Second Scenario: Immutable Operation Using copy() -----------------------

    $startDatetime = Carbon::now(); // Get the current date and time
    // echo "Start datetime: ".$startDatetime."<br /><br />"; // Outputs the current datetime
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />"; // Outputs the current datetime

    // Clone $startDatetime and add 30 days to the clone
    $endDatetime = $startDatetime->copy()->addDays(30);
    // echo "Start datetime: ".$startDatetime."<br /><br />"; // Outputs the original datetime (unchanged)
    // echo "End datetime: ".$endDatetime."<br /><br />"; // Outputs the datetime with 30 days added
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />"; // Outputs the original datetime (unchanged)
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />"; // Outputs the datetime with 30 days added
?>