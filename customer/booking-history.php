<?php
session_start();
if(!isset($_SESSION['customer_id'])){ header("Location: login.php"); exit(); }
include '../config/db.php';

$name = $_SESSION['customer_name'];
$bookings = mysqli_query($conn,"SELECT * FROM bookings WHERE customer_name='$name' ORDER BY id DESC");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Bookings | GlobeTrek</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fa;display:flex;}
.sidebar{width:260px;min-height:100vh;background:#0e2d2f;padding:30px;position:fixed;top:0;left:0;}
.sidebar .brand{color:#d8ff5f;font-size:22px;font-weight:700;margin-bottom:10px;}
.sidebar .brand-sub{color:rgba(255,255,255,.5);font-size:13px;margin-bottom:35px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px 15px;border-radius:10px;margin-bottom:8px;transition:.3s;}
.sidebar a:hover,.sidebar a.active{background:#d8ff5f;color:#0e2d2f;}
.main{margin-left:260px;padding:40px;width:100%;}
.page-title{font-size:32px;font-weight:700;color:#0e2d2f;margin-bottom:25px;}
.alert-success{background:#d4edda;color:#155724;padding:14px 20px;border-radius:12px;margin-bottom:20px;}
.card-section{background:white;padding:30px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.07);}
table{width:100%;border-collapse:separate;border-spacing:0 10px;}
table th{background:#0e2d2f;color:white;padding:16px 18px;text-align:left;}
table th:first-child{border-radius:12px 0 0 12px;}table th:last-child{border-radius:0 12px 12px 0;}
table td{background:#f9f9f9;padding:16px 18px;border-top:1px solid #eee;border-bottom:1px solid #eee;}
table td:first-child{border-left:1px solid #eee;border-radius:12px 0 0 12px;}
table td:last-child{border-right:1px solid #eee;border-radius:0 12px 12px 0;}
.badge-pending{background:#ffc107;color:#333;padding:5px 14px;border-radius:30px;font-size:12px;font-weight:600;}
.badge-confirmed{background:#28a745;color:white;padding:5px 14px;border-radius:30px;font-size:12px;font-weight:600;}
.empty{text-align:center;padding:50px;color:#999;}
.book-link{display:inline-block;margin-top:15px;background:#0e2d2f;color:#d8ff5f;padding:12px 25px;border-radius:10px;text-decoration:none;font-weight:600;}
</style>
</head>
<body>
<div class="sidebar">
  <div class="brand">GlobeTrek</div>
  <div class="brand-sub">Customer Portal</div>
  <a href="dashboard.php"><i class="bi bi-speedometer2"></i> Dashboard</a>
  <a href="../booking.php"><i class="bi bi-calendar-plus"></i> Book a Package</a>
  <a href="booking-history.php" class="active"><i class="bi bi-clock-history"></i> My Bookings</a>
  <a href="../packages.php"><i class="bi bi-globe2"></i> Explore Packages</a>
  <a href="../actions/logout.php"><i class="bi bi-box-arrow-left"></i> Logout</a>
</div>

<div class="main">
  <h1 class="page-title">My Booking History</h1>

  <?php if(isset($_SESSION['booking_success'])){ echo '<div class="alert-success">✅ '.$_SESSION['booking_success'].'</div>'; unset($_SESSION['booking_success']); } ?>

  <div class="card-section">
    <?php if(mysqli_num_rows($bookings) > 0){ ?>
    <table>
      <thead><tr><th>#</th><th>Package</th><th>Travel Date</th><th>Persons</th><th>Status</th></tr></thead>
      <tbody>
      <?php $i=1; while($row = mysqli_fetch_assoc($bookings)){ ?>
      <tr>
        <td><?php echo $i++; ?></td>
        <td><?php echo htmlspecialchars($row['package_name']); ?></td>
        <td><?php echo $row['travel_date']; ?></td>
        <td><?php echo $row['persons']; ?> person<?php echo $row['persons']>1?'s':''; ?></td>
        <td><?php echo $row['status']=='Confirmed' ? '<span class="badge-confirmed">✓ Confirmed</span>' : '<span class="badge-pending">⏳ Pending</span>'; ?></td>
      </tr>
      <?php } ?>
      </tbody>
    </table>
    <?php } else { ?>
    <div class="empty">
      <p style="font-size:18px;">No bookings found.</p>
      <p>Start planning your next adventure today!</p>
      <a href="../booking.php" class="book-link">Book a Package</a>
    </div>
    <?php } ?>
  </div>
</div>
</body>
</html>
