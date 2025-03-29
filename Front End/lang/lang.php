<?php
session_start(); // Start session to store language

// Get the language from the GET request or session, default to English
$language = isset($_GET['lang']) ? $_GET['lang'] : (isset($_SESSION['lang']) ? $_SESSION['lang'] : 'en');
$_SESSION['lang'] = $language; // Store the selected language in a session

// Load language file
$translations = include "translations/$language.php";
?>
