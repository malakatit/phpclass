<?php
// Player rolls (2 dice)
$playerDie1 = mt_rand(1,6);
$playerDie2 = mt_rand(1,6);
$playerTotal = $playerDie1 + $playerDie2;

// Computer rolls (3 dice)
$computerDie1 = mt_rand(1,6);
$computerDie2 = mt_rand(1,6);
$computerDie3 = mt_rand(1,6);
$computerTotal = $computerDie1 + $computerDie2 + $computerDie3;

// Determine winner
if ($playerTotal > $computerTotal) {
    $outcome = "You Win!";
} elseif ($playerTotal < $computerTotal) {
    $outcome = "Computer Wins!";
} else {
    $outcome = "It's a Tie!";
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dice Game's Website</title>
    <link rel="stylesheet" type="text/css" href="/css/base.css">

    <style>

        /* Override base.css image rule for dice only */
        main img.dice-img {
            width: 90px;
            height: 90px;
            margin: 10px;
            display: inline-block;
        }

        /* Space between sections */
        .game-section {
            margin-bottom: 40px;
        }

        /* Match site color theme */
        .final-result {
            font-size: 26px;
            color: brown;
            margin-top: 25px;
        }

        /* Button styling */
        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: coral;
            border: none;
            color: white;
            border-radius: 5px;
            cursor: pointer;
        }
S

    </style>
</head>
<body>

<?php include('../includes/header.php'); ?>
<?php include('../includes/nav.php'); ?>

<main>

    <h1>Roll the Dice to Beat the Computer</h1>

    <div class="game-section">
        <h2>Your Score: <?= $playerTotal ?></h2>

        <img class="dice-img" src="/images/dice_<?= $playerDie1 ?>.png" alt="Player Die 1">
        <img class="dice-img" src="/images/dice_<?= $playerDie2 ?>.png" alt="Player Die 2">
    </div>

    <div class="game-section">
        <h2>Computer Score: <?= $computerTotal ?></h2>

        <img class="dice-img" src="/images/dice_<?= $computerDie1 ?>.png" alt="Computer Die 1">
        <img class="dice-img" src="/images/dice_<?= $computerDie2 ?>.png" alt="Computer Die 2">
        <img class="dice-img" src="/images/dice_<?= $computerDie3 ?>.png" alt="Computer Die 3">
    </div>

    <div class="final-result">
        Result: <?= $outcome ?>
    </div>

    <br>

    <form method="post">
        <input type="submit" value="Roll Again">
    </form>
<br>
</main>


<?php include('../includes/footer.php'); ?>

</body>
</html>