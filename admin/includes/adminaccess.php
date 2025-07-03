<?php

// Check if user is logged in
if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Fetch role from database
    $getUserRole = $connect->query("SELECT * FROM users WHERE email='$email'");
    $userRole = $getUserRole->fetch_assoc();

    // Check if not admin
    if ($userRole['isadmin'] != 1) {
        header("Location: ../index.php");
        exit;
    }
} else {
    // If not logged in at all
    header("Location: ../index.php");
    exit;
}


?>