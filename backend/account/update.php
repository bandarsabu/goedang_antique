<?php
    include '../../config.php';

    $users_id = $_POST['users_id'];
    $name = $_POST['name'];
    $username = $_POST['username'];
    $phone_number = $_POST['phone_number'];
    $email = $_POST['email'];
    $provinces_id = $_POST['provinces_id'];
    $address = $_POST['address'];
    $zip_code = $_POST['zip_code'];

    mysqli_query($config, "UPDATE users SET name='$name',username='$username',
                  phone_number='$phone_number',email='$email',provinces_id='$provinces_id',address='$address',zip_code='$zip_code' WHERE users_id='$users_id'");

    header('Location:dashboard-account.php');