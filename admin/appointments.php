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




</head>

<body class="bg-white">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen bg-gray-100 flex flex-col">
        <?php include_once('includes/navbar.php') ?>
        <div class="flex flex-1">
            <?php include_once('includes/sidebar.php') ?>


            <main class="flex-1 p-6 md:ml-64 overflow-y-auto w-full min-h-screen bg-gray-50">
                <!-- Page Heading -->
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800">All Appointments</h1>
                    <p class="text-gray-600">View and manage all appointments here.</p>
                </div>
                <form action="" method="get">
                    <!-- Filters -->
                    <div
                        class="bg-white p-4 rounded-lg shadow mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                        <div>
                            <label class="text-sm text-gray-600 block mb-1">Date Range</label>
                            <input type="date" name="appointdate"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm"
                                value="<?php echo $_GET['appointdate'] ?? ''; ?> ">
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 block mb-1">Service</label>
                            <select name="services" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                                <option value="">All</option>
                                <?php foreach ($serviceOptions as $service): ?>
                                    <option value="<?= htmlspecialchars($service) ?>" <?= (isset($_GET['services']) && $_GET['services'] == $service) ? 'selected' : '' ?>>
                                        <?= ucfirst(htmlspecialchars($service)) ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 block mb-1">Status</label>
                            <select name="status" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                                <option value="">All</option>
                                <option value="pending" <?= ($_GET['status'] ?? '') == 'pending' ? 'selected' : '' ?>>
                                    Pending</option>
                                <option value="completed" <?= ($_GET['status'] ?? '') == 'completed' ? 'selected' : '' ?>>
                                    Completed</option>
                                <option value="cancelled" <?= ($_GET['status'] ?? '') == 'cancelled' ? 'selected' : '' ?>>
                                    Cancelled</option>
                            </select>
                        </div>
                        <div>
                            <label class="text-sm text-gray-600 block mb-1">Search</label>
                            <input type="text" name="search" placeholder="Search by name..."
                                value="<?php echo $_GET['search'] ?? ''; ?>"
                                class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                        </div>


                    </div>
                    <div class="flex justify-end mb-6">
                        <button type="submit"
                            class="bg-pink-600 text-white px-4 py-2 rounded hover:bg-pink-700 text-sm">
                            Apply Filters
                        </button>
                    </div>
                </form>

                <?php
                $condition = "WHERE 1=1";

                if (!empty($_GET['appointdate'])) {
                    $date = mysqli_real_escape_string($connect, $_GET['appointdate']);
                    $condition .= " AND appointdate = '$date'";
                }

                if (!empty($_GET['services'])) {
                    $service = mysqli_real_escape_string($connect, $_GET['services']);
                    $condition .= " AND appointservice = '$service'";
                }

                if (!empty($_GET['status'])) {
                    $status = mysqli_real_escape_string($connect, $_GET['status']);
                    $condition .= " AND status = '$status'";
                }

                if (!empty($_GET['search'])) {
                    $search = mysqli_real_escape_string($connect, $_GET['search']);
                    $condition .= " AND users.name LIKE '%$search%'";
                }

                $query = "
                         SELECT appointments.*, users.name as username
                         FROM appointments
                         JOIN users ON appointments.userid = users.id
                         $condition
                         ORDER BY appointments.id DESC
                     ";

                $result = mysqli_query($connect, $query);





                ?>
                <?php


                $query = "SELECT appointments.*, users.name AS username 
                FROM appointments 
                JOIN users ON appointments.userid = users.id";
                $result = mysqli_query($connect, $query)












                    ?>

                <!-- Appointments Table -->
                <div class="bg-white rounded-lg shadow overflow-x-auto">
                    <table class="min-w-full text-sm text-left text-gray-700">
                        <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-medium">
                            <tr>
                                <th class="px-6 py-3">Client</th>
                                <th class="px-6 py-3">Service</th>
                                <th class="px-6 py-3">Date</th>
                                <th class="px-6 py-3">Time</th>
                                <th class="px-6 py-3">Status</th>
                                <th class="px-6 py-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            <?php if (mysqli_num_rows($result) > 0) { ?>
                                <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                                    <tr class="hover:bg-gray-50">
                                        <td class="px-6 py-4 font-medium"><?= $row['username'] ?></td>
                                        <td class="px-6 py-4"><?= $row['appointservice'] ?></td>
                                        <td class="px-6 py-4"><?= date('d-m-Y', strtotime($row['appointdate'])) ?></td>
                                        <td class="px-6 py-4"><?= date('H:i A', strtotime($row['appointslot'])) ?></td>

                                        <?php
                                        $statusClass = ($row['status'] == 'completed') ? 'text-green-600' :
                                            (($row['status'] == 'cancelled') ? 'text-red-500' : 'text-yellow-500');
                                        ?>
                                        <td class="px-6 py-4 font-semibold <?= $statusClass ?>">
                                            <?= ucfirst($row['status']); ?>
                                        </td>

                                        <td class="px-6 py-4 text-center space-x-2">
                                            <a href="appointmentview.php?id=<?= $row['id']; ?>"
                                                class="text-sm px-3 py-1 bg-pink-100 text-pink-600 rounded-full hover:bg-pink-200">View</a>
                                            <?php if ($row['status'] != 'completed') { ?>
                                                <a href="mark_completed.php?id=<?= $row['id']; ?>"
                                                    onclick="return confirm('Mark this appointment as completed?')"
                                                    class="text-sm px-3 py-1 bg-green-100 text-green-700 rounded-full hover:bg-green-200">Complete</a>
                                            <?php } ?>

                                            <?php if ($row['status'] != 'cancelled') { ?>
                                                <a href="cancel_appointment.php?id=<?= $row['id']; ?>"
                                                    onclick="return confirm('Cancel this appointment?')"
                                                    class="text-sm px-3 py-1 bg-red-100 text-red-600 rounded-full hover:bg-red-200">Cancel</a>
                                            <?php } ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                            <?php } else { ?>
                                <tr>
                                    <td colspan="6" class="px-6 py-4 text-center text-gray-500">No appointments found.</td>
                                </tr>
                            <?php } ?>
                        </tbody>

                    </table>
                </div>
            </main>





        </div>
    </div>





</body>

</html>