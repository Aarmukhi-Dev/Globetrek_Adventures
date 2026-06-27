<?php
session_start();

if(!isset($_SESSION['staff'])){
    header("Location: staff-login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Staff Dashboard</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#f5f7fa;
    font-family:'Segoe UI',sans-serif;
}

.sidebar{
    width:280px;
    height:100vh;
    background:#0e2d2f;
    position:fixed;
    left:0;
    top:0;
    padding:30px;
}

.sidebar h2{
    color:#d8ff5f;
    font-weight:700;
    margin-bottom:40px;
}

.sidebar a{
    display:block;
    color:white;
    text-decoration:none;
    padding:12px 15px;
    border-radius:10px;
    margin-bottom:10px;
    transition:.3s;
}

.sidebar a:hover{
    background:#d8ff5f;
    color:#0e2d2f;
}

.main{
    margin-left:300px;
    padding:40px;
}

.welcome-box{
    background:white;
    padding:30px;
    border-radius:20px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
    margin-bottom:30px;
}

.card-box{
    background:white;
    padding:25px;
    border-radius:20px;
    text-align:center;
    box-shadow:0 10px 25px rgba(0,0,0,.08);
    transition:.3s;
}

.card-box:hover{
    transform:translateY(-5px);
}

.card-box h5{
    margin-top:15px;
    font-weight:700;
}

.card-icon{
    font-size:40px;
}

</style>

</head>
<body>

<div class="sidebar">

    <h2>GlobeTrek</h2>

    <a href="manage-packages.php">📦 Manage Packages</a>

    <a href="manage-bookings.php">📖 View Bookings</a>

    <a href="confirm-bookings.php">✅ Confirm Bookings</a>

    <a href="manage-accommodation.php">🏨 Accommodation</a>

    <a href="manage-transportation.php">🚗 Transportation</a>

    <a href="customer-queries.php">💬 Customer Queries</a>

    <a href="logout.php">🚪 Logout</a>

</div>

<div class="main">

    <div class="welcome-box">

        <h2>
            Welcome,
            <?php echo $_SESSION['staff']; ?>
        </h2>

        <p>
            Manage GlobeTrek Adventures operations from your dashboard.
        </p>

    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <a href="manage-packages.php" class="card-box" style="text-decoration:none;color:inherit;">
                <div class="card-icon">📦</div>
                <h5>Packages</h5>
                <p>Manage travel packages.</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="manage-bookings.php" class="card-box" style="text-decoration:none;color:inherit;">
                <div class="card-icon">📖</div>
                <h5>Bookings</h5>
                <p>View customer bookings.</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="manage-accommodation.php" class="card-box" style="text-decoration:none;color:inherit;">
                <div class="card-icon">🏨</div>
                <h5>Hotels</h5>
                <p>Manage accommodation.</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="manage-transportation.php" class="card-box" style="text-decoration:none;color:inherit;">
                <div class="card-icon">🚗</div>
                <h5>Transportation</h5>
                <p>Manage transport services.</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="customer-queries.php" class="card-box" style="text-decoration:none;color:inherit;">
                <div class="card-icon">💬</div>
                <h5>Customer Queries</h5>
                <p>Reply to customer questions.</p>
            </a>
        </div>

        <div class="col-md-4">
            <a href="../admin/reports.php" class="card-box" style="text-decoration:none;color:inherit;">
                <div class="card-icon">📊</div>
                <h5>Reports</h5>
                <p>Booking statistics overview.</p>
            </a>
        </div>

    </div>

</div>

</body>
</html>