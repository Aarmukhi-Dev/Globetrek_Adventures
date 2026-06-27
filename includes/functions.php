<?php

// =====================================
// GlobeTrek Common Functions
// =====================================

// Clean Input
function cleanInput($data)
{
    return htmlspecialchars(
        stripslashes(
            trim($data)
        )
    );
}

// Check Login
function isLoggedIn()
{
    return isset($_SESSION['user_id']);
}

// Redirect
function redirect($url)
{
    header("Location: $url");
    exit();
}

// Format Price
function formatPrice($amount)
{
    return "LKR " . number_format($amount, 2);
}

// Show Alert
function showAlert($message)
{
    return "
    <div class='alert alert-success'>
        $message
    </div>";
}

?>