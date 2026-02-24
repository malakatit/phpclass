<?php
//My variables
$SEC_PER_MIN = 60;
$SEC_PER_HOUR = 60 * $SEC_PER_MIN;
$SEC_PER_DAY = 24 * $SEC_PER_HOUR;
$SEC_PER_YEAR = 365 * $SEC_PER_DAY;

//Current Time
$NOW = time();

//End of the Semester May 16th 2026
$endOfSemester = mktime(0, 0, 0, 5, 16, 2026);

//Total number of seconds between now and end of semester
$seconds = $endOfSemester - $NOW;

//-- Calculate the number of years
$years = floor($seconds/$SEC_PER_YEAR);
//-- remove years in seconds from total seconds
$seconds = $seconds-($SEC_PER_YEAR * $years);

//-- Calculate the number of days
$days = floor($seconds/$SEC_PER_DAY);
//-- remove days in seconds from total seconds
$seconds = $seconds - ($SEC_PER_DAY * $days);

//-- Calculate the number of hours
$hours = floor($seconds/$SEC_PER_HOUR);
//-- remove days in seconds from total seconds
$seconds = $seconds - ($SEC_PER_HOUR * $hours);

//-- Calculate the number of minutes
$minutes = floor($seconds/$SEC_PER_MIN);
//-- remove days in seconds from total seconds
$seconds = $seconds - ($SEC_PER_MIN * $minutes);


?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>End of Semester Countdown Timer</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
</head>
<body>
<?php include('../includes/header.php') ?>
<?php include('../includes/nav.php') ?>

<main>
    <H1>End of the Semester (May 16th, 2026) - Countdown Timer</H1>
    <?php
    echo  "Years: $years | Days: $days | Hours: $hours | Minutes: $minutes | Seconds: $seconds";

    ?>
</main>
<?php include('../includes/footer.php') ?>
</body>
</html>