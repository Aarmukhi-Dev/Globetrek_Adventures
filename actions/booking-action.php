<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['customer_id'])){
    header("Location: ../customer/login.php");
    exit();
}

if(isset($_POST['book'])){
    $customer_name = $_SESSION['customer_name'];
    $email         = $_SESSION['customer_email'];
    $package_name  = htmlspecialchars(trim($_POST['package_name']));
    $travel_date   = $_POST['travel_date'];
    $persons       = (int)$_POST['persons'];
    $status        = 'Pending';

    $sql = "INSERT INTO bookings(customer_name, email, package_name, travel_date, persons, status)
            VALUES('$customer_name','$email','$package_name','$travel_date','$persons','$status')";

    if(mysqli_query($conn, $sql)){
        $_SESSION['booking_success'] = "Booking placed successfully! We will confirm shortly.";
        header("Location: ../customer/booking-history.php");
    } else {
        $_SESSION['booking_error'] = "Booking failed. Please try again.";
        header("Location: ../booking.php");
    }
    exit();
}
header("Location: ../booking.php");
