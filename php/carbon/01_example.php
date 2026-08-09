<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    $currentDate = Carbon::today();
    echo "Current date: ".$currentDate."<br />"; // Returns today's date at 00:00:00 (midnight)
    echo "Current date: ".$currentDate->toDateTimeString()."<br /><br />"; // Returns today's date at 00:00:00 (midnight)

    // ------------------------------------------------------------------------------------------------------



    // Demonstrates the use of Carbon's now() method to get the current date and time
    $currentDatetime = Carbon::now(); // Equivalent to $currentDatetime = new Carbon();
    echo "Current datetime: ".$currentDatetime."<br />"; // Outputs the current date and time in the default timezone
    echo "Current datetime: ".$currentDatetime->toDateTimeString()."<br /><br />"; // Outputs the current date and time in the default timezone

    // ------------------------------------------------------------------------------------------------------



    // Demonstrates the use of Carbon's yesterday() function
    $yesterdayDate = Carbon::yesterday();
    echo "Yesterday date: ".$yesterdayDate."<br />"; // Returns yesterday's date at 00:00:00 (midnight)
    echo "Yesterday date: ".$yesterdayDate->toDateTimeString()."<br /><br />"; // Returns yesterday's date at 00:00:00 (midnight)

    // ------------------------------------------------------------------------------------------------------



    // Demonstrates the use of Carbon's tomorrow() function
    $tomorrowDate = Carbon::tomorrow();
    echo "Tomorrow date: ".$tomorrowDate."<br />"; // Returns tomorrow's date at 00:00:00 (midnight)
    echo "Tomorrow date: ".$tomorrowDate->toDateTimeString()."<br /><br />"; // Returns tomorrow's date at 00:00:00 (midnight)

    // ------------------------------------------------------------------------------------------------------
?>