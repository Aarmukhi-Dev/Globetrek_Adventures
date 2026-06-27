<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register | GlobeTrek Adventures</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{min-height:100vh;display:flex;justify-content:center;align-items:center;
background:linear-gradient(rgba(0,0,0,0.92),rgba(4,51,54,0.95)),url('../images/hero01.jpg');
background-size:cover;background-position:center;}
.card{width:460px;background:rgba(255,255,255,0.08);backdrop-filter:blur(15px);
border:1px solid rgba(255,255,255,0.15);padding:40px;border-radius:25px;box-shadow:0 20px 50px rgba(0,0,0,.4);}
.logo{text-align:center;margin-bottom:20px;}
.logo h1{color:#d8ff5f;font-size:32px;}
.logo p{color:#fff;opacity:.8;}
h2{text-align:center;color:white;margin-bottom:25px;}
.alert-error{background:#ffdddd;color:red;padding:12px;border-radius:10px;margin-bottom:15px;text-align:center;}
.alert-success{background:#d4edda;color:#155724;padding:12px;border-radius:10px;margin-bottom:15px;text-align:center;}
.form-group{margin-bottom:18px;}
.form-group label{display:block;color:white;margin-bottom:8px;font-size:14px;}
.form-group input{width:100%;padding:14px;border:none;outline:none;border-radius:12px;
background:rgba(255,255,255,.12);color:white;font-size:15px;}
.form-group input::placeholder{color:#ccc;}
.btn{width:100%;padding:15px;border:none;border-radius:15px;background:#d8ff5f;
color:#0e2d2f;font-size:17px;font-weight:700;cursor:pointer;transition:.3s;margin-top:5px;}
.btn:hover{transform:translateY(-3px);box-shadow:0 10px 25px rgba(216,255,95,.4);}
.links{text-align:center;margin-top:20px;}
.links a{color:#d8ff5f;text-decoration:none;font-size:14px;}
.links a:hover{text-decoration:underline;}
.back{display:block;text-align:center;margin-top:12px;color:white;text-decoration:none;font-size:14px;}
.back:hover{color:#d8ff5f;}
</style>
</head>
<body>
<div class="card">
  <div class="logo"><h1>GlobeTrek</h1><p>Create your account</p></div>
  <h2>Register</h2>

  <?php if(isset($_SESSION['reg_error'])){ echo '<div class="alert-error">'.$_SESSION['reg_error'].'</div>'; unset($_SESSION['reg_error']); } ?>
  <?php if(isset($_SESSION['reg_success'])){ echo '<div class="alert-success">'.$_SESSION['reg_success'].'</div>'; unset($_SESSION['reg_success']); } ?>

  <form method="POST" action="../actions/register-action.php">
    <div class="form-group"><label>Full Name</label><input type="text" name="fullname" placeholder="Enter your full name" required></div>
    <div class="form-group"><label>Email</label><input type="email" name="email" placeholder="Enter your email" required></div>
    <div class="form-group"><label>Username</label><input type="text" name="username" placeholder="Choose a username" required></div>
    <div class="form-group"><label>Password</label><input type="password" name="password" placeholder="Create a password" required></div>
    <button type="submit" name="register" class="btn">Create Account</button>
  </form>

  <div class="links"><a href="login.php">Already have an account? Login</a></div>
  <a href="../index.php" class="back">← Back to Website</a>
</div>
</body>
</html>
