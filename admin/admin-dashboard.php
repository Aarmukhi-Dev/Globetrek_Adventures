<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: admin-login.php"); exit(); }
include '../config/db.php';

// Stats
$total_bookings_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM bookings");
$total_bookings = mysqli_fetch_assoc($total_bookings_r)['cnt'];

$pending_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM bookings WHERE status='Pending'");
$pending = mysqli_fetch_assoc($pending_r)['cnt'];

$confirmed_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM bookings WHERE status='Confirmed'");
$confirmed = mysqli_fetch_assoc($confirmed_r)['cnt'];

$customers_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM customers");
$customers = mysqli_fetch_assoc($customers_r)['cnt'];

$staff_r = mysqli_query($conn,"SELECT COUNT(*) as cnt FROM staff");
$staff_count = mysqli_fetch_assoc($staff_r)['cnt'];

// Recent bookings
$recent = mysqli_query($conn,"SELECT * FROM bookings ORDER BY id DESC LIMIT 5");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Dashboard | GlobeTrek</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fa;display:flex;}
.sidebar{width:260px;min-height:100vh;background:#0e2d2f;padding:30px;position:fixed;top:0;left:0;}
.sidebar .brand{color:#d8ff5f;font-size:22px;font-weight:700;margin-bottom:8px;}
.sidebar .brand-sub{color:rgba(255,255,255,.5);font-size:13px;margin-bottom:35px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px 15px;border-radius:10px;margin-bottom:8px;transition:.3s;font-size:15px;}
.sidebar a:hover,.sidebar a.active{background:#d8ff5f;color:#0e2d2f;}
.main{margin-left:260px;padding:40px;width:100%;}
.topbar{display:flex;justify-content:space-between;align-items:center;margin-bottom:35px;}
.topbar h1{font-size:28px;font-weight:700;color:#0e2d2f;}
.topbar .admin-tag{background:#0e2d2f;color:#d8ff5f;padding:8px 20px;border-radius:50px;font-size:14px;font-weight:600;}
.stat-grid{display:grid;grid-template-columns:repeat(5,1fr);gap:18px;margin-bottom:30px;}
.stat-card{background:white;padding:22px;border-radius:18px;box-shadow:0 5px 20px rgba(0,0,0,.07);text-align:center;}
.stat-card .icon{font-size:32px;margin-bottom:8px;}
.stat-card h3{font-size:32px;font-weight:700;color:#0e2d2f;}
.stat-card p{color:#888;font-size:13px;margin:0;}
.section-card{background:white;padding:28px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.07);margin-bottom:25px;}
.section-card h4{color:#0e2d2f;font-weight:700;margin-bottom:20px;font-size:18px;}
table{width:100%;border-collapse:separate;border-spacing:0 8px;}
table th{background:#0e2d2f;color:white;padding:14px 16px;text-align:left;font-size:14px;}
table th:first-child{border-radius:10px 0 0 10px;}table th:last-child{border-radius:0 10px 10px 0;}
table td{background:#f9f9f9;padding:14px 16px;font-size:14px;border-top:1px solid #eee;border-bottom:1px solid #eee;}
table td:first-child{border-left:1px solid #eee;border-radius:10px 0 0 10px;}
table td:last-child{border-right:1px solid #eee;border-radius:0 10px 10px 0;}
.badge-pending{background:#ffc107;color:#333;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:600;}
.badge-confirmed{background:#28a745;color:white;padding:4px 12px;border-radius:20px;font-size:12px;font-weight:600;}
.quick-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:15px;}
.quick-link{background:#0e2d2f;color:#d8ff5f;text-decoration:none;padding:18px 15px;border-radius:15px;text-align:center;font-weight:600;transition:.3s;font-size:14px;display:block;}
.quick-link:hover{background:#d8ff5f;color:#0e2d2f;}
.quick-link .ql-icon{font-size:22px;display:block;margin-bottom:6px;}
</style>
</head>
<body>
<div class="sidebar">
  <div class="brand">GlobeTrek</div>
  <div class="brand-sub">Admin Panel</div>
  <a href="admin-dashboard.php" class="active">📊 Dashboard</a>
  <a href="manage-staff.php">👥 Manage Staff</a>
  <a href="manage-customers.php">👤 Manage Customers</a>
  <a href="view-bookings.php">📋 View Bookings</a>
  <a href="reports.php">📈 Reports</a>
  <a href="security.php">🔒 Security</a>
  <a href="settings.php">⚙️ Settings</a>
  <a href="logout.php" style="margin-top:20px;">🚪 Logout</a>
</div>

<div class="main">
  <div class="topbar">
    <h1>Welcome, Admin <?php echo htmlspecialchars($_SESSION['admin']); ?>!</h1>
    <div class="admin-tag">👑 Administrator</div>
  </div>

  <div class="stat-grid">
    <div class="stat-card"><div class="icon">📋</div><h3><?php echo $total_bookings; ?></h3><p>Total Bookings</p></div>
    <div class="stat-card"><div class="icon">⏳</div><h3><?php echo $pending; ?></h3><p>Pending</p></div>
    <div class="stat-card"><div class="icon">✅</div><h3><?php echo $confirmed; ?></h3><p>Confirmed</p></div>
    <div class="stat-card"><div class="icon">👤</div><h3><?php echo $customers; ?></h3><p>Customers</p></div>
    <div class="stat-card"><div class="icon">👥</div><h3><?php echo $staff_count; ?></h3><p>Staff Members</p></div>
  </div>

  <div class="row g-4">
    <div class="col-lg-8">
      <div class="section-card">
        <h4>Recent Bookings</h4>
        <table>
          <thead><tr><th>ID</th><th>Customer</th><th>Package</th><th>Date</th><th>Status</th></tr></thead>
          <tbody>
          <?php if($recent && mysqli_num_rows($recent)>0){
            while($row=mysqli_fetch_assoc($recent)){ ?>
          <tr>
            <td>#<?php echo $row['id']; ?></td>
            <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
            <td><?php echo htmlspecialchars($row['package_name']); ?></td>
            <td><?php echo $row['travel_date']; ?></td>
            <td><?php echo $row['status']=='Confirmed' ? '<span class="badge-confirmed">Confirmed</span>' : '<span class="badge-pending">Pending</span>'; ?></td>
          </tr>
          <?php }} else { echo '<tr><td colspan="5" style="text-align:center;color:#999;padding:20px;">No bookings yet.</td></tr>'; } ?>
          </tbody>
        </table>
        <div style="margin-top:15px;"><a href="view-bookings.php" style="color:#0e2d2f;font-weight:600;font-size:14px;">View all bookings →</a></div>
      </div>
    </div>
    <div class="col-lg-4">
      <div class="section-card">
        <h4>Quick Access</h4>
        <div class="quick-grid">
          <a href="manage-staff.php" class="quick-link"><span class="ql-icon">👥</span>Staff</a>
          <a href="manage-customers.php" class="quick-link"><span class="ql-icon">👤</span>Customers</a>
          <a href="view-bookings.php" class="quick-link"><span class="ql-icon">📋</span>Bookings</a>
          <a href="reports.php" class="quick-link"><span class="ql-icon">📈</span>Reports</a>
          <a href="security.php" class="quick-link"><span class="ql-icon">🔒</span>Security</a>
          <a href="settings.php" class="quick-link"><span class="ql-icon">⚙️</span>Settings</a>
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>
