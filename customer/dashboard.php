<?php
session_start();
if(!isset($_SESSION['customer_id'])){
    header("Location: login.php"); exit();
}
include '../config/db.php';

$cid = $_SESSION['customer_id'];
$name = $_SESSION['customer_name'];

// Count bookings
$total_res = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM bookings WHERE customer_name='".$_SESSION['customer_name']."'");
$total_row = mysqli_fetch_assoc($total_res);
$total = $total_row['cnt'];

$confirmed_res = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM bookings WHERE customer_name='".$name."' AND status='Confirmed'");
$confirmed_row = mysqli_fetch_assoc($confirmed_res);
$confirmed = $confirmed_row['cnt'];

$pending_res = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM bookings WHERE customer_name='".$name."' AND status='Pending'");
$pending_row = mysqli_fetch_assoc($pending_res);
$pending = $pending_row['cnt'];

// Recent bookings
$recent = mysqli_query($conn,"SELECT * FROM bookings WHERE customer_name='".$name."' ORDER BY id DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Dashboard | GlobeTrek</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fa;display:flex;}
.sidebar{width:260px;min-height:100vh;background:#0e2d2f;padding:30px;position:fixed;top:0;left:0;}
.sidebar .brand{color:#d8ff5f;font-size:22px;font-weight:700;margin-bottom:10px;}
.sidebar .brand-sub{color:rgba(255,255,255,.5);font-size:13px;margin-bottom:35px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px 15px;border-radius:10px;margin-bottom:8px;transition:.3s;font-size:15px;}
.sidebar a:hover,.sidebar a.active{background:#d8ff5f;color:#0e2d2f;}
.main{margin-left:260px;padding:40px;width:100%;}
.topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:30px;}
.topbar h2{color:#0e2d2f;font-size:28px;font-weight:700;}
.topbar .user-info{background:white;padding:10px 20px;border-radius:50px;box-shadow:0 5px 15px rgba(0,0,0,.08);font-size:14px;color:#333;}
.stat-cards{display:grid;grid-template-columns:repeat(3,1fr);gap:20px;margin-bottom:30px;}
.stat-card{background:white;padding:25px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.07);text-align:center;}
.stat-card .icon{font-size:36px;margin-bottom:10px;}
.stat-card h3{font-size:36px;font-weight:700;color:#0e2d2f;}
.stat-card p{color:#777;font-size:14px;}
.card-section{background:white;padding:30px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.07);margin-bottom:25px;}
.card-section h4{color:#0e2d2f;font-weight:700;margin-bottom:20px;}
table{width:100%;border-collapse:separate;border-spacing:0 8px;}
table th{background:#0e2d2f;color:white;padding:14px 18px;text-align:left;font-size:14px;}
table th:first-child{border-radius:10px 0 0 10px;}table th:last-child{border-radius:0 10px 10px 0;}
table td{background:#f9f9f9;padding:14px 18px;font-size:14px;border-top:1px solid #eee;border-bottom:1px solid #eee;}
table td:first-child{border-left:1px solid #eee;border-radius:10px 0 0 10px;}
table td:last-child{border-right:1px solid #eee;border-radius:0 10px 10px 0;}
.badge-pending{background:#ffc107;color:#333;padding:5px 14px;border-radius:30px;font-size:12px;font-weight:600;}
.badge-confirmed{background:#28a745;color:white;padding:5px 14px;border-radius:30px;font-size:12px;font-weight:600;}
.quick-btns{display:grid;grid-template-columns:1fr 1fr;gap:15px;}
.quick-btn{background:#0e2d2f;color:#d8ff5f;text-decoration:none;padding:18px 20px;border-radius:15px;text-align:center;font-weight:600;transition:.3s;font-size:15px;}
.quick-btn:hover{background:#d8ff5f;color:#0e2d2f;}
.quick-btn .q-icon{font-size:24px;display:block;margin-bottom:6px;}
</style>
</head>
<body>
<div class="sidebar">
  <div class="brand">GlobeTrek</div>
  <div class="brand-sub">Customer Portal</div>
  <a href="dashboard.php" class="active"><i class="bi bi-speedometer2"></i> Dashboard</a>
  <a href="../booking.php"><i class="bi bi-calendar-plus"></i> Book a Package</a>
  <a href="booking-history.php"><i class="bi bi-clock-history"></i> My Bookings</a>
  <a href="../packages.php"><i class="bi bi-globe2"></i> Explore Packages</a>
  <a href="../actions/logout.php" style="margin-top:auto;"><i class="bi bi-box-arrow-left"></i> Logout</a>
</div>

<div class="main">
  <div class="topbar">
    <h2>Welcome, <?php echo htmlspecialchars($name); ?>!</h2>
    <div class="user-info">👤 <?php echo htmlspecialchars($name); ?></div>
  </div>

  <div class="stat-cards">
    <div class="stat-card"><div class="icon">📋</div><h3><?php echo $total; ?></h3><p>Total Bookings</p></div>
    <div class="stat-card"><div class="icon">✅</div><h3><?php echo $confirmed; ?></h3><p>Confirmed</p></div>
    <div class="stat-card"><div class="icon">⏳</div><h3><?php echo $pending; ?></h3><p>Pending</p></div>
  </div>

  <div class="row g-4">
    <div class="col-lg-8">
      <div class="card-section">
        <h4>Recent Bookings</h4>
        <?php if(mysqli_num_rows($recent) > 0){ ?>
        <table>
          <thead><tr><th>Package</th><th>Travel Date</th><th>Persons</th><th>Status</th></tr></thead>
          <tbody>
          <?php while($row = mysqli_fetch_assoc($recent)){ ?>
          <tr>
            <td><?php echo htmlspecialchars($row['package_name']); ?></td>
            <td><?php echo $row['travel_date']; ?></td>
            <td><?php echo $row['persons']; ?></td>
            <td><?php echo $row['status']=='Confirmed' ? '<span class="badge-confirmed">Confirmed</span>' : '<span class="badge-pending">Pending</span>'; ?></td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
        <div style="margin-top:15px;"><a href="booking-history.php" style="color:#0e2d2f;font-weight:600;font-size:14px;">View all bookings →</a></div>
        <?php } else { ?>
        <p style="color:#999;text-align:center;padding:30px;">No bookings yet. <a href="../booking.php" style="color:#0e2d2f;font-weight:600;">Book your first trip!</a></p>
        <?php } ?>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="card-section">
        <h4>Quick Actions</h4>
        <div class="quick-btns">
          <a href="../booking.php" class="quick-btn"><span class="q-icon">✈️</span>Book Now</a>
          <a href="booking-history.php" class="quick-btn"><span class="q-icon">📋</span>My Trips</a>
          <a href="../packages.php" class="quick-btn"><span class="q-icon">🌍</span>Packages</a>
          <a href="../travelplan.php" class="quick-btn"><span class="q-icon">🗺️</span>Travel Plan</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
