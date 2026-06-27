<?php
session_start();
include 'includes/header.php';
include 'includes/navbar.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Book a Package | GlobeTrek Adventures</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="css/style.css">
<style>
.booking-page{padding:140px 0 80px;min-height:100vh;background:#f5f7fa;}
.booking-wrapper{max-width:720px;margin:auto;padding:0 20px;}
.booking-card{background:white;padding:45px;border-radius:25px;box-shadow:0 10px 40px rgba(0,0,0,.1);}
.booking-card h1{font-size:32px;font-weight:700;color:#0e2d2f;margin-bottom:8px;}
.booking-card p.sub{color:#777;margin-bottom:30px;}
.form-label{font-weight:600;color:#0e2d2f;margin-bottom:6px;}
.form-control,.form-select{padding:13px 16px;border-radius:12px;border:1.5px solid #e0e0e0;font-size:15px;transition:.3s;}
.form-control:focus,.form-select:focus{border-color:#0e2d2f;box-shadow:none;}
.book-btn{width:100%;padding:16px;background:#0e2d2f;color:#d8ff5f;border:none;border-radius:15px;
font-size:17px;font-weight:700;cursor:pointer;transition:.3s;margin-top:10px;}
.book-btn:hover{background:#143c3d;transform:translateY(-2px);box-shadow:0 8px 25px rgba(14,45,47,.3);}
.login-notice{background:#fffbdd;border:1px solid #f0e0a0;border-radius:12px;padding:18px 22px;margin-bottom:25px;font-size:14px;}
.login-notice a{color:#0e2d2f;font-weight:700;}
.alert-error{background:#ffdddd;color:red;padding:12px 18px;border-radius:10px;margin-bottom:20px;}
</style>
</head>
<body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="booking-page">
<div class="booking-wrapper">
  <div class="booking-card">
    <h1>Book a Package</h1>
    <p class="sub">Fill in your details to reserve your dream trip with GlobeTrek Adventures.</p>

    <?php if(!isset($_SESSION['customer_id'])){ ?>
    <div class="login-notice">⚠️ You need to <a href="customer/login.php">login</a> or <a href="customer/register.php">register</a> to complete a booking.</div>
    <?php } ?>

    <?php if(isset($_SESSION['booking_error'])){ echo '<div class="alert-error">'.$_SESSION['booking_error'].'</div>'; unset($_SESSION['booking_error']); } ?>

    <form method="POST" action="actions/booking-action.php">
      <div class="mb-3">
        <label class="form-label">Select Package</label>
        <select class="form-select" name="package_name" required>
          <option value="" disabled selected>Choose a package</option>
          <option value="Maldives Escape">🏝 Maldives Escape — $1,500</option>
          <option value="Swiss Alps Highland">🏔 Swiss Alps Highland — $1,200</option>
          <option value="Tokyo Adventure">🗼 Tokyo Adventure — $1,100</option>
          <option value="Bali Retreat">🌴 Bali Retreat — $950</option>
          <option value="Greece Premium Stay">🏛 Greece Premium Stay — $1,800</option>
          <option value="Paris Getaway">🗺 Paris Getaway — $1,300</option>
        </select>
        <?php
        // Pre-select if passed via GET
        if(isset($_GET['package'])){ echo '<script>document.querySelector("select[name=package_name]").value="'.htmlspecialchars($_GET['package']).'";</script>'; }
        ?>
      </div>

      <div class="row mb-3">
        <div class="col-md-6">
          <label class="form-label">Travel Date</label>
          <input type="date" class="form-control" name="travel_date" required min="<?php echo date('Y-m-d', strtotime('+1 day')); ?>">
        </div>
        <div class="col-md-6">
          <label class="form-label">Number of Persons</label>
          <select class="form-select" name="persons" required>
            <?php for($i=1;$i<=10;$i++) echo "<option value='$i'>$i Person".($i>1?'s':'')."</option>"; ?>
          </select>
        </div>
      </div>

      <?php if(isset($_SESSION['customer_id'])){ ?>
      <div class="mb-3">
        <label class="form-label">Your Name</label>
        <input type="text" class="form-control" value="<?php echo htmlspecialchars($_SESSION['customer_name']); ?>" readonly>
      </div>
      <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" class="form-control" value="<?php echo htmlspecialchars($_SESSION['customer_email']); ?>" readonly>
      </div>
      <button type="submit" name="book" class="book-btn">✈️ Confirm Booking</button>
      <?php } else { ?>
      <button type="button" onclick="window.location='customer/login.php'" class="book-btn">Login to Book</button>
      <?php } ?>
    </form>
  </div>
</div>
</div>

<?php include 'includes/footer.php'; ?>
</body>
</html>
