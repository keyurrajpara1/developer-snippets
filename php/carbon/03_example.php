<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;
    
    include_once("helperUtility.php");

    $year = 2025; $month = 1; $day = 31;
    $specificDate = Carbon::create($year, $month, $day, 0);
    echo "Specific date: ".$specificDate."<br />"; // Returns the specified date with the current time in the specified timezone
    echo "Specific date: ".$specificDate->toDateTimeString()."<br /><br />"; // Returns the specified date with the current time in the specified timezone

    // ------------------------------------------------------------------------------------------------------



    // Demonstrates creating a date using createFromDate() with specified year, month, day, and timezone
    $year = 2025; $month = 3; $day = 22; $timezone = "Asia/Kolkata";
    $specificDate = Carbon::createFromDate($year, $month, $day, $timezone);
    echo "Specific date: ".$specificDate."<br />"; // Returns the specified date with the current time in the specified timezone
    echo "Specific date: ".$specificDate->toDateTimeString()."<br /><br />"; // Returns the specified date with the current time in the specified timezone

    // ------------------------------------------------------------------------------------------------------


    
    // Demonstrates creating a time using createFromTime() with specified hour, minute, second, and timezone
    $hour = 8; $minute = 15; $second = 30; $timezone = "Asia/Kolkata";
    $specificTime = Carbon::createFromTime($hour, $minute, $second, $timezone);
    echo "Specific time: ".$specificTime."<br />"; // Returns today's date with the specified time in the specified timezone
    echo "Specific time: ".$specificTime->toDateTimeString()."<br /><br />"; // Returns today's date with the specified time in the specified timezone
    // ------------------------------------------------------------------------------------------------------


    
    // Creates a specific date and time with the given year, month, day, hour, minute, second, and timezone
    $year = 2025; $month = 3; $day = 22;
    $hour = 22; $minute = 10; $second = 20;
    $timezone = "Asia/Kolkata";

    $specificDatetime = Carbon::create($year, $month, $day, $hour, $minute, $second, $timezone);
    echo "Specific datetime: ".$specificDatetime."<br />"; // Outputs the specified date and time in the given timezone
    echo "Specific datetime: ".$specificDatetime->toDateTimeString()."<br /><br />"; // Outputs the specified date and time in the given timezone
    // Note: This is particularly useful when dealing with date or time values that aren't in a standard Carbon-recognized format.
    // If any of the parameters (year, month, etc.) are null, Carbon will use the current value for that parameter.
    // ------------------------------------------------------------------------------------------------------
?>