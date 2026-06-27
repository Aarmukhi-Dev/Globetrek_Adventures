<?php
session_start();
include '../config/db.php';

if(!isset($_SESSION['admin'])){
    header("Location: admin-login.php");
    exit();
}

/* CONFIRM BOOKING */

if(isset($_GET['confirm'])){

    $id = (int)$_GET['confirm'];

    mysqli_query(
        $conn,
        "UPDATE bookings
         SET status='Confirmed'
         WHERE id=$id"
    );

    header("Location: view-bookings.php");
    exit();
}

/* DELETE BOOKING */

if(isset($_GET['delete'])){

    $id = (int)$_GET['delete'];

    mysqli_query(
        $conn,
        "DELETE FROM bookings
         WHERE id=$id"
    );

    header("Location: view-bookings.php");
    exit();
}

$result = mysqli_query(
    $conn,
    "SELECT * FROM bookings ORDER BY id DESC"
);
?>

<!DOCTYPE html>
<html lang="en">

<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>View Bookings</title>

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

/* SIDEBAR */

.sidebar{
    width:260px;
    height:100vh;
    background:#0e2d2f;
    padding:30px;
    position:fixed;
    top:0;
    left:0;
}

.sidebar h2{
    color:#d8ff5f;
    margin-bottom:50px;
}

.sidebar a{
    display:block;
    color:#fff;
    text-decoration:none;
    padding:14px;
    margin-bottom:10px;
    border-radius:12px;
    transition:.3s;
}

.sidebar a:hover{
    background:#d8ff5f;
    color:#0e2d2f;
}

/* CONTENT */

.content{
    margin-left:260px;
    width:100%;
    padding:40px;
}

.page-title{
    font-size:50px;
    font-weight:700;
    color:#0e2d2f;
    margin-bottom:30px;
}

.card{
    background:#fff;
    padding:30px;
    border-radius:25px;
    box-shadow:0 10px 30px rgba(0,0,0,.08);
}

/* TABLE */

table{
    width:100%;
    table-layout:auto;
    border-collapse:separate;
    border-spacing:0 15px;
}

table th{
    background:#0e2d2f;
    color:#fff;
    padding:20px;
    text-align:center;
    font-size:16px;
    font-weight:600;
}

table th:first-child{
    border-radius:18px 0 0 18px;
}

table th:last-child{
    border-radius:0 18px 18px 0;
}

table td{
    background:#fff;
    padding:20px;
    text-align:center;
    border-top:1px solid #eee;
    border-bottom:1px solid #eee;
    white-space:nowrap;
}

table td:first-child{
    border-left:1px solid #eee;
    border-radius:18px 0 0 18px;
}

table td:last-child{
    border-right:1px solid #eee;
    border-radius:0 18px 18px 0;
}

tbody tr{
    transition:.3s;
}

tbody tr:hover{
    transform:translateY(-3px);
}

.customer-col{
    width:18%;
}

.package-col{
    width:25%;
}

.date-col{
    width:15%;
}

/* STATUS */

.status-pending,
.status-confirmed{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-width:120px;
    height:40px;
    border-radius:30px;
    font-size:14px;
    font-weight:600;
}

.status-pending{
    background:#ffc107;
    color:#222;
}

.status-confirmed{
    background:#28a745;
    color:#fff;
}

/* BUTTONS */

.action-buttons{
    display:flex;
    justify-content:center;
    align-items:center;
    gap:10px;
}

.confirm-btn,
.delete-btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    width:95px;
    height:40px;
    height:42px;
    border-radius:12px;
    text-decoration:none;
    font-weight:600;
    transition:.3s;
}

.confirm-btn{
    background:#d8ff5f;
    color:#0e2d2f;
}

.confirm-btn:hover{
    background:#c7ef45;
}

.delete-btn{
    background:#ff3b30;
    color:#fff;
}

.delete-btn:hover{
    background:#e0281f;
}

.no-bookings{
    text-align:center;
    color:#777;
    padding:30px;
}

/* RESPONSIVE */

@media(max-width:1200px){

    .card{
        overflow-x:auto;
    }

    table{
        min-width:1100px;
    }
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

        <h1 class="page-title">View Bookings</h1>

        <div class="card">

            <table>

                <thead>
                <tr>
                    <th>ID</th>
                    <th>Customer</th>
                    <th>Email</th>
                    <th>Package</th>
                    <th>Date</th>
                    <th>Persons</th>
                    <th>Status</th>
                    <th style="width:170px;">Action</th>
                </tr>
                </thead>

                <tbody>

                <?php if(mysqli_num_rows($result) > 0){ ?>

                    <?php while($row = mysqli_fetch_assoc($result)){ ?>

                    <tr>

                        <td><?php echo $row['id']; ?></td>

                        <td class="customer-col">
                            <?php echo $row['customer_name']; ?>
                        </td>

                        <td>
                            <?php echo $row['email']; ?>
                        </td>

                        <td class="package-col">
                            <?php echo $row['package_name']; ?>
                        </td>

                        <td class="date-col">
                            <?php echo $row['travel_date']; ?>
                        </td>

                        <td>
                            <?php echo $row['persons']; ?>
                        </td>

                        <td>

                            <?php if($row['status'] == 'Pending'){ ?>

                                <span class="status-pending">
                                    Pending
                                </span>

                            <?php } else { ?>

                                <span class="status-confirmed">
                                    Confirmed
                                </span>

                            <?php } ?>

                        </td>

                        <td>

                            <div class="action-buttons">

                                <?php if($row['status'] == 'Pending'){ ?>

                                <a class="confirm-btn"
                                   href="?confirm=<?php echo $row['id']; ?>">
                                   Confirm
                                </a>

                                <?php } ?>

                                <a class="delete-btn"
                                   href="?delete=<?php echo $row['id']; ?>"
                                   onclick="return confirm('Delete Booking?')">
                                   Delete
                                </a>

                            </div>

                        </td>

                    </tr>

                    <?php } ?>

                <?php } else { ?>

                    <tr>
                        <td colspan="8" class="no-bookings">
                            No bookings found.
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