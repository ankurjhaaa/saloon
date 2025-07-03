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

                <!-- Filters -->
                <div class="bg-white p-4 rounded-lg shadow mb-6 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Date Range</label>
                        <input type="date" class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                    </div>
                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Service</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                            <option>All</option>
                            <option>Haircut</option>
                            <option>Facial</option>
                            <option>Spa</option>
                            <option>Makeup</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Status</label>
                        <select class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                            <option>All</option>
                            <option>Pending</option>
                            <option>Completed</option>
                            <option>Cancelled</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-sm text-gray-600 block mb-1">Search</label>
                        <input type="text" placeholder="Search by name..."
                            class="w-full border border-gray-300 rounded-md px-3 py-2 text-sm">
                    </div>
                </div>

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
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium">Riya Mehta</td>
                                <td class="px-6 py-4">Haircut</td>
                                <td class="px-6 py-4">2025-07-05</td>
                                <td class="px-6 py-4">10:30 AM</td>
                                <td class="px-6 py-4 text-yellow-500 font-semibold">Pending</td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <button
                                        class="text-sm px-3 py-1 bg-pink-100 text-pink-600 rounded-full hover:bg-pink-200">View</button>
                                    <button
                                        class="text-sm px-3 py-1 bg-red-100 text-red-600 rounded-full hover:bg-red-200">Cancel</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium">Anjali Verma</td>
                                <td class="px-6 py-4">Facial</td>
                                <td class="px-6 py-4">2025-07-06</td>
                                <td class="px-6 py-4">2:00 PM</td>
                                <td class="px-6 py-4 text-green-600 font-semibold">Completed</td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <button
                                        class="text-sm px-3 py-1 bg-pink-100 text-pink-600 rounded-full hover:bg-pink-200">View</button>
                                    <button
                                        class="text-sm px-3 py-1 bg-red-100 text-red-600 rounded-full hover:bg-red-200">Cancel</button>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50">
                                <td class="px-6 py-4 font-medium">Sneha Roy</td>
                                <td class="px-6 py-4">Spa</td>
                                <td class="px-6 py-4">2025-07-07</td>
                                <td class="px-6 py-4">12:15 PM</td>
                                <td class="px-6 py-4 text-red-500 font-semibold">Cancelled</td>
                                <td class="px-6 py-4 text-center space-x-2">
                                    <button
                                        class="text-sm px-3 py-1 bg-pink-100 text-pink-600 rounded-full hover:bg-pink-200">View</button>
                                    <button
                                        class="text-sm px-3 py-1 bg-red-100 text-red-600 rounded-full hover:bg-red-200">Cancel</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </main>





        </div>
    </div>





</body>

</html>