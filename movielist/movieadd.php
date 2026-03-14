<?php
if(!empty($_POST["txtTitle"])){
    if(!empty($_POST["txtRating"])){

        $txtTitle = $_POST["txtTitle"];
        $txtRating = $_POST["txtRating"];

        try {
            include '../includes/db.php';

            $sql = mysqli_prepare($con, "insert into movielist (movieTitle, movieRating) values (?,?)");
            mysqli_stmt_bind_param($sql, "ss", $txtTitle, $txtRating);
            mysqli_stmt_execute($sql);

            header("Location:index.php");
        }
        catch (mysqli_sql_exception $ex){
            echo $ex;
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
        .item2 {grid-area: MovieTitle}
        .item3 {grid-area: TitleInput}
        .item4 {grid-area: MovieRating}
        .item5 {grid-area: RatingInput}
        .item6 {grid-area: footer}

        .gc{
            margin-top: 50px;
            display: grid;
            grid-template-areas:
                'header header'
                'MovieTitle TitleInput'
                'MovieRating RatingInput'
                'footer footer'
        ;
            padding: 0px;
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

    <form method="post">
        <div class="gc">
            <div class="item1"><h3>Add New Movie</h3></div>
            <div class="item2">Movie Title</div>
            <div class="item3"><input type="text" name="txtTitle" id="txtTitle"/></div>
            <div class="item4">Movie Rating</div>
            <div class="item5"><input type="text" name="txtRating" id="txtRating"/></div>
            <div class="item6"><input type="submit" value="Add New Movie" /></div>
        </div>
    </form>

</main>
<?php include('../includes/footer.php') ?>
</body>
</html>