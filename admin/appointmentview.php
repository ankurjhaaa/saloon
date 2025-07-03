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

                <!-- Appointment Full View Card -->
                <div class="bg-white rounded-xl shadow-lg p-6 md:p-8 max-w-3xl mx-auto">
                    <div class="flex flex-col md:flex-row gap-6 items-start md:items-center mb-6">
                        <!-- Profile Image -->
                        <img src="https://i.pravatar.cc/100?img=5" alt="Client Photo"
                            class="w-24 h-24 rounded-full shadow-md">

                        <!-- Basic Info -->
                        <div>
                            <h2 class="text-xl font-semibold text-gray-800">Riya Mehta</h2>
                            <p class="text-sm text-gray-500">riya@example.com</p>
                            <p class="text-sm text-gray-500">+91 9876543210</p>
                        </div>
                    </div>

                    <!-- Appointment Info Grid -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 text-sm text-gray-700">
                        <div>
                            <p class="font-medium text-gray-600">Service</p>
                            <p>Haircut & Blowdry</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600">Date</p>
                            <p>2025-07-06</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600">Time</p>
                            <p>12:30 PM</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600">Status</p>
                            <p class="text-yellow-500 font-semibold">Pending</p>
                        </div>
                        <div>
                            <p class="font-medium text-gray-600">Notes</p>
                            <p>Client requested a new stylist.</p>
                        </div>
                    </div>

                    <!-- Actions -->
                    <div class="mt-6 flex gap-3">
                        <a href="#" class="px-4 py-2 bg-pink-600 text-white rounded-md text-sm hover:bg-pink-700">Mark
                            as Completed</a>
                        <a href="#"
                            class="px-4 py-2 bg-red-100 text-red-600 rounded-md text-sm hover:bg-red-200">Cancel</a>
                        <a href="#"
                            class="px-4 py-2 border border-gray-300 text-gray-600 rounded-md text-sm hover:bg-gray-100">Back
                            to List</a>
                    </div>
                </div>
            </main>






        </div>
    </div>





</body>

</html>