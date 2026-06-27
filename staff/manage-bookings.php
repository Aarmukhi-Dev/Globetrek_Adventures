<?php
session_start();
if(!isset($_SESSION['staff'])){ header("Location: staff-login.php"); exit(); }
include '../config/db.php';

if(isset($_GET['confirm'])){
    $id = (int)$_GET['confirm'];
    mysqli_query($conn,"UPDATE bookings SET status='Confirmed' WHERE id=$id");
    header("Location: manage-bookings.php"); exit();
}
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    mysqli_query($conn,"DELETE FROM bookings WHERE id=$id");
    header("Location: manage-bookings.php"); exit();
}

$bookings = mysqli_query($conn,"SELECT * FROM bookings ORDER BY id DESC");
?>
<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8"><title>View Bookings | Staff</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fb;display:flex;}
.sidebar{width:260px;min-height:100vh;background:#0e2d2f;padding:30px;position:fixed;}
.sidebar h2{color:#d8ff5f;margin-bottom:40px;font-size:20px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px;border-radius:10px;margin-bottom:8px;transition:.3s;}
.sidebar a:hover,.sidebar a.active{background:#d8ff5f;color:#0e2d2f;}
.content{margin-left:260px;padding:40px;width:100%;}
h1{color:#0e2d2f;margin-bottom:25px;font-size:30px;font-weight:700;}
.card{background:white;padding:30px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.08);overflow-x:auto;}
table{width:100%;border-collapse:separate;border-spacing:0 10px;min-width:900px;}
table th{background:#0e2d2f;color:white;padding:16px;text-align:left;}
table th:first-child{border-radius:12px 0 0 12px;}table th:last-child{border-radius:0 12px 12px 0;}
table td{background:white;padding:16px;border-top:1px solid #eee;border-bottom:1px solid #eee;}
table td:first-child{border-left:1px solid #eee;border-radius:12px 0 0 12px;}
table td:last-child{border-right:1px solid #eee;border-radius:0 12px 12px 0;}
.badge-pending{background:#ffc107;color:#333;padding:5px 14px;border-radius:20px;font-size:12px;font-weight:600;}
.badge-confirmed{background:#28a745;color:white;padding:5px 14px;border-radius:20px;font-size:12px;font-weight:600;}
.confirm-btn{background:#d8ff5f;color:#0e2d2f;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;font-size:13px;margin-right:6px;}
.del-btn{background:#ff3b30;color:white;padding:8px 14px;border-radius:8px;text-decoration:none;font-weight:600;font-size:13px;}
.empty{text-align:center;color:#999;padding:30px;}
</style></head><body>
<div class="sidebar">
  <h2>GlobeTrek Staff</h2>
  <a href="staff-dashboard.php">📊 Dashboard</a>
  <a href="manage-packages.php">📦 Manage Packages</a>
  <a href="manage-bookings.php" class="active">📖 View Bookings</a>
  <a href="manage-accommodation.php">🏨 Accommodation</a>
  <a href="manage-transportation.php">🚗 Transportation</a>
  <a href="customer-queries.php">💬 Queries</a>
  <a href="logout.php">🚪 Logout</a>
</div>
<div class="content">
  <h1>Manage Bookings</h1>
  <div class="card">
    <table>
      <thead><tr><th>ID</th><th>Customer</th><th>Email</th><th>Package</th><th>Date</th><th>Persons</th><th>Status</th><th>Action</th></tr></thead>
      <tbody>
      <?php if($bookings && mysqli_num_rows($bookings)>0){
        while($row=mysqli_fetch_assoc($bookings)){ ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['customer_name']); ?></td>
          <td><?php echo htmlspecialchars($row['email']); ?></td>
          <td><?php echo htmlspecialchars($row['package_name']); ?></td>
          <td><?php echo $row['travel_date']; ?></td>
          <td><?php echo $row['persons']; ?></td>
          <td><?php echo $row['status']=='Confirmed' ? '<span class="badge-confirmed">Confirmed</span>' : '<span class="badge-pending">Pending</span>'; ?></td>
          <td>
            <?php if($row['status']=='Pending'){ ?><a href="?confirm=<?php echo $row['id']; ?>" class="confirm-btn">Confirm</a><?php } ?>
            <a href="?delete=<?php echo $row['id']; ?>" class="del-btn" onclick="return confirm('Delete?')">Delete</a>
          </td>
        </tr>
      <?php }} else { echo '<tr><td colspan="8" class="empty">No bookings found.</td></tr>'; } ?>
      </tbody>
    </table>
  </div>
</div>
</body></html>
