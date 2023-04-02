<!doctype html>
<html lang='en'>

<head>
    <title>Guess The Word - e15 Project 2</title>
    <meta charset='utf-8'>
    <link href='styles/p1.css' rel='stylesheet'>
</head>

<body>
    <main>
        <form method='POST' action='process.php'>
            <h1>Guess The Word - e15 Project 2</h1>
            <h2>Instructions</h2>
            <p>Choose a word from the dropdown...</p>
            <ul>
                <li>Computer select a random word from the list</li>
                <li>See if you guessed the same word</li>
                <li>Select the checkbox to add a special message</li>
            </ul>

            <fieldset>
                <label for='answer'>Your email address:</label>
                <input type='text' name='answer' id='answer'>
            </fieldset>

            <fieldset>
                <label for='word'>Guess the word </label>

                <select id='word' name='word'>

                    <option>Choose one...</option>
                    <option>Good</option>
                    <option>Better</option>
                    <option>Best</option>
                </select>
            </fieldset>
            <fieldset>
                <label for='specialMessage'>Add a special message?</label>
                <input type='checkbox' value='yes' name='specialMessage' id='specialMessage'>
            </fieldset>
            <button type='submit'>Guess</button>
        </form>

    </main>
</body>

</html>