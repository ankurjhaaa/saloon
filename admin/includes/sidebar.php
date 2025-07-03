<!-- Desktop Sidebar -->
<aside class="hidden md:flex flex-col w-64 bg-white border-r h-[calc(100vh-64px)] fixed top-16 left-0 overflow-y-auto">
    <div class="p-4 space-y-2">
        <h2 class="text-xl font-bold text-pink-600 mb-4">Admin Menu</h2>
        <ul class="space-y-2">
            <li><a href="index.php"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-100 text-gray-700">
                    📊 Dashboard</a></li>
            <li><a href="appointments.php"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-100 text-gray-700">
                    📅 Appointments</a></li>
            <li><a href="users.php"
                    class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-100 text-gray-700">
                    👤 Manage Users</a></li>
            <li><a href="services.php" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-100 text-gray-700">
                    ✂️ Services</a></li>
            <li><a href="#" class="flex items-center gap-3 px-4 py-2 rounded-lg hover:bg-pink-100 text-gray-700">
                    📈 Reports</a></li>
        </ul>
    </div>
</aside>

<!-- Mobile Sidebar -->
<div x-show="sidebarOpen" class="fixed inset-0 z-50 flex md:hidden" x-cloak>
    <div class="bg-white w-64 h-full p-4 shadow-lg relative overflow-y-auto">
        <!-- Close btn -->
        <button @click="sidebarOpen = false" class="absolute top-3 right-3 text-gray-500 hover:text-pink-500">
            ✖
        </button>
        <h2 class="text-xl font-bold text-pink-600 mb-4 mt-2">Admin Menu</h2>
        <ul class="space-y-2">
            <li><a href="index.php" class="block px-4 py-2 rounded hover:bg-pink-100 text-gray-700">📊 Dashboard</a>
            </li>
            <li><a href="#" class="block px-4 py-2 rounded hover:bg-pink-100 text-gray-700">📅
                    Appointments</a></li>
            <li><a href="#" class="block px-4 py-2 rounded hover:bg-pink-100 text-gray-700">👤 Manage
                    Users</a></li>
            <li><a href="#" class="block px-4 py-2 rounded hover:bg-pink-100 text-gray-700">✂️ Services</a>
            </li>
            <li><a href="#" class="block px-4 py-2 rounded hover:bg-pink-100 text-gray-700">📈 Reports</a>
            </li>
        </ul>
    </div>
    <!-- Backdrop -->
    <div @click="sidebarOpen = false" class="flex-1 bg-black bg-opacity-40"></div>
</div>