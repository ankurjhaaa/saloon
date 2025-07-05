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
            <?php if (isset($_SESSION['email'])): ?>
                <?php
                $name = $USERDETAIL['name'] ?? 'U';
                $initial = strtoupper(substr($name, 0, 1));
                ?>
                <div
                    class="w-12 h-12 rounded-full shadow-lg bg-pink-600 text-white flex items-center justify-center text-lg font-semibold">
                    <?= $initial ?>
                </div>
            <?php else: ?>
                <img src="https://cdn-icons-png.flaticon.com/512/847/847969.png" alt="Guest"
                    class="w-12 h-12 rounded-full shadow-lg" />
            <?php endif; ?>

            <div>
                <?php if (isset($_SESSION['email'])) { ?>
                    <p class="text-base font-semibold text-gray-800">Hi, <?= $USERDETAIL['name'] ?></p>
                    <p class="text-sm text-pink-600">Premium Member</p>

                <?php } else { ?>
                    <p class="text-base font-semibold text-gray-800">Hi, User</p>
                    <p class="text-sm text-pink-600">Login Required</p>

                <?php } ?>
            </div>
        </div>
    </div>

    <!-- Sidebar Links -->
    <div class="p-6">
        <ul class="space-y-4">
            <li>
                <a href="index.php" class="flex items-center text-gray-700 bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path d="M3 12l2-2 7-7 7 7M13 5v6h6" />
                    </svg>
                    Dashboard
                </a>
            </li>
            <li>
                <a href="booking.php?date=<?= date('d-m-Y'); ?>"
                    class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M8 2v2m8-2v2m-9 4h10M5 8h14a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V10a2 2 0 0 1 2-2zm9 6l2 2 4-4" />
                    </svg>

                    Book Appointments
                </a>
            </li>
            <li>
                <a href="myappointments.php"
                    class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 2h6a2 2 0 0 1 2 2v1H7V4a2 2 0 0 1 2-2zm-2 5h10a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2zm2 4h6m-6 4h6" />
                    </svg>

                    My Appointments
                </a>
            </li>
            <li>
                <a href="index.php#services"
                    class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M14.121 14.121L4.5 4.5m0 0a2.121 2.121 0 1 1 3 3L7 7l5.121 5.121M4.5 4.5L14.121 14.12M19.5 4.5a2.121 2.121 0 1 0-3 3l1.5 1.5-5.121 5.121" />
                    </svg>

                    Services
                </a>
            </li>
            <li>
                <a href="contact.php"
                    class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M3 5a2 2 0 0 1 2-2h1.6a1 1 0 0 1 .95.68l1.1 3.3a1 1 0 0 1-.23.97L6.6 10.6a16 16 0 0 0 6.8 6.8l2.65-2.82a1 1 0 0 1 .97-.23l3.3 1.1a1 1 0 0 1 .68.95V19a2 2 0 0 1-2 2h-1C9.6 21 3 14.4 3 6V5z" />
                    </svg>

                    Contact
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                    <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="1.8"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <rect x="3" y="4" width="18" height="16" rx="2" ry="2" />
                        <circle cx="8" cy="10" r="2" />
                        <path d="M21 20l-6-6-4 4-7-7" />
                    </svg>

                    Galarry
                </a>
            </li>
            <li>
                <?php if (isset($_SESSION['email'])) { ?>
                    <a href="logout.php"
                        class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                        <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 16l-4-4m0 0l4-4m-4 4h13" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20V4a2 2 0 00-2-2H9" />
                        </svg>

                        Logout
                    </a>

                <?php } else { ?>
                    <a href="index.php#login"
                        class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                        <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M15 3h4a2 2 0 012 2v14a2 2 0 01-2 2h-4" />
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 17l5-5m0 0l-5-5m5 5H3" />
                        </svg>

                        Login
                    </a>
                <?php } ?>

            </li>
            <li>
                <?php if (!isset($_SESSION['email'])) { ?>
                    <a href="signup.php"
                        class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                        <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="1.8"
                            viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M18 9v6m3-3h-6M5.121 17.804A9 9 0 1119.07 6.93M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                        </svg>


                        Signup
                    </a>

                <?php } ?>
            </li>
            <li>
                <?php if (isset($_SESSION['email'])) { ?>
                    <?php if ($USERDETAIL['isadmin'] == 1) { ?>

                        <a href="admin/index.php"
                            class="flex items-center text-gray-700 hover:bg-pink-50 px-4 py-3 rounded-lg transition">
                            <svg class="w-5 h-5 text-pink-600 mr-3" fill="none" stroke="currentColor" stroke-width="1.8"
                                viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M18 9v6m3-3h-6M5.121 17.804A9 9 0 1119.07 6.93M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Admin Login
                        </a>

                    <?php } ?>

                <?php } ?>
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
                    <a href="index.php#login"
                        class="text-gray-700 hover:text-pink-600 border-b-2 border-transparent hover:border-pink-500 transition">Login</a>
                <?php } else { ?>
                    <details class="relative">
                        <summary
                            class="cursor-pointer text-gray-700 hover:text-pink-600 border-b-2 border-transparent hover:border-pink-500 transition list-none">
                            Hi, <?= $USERDETAIL['name'] ?>
                        </summary>
                        <div class="absolute left-0 mt-5 w-48 bg-white/80 border border-gray-200 rounded-sm shadow-lg z-50">
                            <a href="#profile" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Profile</a>
                            <a href="myappointments.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">My
                                Appointment</a>
                            <a href="#settings" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">Settings</a>
                            <hr class="my-1">
                            <?php if ($USERDETAIL['isadmin'] == 1) { ?>
                                <a href="admin/index.php" class="block px-4 py-2 text-gray-700 hover:bg-gray-100">
                                    Admin Login</a>
                            <?php } ?>
                            <a href="logout.php"
                                class="block px-4 py-2 text-red-600 hover:bg-gray-100 font-semibold">Logout</a>
                        </div>
                    </details>

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