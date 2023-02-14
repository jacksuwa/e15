<?php

session_start();

if (isset($_SESSION['results'])) {

    $results = $_SESSION['results'];

    $answer = $results['answer'];
    $palindrome = $results['palindrome'];
    $vowelCount = $results['vowelCount'];
    $shiftLetter = $results['shiftLetter'];

    $_SESSION['results'] = null;
}
require 'index-view.php';