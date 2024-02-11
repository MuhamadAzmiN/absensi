<?php 
session_start();
require 'function.php';
$_SESSION["login_user"];
if(isset($_POST["submit"])){
    if(gantiPw($_POST)>0){
        echo "<script>alert('Password berhasil di ubah')
                document.location.href = 'login.php';</script>";
        }
    }
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
                <h2>Welcome </h2>
                <?php
                if(isset($_SESSION["konfir"]) && $_SESSION["konfir"] == true):
                    echo "<p>Konfirmasi password tidak sesuai<p>";
                    unset($_SESSION["konfir"]);

                endif;
                ?>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" name="password" value="" type="password">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Konfirmasi</h5>
                        <input class="input" name="password2" value="" type="password">
                    </div>
                </div>

                        <input type="hidden" name="id" value="<?= $_SESSION["login_user"];?>" type="text">
                
                <div class="btn-container">
                    <button type="submit" name="submit" class="btn-action">Login</button>
                </div>
                <!-- <div class="account">
                    <a href="forgotPassword.php">Forget Password</a>
                </div> -->
                <!-- <div class="account">
                    <a href="register.php">Sign Up</a>
                </div> -->
                <!-- The Modal -->
                <div id="modal-terms" class="modal">
                    <!-- Modal content -->
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>