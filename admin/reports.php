<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: admin-login.php"); exit(); }
include '../config/db.php';

$total_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM bookings"); $total = mysqli_fetch_assoc($total_r)['cnt'];
$confirmed_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM bookings WHERE status='Confirmed'"); $confirmed = mysqli_fetch_assoc($confirmed_r)['cnt'];
$pending_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM bookings WHERE status='Pending'"); $pending = mysqli_fetch_assoc($pending_r)['cnt'];
$customers_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM customers"); $customers = mysqli_fetch_assoc($customers_r)['cnt'];
$staff_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM staff"); $staff = mysqli_fetch_assoc($staff_r)['cnt'];

$popular = mysqli_query($conn,"SELECT package_name, COUNT(*) as cnt FROM bookings GROUP BY package_name ORDER BY cnt DESC LIMIT 5");
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Reports | Admin</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fb;display:flex;}
.sidebar{width:260px;min-height:100vh;background:#0e2d2f;padding:30px;position:fixed;}
.sidebar .brand{color:#d8ff5f;font-size:20px;font-weight:700;margin-bottom:8px;}
.sidebar .brand-sub{color:rgba(255,255,255,.5);font-size:12px;margin-bottom:30px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px;border-radius:10px;margin-bottom:8px;transition:.3s;}
.sidebar a:hover,.sidebar a.active{background:#d8ff5f;color:#0e2d2f;}
.content{margin-left:260px;padding:40px;width:100%;}
h1{color:#0e2d2f;font-size:28px;font-weight:700;margin-bottom:30px;}
.stat-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:16px;margin-bottom:30px;}
.stat-card{background:white;padding:22px;border-radius:18px;box-shadow:0 5px 20px rgba(0,0,0,.07);text-align:center;}
.stat-card .icon{font-size:30px;margin-bottom:8px;}
.stat-card h3{font-size:30px;font-weight:700;color:#0e2d2f;}
.stat-card p{color:#888;font-size:13px;}
.card{background:white;padding:28px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.07);margin-bottom:25px;}
.card h4{color:#0e2d2f;font-weight:700;margin-bottom:20px;}
.bar-row{display:flex;align-items:center;gap:15px;margin-bottom:14px;}
.bar-label{width:180px;font-size:14px;color:#333;flex-shrink:0;}
.bar-bg{flex:1;background:#f0f0f0;border-radius:20px;height:22px;overflow:hidden;}
.bar-fill{height:100%;background:#0e2d2f;border-radius:20px;transition:.5s;}
.bar-count{font-size:14px;font-weight:700;color:#0e2d2f;min-width:30px;text-align:right;}
</style></head><body>
<div class="sidebar">
  <div class="brand">GlobeTrek</div>
  <div class="brand-sub">Admin Panel</div>
  <a href="admin-dashboard.php">📊 Dashboard</a>
  <a href="manage-staff.php">👥 Staff</a>
  <a href="manage-customers.php">👤 Customers</a>
  <a href="view-bookings.php">📋 Bookings</a>
  <a href="reports.php" class="active">📈 Reports</a>
  <a href="security.php">🔒 Security</a>
  <a href="settings.php">⚙️ Settings</a>
  <a href="logout.php">🚪 Logout</a>
</div>
<div class="content">
  <h1>Reports & Analytics</h1>
  <div class="stat-grid">
    <div class="stat-card"><div class="icon">📋</div><h3><?php echo $total; ?></h3><p>Total Bookings</p></div>
    <div class="stat-card"><div class="icon">✅</div><h3><?php echo $confirmed; ?></h3><p>Confirmed</p></div>
    <div class="stat-card"><div class="icon">⏳</div><h3><?php echo $pending; ?></h3><p>Pending</p></div>
    <div class="stat-card"><div class="icon">👤</div><h3><?php echo $customers; ?></h3><p>Customers</p></div>
    <div class="stat-card"><div class="icon">👥</div><h3><?php echo $staff; ?></h3><p>Staff</p></div>
  </div>
  <div class="card">
    <h4>Most Popular Packages</h4>
    <?php $max=1;
    $rows=[];
    while($row=mysqli_fetch_assoc($popular)){ $rows[]=$row; if($row['cnt']>$max)$max=$row['cnt']; }
    foreach($rows as $row){
      $pct = round(($row['cnt']/$max)*100);
    echo '<div class="bar-row"><div class="bar-label">'.htmlspecialchars($row['package_name']).'</div>
    <div class="bar-bg"><div class="bar-fill" style="width:'.$pct.'%"></div></div>
    <div class="bar-count">'.$row['cnt'].'</div></div>';
    }
    if(empty($rows)) echo '<p style="color:#999;text-align:center;padding:20px;">No booking data yet.</p>';
    ?>
  </div>
</div>
</body></html>
