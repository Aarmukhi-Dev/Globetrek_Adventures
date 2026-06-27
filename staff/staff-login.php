<?php
session_start();
include '../config/db.php';

$error = "";

if(isset($_POST['login'])){

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    $sql = "SELECT * FROM staff
            WHERE username='$username'
            AND password='$password'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) == 1){

        $_SESSION['staff'] = $username;

        header("Location: staff-dashboard.php");
        exit();

    }else{
        $error = "Invalid Username or Password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>Staff Login | GlobeTrek Adventures</title>

<style>

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    min-height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;

    background:
    linear-gradient(rgba(0, 0, 0, 0.95),rgba(4, 51, 54, 0.95)),
    url('../images/login-bg.jpg');

    background-size:cover;
    background-position:center;
}

.login-card{
    width:420px;

    background:rgba(255,255,255,0.08);
    backdrop-filter:blur(15px);

    border:1px solid rgba(255,255,255,0.15);

    padding:40px;
    border-radius:25px;

    box-shadow:
    0 20px 50px rgba(0,0,0,.4);
}

.logo{
    text-align:center;
    margin-bottom:20px;
}

.logo h1{
    color:#d8ff5f;
    font-size:35px;
}

.logo p{
    color:#fff;
    opacity:.8;
}

.login-card h2{
    text-align:center;
    color:white;
    margin-bottom:30px;
}

.error{
    background:#ffdddd;
    color:red;
    padding:12px;
    border-radius:10px;
    margin-bottom:15px;
    text-align:center;
}

.form-group{
    margin-bottom:20px;
}

.form-group label{
    display:block;
    color:white;
    margin-bottom:8px;
}

.form-group input{
    width:100%;
    padding:15px;

    border:none;
    outline:none;

    border-radius:12px;

    background:rgba(255,255,255,.12);
    color:white;
}

.form-group input::placeholder{
    color:#ddd;
}

.login-btn{
    width:100%;
    padding:15px;

    border:none;
    border-radius:15px;

    background:#d8ff5f;
    color:#0e2d2f;

    font-size:18px;
    font-weight:700;

    cursor:pointer;
    transition:.3s;
}

.login-btn:hover{
    transform:translateY(-3px);
    box-shadow:0 10px 25px #d8ff5f;
}

.back-home{
    display:block;
    text-align:center;
    margin-top:20px;

    color:white;
    text-decoration:none;
}

.back-home:hover{
    color:#d8ff5f;
}

</style>
</head>

<body>

<div class="login-card">

    <div class="logo">
        <h1>GlobeTrek</h1>
        <p>Staff Portal</p>
    </div>

    <h2>Staff Login</h2>

    <?php if($error != ""){ ?>
        <div class="error">
            <?php echo $error; ?>
        </div>
    <?php } ?>

    <form method="POST">

        <div class="form-group">
            <label>Username</label>
            <input
                type="text"
                name="username"
                placeholder="Enter Username"
                required>
        </div>

        <div class="form-group">
            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Enter Password"
                required>
        </div>

        <button type="submit"
                name="login"
                class="login-btn">
            Login
        </button>

    </form>

    <a href="../index.php" class="back-home">
        ← Back to Website
    </a>

</div>

</body>
</html>