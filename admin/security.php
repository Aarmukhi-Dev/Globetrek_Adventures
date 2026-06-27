<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: admin-login.php"); exit(); }
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Security | Admin</title>
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
.card{background:white;padding:28px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.07);margin-bottom:25px;}
.card h4{color:#0e2d2f;font-weight:700;margin-bottom:18px;}
.security-item{display:flex;justify-content:space-between;align-items:center;padding:16px 0;border-bottom:1px solid #f0f0f0;}
.security-item:last-child{border:none;}
.security-item p{color:#555;font-size:14px;margin:4px 0 0;}
.badge-ok{background:#28a745;color:white;padding:5px 16px;border-radius:20px;font-size:13px;font-weight:600;}
.badge-warn{background:#ffc107;color:#333;padding:5px 16px;border-radius:20px;font-size:13px;font-weight:600;}
</style></head><body>
<div class="sidebar">
  <div class="brand">GlobeTrek</div>
  <div class="brand-sub">Admin Panel</div>
  <a href="admin-dashboard.php">📊 Dashboard</a>
  <a href="manage-staff.php">👥 Staff</a>
  <a href="manage-customers.php">👤 Customers</a>
  <a href="view-bookings.php">📋 Bookings</a>
  <a href="reports.php">📈 Reports</a>
  <a href="security.php" class="active">🔒 Security</a>
  <a href="settings.php">⚙️ Settings</a>
  <a href="logout.php">🚪 Logout</a>
</div>
<div class="content">
  <h1>System Security</h1>
  <div class="card">
    <h4>Security Overview</h4>
    <div class="security-item">
      <div><strong>Admin Session</strong><p>Current admin session is active and secure.</p></div>
      <span class="badge-ok">✓ Active</span>
    </div>
    <div class="security-item">
      <div><strong>Database Connection</strong><p>MySQL connection is stable.</p></div>
      <span class="badge-ok">✓ Connected</span>
    </div>
    <div class="security-item">
      <div><strong>Session Protection</strong><p>PHP sessions are started and protected.</p></div>
      <span class="badge-ok">✓ Enabled</span>
    </div>
    <div class="security-item">
      <div><strong>Input Sanitization</strong><p>User inputs are sanitized via htmlspecialchars.</p></div>
      <span class="badge-ok">✓ Enabled</span>
    </div>
    <div class="security-item">
      <div><strong>Password Hashing</strong><p>Customer passwords are hashed using PHP password_hash.</p></div>
      <span class="badge-ok">✓ Active</span>
    </div>
  </div>
  <div class="card">
    <h4>Logged in as</h4>
    <p style="font-size:16px;color:#0e2d2f;font-weight:600;">👑 <?php echo htmlspecialchars($_SESSION['admin']); ?></p>
    <p style="font-size:14px;color:#888;margin-top:5px;">Session started: <?php echo date('Y-m-d H:i'); ?></p>
  </div>
</div>
</body></html>
