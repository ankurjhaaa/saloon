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
    <section class="bg-pink-500 text-white py-20 px-6 md:px-20">
  <div class="max-w-4xl mx-auto text-center">
    <h2 class="text-4xl font-bold mb-4">Want To Pamper Yourself?</h2>
    <p class="text-white/90 text-sm md:text-base mb-6">Book your appointment online in seconds. For queries or collaboration, feel free to message us below.</p>
    <div class="flex justify-center">
      <a href="booking.php" class="bg-white text-pink-600 px-8 py-3 rounded-full font-semibold hover:bg-gray-100 transition shadow-lg">Book Appointment</a>
    </div>
  </div>
</section>

<section class="bg-white py-16 px-6 md:px-20">
  <div class="max-w-4xl mx-auto">
    <h3 class="text-2xl font-bold text-gray-800 mb-6">Contact Us</h3>
    <form method="POST" action="submit_form.php" class="grid gap-6">
      <input type="text" name="name" placeholder="Your Name" required class="p-3 border border-gray-300 rounded-lg w-full">
      <input type="email" name="email" placeholder="Your Email" required class="p-3 border border-gray-300 rounded-lg w-full">
      <textarea name="message" placeholder="Your Message (not for appointments)" rows="5" required class="p-3 border border-gray-300 rounded-lg w-full"></textarea>
      <button type="submit" class="bg-pink-600 text-white px-6 py-3 rounded-full hover:bg-pink-700 transition">Send Message</button>
    </form>
  </div>
</section>





</body>

</html>