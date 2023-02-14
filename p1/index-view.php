<!doctype html>
<html lang='en'>

<head>
    <title>String Processor - e15 Project 1</title>
    <meta charset='utf-8'>
    <link rel="stylesheet" href="styles/p1.css" />
</head>

<body>
    <main>
        <form method='POST' action='process.php'>

            <h1>String Processor - e15 Project 1</h1>
            <!--  put something here -->
            <h2>Instructions</h2>

            <p>Enter a word to find out...</p>
            <ul class='myUL'>
                <li> Is it a Palindrome? (Same forwards and backwards)</li>
                <li> How many vowels does it contain? </li>
                <li>What the word would look like if every letter
                    was shifted +1 places in the alphabet</li>
            </ul>
            <div>
                <label for='answer'>Your word:</label>
                <input type='text' name='answer' id='answer'>



                <button type='submit'>Process</button>

        </form>

        <?php if (isset($answer)) { ?>
        <div class="resultsContainer">
            <p> Result for: <?php echo $answer; ?> </p>
            <p>Is it a palindrome?</p>
            <p><?php echo  $palindrome; ?></P>
            <p><?php echo $vowelCount; ?></P>
            <p><?php echo $shiftLetter; ?></P>

            <?php } ?>
        </div>
    </main>
</body>

</html>