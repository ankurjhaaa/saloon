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

    <section class="bg-white py-20 px-6 md:px-20">
        <div class="text-center mb-12">
            <h2 class="text-4xl font-bold text-gray-800 mb-3">Our <span class="text-pink-500">Gallery</span></h2>
            <p class="text-gray-600 text-sm md:text-base max-w-xl mx-auto">
                A glimpse of the looks we’ve created and the smiles we’ve received!
            </p>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 gap-4 max-w-6xl mx-auto">
            <img src="https://picsum.photos/400/400?random=101" class="rounded-xl hover:scale-105 transition"
                alt="Gallery Image 1" />
            <img src="https://picsum.photos/400/400?random=102" class="rounded-xl hover:scale-105 transition"
                alt="Gallery Image 2" />
            <img src="https://picsum.photos/400/400?random=103" class="rounded-xl hover:scale-105 transition"
                alt="Gallery Image 3" />
            <img src="https://picsum.photos/400/400?random=104" class="rounded-xl hover:scale-105 transition"
                alt="Gallery Image 4" />
            <img src="https://picsum.photos/400/400?random=105" class="rounded-xl hover:scale-105 transition"
                alt="Gallery Image 5" />
            <img src="https://picsum.photos/400/400?random=106" class="rounded-xl hover:scale-105 transition"
                alt="Gallery Image 6" />
            <img src="https://picsum.photos/400/400?random=107" class="rounded-xl hover:scale-105 transition"
                alt="Gallery Image 7" />
            <img src="https://picsum.photos/400/400?random=108" class="rounded-xl hover:scale-105 transition"
                alt="Gallery Image 8" />
        </div>
    </section>






</body>

</html>