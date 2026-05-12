<?php
if(isset($_SESSION["roleID"])){
    header("Location: index.php");
}
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Malak's Website</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
</head>
<body>
<?php include('../includes/header.php') ?>
<?php include('../includes/nav.php') ?>

<main>
    <h3> Member Page </h3>
</main>
<?php include('../includes/footer.php') ?>
</body>
</html>