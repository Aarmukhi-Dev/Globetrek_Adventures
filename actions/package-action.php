<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['staff'])){
    header("Location: ../staff/staff-login.php");
    exit();
}

// Add Package
if(isset($_POST['add_package'])){
    $name        = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price       = (float)$_POST['price'];
    $category    = htmlspecialchars(trim($_POST['category']));

    mysqli_query($conn,"INSERT INTO packages(name,description,price,category) VALUES('$name','$description','$price','$category')");
    header("Location: ../staff/manage-packages.php");
    exit();
}

// Delete Package
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    mysqli_query($conn,"DELETE FROM packages WHERE id=$id");
    header("Location: ../staff/manage-packages.php");
    exit();
}
header("Location: ../staff/manage-packages.php");
