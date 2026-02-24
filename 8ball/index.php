<?php
session_start();


if (isset($_POST["txtQuestion"]))
{
    $question = $_POST["txtQuestion"];
}
else
{
    $question = "";
}

if(isset($_SESSION["PrevQuest"]))
{
    $PrevQuest = $_SESSION["PrevQuest"];
}
else
{
    $PrevQuest = "";
}

if  ($question == "")
{
    $answer = "Ask me a question";
}
elseif (substr($question, -1)!="?")
{
    $answer = "Ask me a question with a question mark ???";
}
elseif($question == $PrevQuest)
{
    $answer = "Ask me a new question";
}
else
{
    $responses = array();

    $responses[0] = "Ask again later";
    $responses[1] = "Yes";
    $responses[2] = "No";
    $responses[3] = "It appears to be so";
    $responses[4] = "Reply is hazy, please try again";
    $responses[5] = "Yes, definitely";
    $responses[6] = "What is it you really want to know";
    $responses[7] = "Outlook is good";
    $responses[8] = "My sources say no";
    $responses[9] = "Signs point to yes";
    $responses[10] = "Dont count on it";
    $responses[11] = "Cannot predict now";
    $responses[12] = "As I see it, yes";
    $responses[13] = "Better not tell you now";
    $responses[14] = "Concentrate and ask again";

    $iResponse = mt_rand(0,14);

    $answer = $responses[$iResponse];
    $_SESSION["PrevQuest"] = $question;
}


?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Website</title>
    <style>

        div {
            padding-top: 75px;
            padding-bottom: 75px;
        }

        .bounce {
            height: 50px;
            overflow: hidden;
            position: relative;
            background: #fefefe;
            color: #333;
        }

        .bounce p {
            position: absolute;
            width: 100%;
            height: 100%;
            margin: 0;
            line-height: 50px;
            text-align: center;
            -moz-transform: translateX(50%);
            -webkit-transform: translateX(50%);
            transform: translateX(50%);
            -moz-animation: bouncing-text 5s linear infinite alternate;
            -webkit-animation: bouncing-text 5s linear infinite alternate;
            animation: bouncing-text 10s linear infinite alternate;
        }

        @-moz-keyframes bouncing-text {
            0% {
                -moz-transform: translateX(50%);
            }
            100% {
                -moz-transform: translateX(-50%);
            }
        }

        @-webkit-keyframes bouncing-text {
            0% {
                -webkit-transform: translateX(50%);
            }
            100% {
                -webkit-transform: translateX(-50%);
            }
        }

        @keyframes bouncing-text {
            0% {
                -moz-transform: translateX(50%);
                -webkit-transform: translateX(50%);
                transform: translateX(50%);
            }
            100% {
                -moz-transform: translateX(-50%);
                -webkit-transform: translateX(-50%);
                transform: translateX(-50%);
            }
        }
    </style>

    <link rel="stylesheet" type="text/css" href="/css/base.css">
</head>
<body>

<?php include('../includes/header.php') ?>

<?php include('../includes/nav.php') ?>

<main>
    <h2>The Magic 8 Ball</h2>

    <br />

    <div class="bounce">
        <p><?=$answer?></p>
    </div>

    <form method="post">
        <input type="text" name="txtQuestion" id="txtQuestion" value="<?=$question?>">
        <input type="submit" value="Ask the 8 ball">
    </form>

</main>
<?php include('../includes/footer.php') ?>
</body>
</html>