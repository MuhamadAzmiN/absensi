<?php
session_start();
require 'function.php';
if(isset($_POST["submit"])){
    $email = $_POST["email"];
    $result = mysqli_query($conn, "SELECT * FROM regis WHERE email ='$email' ");
    if(mysqli_num_rows($result)===1){
        $row = mysqli_fetch_assoc($result);
        if($row["email"] === $email){
            $_SESSION["login"] = true;
            $_SESSION["login_user"] = $row["nama"];
            $_SESSION["pw"] = $row["password"];
            header("Location: konfir.php");
            exit;
        }

    }
    $error = true;
}























?>





<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperação de conta</title>
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
            <img src="img/personalization.svg">
        </div>
        <div class="login-container">
           
            <form action="" method="post">
                <h2>Recuperar conta</h2>
                <?php if(isset($error)):?>

                <p>email yang anda ketik tidak di temukan</p>


                <?php endif;?>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>E-mail</h5>
                        <input class="input" name="email" type="email">
                    </div>
                </div>
                <button type="submit" name="submit" class="btn" value="Enviar">
                
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>