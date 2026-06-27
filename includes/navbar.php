<?php if(session_status() == PHP_SESSION_NONE) session_start(); ?>
<link rel="stylesheet" href="css/style.css">
<!-- NAVBAR -->
<nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <div class="container site-container">
        <!-- Logo -->
        <a href="index.php" class="navbar-brand">
            <img src="images/logo.png" alt="Logo">
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Navbar Links -->
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav mx-auto">
                <li class="nav-item">
                    <a class="nav-link" href="packages.php">Packages</a>
                </li>

                <li class="nav-item dropdown d-flex align-items-center">
                    <a class="nav-link" href="travelplan.php">Travel Plan</a>
                    <a class="nav-link dropdown-toggle dropdown-toggle-split" href="#" data-bs-toggle="dropdown"></a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="travelplan.php#accommodation">Accommodation</a></li>
                        <li><a class="dropdown-item" href="travelplan.php#transportation">Transportation</a></li>
                        <li><a class="dropdown-item" href="travelplan.php#guides">Travel Guides</a></li>
                        <li><a class="dropdown-item" href="travelplan.php#contact">Contact Agency</a></li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="about.php">About Us</a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="staffDropdown" role="button" data-bs-toggle="dropdown">Staff</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="staff/staff-login.php">Staff Login</a></li>
                        <li><a class="dropdown-item" href="admin/admin-login.php">Admin Login</a></li>
                    </ul>
                </li>

                <?php if(isset($_SESSION['customer_id'])){ ?>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">
                        👤 <?php echo htmlspecialchars($_SESSION['customer_name']); ?>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="customer/dashboard.php">My Dashboard</a></li>
                        <li><a class="dropdown-item" href="customer/booking-history.php">My Bookings</a></li>
                        <li><a class="dropdown-item" href="booking.php">Book a Trip</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="actions/logout.php">Logout</a></li>
                    </ul>
                </li>
                <?php } else { ?>
                <li class="nav-item">
                    <a href="customer/register.php" class="btn custom-btn">Register</a>
                </li>
                <li class="nav-item" style="margin-left:8px;">
                    <a href="customer/login.php" class="btn custom-btn" style="background:transparent;border:1px solid #d8ff5f;color:#d8ff5f;">Login</a>
                </li>
                <?php } ?>
            </ul>
        </div>
    </div>
</nav>
