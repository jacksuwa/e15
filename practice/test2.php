<?php

$strArray = array("supermarket", "programming", "development", "apache", "university");

$index = isset($_POST['index']) ? $_POST['index'] : 0;
$message2 = str_shuffle($strArray[$index]);
if (!isset($_POST['guess'])) {
    $message1 = "<h1>Welcome to the shuffle game!</h1></br>";
    $message2 = str_shuffle($strArray[$index]);
} elseif ($_POST['guess'] == $strArray[$index]) {
    $message1 = "<h1>You guessed right!</h1></br>";
    if ($index < count($strArray) - 1) {
        $index++;
    } else {
        $index = 0;
    }
    $message2 = str_shuffle($strArray[$index]);
} elseif ($_POST['guess'] != $strArray[$index]) {
    $message1 = "<h1>You guessed wrong!</h1></br>";
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Guess the word!</title>
</head>

<body>

    <?php
    echo $message1;
    if ($index < count($strArray)) {
    ?>
    <b>Try to guess the shuffled word: </b>" <?php echo $message2; ?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
        <p><label for="guess">Enter your guess:</label>
            <input type="text" id="guess" name="guess" />
        </p>
        <input type="hidden" name="index" value="<?php echo $index; ?>">
        <button type="submit" name="submit" value="submit">Guess</button>
    </form>
    <?php
    } else {
    ?>
    <b>Game over!</b>
    <p><a href="<?php echo $_SERVER['PHP_SELF']; ?>">Play again</a></p>
    <?php
    }
    ?>
</body>

</html>