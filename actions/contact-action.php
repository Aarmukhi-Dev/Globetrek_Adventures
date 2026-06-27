<?php
session_start();
include '../config/db.php';

if(isset($_POST['send_message'])){
    $full_name = htmlspecialchars(trim($_POST['full_name']));
    $email     = htmlspecialchars(trim($_POST['email']));
    $subject   = htmlspecialchars(trim($_POST['subject']));
    $message   = htmlspecialchars(trim($_POST['message']));

    if(empty($full_name) || empty($email) || empty($subject) || empty($message)){
        $_SESSION['contact_error'] = "All fields are required.";
        header("Location: ../travelplan.php#contact");
        exit();
    }

    // Save to database
    $sql = "INSERT INTO queries(full_name, email, subject, message, submitted_at)
            VALUES('$full_name','$email','$subject','$message', NOW())";

    if(mysqli_query($conn, $sql)){

        // Send email to agency
        $to      = "muhki9703@gmail.com"; 
        $headers = "From: $email\r\n";
        $headers .= "Reply-To: $email\r\n";
        $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

        $email_body  = "You have received a new message from the GlobeTrek contact form.\n\n";
        $email_body .= "Name    : $full_name\n";
        $email_body .= "Email   : $email\n";
        $email_body .= "Subject : $subject\n\n";
        $email_body .= "Message :\n$message\n";

        mail($to, "Contact Form: $subject", $email_body, $headers);

        $_SESSION['contact_success'] = "Message sent! We'll get back to you soon.";

    } else {
        $_SESSION['contact_error'] = "Failed to send message. Please try again.";
    }

    header("Location: ../travelplan.php#contact");
    exit();
}

header("Location: ../travelplan.php");
exit();
?>