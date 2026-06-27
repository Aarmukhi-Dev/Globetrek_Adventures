<?php
session_start();
if(!isset($_SESSION['staff'])){ header("Location: staff-login.php"); exit(); }
include '../config/db.php';

if(isset($_POST['add_package'])){
    $name        = htmlspecialchars(trim($_POST['name']));
    $description = htmlspecialchars(trim($_POST['description']));
    $price       = (float)$_POST['price'];
    $category    = htmlspecialchars(trim($_POST['category']));
    mysqli_query($conn,"INSERT INTO packages(name,description,price,category) VALUES('$name','$description','$price','$category')");
}
if(isset($_GET['delete'])){
    $id = (int)$_GET['delete'];
    mysqli_query($conn,"DELETE FROM packages WHERE id=$id");
    header("Location: manage-packages.php"); exit();
}

$packages = mysqli_query($conn,"SELECT * FROM packages ORDER BY id DESC");
?>
<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8"><title>Manage Packages | GlobeTrek</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<style>
*{margin:0;padding:0;box-sizing:border-box;font-family:'Segoe UI',sans-serif;}
body{background:#f5f7fb;display:flex;}
.sidebar{width:260px;min-height:100vh;background:#0e2d2f;padding:30px;position:fixed;}
.sidebar h2{color:#d8ff5f;margin-bottom:40px;font-size:20px;}
.sidebar a{display:block;color:white;text-decoration:none;padding:12px;border-radius:10px;margin-bottom:8px;transition:.3s;}
.sidebar a:hover,.sidebar a.active{background:#d8ff5f;color:#0e2d2f;}
.content{margin-left:260px;padding:40px;width:100%;}
h1{color:#0e2d2f;margin-bottom:25px;font-size:30px;font-weight:700;}
.card{background:white;padding:25px;border-radius:20px;box-shadow:0 5px 20px rgba(0,0,0,.08);margin-bottom:25px;}
.form-row{display:grid;grid-template-columns:2fr 3fr 1fr 1fr auto;gap:12px;}
input,select{padding:12px;border:1px solid #ddd;border-radius:10px;font-size:14px;}
.add-btn{background:#d8ff5f;border:none;padding:12px 20px;border-radius:10px;font-weight:700;cursor:pointer;color:#0e2d2f;}
table{width:100%;border-collapse:separate;border-spacing:0 10px;}
table th{background:#0e2d2f;color:white;padding:16px;text-align:left;}
table th:first-child{border-radius:12px 0 0 12px;}table th:last-child{border-radius:0 12px 12px 0;}
table td{background:white;padding:16px;border:1px solid #eee;border-left:none;border-right:none;}
table td:first-child{border-left:1px solid #eee;border-radius:12px 0 0 12px;}
table td:last-child{border-right:1px solid #eee;border-radius:0 12px 12px 0;}
.del{background:#ff3b30;color:white;padding:8px 16px;border-radius:8px;text-decoration:none;font-size:13px;font-weight:600;}
.tag{background:#0e2d2f;color:#d8ff5f;padding:4px 12px;border-radius:20px;font-size:12px;}
.empty{text-align:center;color:#999;padding:30px;}
</style></head><body>
<div class="sidebar">
  <h2>GlobeTrek Staff</h2>
  <a href="staff-dashboard.php">📊 Dashboard</a>
  <a href="manage-packages.php" class="active">📦 Manage Packages</a>
  <a href="manage-bookings.php">📖 View Bookings</a>
  <a href="manage-accommodation.php">🏨 Accommodation</a>
  <a href="manage-transportation.php">🚗 Transportation</a>
  <a href="customer-queries.php">💬 Queries</a>
  <a href="logout.php">🚪 Logout</a>
</div>
<div class="content">
  <h1>Manage Packages</h1>
  <div class="card">
    <form method="POST">
      <div class="form-row">
        <input type="text" name="name" placeholder="Package Name" required>
        <input type="text" name="description" placeholder="Description" required>
        <input type="number" name="price" placeholder="Price $" step="0.01" required>
        <select name="category">
          <option value="Luxury">Luxury</option><option value="Beach">Beach</option>
          <option value="Mountain">Mountain</option><option value="Adventure">Adventure</option>
          <option value="Popular">Popular</option><option value="Trending">Trending</option>
        </select>
        <button type="submit" name="add_package" class="add-btn">+ Add</button>
      </div>
    </form>
  </div>
  <div class="card">
    <table>
      <thead><tr><th>ID</th><th>Name</th><th>Description</th><th>Price</th><th>Category</th><th>Action</th></tr></thead>
      <tbody>
      <?php if($packages && mysqli_num_rows($packages)>0){
        while($row=mysqli_fetch_assoc($packages)){ ?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo htmlspecialchars($row['name']); ?></td>
          <td><?php echo htmlspecialchars($row['description']); ?></td>
          <td>$<?php echo number_format($row['price'],2); ?></td>
          <td><span class="tag"><?php echo htmlspecialchars($row['category']); ?></span></td>
          <td><a href="?delete=<?php echo $row['id']; ?>" class="del" onclick="return confirm('Delete?')">Delete</a></td>
        </tr>
      <?php }} else { echo '<tr><td colspan="6" class="empty">No packages yet. Add your first one above.</td></tr>'; } ?>
      </tbody>
    </table>
  </div>
</div>
</body></html>
