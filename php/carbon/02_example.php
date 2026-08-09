<?php
    // Include the Composer autoloader for dependencies
    include_once("vendor/autoload.php");
    // Import the Carbon library for date and time manipulation
    use Carbon\Carbon;

    include_once("helperUtility.php");

    // Demonstrates creating a specific date using Carbon's constructor
    $firstDayOfJanuary2025 = new Carbon('first day of January 2025');
    echo "First day of January 2025: ".$firstDayOfJanuary2025."<br />"; // Returns 2025-01-01 at 00:00:00 (midnight)
    echo "First day of January 2025: ".$firstDayOfJanuary2025->toDateTimeString()."<br /><br />"; // Returns 2025-01-01 at 00:00:00 (midnight)

    // ------------------------------------------------------------------------------------------------------
?>