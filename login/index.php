<?php

$msg = "";
session_start();


if(!empty($_POST["txtUsername"])){
    if(!empty($_POST["txtPassword"])){

        $username = $_POST["txtUsername"];
        $passwd = $_POST["txtPassword"];

       if($username=="admin" && $passwd=="p@ss"){
           $_SESSION["UID"] = 1;
           header( "location: admin.php");
        }
       else{
           if($username=="admin" && $passwd=="p@ss") {
               header("location: member.php");
           }
           $msg = "Sorry Wrong Username or Password";
       }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add New Movie</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">
    <style>
        .item1 {grid-area: header}
        .item2 {grid-area: Username}
        .item3 {grid-area: UsernameInput}
        .item4 {grid-area: Password}
        .item5 {grid-area: PasswordInput}
        .item6 {grid-area: footer}

        .gc{
            margin-top: 50px;
            margin-right: auto;
            margin-left: auto;
            display: grid;
            grid-template-areas:
                'header header'
                'Username UsernameInput'
                'Password PasswordInput'
                'footer footer'
        ;
            padding: 0;
            width: 80%;
        }

        div{
            border: 1px solid;
            text-align: center;
            padding: 10px 0;
            font-size: 20px;
        }
    </style>
</head>
<body>
<header>
    <?php include('../includes/header.php') ?>
</header>
<nav>
    <?php include('../includes/nav.php') ?>
</nav>
<main>
    <h3 id="err"><?=$msg?></h3>

    <form method="post">
        <div class="gc">
            <div class="item1"><h3>User Login</h3></div>
            <div class="item2">Username</div>
            <div class="item3"><input type="text" name="txtUsername" id="txtUsername" size="60"/></div>
            <div class="item4">Password</div>
            <div class="item5"><input type="password" name="txtPassword" id="txtPassword" size="60"/></div>
            <div class="item6"><input type="submit" value="Login" /></div>
        </div>
    </form>

</main>
<?php include('../includes/footer.php') ?>
</body>
</html>