<?php

include_once('config/db.php');

// ✅ User authentication check
if (!isset($_SESSION['email'])) {
    header("Location: index.php#login");
    exit;
}

// 📥 Get user ID from session email
$email = $_SESSION['email'];
$userQuery = $connect->query("SELECT id FROM users WHERE email = '$email'");
$user = $userQuery->fetch_assoc();
$user_id = $user['id'];

// 🔍 Fetch all appointments
$appointmentsQuery = $connect->query("SELECT * FROM appointments WHERE userid = '$user_id' ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>My Appointments - Glow & Shine</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 min-h-screen">

    <?php include_once('includes/navbar.php'); ?>

    <section class="max-w-5xl mx-auto p-6 mt-10">
        <h1 class="text-3xl font-bold text-gray-800 mb-6 text-center">📋 My Appointments</h1>

        <?php if ($appointmentsQuery->num_rows > 0): ?>
            <div class="grid grid-cols-1 gap-6">
                <?php while ($appoint = $appointmentsQuery->fetch_assoc()): ?>
                    <div class="bg-white rounded-xl shadow-md p-6 border border-pink-100 hover:shadow-lg transition">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div>
                                <p class="text-sm text-gray-500">Service</p>
                                <p class="text-lg font-semibold text-pink-600"><?= $appoint['appointservice']; ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Date</p>
                                <p class="font-medium text-gray-700"><?= $appoint['appointdate']; ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Time</p>
                                <p class="font-medium text-gray-700"><?= $appoint['appointslot']; ?></p>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Status</p>
                                <span class="inline-block px-3 py-1 rounded-full text-white text-sm font-semibold
                                    <?php
                                        echo $appoint['status'] == 'Pending' ? 'bg-yellow-500' :
                                            ($appoint['status'] == 'Paid' || $appoint['status'] == 'Completed' ? 'bg-green-500' : 'bg-red-500');
                                    ?>">
                                    <?= ucfirst($appoint['status']); ?>
                                </span>
                            </div>
                            <div>
                                <p class="text-sm text-gray-500">Payment ID</p>
                                <p class="font-medium text-gray-700"><?= $appoint['payment_id'] ?: 'N/A'; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-600 mt-10">😕 You have no appointments yet.</p>
        <?php endif; ?>

        <!-- Back to Home -->
        <div class="text-center mt-10">
            <a href="index.php"
                class="inline-block px-6 py-3 rounded-full bg-pink-600 text-white font-medium hover:bg-pink-700 transition">
                ⬅ Back to Home
            </a>
        </div>
    </section>

</body>
</html>
