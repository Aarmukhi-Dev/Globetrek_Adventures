<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['admin'])){
    header("Location: admin-login.php");
    exit();
}

/* ADD CUSTOMER */

if(isset($_POST['add_customer'])){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "INSERT INTO customers
    (fullname,email,username,password)
    VALUES
    ('$fullname','$email','$username','$password')";

    mysqli_query($conn,$sql);
}

/* DELETE CUSTOMER */

if(isset($_GET['delete'])){

    $id = $_GET['delete'];

    mysqli_query($conn,
    "DELETE FROM customers WHERE id=$id");
}

$result = mysqli_query($conn,
"SELECT * FROM customers");
?>

<!DOCTYPE html>
<html>
<head>
<title>Manage Customers</title>

<style>

*{
margin:0;
padding:0;
box-sizing:border-box;
font-family:'Segoe UI',sans-serif;
}

body{
background:#f5f7fb;
}

.container{
display:flex;
}

.sidebar{
width:260px;
height:100vh;
background:#0e2d2f;
padding:30px;
position:fixed;
}

.sidebar h2{
color:#d8ff5f;
margin-bottom:40px;
}

.sidebar a{
display:block;
padding:12px;
color:white;
text-decoration:none;
margin-bottom:10px;
border-radius:10px;
}

.sidebar a:hover{
background:#d8ff5f;
color:#0e2d2f;
}

.content{
margin-left:260px;
padding:40px;
width:100%;
}

.card{
background:white;
padding:25px;
border-radius:20px;
box-shadow:0 5px 20px rgba(0,0,0,.08);
margin-bottom:30px;
}

h1{
margin-bottom:20px;
color:#0e2d2f;
}

form{
display:grid;
grid-template-columns:1fr 1fr 1fr 1fr auto;
gap:15px;
}

input{
padding:12px;
border:1px solid #ddd;
border-radius:10px;
}

button{
background:#d8ff5f;
border:none;
padding:12px 20px;
border-radius:10px;
font-weight:700;
cursor:pointer;
}

table{
width:100%;
border-collapse:separate;
border-spacing:0 12px;
}

table th{
background:#0e2d2f;
color:white;
padding:18px;
text-align:center;
}

table th:first-child{
border-radius:15px 0 0 15px;
}

table th:last-child{
border-radius:0 15px 15px 0;
}

table td{
background:white;
padding:18px;
text-align:center;
border-top:1px solid #eee;
border-bottom:1px solid #eee;
}

table td:first-child{
border-left:1px solid #eee;
border-radius:15px 0 0 15px;
}

table td:last-child{
border-right:1px solid #eee;
border-radius:0 15px 15px 0;
}

.edit-btn{
background:#d8ff5f;
padding:10px 18px;
border-radius:10px;
text-decoration:none;
color:#0e2d2f;
font-weight:600;
margin-right:10px;
}

.delete-btn{
background:#ff3b30;
padding:10px 18px;
border-radius:10px;
text-decoration:none;
color:white;
font-weight:600;
}

</style>
</head>

<body>

<div class="container">

<div class="sidebar">

<h2>Admin Panel</h2>

<a href="admin-dashboard.php">Dashboard</a>
<a href="manage-staff.php">Manage Staff</a>
<a href="manage-customers.php">Manage Customers</a>
<a href="view-bookings.php">Bookings</a>
<a href="logout.php">Logout</a>

</div>

<div class="content">

<h1>Manage Customers</h1>

<div class="card">

<form method="POST">

<input type="text"
name="fullname"
placeholder="Full Name"
required>

<input type="email"
name="email"
placeholder="Email"
required>

<input type="text"
name="username"
placeholder="Username"
required>

<input type="password"
name="password"
placeholder="Password"
required>

<button
type="submit"
name="add_customer">
Add Customer
</button>

</form>

</div>

<div class="card">

<table>

<thead>

<tr>
<th>ID</th>
<th>Full Name</th>
<th>Email</th>
<th>Username</th>
<th>Action</th>
</tr>

</thead>

<tbody>

<?php while($row=mysqli_fetch_assoc($result)){ ?>

<tr>

<td><?php echo $row['id']; ?></td>

<td><?php echo $row['fullname']; ?></td>

<td><?php echo $row['email']; ?></td>

<td><?php echo $row['username']; ?></td>

<td>

<a class="edit-btn"
href="#">
Edit</a>

<a class="delete-btn"
href="?delete=<?php echo $row['id']; ?>"
onclick="return confirm('Delete Customer?')">
Delete
</a>

</td>

</tr>

<?php } ?>

</tbody>

</table>

</div>

</div>

</div>

</body>
</html>