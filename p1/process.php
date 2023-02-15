<?php

session_start();

$answer = $_POST['answer'];

function isPalindrome($inputString)
{
    $userInput = strtolower(preg_replace("/[^A-Za-z0-9]/", '', $inputString));
    $reverseString = strrev($userInput);

    if (empty($userInput)) {
        $palindrome = 'No';
    } else if ($userInput === $reverseString) {
        $palindrome = 'Yes';
    } else {
        $palindrome = 'No';
    }
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