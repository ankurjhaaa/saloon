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
  <!-- Page Header -->
  <div class="mb-6">
    <h1 class="text-2xl font-bold text-gray-800">Manage Users</h1>
    <p class="text-gray-600">View, edit or block registered users.</p>
  </div>

  <!-- Filters and Search -->
  <div class="bg-white p-4 rounded-lg shadow mb-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
    <div class="flex-1">
      <input type="text" placeholder="Search by name or email..." class="w-full border border-gray-300 rounded-md px-4 py-2 text-sm">
    </div>
    <div>
      <select class="border border-gray-300 rounded-md px-4 py-2 text-sm">
        <option>Status: All</option>
        <option>Active</option>
        <option>Blocked</option>
      </select>
    </div>
  </div>

  <!-- Users Table -->
  <div class="bg-white rounded-lg shadow overflow-x-auto">
    <table class="min-w-full text-sm text-left text-gray-700">
      <thead class="bg-gray-100 text-gray-600 uppercase text-xs font-medium">
        <tr>
          <th class="px-6 py-3">User</th>
          <th class="px-6 py-3">Email</th>
          <th class="px-6 py-3">Phone</th>
          <th class="px-6 py-3">Status</th>
          <th class="px-6 py-3 text-center">Actions</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-200">
        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4 flex items-center gap-3">
            <img src="https://i.pravatar.cc/40?img=12" alt="User" class="w-10 h-10 rounded-full">
            <span class="font-medium text-gray-800">Riya Mehta</span>
          </td>
          <td class="px-6 py-4">riya@example.com</td>
          <td class="px-6 py-4">+91 9876543210</td>
          <td class="px-6 py-4 text-green-600 font-semibold">Active</td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs hover:bg-blue-200">View</button>
            <button class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs hover:bg-yellow-200">Edit</button>
            <button class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs hover:bg-red-200">Block</button>
          </td>
        </tr>

        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4 flex items-center gap-3">
            <img src="https://i.pravatar.cc/40?img=9" alt="User" class="w-10 h-10 rounded-full">
            <span class="font-medium text-gray-800">Amit Khanna</span>
          </td>
          <td class="px-6 py-4">amit@example.com</td>
          <td class="px-6 py-4">+91 9888123456</td>
          <td class="px-6 py-4 text-red-500 font-semibold">Blocked</td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs hover:bg-blue-200">View</button>
            <button class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs hover:bg-yellow-200">Edit</button>
            <button class="bg-green-100 text-green-600 px-3 py-1 rounded-full text-xs hover:bg-green-200">Unblock</button>
          </td>
        </tr>

        <tr class="hover:bg-gray-50">
          <td class="px-6 py-4 flex items-center gap-3">
            <img src="https://i.pravatar.cc/40?img=7" alt="User" class="w-10 h-10 rounded-full">
            <span class="font-medium text-gray-800">Pooja Sinha</span>
          </td>
          <td class="px-6 py-4">pooja@example.com</td>
          <td class="px-6 py-4">+91 9822222233</td>
          <td class="px-6 py-4 text-green-600 font-semibold">Active</td>
          <td class="px-6 py-4 text-center space-x-2">
            <button class="bg-blue-100 text-blue-600 px-3 py-1 rounded-full text-xs hover:bg-blue-200">View</button>
            <button class="bg-yellow-100 text-yellow-700 px-3 py-1 rounded-full text-xs hover:bg-yellow-200">Edit</button>
            <button class="bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs hover:bg-red-200">Block</button>
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