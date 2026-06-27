<?php
session_start();
include '../config/db.php';

if(isset($_POST['login'])){
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);

    $result = mysqli_query($conn, "SELECT * FROM customers WHERE username='$username'");
    if($row = mysqli_fetch_assoc($result)){
        if(password_verify($password, $row['password']) || $password === $row['password']){
            $_SESSION['customer_id']   = $row['id'];
            $_SESSION['customer_name'] = $row['fullname'];
            $_SESSION['customer_email']= $row['email'];
            header("Location: ../customer/dashboard.php");
            exit();
        }
    }
    $_SESSION['login_error'] = "Invalid username or password.";
    header("Location: ../customer/login.php");
    exit();
}
header("Location: ../customer/login.php");
