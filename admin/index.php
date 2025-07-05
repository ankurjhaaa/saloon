<?php include_once('../config/db.php') ?>
<?php include_once('includes/adminaccess.php') ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Glow & Shine - Salon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- AlpineJS -->
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>




</head>

<body class="bg-white">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-gray-100 flex flex-col">
        <?php include_once('includes/navbar.php') ?>
        <div class="flex flex-1">
            <?php include_once('includes/sidebar.php') ?>


            <main class="flex-1 p-6 md:ml-64 overflow-y-auto w-full min-h-screen bg-gray-50">

                <!-- Page Heading -->
                <div class="mb-8">
                    <h1 class="text-3xl font-bold text-gray-800">Welcome Admin</h1>
                    <p class="text-gray-600">Here’s your salon dashboard overview.</p>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white p-5 rounded-xl shadow border-l-4 border-pink-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-sm text-gray-500 font-medium">Total Appointments</h2>
                                <p class="text-2xl font-bold text-gray-800 mt-1"><?= $totalAppointments ?></p>
                            </div>
                            <div class="text-pink-500">
                                <i class="fas fa-calendar-check text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-sm text-gray-500 font-medium">Total users</h2>
                                <p class="text-2xl font-bold text-gray-800 mt-1"><?= $totalUser ?></p>
                            </div>
                            <div class="text-green-500">
                                <i class="fas fa-user-plus text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl shadow border-l-4 border-purple-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-sm text-gray-500 font-medium">Services This Week</h2>
                                <p class="text-2xl font-bold text-gray-800 mt-1"><?= $serviceThisWeek ?></p>
                            </div>
                            <div class="text-purple-500">
                                <i class="fas fa-spa text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl shadow border-l-4 border-yellow-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-sm text-gray-500 font-medium">This Month Revenue</h2>
                                <?php
                                // Get date 1 month ago from today
                                $oneMonthAgo = date('Y-m-d', strtotime('-1 month'));
                                // Query to sum all amount entries in the last 1 month
                                $query = $connect->query("SELECT SUM(amount) AS total_amount FROM revenue WHERE created_at >= '$oneMonthAgo'");
                                $result = $query->fetch_assoc();
                                // If no result, default to 0
                                $totalRevenue = $result['total_amount'] ?? 0;
                                // Show total                                ?>

                                <p class="text-2xl font-bold text-gray-800 mt-1">₹<?= $totalRevenue ?></p>
                            </div>
                            <div class="text-yellow-500">
                                <i class="fas fa-rupee-sign text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <?php

                $query = "SELECT appointments.*, users.name AS username 
          FROM appointments 
          JOIN users ON appointments.userid = users.id";
                $result = mysqli_query($connect, $query)

                    ?>
                <?php if (isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
                    <div id="successAlert"
                        class="max-w-md mx-auto mt-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative transition-opacity duration-500 ease-in-out">
                        Appointment deleted successfully.
                        <button onclick="closeAlert()" class="absolute top-1 right-2 text-green-700">
                            &times;
                        </button>
                    </div>

                    <script>
                        // Automatically hide after 3 seconds
                        setTimeout(() => {
                            const alertBox = document.getElementById("successAlert");
                            if (alertBox) {
                                alertBox.classList.add("opacity-0");
                                setTimeout(() => alertBox.remove(), 500); // Remove after fade
                            }
                        }, 3000);

                        // Manual close option
                        function closeAlert() {
                            const alertBox = document.getElementById("successAlert");
                            alertBox.classList.add("opacity-0");
                            setTimeout(() => alertBox.remove(), 500);
                        }
                    </script>
                <?php endif; ?>


                <!-- Appointments Table with Action Buttons -->
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">Recent Appointments</h2>
                        <a href="appointments.php" class="text-sm text-pink-600 hover:underline font-medium">View
                            All</a>
                    </div>
                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 text-sm text-left">
                            <thead class="bg-gray-100 text-gray-600 font-semibold">

                                <tr>
                                    <th class="px-4 py-3">Client</th>
                                    <th class="px-4 py-3">Service</th>
                                    <th class="px-4 py-3">Date</th>
                                    <th class="px-4 py-3">Time</th>
                                    <th class="px-4 py-3">Status</th>
                                    <th class="px-4 py-3 text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y text-gray-700">
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr class="hover:bg-pink-50 transition">

                                        <td class="px-4 py-3 font-medium"><?= ($row['username']); ?></td>
                                        <td class="px-4 py-3"><?= ($row['appointservice']); ?></td>
                                        <td class="px-4 py-3"><?= ($row['appointdate']); ?></td>
                                        <td class="px-4 py-3"><?= ($row['appointslot']); ?></td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="flex justify-center space-x-2">
                                                <?php if ($row['status'] == 'approve') { ?>
                                                    <a href="mark_completed.php?id=<?php echo $row['id']; ?>"
                                                        onclick="return confirm('Mark this appointment as completed?')"
                                                        class="bg-green-100 text-green-700 px-3 py-1 rounded-full text-xs hover:bg-green-200">
                                                        Complete
                                                    </a>
                                                <?php } elseif ($row['status'] == 'cancelled') { ?>
                                                    <a
                                                        class="bg-red-100 text-red-600 px-3 py-1 rounded-md text-xs hover:bg-red-200">
                                                        Cancellled
                                                    </a>
                                                <?php } elseif ($row['status'] == 'pending') { ?>
                                                    <a href="mark_approve.php?id=<?php echo $row['id']; ?>"
                                                        onclick="return confirm('Mark this appointment as Approve?')"
                                                        class="bg-yellow-100 text-red-700 px-3 py-1 rounded-full text-xs hover:bg-yellow-200">
                                                        Approve
                                                    </a>
                                                <?php } ?>

                                                <?php if ($row['status'] != 'cancelled') { ?>
                                                    <a href="cancel_appointment.php?id=<?php echo $row['id']; ?>"
                                                        onclick="return confirm('Cancel this appointment?')"
                                                        class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs hover:bg-red-200">
                                                        Cancel
                                                    </a>
                                                <?php } ?>
                                            </div>
                                        </td>



                                        <td class="px-4 py-3 text-center">
                                            <div class="flex justify-center space-x-2">
                                                <a href="appointmentview.php?id=<?= $row['id']; ?>"
                                                    class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full text-xs hover:bg-pink-200">View</a>

                                                <a href="?id=<?= $row['id']; ?>"
                                                    onclick="return confirm('Are you sure you want to permanently delete this appointment?')"
                                                    class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs hover:bg-red-200">
                                                    Delete
                                                </a>

                                            </div>
                                        </td>
                                    </tr>
                                <?php } ?>


                                <!-- More rows like this -->
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- delete appointment code -->
                <?php
                if (isset($_GET['id'])) {
                    $id = $_GET['id'];

                    $query = "DELETE FROM appointments WHERE id=$id";
                    $result = mysqli_query($connect, $query);
                    if ($result) {
                        echo "<script>window.location.href ='index.php?msg=deleted'</script>";
                    } else {
                        echo "Error deleting appointment.";
                    }
                }
                ?>

                <!-- Revenue Chart (Static Dummy Block) -->
                <div class="bg-white p-6 rounded-xl shadow mb-8 mt-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Revenue Overview</h2>
                    <canvas id="revenueChart" class="w-full h-60"></canvas>
                </div>


                <!-- Activity Timeline -->
                <div class="bg-white p-6 rounded-xl shadow mb-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Today’s Activity</h2>
                    <ol class="relative border-l border-gray-300">
                        <li class="mb-6 ml-4">
                            <div class="absolute w-3 h-3 bg-pink-500 rounded-full -left-1.5 top-1.5"></div>
                            <p class="text-sm text-gray-600">10:00 AM - <span class="text-gray-800 font-medium">Ritika
                                    booked Hair Spa</span></p>
                        </li>
                        <li class="mb-6 ml-4">
                            <div class="absolute w-3 h-3 bg-green-500 rounded-full -left-1.5 top-1.5"></div>
                            <p class="text-sm text-gray-600">12:30 PM - <span class="text-gray-800 font-medium">Sneha
                                    completed Facial</span></p>
                        </li>
                        <li class="ml-4">
                            <div class="absolute w-3 h-3 bg-yellow-500 rounded-full -left-1.5 top-1.5"></div>
                            <p class="text-sm text-gray-600">2:00 PM - <span class="text-gray-800 font-medium">Meena
                                    rescheduled Makeup</span></p>
                        </li>
                    </ol>
                </div>
            </main>

        </div>
    </div>


    <?php
    // Set timezone
    date_default_timezone_set('Asia/Kolkata');

    // === 🟢 Current Month ===
    $currentMonth = date('M'); // e.g. "Jul"
    $currentMonthStart = date('Y-m-01');
    $currentMonthEnd = date('Y-m-t');

    $queryCurrent = $connect->query("SELECT SUM(amount) AS total FROM revenue WHERE DATE(created_at) BETWEEN '$currentMonthStart' AND '$currentMonthEnd'");
    $currentTotal = $queryCurrent->fetch_assoc()['total'] ?? 0;

    // === 🟡 1 Month Ago ===
    $month1 = date('M', strtotime('-1 month'));
    $start1 = date('Y-m-01', strtotime('-1 month'));
    $end1 = date('Y-m-t', strtotime('-1 month'));
    $q1 = $connect->query("SELECT SUM(amount) AS total FROM revenue WHERE DATE(created_at) BETWEEN '$start1' AND '$end1'");
    $total1 = $q1->fetch_assoc()['total'] ?? 0;

    // === 🟠 2 Months Ago ===
    $month2 = date('M', strtotime('-2 month'));
    $start2 = date('Y-m-01', strtotime('-2 month'));
    $end2 = date('Y-m-t', strtotime('-2 month'));
    $q2 = $connect->query("SELECT SUM(amount) AS total FROM revenue WHERE DATE(created_at) BETWEEN '$start2' AND '$end2'");
    $total2 = $q2->fetch_assoc()['total'] ?? 0;

    // === 🔵 3 Months Ago ===
    $month3 = date('M', strtotime('-3 month'));
    $start3 = date('Y-m-01', strtotime('-3 month'));
    $end3 = date('Y-m-t', strtotime('-3 month'));
    $q3 = $connect->query("SELECT SUM(amount) AS total FROM revenue WHERE DATE(created_at) BETWEEN '$start3' AND '$end3'");
    $total3 = $q3->fetch_assoc()['total'] ?? 0;

    // === 🔴 4 Months Ago ===
    $month4 = date('M', strtotime('-4 month'));
    $start4 = date('Y-m-01', strtotime('-4 month'));
    $end4 = date('Y-m-t', strtotime('-4 month'));
    $q4 = $connect->query("SELECT SUM(amount) AS total FROM revenue WHERE DATE(created_at) BETWEEN '$start4' AND '$end4'");
    $total4 = $q4->fetch_assoc()['total'] ?? 0;

    // === 🟤 5 Months Ago ===
    $month5 = date('M', strtotime('-5 month'));
    $start5 = date('Y-m-01', strtotime('-5 month'));
    $end5 = date('Y-m-t', strtotime('-5 month'));
    $q5 = $connect->query("SELECT SUM(amount) AS total FROM revenue WHERE DATE(created_at) BETWEEN '$start5' AND '$end5'");
    $total5 = $q5->fetch_assoc()['total'] ?? 0;

    ?>
    <script>
        const ctx = document.getElementById('revenueChart').getContext('2d');
        const revenueChart = new Chart(ctx, {
            type: 'line', // you can also use 'bar'
            data: {
                labels: ['<?= $month5 ?>', '<?= $month4 ?>', '<?= $month3 ?>', '<?= $month2 ?>', '<?= $month1 ?>', '<?= $currentMonth ?>'], // months
                datasets: [{
                    label: 'Revenue (₹)',
                    data: [<?= $total5 ?>, <?= $total4 ?>, <?= $total3 ?>, <?= $total2 ?>, <?= $total1 ?>, <?= $currentTotal ?>], // dummy values
                    backgroundColor: 'rgba(236, 72, 153, 0.2)',
                    borderColor: 'rgba(236, 72, 153, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointBackgroundColor: '#ec4899'
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        labels: {
                            color: '#374151',
                            font: {
                                weight: 'bold'
                            }
                        }
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#6b7280'
                        }
                    },
                    x: {
                        ticks: {
                            color: '#6b7280'
                        }
                    }
                }
            }
        });
    </script>


</body>

</html>