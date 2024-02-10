<?php
session_start();

if(!isset($_SESSION["login"])){ // Check if the "login" session is not set
    header("Location: login.php"); // Redirect the user to the "login.php" page
    exit; // Stop the script
}

// The "login" session is set, so the user is authorized to access this page
// Add the rest of your code here
require 'function.php';
// $nama = $_SESSION["login_user"];
// echo $nama;










?>



<a href="logout.php">logout</a>