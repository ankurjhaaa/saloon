<?php include_once('config/db.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Glow & Shine - Salon</title>
    <script src="https://cdn.tailwindcss.com"></script>

</head>

<body class="bg-white">

    <?php include_once('includes/navbar.php') ?>
    <?php include_once('includes/banner.php') ?>
    <?php include_once('includes/service.php') ?>




    <section class="bg-white py-20 px-6 md:px-20">
        <div class="max-w-6xl mx-auto text-center mb-16">
            <h2 class="text-4xl font-bold text-gray-800 mb-4">Why Choose <span class="text-pink-500">Us?</span></h2>
            <p class="text-gray-600 text-sm md:text-base max-w-xl mx-auto">
                We're not just another salon — we're your beauty partner. Here's what sets us apart.
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4 text-center">

            <!-- Card 1 -->
            <div class="p-6 bg-pink-50 rounded-xl shadow hover:shadow-pink-200 transition">
                <div class="text-4xl text-pink-500 mb-4">🎯</div>
                <h3 class="font-semibold text-lg text-gray-800 mb-2">Expert Stylists</h3>
                <p class="text-sm text-gray-600">Our team is certified, trained & experienced to give you flawless
                    results.</p>
            </div>

            <!-- Card 2 -->
            <div class="p-6 bg-pink-50 rounded-xl shadow hover:shadow-pink-200 transition">
                <div class="text-4xl text-pink-500 mb-4">🧼</div>
                <h3 class="font-semibold text-lg text-gray-800 mb-2">Hygiene First</h3>
                <p class="text-sm text-gray-600">We maintain salon-grade cleanliness and use sanitized tools.</p>
            </div>

            <!-- Card 3 -->
            <div class="p-6 bg-pink-50 rounded-xl shadow hover:shadow-pink-200 transition">
                <div class="text-4xl text-pink-500 mb-4">💎</div>
                <h3 class="font-semibold text-lg text-gray-800 mb-2">Premium Products</h3>
                <p class="text-sm text-gray-600">Only branded, skin-safe and quality-tested products are used.</p>
            </div>

            <!-- Card 4 -->
            <div class="p-6 bg-pink-50 rounded-xl shadow hover:shadow-pink-200 transition">
                <div class="text-4xl text-pink-500 mb-4">⏰</div>
                <h3 class="font-semibold text-lg text-gray-800 mb-2">On-Time Appointments</h3>
                <p class="text-sm text-gray-600">Your time is valuable – we ensure minimum wait and efficient service.
                </p>
            </div>

        </div>
    </section>


    <?php include_once('includes/bottomreviue.php') ?>
    <?php include_once('includes/login.php') ?>

    


</body>

</html>