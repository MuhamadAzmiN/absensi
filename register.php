<?php
session_start();
require 'function.php';
if(isset($_POST["submit"])){
    if(regis($_POST)>0){
        echo "<script>alert('userbaru di tambahkan');</script>";
        header("Location: login.php");
        exit;
        // $_SESSION["login"]= true;
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
                <h2>Cadastre-se</h2>
                <?php 
                if(isset($_SESSION["regis"]) && $_SESSION["regis"] == true):
                    echo "<p>Username sudah digunakan oleh pengguna lain.</p>";
                    // Setelah menampilkan pesan, hapus variabel sesi
                    unset($_SESSION["regis"]);
                endif;
                ?>
                <?php
                if(isset($_SESSION["email"]) && $_SESSION["email"] == true):
                    echo "<p>Email anda sudah digunakan<p>";
                    unset($_SESSION["email"]);

                endif;
                ?>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Usuário</h5>
                        <input class="input" name="nama" type="text">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div>
                        <h5>E-mail</h5>
                        <input class="input" name="email" type="email">
                    </div>
                </div>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Senha</h5>
                        <input class="input" name="password" type="password">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Confirmar Senha</h5>
                        <input class="input" name="password2" type="password">
                    </div>
                </div>
                <div class="terms">
                    <input type="checkbox">
                    <label>Li e concordo com os </label><a id="action-modal">termos de uso.</a>
                </div>
                <div class="btn-container">
                    <button type="submit" name="submit" class="btn-action">Cadastrar</button>
                </div>
                <div class="account">
                    <p>Já possui conta ?</p>
                    <a href="index.html">Entrar</a>
                </div>
                <!-- The Modal -->
                <div id="modal-terms" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Termos e serviços</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                            labore et dolore magna aliqua. Iaculis at erat pellentesque adipiscing commodo. Adipiscing
                            at in tellus integer feugiat scelerisque. Duis at consectetur lorem donec massa. Lacus vel
                            facilisis volutpat est velit. Faucibus turpis in eu mi bibendum. Natoque penatibus et magnis
                            dis parturient. Potenti nullam ac tortor vitae purus. Odio euismod lacinia at quis risus sed
                            vulputate odio. Pulvinar mattis nunc sed blandit libero volutpat sed. Dolor sit amet
                            consectetur adipiscing elit ut aliquam purus. Nulla facilisi etiam dignissim diam quis.
                            Massa ultricies mi quis hendrerit dolor magna eget. Tincidunt praesent semper feugiat nibh
                            sed pulvinar proin gravida. At auctor urna nunc id cursus metus aliquam eleifend. Amet nisl
                            purus in mollis nunc. Ultricies mi quis hendrerit dolor magna eget est lorem. Mi proin sed
                            libero enim. Viverra accumsan in nisl nisi. Cras ornare arcu dui vivamus arcu felis bibendum
                            ut tristique.</p>
                        <p>Mus mauris vitae ultricies leo integer. Gravida dictum fusce ut placerat orci nulla
                            pellentesque dignissim enim. Tempus egestas sed sed risus pretium quam vulputate. Nec
                            tincidunt praesent semper feugiat nibh sed. Dui accumsan sit amet nulla facilisi. Enim
                            praesent elementum facilisis leo vel fringilla est ullamcorper eget. Dolor sit amet
                            consectetur adipiscing elit pellentesque. Elit duis tristique sollicitudin nibh sit.
                            Scelerisque purus semper eget duis at tellus at urna. Consequat interdum varius sit amet
                            mattis. Nibh cras pulvinar mattis nunc sed blandit libero volutpat. Ac orci phasellus
                            egestas tellus. Fames ac turpis egestas sed tempus urna et. Non enim praesent elementum
                            facilisis leo vel fringilla est. Habitant morbi tristique senectus et. Hendrerit dolor magna
                            eget est lorem ipsum dolor sit. Nulla porttitor massa id neque aliquam vestibulum morbi
                            blandit cursus.</p>
                        <p>Sed odio morbi quis commodo. Purus semper eget duis at tellus at. Et netus et malesuada fames
                            ac. Dictum sit amet justo donec enim diam vulputate ut pharetra. Pellentesque pulvinar
                            pellentesque habitant morbi tristique. Platea dictumst quisque sagittis purus sit amet
                            volutpat. Nulla facilisi morbi tempus iaculis urna. Nunc sed blandit libero volutpat sed
                            cras. Magna sit amet purus gravida quis. Vel fringilla est ullamcorper eget nulla.</p>
                        <p>Consequat interdum varius sit amet mattis vulputate enim nulla aliquet. Praesent tristique
                            magna sit amet purus gravida. In cursus turpis massa tincidunt dui ut ornare lectus.
                            Tristique risus nec feugiat in fermentum posuere urna nec. Non blandit massa enim nec dui
                            nunc mattis. Volutpat blandit aliquam etiam erat velit. In ante metus dictum at. Pretium
                            vulputate sapien nec sagittis aliquam malesuada bibendum. Scelerisque mauris pellentesque
                            pulvinar pellentesque habitant morbi tristique senectus et. Ipsum suspendisse ultrices
                            gravida dictum fusce ut placerat orci nulla.</p>
                        <p>Non consectetur a erat nam. Tempor id eu nisl nunc mi ipsum faucibus vitae aliquet. Nec dui
                            nunc mattis enim ut tellus elementum sagittis. Pellentesque nec nam aliquam sem et tortor
                            consequat id porta. Mauris commodo quis imperdiet massa tincidunt. Nullam vehicula ipsum a
                            arcu cursus vitae congue mauris. In fermentum et sollicitudin ac. Fermentum dui faucibus in
                            ornare quam viverra orci sagittis eu. Ac turpis egestas sed tempus urna et pharetra pharetra
                            massa. Sit amet justo donec enim. Aliquam purus sit amet luctus venenatis lectus magna
                            fringilla. Non quam lacus suspendisse faucibus interdum.</p>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="js/main.js"></script>
</body>

</html>