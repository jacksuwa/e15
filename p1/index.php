<?php

session_start();

if (isset($_SESSION['results'])) {

    $results = $_SESSION['results'];

    $answer = $results['answer'];
    $palindrome = $results['palindrome'];
    $vowelCount = $results['vowelCount'];

    $_SESSION['results'] = null;
}
require 'index-view.php';