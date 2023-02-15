<?php

session_start();

$answer = $_POST['answer'];

function isPalindrome($inputString)
{
    # Removes special characters from user input
    $userInput = preg_replace('%\W%', '', $inputString);
    $userInput = strtolower($userInput);
    $reverseString = strrev($userInput);

    $palindrome = ($userInput === $reverseString) ? 'Yes' : 'No';

    return $palindrome;
}

function vowelCount($inputString)
{
    $inputString = strtolower($inputString);
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $countVowel = 0;
    # Loop through vowel and get the count
    foreach ($vowels as $vowel) {
        $countVowel += substr_count($inputString, $vowel);
    }
    return $countVowel;
}

$_SESSION['results'] = [
    'answer' => $answer,
    'palindrome' => isPalindrome($answer),
    'vowelCount' => vowelCount($answer),
];

#Redirect
header('Location: index.php');