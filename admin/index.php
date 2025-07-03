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
                                <p class="text-2xl font-bold text-gray-800 mt-1">238</p>
                            </div>
                            <div class="text-pink-500">
                                <i class="fas fa-calendar-check text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl shadow border-l-4 border-green-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-sm text-gray-500 font-medium">New Clients</h2>
                                <p class="text-2xl font-bold text-gray-800 mt-1">57</p>
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
                                <p class="text-2xl font-bold text-gray-800 mt-1">112</p>
                            </div>
                            <div class="text-purple-500">
                                <i class="fas fa-spa text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-5 rounded-xl shadow border-l-4 border-yellow-500">
                        <div class="flex items-center justify-between">
                            <div>
                                <h2 class="text-sm text-gray-500 font-medium">Monthly Revenue</h2>
                                <p class="text-2xl font-bold text-gray-800 mt-1">₹86,400</p>
                            </div>
                            <div class="text-yellow-500">
                                <i class="fas fa-rupee-sign text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Appointments Table with Action Buttons -->
                <div class="bg-white rounded-xl shadow p-6">
                    <div class="flex items-center justify-between mb-4">
                        <h2 class="text-lg font-semibold text-gray-800">Recent Appointments</h2>
                        <a href="#" class="text-sm text-pink-600 hover:underline font-medium">View All</a>
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
                                <tr class="hover:bg-pink-50 transition">
                                    <td class="px-4 py-3 font-medium">Anjali Sharma</td>
                                    <td class="px-4 py-3">Hair Spa</td>
                                    <td class="px-4 py-3">2025-07-05</td>
                                    <td class="px-4 py-3">11:00 AM</td>
                                    <td class="px-4 py-3 text-green-600 font-medium">Completed</td>
                                    <td class="px-4 py-3 text-center">
                                        <div class="flex justify-center space-x-2">
                                            <a href="#"
                                                class="bg-pink-100 text-pink-600 px-3 py-1 rounded-full text-xs hover:bg-pink-200">View</a>
                                            <a href="#"
                                                class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs hover:bg-yellow-200">Edit</a>
                                            <a href="#"
                                                class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs hover:bg-red-200">Cancel</a>
                                        </div>
                                    </td>
                                </tr>
                                <!-- More rows like this -->
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- Revenue Chart (Static Dummy Block) -->
                <div class="bg-white p-6 rounded-xl shadow mb-8 mt-8">
                    <h2 class="text-lg font-semibold text-gray-800 mb-4">Revenue Overview</h2>
                    <div
                        class="w-full h-40 bg-pink-100 rounded-lg flex items-center justify-center text-pink-500 font-medium">
                        [ Chart Placeholder — add Chart.js here later ]
                    </div>
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





</body>

</html>