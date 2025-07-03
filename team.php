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

    <section class="bg-gradient-to-r from-pink-50 to-white py-20 px-6 md:px-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Meet Our <span class="text-pink-500">Experts</span></h2>
            <p class="text-gray-600 text-sm md:text-base max-w-xl mx-auto">Our stylists are passionate, professional,
                and dedicated to bringing out the best in you.</p>
        </div>
        <div class="grid gap-10 sm:grid-cols-2 lg:grid-cols-4 max-w-6xl mx-auto">
            <div class="bg-white p-4 rounded-xl shadow text-center">
                <img src="https://i.pravatar.cc/150?img=10"
                    class="w-24 h-24 rounded-full mx-auto border-4 border-pink-300 mb-4">
                <h3 class="font-semibold text-gray-800 text-lg">Riya Kapoor</h3>
                <p class="text-pink-500 text-sm">Hair Specialist</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow text-center">
                <img src="https://i.pravatar.cc/150?img=20"
                    class="w-24 h-24 rounded-full mx-auto border-4 border-pink-300 mb-4">
                <h3 class="font-semibold text-gray-800 text-lg">Meera Joshi</h3>
                <p class="text-pink-500 text-sm">Bridal Makeup Artist</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow text-center">
                <img src="https://i.pravatar.cc/150?img=30"
                    class="w-24 h-24 rounded-full mx-auto border-4 border-pink-300 mb-4">
                <h3 class="font-semibold text-gray-800 text-lg">Priya Nair</h3>
                <p class="text-pink-500 text-sm">Skin Expert</p>
            </div>
            <div class="bg-white p-4 rounded-xl shadow text-center">
                <img src="https://i.pravatar.cc/150?img=40"
                    class="w-24 h-24 rounded-full mx-auto border-4 border-pink-300 mb-4">
                <h3 class="font-semibold text-gray-800 text-lg">Ankita Rao</h3>
                <p class="text-pink-500 text-sm">Spa Therapist</p>
            </div>
        </div>
    </section>




</body>

</html>