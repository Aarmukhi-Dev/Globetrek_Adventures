<?php
session_start();
unset($_SESSION['staff']);
session_destroy();
header("Location: ../index.php");
exit();
