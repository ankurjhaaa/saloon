<!-- Navbar -->
<header class="bg-white shadow w-full z-40 fixed top-0 left-0 right-0">
    <div class="flex justify-between items-center px-4 py-3 md:px-6">
        <div class="flex items-center gap-4">
            <!-- Mobile toggle -->
            <button @click="sidebarOpen = !sidebarOpen" class="md:hidden text-gray-600">
                <svg class="h-6 w-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
            <!-- Brand -->
            <span class="text-lg font-bold text-pink-600"><a href="index.php">Glow & Shine Admin</a></span>
        </div>

        <!-- Logout -->
        <a href="../logout.php"
            class="bg-pink-600 hover:bg-pink-700 text-white text-sm font-semibold py-2 px-4 rounded-full transition">
            Logout
        </a>
    </div>
</header>
<!-- Spacer for fixed navbar -->
<div class="h-16 md:h-[64px]"></div>