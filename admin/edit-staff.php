<?php
session_start();
if(!isset($_SESSION['admin'])){ header("Location: admin-login.php"); exit(); }
include '../config/db.php';

$id = (int)$_GET['id'];
$staff = mysqli_fetch_assoc(mysqli_query($conn,"SELECT * FROM staff WHERE id=$id"));

if(!$staff){ header("Location: manage-staff.php"); exit(); }

if(isset($_POST['update'])){
    $fullname = htmlspecialchars(trim($_POST['fullname']));
    $username = htmlspecialchars(trim($_POST['username']));
    $password = trim($_POST['password']);
    
    if(!empty($password)){
        mysqli_query($conn,"UPDATE staff SET fullname='$fullname',username='$username',password='$password' WHERE id=$id");
    } else {
        mysqli_query($conn,"UPDATE staff SET fullname='$fullname',username='$username' WHERE id=$id");
    }
    header("Location: manage-staff.php"); exit();
}
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Edit Staff | Admin</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fb;display:flex;justify-content:center;align-items:center;min-height:100vh;}
.card{background:white;padding:40px;border-radius:20px;box-shadow:0 10px 30px rgba(0,0,0,.1);width:460px;}
h2{color:#0e2d2f;margin-bottom:25px;font-weight:700;}
.form-group{margin-bottom:18px;}
label{display:block;font-weight:600;color:#333;margin-bottom:8px;font-size:14px;}
input{width:100%;padding:12px 15px;border:1.5px solid #ddd;border-radius:10px;font-size:14px;}
.btn{background:#0e2d2f;color:#d8ff5f;border:none;padding:13px 25px;border-radius:10px;font-size:15px;font-weight:700;cursor:pointer;width:100%;margin-top:5px;}
.back{display:inline-block;margin-top:15px;color:#0e2d2f;text-decoration:none;font-size:14px;}
</style></head><body>
<div class="card">
  <h2>Edit Staff Member</h2>
  <form method="POST">
    <div class="form-group"><label>Full Name</label><input type="text" name="fullname" value="<?php echo htmlspecialchars($staff['fullname']); ?>" required></div>
    <div class="form-group"><label>Username</label><input type="text" name="username" value="<?php echo htmlspecialchars($staff['username']); ?>" required></div>
    <div class="form-group"><label>New Password <small style="font-weight:400;color:#888;">(leave blank to keep current)</small></label><input type="password" name="password" placeholder="New password"></div>
    <button type="submit" name="update" class="btn">Update Staff</button>
  </form>
  <a href="manage-staff.php" class="back">← Back to Manage Staff</a>
</div>
</body></html>
