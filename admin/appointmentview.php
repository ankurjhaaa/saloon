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
                <div class="mb-6">
                    <h1 class="text-2xl font-bold text-gray-800 mb-1">Appointment Details</h1>
                    <p class="text-gray-600">Here’s the full view of selected appointment.</p>
                </div>

                <?php
                if (isset($_GET['id']))
                    $id = $_GET['id'];

                $query = "SELECT * FROM appointments WHERE id = $id LIMIT 1";
                $result = mysqli_query($connect, $query);
                $data = mysqli_fetch_assoc($result);

                if (!$data) {
                    die("Appointment not found!");

                }



                $userId = $data['userid'];
                $userQuery = "SELECT name, email, phone FROM users WHERE id = $userId LIMIT 1";
                $userResult = mysqli_query($connect, $userQuery);


                if ($userdata = mysqli_fetch_assoc($userResult)) {
                    $username = $userdata['name'];
                    $useremail = $userdata['email'];
                    $userphone = $userdata['phone'];
                }










                ?>
                <?php if (isset($_GET['msg']) && $_GET['msg'] == 'completed') { ?>
                    <div class="bg-green-100 text-green-700 px-4 py-2 rounded mb-4">
                        Appointment marked as completed.
                    </div>
                <?php } ?>


                <!-- Appointment Full View Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 max-w-3xl mx-auto">
                    <div class="flex flex-col md:flex-row gap-6 items-start md:items-center mb-6">
                        <!-- Profile Image -->
                        <img src="https://i.pravatar.cc/100?img=5" alt="Client Photo"
                            class="w-24 h-24 rounded-full shadow-md">

                        <!-- Basic Info -->
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800"><?= $username; ?></h2>
                            <p class="text-sm text-gray-500"><?= $useremail; ?></p>
                            <p class="text-sm text-gray-500"><?= $userphone; ?></p>
                        </div>
                    </div>

                    <!-- Appointment Info Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
                        <div>
                            <p class="font-medium text-gray-600">Service</p>
                            <p><?= $data['appointservice'] ?></p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600">Date</p>
                            <p><?= $data['appointdate'] ?></p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600">Time</p>
                            <p><?= $data['appointslot'] ?></p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600">Status</p>
                            <p class="text-yellow-500 font-semibold"> <span
                                    class="<?php echo ($data['status'] == 'completed') ? 'text-green-600' : (($data['status'] == 'pending') ? 'text-yellow-600' : 'text-red-600'); ?>">
                                    <?php echo ucfirst($data['status']); ?>
                                </span></p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600">Notes</p>
                            <p><?= $data['notes'] ?></p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-6 flex gap-3">
                        <a href="mark_completed.php?id=<?php echo $data['id']; ?>"
                            onclick="return confirm('Are you sure you want to mark this appointment as completed?')"
                            class="px-4 py-2 bg-pink-600 text-white rounded-md text-sm hover:bg-pink-700">
                            Mark as Completed
                        </a>

                        <a href="index.php"
                            class="px-4 py-2 border border-gray-300 text-gray-600 rounded-md text-sm hover:bg-gray-100">Back
                            to List</a>
                    </div>
                </div>
            </main>

            <!-- marks as complete code -->
          






        </div>
    </div>





</body>

</html>