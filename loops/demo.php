<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Loops Demo</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
</head>
<body>
<?php include('../includes/header.php') ?>
<?php include('../includes/nav.php') ?>

<main>
    <h1>--------While Loop------</h1>
    <?php
    $i = 1;
    while ($i < 7){
        echo "<h$i>While Loop!!! </h$i>";
        $i++;

    }
    ?>



    <h1>--------While Do Loop------</h1>
    <?php
    $i = 6;
    do{
        echo "<h$i>Do While Loop!!! </h$i>";
        $i--;
    }while($i > 0);

    ?>
    <h1>--------For Loop------</h1>
    <?php
    for ($i = 1; $i <=6; $i++){
        echo "<h$i>For Loop!!! </h$i>";
    }

    ?>

    <h1>--------String Functions------</h1>
    <?php
   $full_name = 'Bob Smith';
   echo "Full name is $full_name <br>";
   //B o b S m i t h
    //0 1 2 3 4 5 6 7 8

    $position = strpos($full_name, ' ');
    echo "The space is in position $position <br>";

    echo "Upper Case: " . strtoupper($full_name) . "<br>";
    echo "Lower Case: " . strtolower($full_name) . "<br>";

    $name_parts = explode("", $full_name);
    echo "First Name: " . $name_parts[0] . "<br>";
    echo "Last Name: " . $name_parts[1] . "<br>";
    ?>
</main>


<?php include('../includes/footer.php') ?>
</body>
</html>