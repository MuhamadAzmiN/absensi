<?php

session_start();

require 'function.php';
$_SESSION["login_user"];



?>








<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro</title>
    <!-- Custom styles-path -->
    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome kit script -->
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>

    <!-- Google Fonts Open Sans-->
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&display=swap" rel="stylesheet">

    <!-- Favicon -->
    <link rel="icon" href="img/html-5.png">
</head>

<body>
    <img class="wave" src="img/wave.svg">
    <div class="container">
        <div class="img">
            <img src="img/login-mobile.svg">
        </div>
        <div class="login-container">
            <form action="" method="post">
             <p>Apakah dibawah ini akun anda<br>
            
           <?=$_SESSION["login_user"];?> 
            </p>
            <a  href="lupa.php?id<?= $_SESSION["login_user"];?>">Ya?</a>
            <a href="forgotPassword.php">tidak?</a>
            </form>
          
        </div>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>