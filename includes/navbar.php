<!-- --------------------------- loder wirl Here ---------------- -->
<div id="loaderOverlay" class="fixed inset-0 bg-black/30 bg-opacity-40 hidden items-center justify-center z-50">
    <div class="loader border-4 border-white border-t-[#9b714a] rounded-full w-12 h-12 animate-spin"></div>
</div>
<script>
    function showLoader() {
        const overlay = document.getElementById('loaderOverlay');
        overlay.classList.remove('hidden');
        overlay.classList.add('flex');
    }
</script>
<!-- Overlay -->
<div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden" onclick="toggleSidebar()"></div>

<!-- Sidebar -->
<div id="sidebar"
    class="fixed top-0 left-0 h-full w-72 bg-white shadow-xl z-50 transform -translate-x-full transition-transform duration-300 ease-in-out  overflow-y-auto">

    <!-- Sidebar Header -->
    <div class="bg-white/80 px-6 py-4 text-white rounded-tr-xl">
        <h2 class="text-2xl font-semibold">Glow & Shine</h2>
    </div>

    <!-- User Profile -->
    <div class="px-6 py-4 border-b border-pink-100">
        <div class="flex items-center space-x-4">
            <img src="https://i.pravatar.cc/50" class="w-12 h-12 rounded-full shadow-lg" alt="user">
            <div>
                <p class="text-base font-semibold text-gray-800">Hi, Anjali</p>
                <p class="text-sm text-pink-600">Premium Member</p>
            </div>
        </div>
    </div>

    <!-- Sidebar Links -->
    <div class="p-6">
        <ul class="space-y-4">
            <li>
                <a href="#" class="flex items-center text-gray-700 bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M3 12l2-2 7-7 7 7M13 5v6h6" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M5 13l4 4L19 7" />
                    </svg>
                    My Appointments
                </a>
            </li>
            <li>
                <a href="#services"
                    class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M8 7V3m8 4V3m-9 4h10M5 11h14" />
                    </svg>
                    Services
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M17 16l4-4m0 0l-4-4m4 4H7" />
                    </svg>
                    Logout
                </a>
            </li>
        </ul>
    </div>
</div>

<!-- Navbar -->
<nav class="bg-white/80 shadow-sm fixed w-full top-0 z-50">
    <div class="max-w-7xl mx-auto px-4">
        <div class="flex justify-between items-center h-16">

            <!-- Left: Logo -->
            <div class="text-2xl font-bold text-pink-600"><a href="index.php">Glow & Shine</a></div>

            <!-- Center: Nav Links (Desktop) -->
            <div class="hidden md:flex space-x-8 text-[15px] font-medium">
                <a href="index.php"
                    class="text-gray-700 hover:text-pink-600 border-b-2 border-transparent hover:border-pink-500 transition">Home</a>
                <a href="#services"
                    class="text-gray-700 hover:text-pink-600 border-b-2 border-transparent hover:border-pink-500 transition">Services</a>
                <a href="#"
                    class="text-gray-700 hover:text-pink-600 border-b-2 border-transparent hover:border-pink-500 transition">Stylists</a>
                <a href="#"
                    class="text-gray-700 hover:text-pink-600 border-b-2 border-transparent hover:border-pink-500 transition">Offers</a>
                <a href="contact.php"
                    class="text-gray-700 hover:text-pink-600 border-b-2 border-transparent hover:border-pink-500 transition">Contact</a>
                <?php if (!isset($_SESSION['email'])) { ?>
                    <a href="#login"
                        class="text-gray-700 hover:text-pink-600 border-b-2 border-transparent hover:border-pink-500 transition">Login</a>
                <?php } else { ?>
                    <a href="logout.php"
                        class="text-gray-700 hover:text-pink-600 border-b-2 border-transparent hover:border-pink-500 transition">Logout</a>
                <?php } ?>
            </div>

            <!-- Right: Book Now / Hamburger -->
            <div class="flex items-center space-x-3">
                <a href="booking.php?date=<?= date('d-m-Y'); ?>"
                    class="hidden md:inline-block bg-pink-600 text-white px-5 py-2 rounded-full text-sm font-medium hover:bg-pink-700 transition">
                    Book Appointment
                </a>
                <button onclick="toggleSidebar()" class="md:hidden text-pink-600 focus:outline-none">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
            </div>
        </div>
    </div>
</nav>


<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('overlay');
        sidebar.classList.toggle('-translate-x-full');
        overlay.classList.toggle('hidden');
    }
</script>