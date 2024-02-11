<?php
session_start();
require 'function.php';
// if(isset($_COOKIE["login"])){
//     if($_COOKIE["login"]=='true'){
//         $_SESSION["login"] = true;
//     }
// }
if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil username berdasarkan id
    $result = mysqli_query($conn, "SELECT nama FROM regis WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if($key === hash('sha256', $row["nama"])){
        $_SESSION["login"] = true;
    }
}
// ini kalau di aktifin aneh
// if (isset($_SESSION["login"])) {
//     header("Location: index.php");
//     exit;
// }



if (isset($_POST["submit"])) {
    $nama = $_POST["nama"];
    $password = $_POST["password"];
    $error = false;

    $result = mysqli_query($conn, "SELECT * FROM regis WHERE nama = '$nama'");
    if ($result) {
        // cek jumlah baris hasil kueri
        if (mysqli_num_rows($result) === 1) {
            // cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password, $row["password"])) {
                // set session
                $_SESSION["login"] = true;
                $_SESSION["login_user"] = $row["nama"];
                                              
                if(isset($_POST["remember"])){
                    setcookie('id', $row["id"], time()+60);
                    setcookie('key', hash('sha256', $row["nama"]), time()+60);
                }
                header("Location: index.php");
                exit;
            } else {
                // password salah
                $error = true;
            }
        } else {
            // username tidak ditemukan
            $error = true;
        }
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
        <?php if(isset($error)) : ?>
            <p>username / password salah</p>
        <?php endif; ?>
            <form action="" method="post">
                <h2>Welcome </h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div>
                        <h5>Username</h5>
                        <input class="input" name="nama" type="text">
                    </div>
                </div>
                
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Password</h5>
                        <input class="input" name="password" type="password">
                    </div>
                </div>
                <div class="input-div two">
                    <div class="i">
                        <i class="fas fa-key"></i>
                    </div>
                    <div>
                        <h5>Konfirmasi Password</h5>
                        <input class="input" name="password" type="password">
                    </div>
                </div>
                <div class="terms">
                        <input type="checkbox" name="remember">
                        <label>Remember Me</label><a id="action-modal">Info</a>
                </div>
                
                <div class="btn-container">
                    <button type="submit" name="submit" class="btn-action">Login</button>
                </div>
                <div class="account">
                    <p>Forget Password</p>
                    <a href="forgotPassword.php">Lupa password?</a>
                </div>
                <div class="account">
                    <p>Já possui conta ?</p>
                    <a href="register.php">Sign Up</a>
                </div>
                <!-- The Modal -->
                <div id="modal-terms" class="modal">
                    <!-- Modal content -->
                    <div class="modal-content">
                        <span class="close">&times;</span>
                        <h2>Muhamad Azmi Naziyulloh</h2>
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