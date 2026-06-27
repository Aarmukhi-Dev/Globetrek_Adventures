<?php
session_start();
if(!isset($_SESSION['staff'])){ header("Location: staff-login.php"); exit(); }
include '../config/db.php';
require '../vendor/autoload.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if(isset($_POST['reply'])){
    $id         = (int)$_POST['query_id'];
    $reply_text = htmlspecialchars(trim($_POST['reply_text']));

    // Get customer details
    $q   = mysqli_query($conn, "SELECT * FROM queries WHERE id=$id");
    $row = mysqli_fetch_assoc($q);

    // Save reply to DB
    mysqli_query($conn, "UPDATE queries SET reply='$reply_text', status='Replied' WHERE id=$id");

    // Send email to customer
    $mail = new PHPMailer(true);
    try {
        $mail->SMTPDebug = 2;
        $mail->Debugoutput = 'html';
        $mail->isSMTP();
        $mail->Host       = 'smtp.gmail.com';
        $mail->SMTPAuth   = true;
        $mail->Username   = 'muhki9703@gmail.com';  // ← your Gmail
        $mail->Password   = 'utsvjiwzzxokjvou'; // ← 16-char App Password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port       = 587;

        $mail->setFrom('muhki9703@gmail.com', 'GlobeTrek Adventures');
        $mail->addAddress($row['email']);
        $mail->Subject = "Re: " . $row['subject'];
        $mail->Body    =
            "Hi " . $row['full_name'] . ",\n\n" .
            "Thank you for contacting GlobeTrek Adventures.\n\n" .
            "Our reply:\n" . $reply_text . "\n\n" .

        $mail->send();

    } catch (Exception $e) {
        // Reply saved even if email fails
    }

    header("Location: customer-queries.php");
    exit();
}

if(isset($_GET['delete'])){
    mysqli_query($conn,"DELETE FROM queries WHERE id=".(int)$_GET['delete']);
    header("Location: customer-queries.php"); exit();
}

$queries = mysqli_query($conn,"SELECT * FROM queries ORDER BY id DESC");
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Customer Queries | Staff</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fb;display:flex;}
.sidebar{width:260px;min-height:100vh;background:#0e2d2f;padding:30px;position:fixed;}
.sidebar h2{color:#d8ff5f;margin-bottom:40px;font-size:20px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px;border-radius:10px;margin-bottom:8px;transition:.3s;}
.sidebar a:hover,.sidebar a.active{background:#d8ff5f;color:#0e2d2f;}
.content{margin-left:260px;padding:40px;width:100%;}
h1{color:#0e2d2f;margin-bottom:25px;font-weight:700;}
.query-card{background:white;padding:25px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.08);margin-bottom:20px;}
.query-card h4{color:#0e2d2f;margin-bottom:5px;}
.query-card p{color:#555;font-size:14px;margin-bottom:12px;}
.query-card .meta{font-size:13px;color:#999;margin-bottom:15px;}
.badge-pending{background:#ffc107;color:#333;padding:3px 12px;border-radius:20px;font-size:12px;}
.badge-replied{background:#28a745;color:white;padding:3px 12px;border-radius:20px;font-size:12px;}
.reply-box{background:#f0f7f0;padding:15px;border-radius:10px;margin-top:10px;font-size:14px;color:#333;}
.reply-form textarea{width:100%;padding:12px;border:1px solid #ddd;border-radius:10px;resize:vertical;font-size:14px;min-height:80px;}
.reply-btn{background:#d8ff5f;border:none;padding:10px 22px;border-radius:10px;font-weight:700;cursor:pointer;color:#0e2d2f;margin-top:8px;}
.del-btn{float:right;background:#ff3b30;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:600;}
.empty{text-align:center;color:#999;padding:50px;background:white;border-radius:20px;}
</style></head><body>
<div class="sidebar">
  <h2>GlobeTrek Staff</h2>
  <a href="staff-dashboard.php">📊 Dashboard</a>
  <a href="manage-packages.php">📦 Packages</a>
  <a href="manage-bookings.php">📖 Bookings</a>
  <a href="manage-accommodation.php">🏨 Accommodation</a>
  <a href="manage-transportation.php">🚗 Transportation</a>
  <a href="customer-queries.php" class="active">💬 Queries</a>
  <a href="logout.php">🚪 Logout</a>
</div>
<div class="content">
  <h1>Customer Queries</h1>
  <?php if($queries && mysqli_num_rows($queries)>0){
    while($row=mysqli_fetch_assoc($queries)){ ?>
  <div class="query-card">
    <a href="?delete=<?php echo $row['id']; ?>" class="del-btn" onclick="return confirm('Delete query?')">Delete</a>
    <h4><?php echo htmlspecialchars($row['full_name'] ?? $row['name'] ?? 'Anonymous'); ?></h4>
    <div class="meta"><?php echo htmlspecialchars($row['email'] ?? ''); ?> &bull;
    <?php echo $row['status']=='Replied' ? '<span class="badge-replied">Replied</span>' : '<span class="badge-pending">Pending</span>'; ?></div>
    <p><strong>Subject:</strong> <?php echo htmlspecialchars($row['subject'] ?? ''); ?></p>
    <p><?php echo htmlspecialchars($row['message'] ?? $row['query'] ?? ''); ?></p>
    <?php if(!empty($row['reply'])){ ?>
    <div class="reply-box"><strong>Your reply:</strong> <?php echo htmlspecialchars($row['reply']); ?></div>
    <?php } ?>
    <?php if($row['status']!='Replied'){ ?>
    <form method="POST" style="margin-top:12px;">
      <input type="hidden" name="query_id" value="<?php echo $row['id']; ?>">
      <textarea name="reply_text" placeholder="Type your reply..." required></textarea>
      <button type="submit" name="reply" class="reply-btn">Send Reply</button>
    </form>
    <?php } ?>
  </div>
  <?php }} else { echo '<div class="empty"><p>No customer queries yet.</p></div>'; } ?>
</div>
</body></html>