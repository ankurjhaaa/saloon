<?php

include_once('config/db.php');

$success = false;
$errorMessage = '';

if (isset($_GET['payment_id']) && isset($_SESSION['email'])) {
    $email = $_SESSION['email'];
    $payment_id = $_GET['payment_id'];
    $status = 'Paid';
    $created_at = date('Y-m-d H:i:s');

    // 🔍 Get user_id from email
    $userQuery = $connect->query("SELECT id FROM users WHERE email = '$email'");
    $user = $userQuery->fetch_assoc();
    $user_id = $user['id'];

    // 📌 Dummy appointment data (replace with session values later)
    $service = 'Haircut';
    $date = '2025-07-06';
    $time = '10:30';

    $query = "INSERT INTO appointments (userid, appointservice, appointdate, appointslot, status, payment_id, created_at)
              VALUES ('$user_id', '$service', '$date', '$time', '$status', '$payment_id', '$created_at')";

    if ($connect->query($query)) {
        $appoint_id = $connect->insert_id;
        $success = true;
    } else {
        $errorMessage = "Database Error: " . $connect->error;
    }
} else {
    $errorMessage = "Login or Payment ID missing.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Status - Glow & Shine</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .animate-ping-once {
            animation: pingOnce 0.6s ease-in-out;
        }

        @keyframes pingOnce {
            0% { transform: scale(0.2); opacity: 0; }
            80% { transform: scale(1.2); opacity: 1; }
            100% { transform: scale(1); }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-pink-50 to-white min-h-screen flex items-center justify-center px-6">

    <div class="bg-white/80 backdrop-blur-lg p-10 rounded-2xl shadow-xl max-w-xl w-full text-center border border-pink-100">
        <?php if ($success): ?>
            <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-green-100 flex items-center justify-center">
                <svg class="w-12 h-12 text-green-600 animate-ping-once" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">Payment Successful!</h2>
            <p class="text-gray-600 mb-6 text-sm">Your appointment has been booked and payment received successfully.</p>
            <div class="flex justify-center gap-4">
                <a href="paymentconfirm.php?appoint_id=<?= $appoint_id ?>"
                   class="px-6 py-3 rounded-full bg-pink-600 text-white hover:bg-pink-700 transition shadow">
                    View Appointment
                </a>
                <a href="index.php"
                   class="px-6 py-3 rounded-full bg-gray-200 text-gray-700 hover:bg-gray-300 transition">
                    Back to Home
                </a>
            </div>
        <?php else: ?>
            <div class="w-20 h-20 mx-auto mb-6 rounded-full bg-red-100 flex items-center justify-center">
                <svg class="w-12 h-12 text-red-600" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </div>
            <h2 class="text-3xl font-bold text-gray-800 mb-2">❌ Payment Failed</h2>
            <p class="text-gray-600 mb-6"><?= $errorMessage ?></p>
            <a href="index.php#login"
               class="px-6 py-3 rounded-full bg-pink-600 text-white hover:bg-pink-700 transition">
                Go to Login
            </a>
        <?php endif; ?>
    </div>

</body>
</html>
