<?php
$conn = mysqli_connect("localhost", "root", "", "absen");


function regis($data){
    global $conn;
    $nama = strtolower(stripslashes($data["nama"]));
    $email = strtolower(stripslashes($data["email"]));
    $password = strtolower(stripslashes($data["password"]));
    $password2 = strtolower(stripslashes($data["password2"]));

    $result = mysqli_query($conn, "SELECT * FROM regis WHERE nama= '$nama'");

    $result2 = mysqli_query($conn, "SELECT * FROM regis WHERE email='$email'");
    if(mysqli_fetch_assoc($result)){
        $_SESSION["regis"] = true;

        return false;
    }
    if(mysqli_fetch_assoc($result2)){
        $_SESSION["email"] = true;
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


function gantiPw($data) {
    global $conn;
    $id = $_SESSION["login_user"];
    
    $password1 = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);

    if($password1 !== $password2){
        $_SESSION["konfir"] = true;
        return false;
    }

    // Hash password sebelum menyimpannya
    $password = password_hash($password1, PASSWORD_DEFAULT);

    $query = "UPDATE regis SET password = '$password' WHERE nama = '$id'";
    
    $result = mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


// function gantiPw($data) {
//     global $conn;

//     $id = $_SESSION["login_user"];
//     $password = $_POST["password"];

//     // Hash the password before storing it in the database
//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);

//     $query = "UPDATE regis SET password = ? WHERE id = ?";

//     // Prepare the statement
//     $stmt = $conn->prepare($query);

//     // Bind the parameters
//     $stmt->bind_param("si", $hashed_password, $id);

//     // Execute the statement
//     $result = $stmt->execute();

//     // Check if the password was updated successfully
//     if ($result) {
//         return $stmt->affected_rows;
//     } else {
//         return 0;
//     }
// }




























?>