<?php 

session_start();
include 'config.php';

$name = strtolower($_POST["name"]);
$email = strtolower(stripcslashes($_POST["email"]));
$password = mysqli_real_escape_string($config, $_POST["password"]);
$confPassword = mysqli_real_escape_string($config, $_POST["confPassword"]);


$query = mysqli_query($config, "SELECT email FROM users WHERE email ='$email'");

if (mysqli_fetch_assoc($query)) {
    echo "<script>
        alert('Email sudah ada!');
        window.location.replace('register.php');
        </script>";
    return false;
} 

// cek konfirmasi paswrod
if( $password != $confPassword){
    echo "<script>
        alert('password tidak sesuai!');
        window.location.replace('register.php');
    </script>";
    return false;

}

// enkripsi password
$password = password_hash($password, PASSWORD_DEFAULT);


// tambahkan user baru ke db
mysqli_query($config, "INSERT INTO `users` (`users_id`, `name`, `username`, `phone_number`, `email`, `email_verified_at`, `password`, `provinces_id`, `address`, `zip_code`, `roles`) 
                        VALUES (NULL, '$name', '', '', '$email', NULL, '$password', 1, '', '', 'USER')");

$_SESSION['message'] = "Buat akun berhasil";
header('Location:login.php');
?>