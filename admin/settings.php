<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: admin-login.php"); exit(); }
$msg = "";
if(isset($_POST['save'])){ $msg = "Settings saved successfully."; }
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Settings | Admin</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fb;display:flex;}
.sidebar{width:260px;min-height:100vh;background:#0e2d2f;padding:30px;position:fixed;}
.sidebar .brand{color:#d8ff5f;font-size:20px;font-weight:700;margin-bottom:8px;}
.sidebar .brand-sub{color:rgba(255,255,255,.5);font-size:12px;margin-bottom:30px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px;border-radius:10px;margin-bottom:8px;transition:.3s;}
.sidebar a:hover,.sidebar a.active{background:#d8ff5f;color:#0e2d2f;}
.content{margin-left:260px;padding:40px;width:100%;max-width:800px;}
h1{color:#0e2d2f;font-size:28px;font-weight:700;margin-bottom:30px;}
.card{background:white;padding:28px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.07);margin-bottom:25px;}
.card h4{color:#0e2d2f;font-weight:700;margin-bottom:20px;}
.form-group{margin-bottom:18px;}
.form-group label{display:block;font-weight:600;color:#333;margin-bottom:8px;font-size:14px;}
.form-group input,.form-group textarea{width:100%;padding:12px 15px;border:1.5px solid #e0e0e0;border-radius:12px;font-size:14px;}
.form-group input:focus,.form-group textarea:focus{border-color:#0e2d2f;outline:none;}
.save-btn{background:#0e2d2f;color:#d8ff5f;border:none;padding:14px 30px;border-radius:12px;font-size:15px;font-weight:700;cursor:pointer;transition:.3s;}
.save-btn:hover{background:#143c3d;}
.alert-success{background:#d4edda;color:#155724;padding:14px 20px;border-radius:12px;margin-bottom:20px;font-weight:600;}
</style></head><body>
<div class="sidebar">
  <div class="brand">GlobeTrek</div>
  <div class="brand-sub">Admin Panel</div>
  <a href="admin-dashboard.php">📊 Dashboard</a>
  <a href="manage-staff.php">👥 Staff</a>
  <a href="manage-customers.php">👤 Customers</a>
  <a href="view-bookings.php">📋 Bookings</a>
  <a href="reports.php">📈 Reports</a>
  <a href="security.php">🔒 Security</a>
  <a href="settings.php" class="active">⚙️ Settings</a>
  <a href="logout.php">🚪 Logout</a>
</div>
<div class="content">
  <h1>System Settings</h1>
  <?php if($msg){ echo '<div class="alert-success">✅ '.$msg.'</div>'; } ?>
  <div class="card">
    <h4>Website Settings</h4>
    <form method="POST">
      <div class="form-group"><label>Website Name</label><input type="text" name="site_name" value="GlobeTrek Adventures"></div>
      <div class="form-group"><label>Contact Email</label><input type="email" name="email" value="info@globetrekadventures.com"></div>
      <div class="form-group"><label>Contact Phone</label><input type="text" name="phone" value="+94 77 684 4243"></div>
      <div class="form-group"><label>Address</label><input type="text" name="address" value="Negombo, Colombo, Sri Lanka"></div>
      <button type="submit" name="save" class="save-btn">💾 Save Settings</button>
    </form>
  </div>
</div>
</body></html>
