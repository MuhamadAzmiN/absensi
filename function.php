<?php
$conn = mysqli_connect("localhost", "root", "", "absen");


function regis($data){
    global $conn;
    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = strtolower(stripslashes($data["password"]));
    $password2 = strtolower(stripslashes($data["password2"]));

    $result = mysqli_query($conn, "SELECT * FROM regis WHERE nama= '$nama'");
    if(mysqli_fetch_assoc($result)){
        $_SESSION["regis"] = true;

        return false;
    }



    if($password !== $password2){
        echo "<script>alert('konfirmasi password tidak sesuai');</script>";
        
        return false;
    }

    $passwordHash =password_hash($password, PASSWORD_DEFAULT);
    $query = "INSERT INTO regis(nama,email,password) VALUES ('$nama', '$email','$passwordHash')";


    $result = mysqli_query($conn, $query);


    return mysqli_affected_rows($conn);

}







































?>