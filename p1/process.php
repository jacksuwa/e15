<?php

session_start();

$answer = $_POST['answer'];

//this is done - test and remove
function iSpalindrome($inputString)
{
    #add- ignore special character
    $userInput = preg_replace('%\W%', '', $inputString);
    $userInput = strtolower($userInput);
    $reverseString = strrev($userInput);

    $palindrome = ($userInput === $reverseString) ? 'Yes' : 'No';

    return $palindrome;
}

//this is done - test and remove
function vowelCount($inputString)
{
    $inputString = strtolower($inputString);
    $vowels = ['a', 'e', 'i', 'o', 'u'];
    $countVowel = 0;
    #loop through vowel and get the count
    foreach ($vowels as $vowel) {
        $countVowel += substr_count($inputString, $vowel);
    }
    return $countVowel;
}

function shiftLetter($inputString)
{
    $userInput = str_split($inputString);
    $shiftString = '';


    foreach ($userInput as $inputValue) {
        if (!is_numeric($inputValue)) {
            $shiftString .= ++$inputValue;
        } else {
            $shiftString .= $inputValue;
        }
    }
    return $shiftString;
}

$_SESSION['results'] = [
    'answer' => $answer,
    'palindrome' => isPalindrome($answer),
    'vowelCount' => vowelCount($answer),
    'shiftLetter' => shiftLetter($answer)
];

#Redirect
header('Location: index.php');