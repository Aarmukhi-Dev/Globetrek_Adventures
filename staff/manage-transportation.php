<?php
session_start();
if(!isset($_SESSION['staff'])){ header("Location: staff-login.php"); exit(); }
include '../config/db.php';

if(isset($_POST['add'])){
    $type        = htmlspecialchars(trim($_POST['type']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price       = (float)$_POST['price'];
    mysqli_query($conn,"INSERT INTO transportation(type,description,price) VALUES('$type','$description','$price')");
}
if(isset($_GET['delete'])){
    mysqli_query($conn,"DELETE FROM transportation WHERE id=".(int)$_GET['delete']);
    header("Location: manage-transportation.php"); exit();
}
$rows = mysqli_query($conn,"SELECT * FROM transportation ORDER BY id DESC");
?>
<!DOCTYPE html><html lang="en"><head><meta charset="UTF-8"><title>Transportation | Staff</title>
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fb;display:flex;}
.sidebar{width:260px;min-height:100vh;background:#0e2d2f;padding:30px;position:fixed;}
.sidebar h2{color:#d8ff5f;margin-bottom:40px;font-size:20px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px;border-radius:10px;margin-bottom:8px;transition:.3s;}
.sidebar a:hover,.sidebar a.active{background:#d8ff5f;color:#0e2d2f;}
.content{margin-left:260px;padding:40px;width:100%;}
h1{color:#0e2d2f;margin-bottom:25px;font-weight:700;}
.card{background:white;padding:25px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.08);margin-bottom:25px;}
.form-row{display:grid;grid-template-columns:1fr 2fr 1fr auto;gap:12px;}
input,select{padding:12px;border:1px solid #ddd;border-radius:10px;font-size:14px;}
.add-btn{background:#d8ff5f;border:none;padding:12px 20px;border-radius:10px;font-weight:700;cursor:pointer;}
table{width:100%;border-collapse:separate;border-spacing:0 10px;}
table th{background:#0e2d2f;color:white;padding:14px;text-align:left;}
table th:first-child{border-radius:12px 0 0 12px;}table th:last-child{border-radius:0 12px 12px 0;}
table td{background:white;padding:14px;border-top:1px solid #eee;border-bottom:1px solid #eee;}
table td:first-child{border-left:1px solid #eee;border-radius:12px 0 0 12px;}
table td:last-child{border-right:1px solid #eee;border-radius:0 12px 12px 0;}
.del{background:#ff3b30;color:white;padding:8px 14px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:600;}
.empty{text-align:center;color:#999;padding:30px;}
</style></head><body>
<div class="sidebar">
  <h2>GlobeTrek Staff</h2>
  <a href="staff-dashboard.php">📊 Dashboard</a>
  <a href="manage-packages.php">📦 Packages</a>
  <a href="manage-bookings.php">📖 Bookings</a>
  <a href="manage-accommodation.php">🏨 Accommodation</a>
  <a href="manage-transportation.php" class="active">🚗 Transportation</a>
  <a href="customer-queries.php">💬 Queries</a>
  <a href="logout.php">🚪 Logout</a>
</div>
<div class="content">
  <h1>Manage Transportation</h1>
  <div class="card">
    <form method="POST">
      <div class="form-row">
        <select name="type">
          <option>Airport Transfer</option><option>Private Chauffeur</option>
          <option>Luxury Car</option><option>Tour Coach</option><option>Domestic Flight</option>
        </select>
        <input type="text" name="description" placeholder="Description / Route" required>
        <input type="number" name="price" placeholder="Price $" step="0.01" required>
        <button type="submit" name="add" class="add-btn">+ Add</button>
      </div>
    </form>
  </div>
  <div class="card">
    <table>
      <thead><tr><th>ID</th><th>Type</th><th>Description</th><th>Price</th><th>Action</th></tr></thead>
      <tbody>
      <?php if($rows && mysqli_num_rows($rows)>0){
        while($row=mysqli_fetch_assoc($rows)){ ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['type']); ?></td>
          <td><?php echo htmlspecialchars($row['description']); ?></td>
          <td>$<?php echo number_format($row['price'],2); ?></td>
          <td><a href="?delete=<?php echo $row['id']; ?>" class="del" onclick="return confirm('Delete?')">Delete</a></td>
        </tr>
      <?php }} else { echo '<tr><td colspan="5" class="empty">No transportation records yet.</td></tr>'; } ?>
      </tbody>
    </table>
  </div>
</div>
</body></html>
