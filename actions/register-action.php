<?php
session_start();
include '../config/db.php';

if(isset($_POST['register'])){
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $email    = htmlspecialchars(trim($_POST['email']));
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);

    // Check if username or email exists
    $check = mysqli_query($conn, "SELECT id FROM customers WHERE username='$username' OR email='$email'");
    if(mysqli_num_rows($check) > 0){
        $_SESSION['reg_error'] = "Username or Email already exists.";
        header("Location: ../customer/register.php");
        exit();
    }

    $hashed = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO customers(fullname, email, username, password) VALUES('$fullname','$email','$username','$hashed')";
    if(mysqli_query($conn, $sql)){
        $_SESSION['reg_success'] = "Registration successful! Please login.";
        header("Location: ../customer/login.php");
    } else {
        $_SESSION['reg_error'] = "Registration failed. Try again.";
        header("Location: ../customer/register.php");
    }
    exit();
}
header("Location: ../customer/register.php");
