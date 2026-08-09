<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    $startDatetime = Carbon::now();
    echo "Start datetime: " . $startDatetime->toDateTimeString() . "<br /><br />"; // Start datetime: 2024-12-20 07:29:57

    echo "Year: " . $startDatetime->year . " <br />";
    echo "Month: " . $startDatetime->month . " <br />";
    echo "Day: " . $startDatetime->day . " <br />";
    echo "Hour: " . $startDatetime->hour . " <br />";
    echo "Minute: " . $startDatetime->minute . " <br />";
    echo "Second: " . $startDatetime->second . " <br />";

    echo "Day of week: " . $startDatetime->dayOfWeek . " <br />";

    echo "Day of year: " . $startDatetime->dayOfYear . " <br />";

    echo "Week of month: " . $startDatetime->weekOfMonth . " <br />";

    echo "Days in month: " . $startDatetime->daysInMonth . " <br /><br />";
    exit;


    $startDatetime->year   = 2024;
    $startDatetime->month  = 12;
    $startDatetime->day    = 1;
    $startDatetime->hour   = 10;
    $startDatetime->minute = 20;
    $startDatetime->second = 30;

    echo "Set datetime: " . $startDatetime;



    echo "Start datetime: " . $startDatetime->toDateTimeString() . "<br /><br />";

    echo "Year: " . $startDatetime->year . " <br />";
    echo "Month: " . $startDatetime->month . " <br />";
    echo "Day: " . $startDatetime->day . " <br />";
    echo "Hour: " . $startDatetime->hour . " <br />";
    echo "Minute: " . $startDatetime->minute . " <br />";
    echo "Second: " . $startDatetime->second . " <br />";

    echo "Day of week: " . $startDatetime->dayOfWeek . " <br />";

    echo "Day of year: " . $startDatetime->dayOfYear . " <br />";

    echo "Week of month: " . $startDatetime->weekOfMonth . " <br />";

    echo "Days in month: " . $startDatetime->daysInMonth . " <br /><br />";
    
    // exit;
?>
Sunday to Saturday <br />
0 = Sunday, 1 = Monday, 2 = Tuesday, 3 = Wednesday, 4 = Thursday, 5 = Friday, 6 = Saturday <br />

In a typical scenario where the week number runs from Sunday to Saturday, the first few days of a month sometimes fall within the last week's range from the previous month. In such cases, they are often considered Week 0.

2024-12
--------------------
days -> week number
1 -> 0
2 to 7 -> 1
8 to 14 -> 2
15 to 21 -> 3
22 to 28 -> 4
29 to 31 -> 5
