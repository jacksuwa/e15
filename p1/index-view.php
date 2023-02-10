<!doctype html>
<html lang='en'>

<head>
    <title>String Processor - e15 Project 1</title>
    <meta charset='utf-8'>
</head>

<body>

    <form method='POST' action='process.php'>

        <h1>String Processor - e15 Project 1</h1>
        <!-- add css div -->
        <p>Enter a word to find out...</p>
        <ul>
            <li> Is it a Palindrome? (Same forwards and backwards)</li>
            <li> How many vowels does it contain? </li>
            <li>What the word would look like if every letter
                was shifted +1 places in the alphabet</li>
        </ul>
        <!-- add close div -->
        <label for='answer'>Your guess:</label>
        <input type='text' name='answer' id='answer'>

        <p> <?php echo $answer; ?> </p>

        <button type='submit'>Process</button>
    </form>



</body>

</html>