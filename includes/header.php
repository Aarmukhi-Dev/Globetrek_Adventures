<?php if(session_status() == PHP_SESSION_NONE) session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>GlobeTrek Adventures</title>

<link rel="stylesheet" href="css/style.css?v=2">

<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

<link rel="stylesheet"
href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
  /* Register button fix */
  .custom-btn {
    background: #d8ff5f ;
    color: rgba(4, 51, 54, 0.95) ;
    border: none ;
    font-weight: 700 ;
  }

  .custom-btn:hover {
    background: #c5eb50 ;
    color: rgba(4, 51, 54, 0.95) ;
  }

  /* Social icons fix */
  .social-icons a {
    background: rgba(255, 255, 255, 0.15) ;
    color: #fff ;
    border: 1px solid rgba(255, 255, 255, 0.3) ;
  }

  .social-icons a i,
  .social-icons a svg,
  .social-icons a .bi {
    color: #fff ;
    fill: #fff ;
  }

  .social-icons a:hover {
    background: #d8ff5f;
  }

  .social-icons a:hover i,
  .social-icons a:hover .bi {
    color: rgb(14, 45, 47) ;
  }
</style>

</head>
<body>