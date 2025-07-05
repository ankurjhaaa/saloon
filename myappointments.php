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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>My Appointments - Glow & Shine</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-pink-50 min-h-screen">

    <?php include_once('includes/navbar.php'); ?>

    <section class="max-w-4xl mx-auto px-4 py-8 mt-14">
        <h1 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-6 text-center">📋 My Appointments</h1>

        <?php if ($appointmentsQuery->num_rows > 0): ?>
            <div class="space-y-6">
                <?php while ($appoint = $appointmentsQuery->fetch_assoc()): ?>
                    <div class="bg-white border border-pink-200 rounded-xl p-5 shadow-sm hover:shadow-md transition">
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm">
                            <div>
                                <p class="text-gray-500">Service</p>
                                <p class="text-pink-600 font-semibold text-base"><?= $appoint['appointservice']; ?></p>
                            </div>
                            <div>
                                <p class="text-gray-500">Date</p>
                                <p class="text-gray-700 font-medium"><?= $appoint['appointdate']; ?></p>
                            </div>
                            <div>
                                <p class="text-gray-500">Time</p>
                                <p class="text-gray-700 font-medium"><?= $appoint['appointslot']; ?></p>
                            </div>
                            <div>
                                <p class="text-gray-500">Status</p>
                                <span class="inline-block mt-1 px-3 py-1 rounded-full text-white text-xs font-semibold
                                <?php
                                echo $appoint['status'] == 'pending' ? 'bg-red-500' :
                                    ($appoint['status'] == 'approve' || $appoint['status'] == 'Completed' ? 'bg-yellow-500' : 'bg-red-500');
                                ?>">
                                    <?= ucfirst($appoint['status']); ?>
                                </span>
                            </div>
                            <div>
                                <p class="text-gray-500">Is Paid</p>
                                <span class="inline-block mt-1 px-3 py-1 rounded-full text-white text-xs font-semibold
                                <?php
                                echo ($appoint['ispaid'] == 'Paid' ? 'bg-red-500' : 'bg-green-500');
                                ?>">
                                    <?= ucfirst($appoint['ispaid']); ?>
                                </span>
                            </div>
                            <div>
                                <p class="text-gray-500">Payment ID</p>
                                <p class="text-gray-700 font-medium"><?= $appoint['payment_id'] ?: 'N.A.'; ?></p>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php else: ?>
            <p class="text-center text-gray-500 mt-10">😕 You have no appointments yet.</p>
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