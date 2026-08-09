<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    // Explanation of Weekdays and Weekends:
    // Weekdays: Monday, Tuesday, Wednesday, Thursday, Friday
    // Weekend Days: Saturday, Sunday

    // Get the current date and time
    $startDatetime = Carbon::now();
    echo "Start datetime: ".$startDatetime->toDateTimeString()."<br /><br />";
    
    // Example 1: Add 1 weekday to the current date
    // Weekdays are Monday to Friday, excluding Saturday and Sunday.
    $endDatetime = $startDatetime->copy()->addWeekday();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    // For example:
    // If today is Monday, adding 1 weekday will result in Tuesday.
    // If today is Friday, adding 1 weekday will result in Monday (skipping the weekend).

    // Example 2: Add 4 weekdays to the current date
    $endDatetime = $startDatetime->copy()->addWeekdays(4);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    // This will add 4 weekdays, skipping weekends.
    // For example:
    // If today is Thursday, adding 4 weekdays will result in next Wednesday.

    // Example 3: Subtract 1 weekday from the current date
    $endDatetime = $startDatetime->copy()->subWeekday();
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    // For example:
    // If today is Monday, subtracting 1 weekday will result in Friday (skipping the weekend).

    // Example 4: Subtract 4 weekdays from the current date
    $endDatetime = $startDatetime->copy()->subWeekdays(4);
    echo "End datetime: ".$endDatetime->toDateTimeString()."<br /><br />";
    // This will subtract 4 weekdays, skipping weekends.
    // For example:
    // If today is Wednesday, subtracting 4 weekdays will result in last Thursday.

    exit;
?>