<section id="services" class="bg-gradient-to-br from-pink-50 to-white py-20 px-6 md:px-20">

    <div class="max-w-6xl mx-auto text-center mb-16">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">Our Premium Services</h2>
        <p class="text-gray-600 text-sm md:text-base max-w-xl mx-auto">
            Crafted with care, delivered with precision – let your inner beauty shine.
        </p>
    </div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-4 gap-8">

        <?php $allservicequery = $connect->query("SELECT * FROM services ");
        while ($allservice = $allservicequery->fetch_array()) { ?>
            <!-- Card -->
            <div
                class="bg-white/80 backdrop-blur-sm rounded-2xl p-6 shadow-lg hover:shadow-pink-200 hover:scale-[1.03] transition-all duration-300 text-center border border-pink-100">
                <div
                    class="w-16 h-16 mx-auto mb-4 bg-pink-100 text-pink-600 rounded-full flex items-center justify-center text-2xl">
                    <img src="images/<?php echo $allservice['image']; ?>" alt="<?php echo $allservice['name']; ?>"
                        class="w-16 h-16 object-cover rounded-full border border-pink-300 shadow-sm">
                </div>
                <h3 class="font-semibold text-lg text-gray-800 mb-2"><?php echo $allservice['name']; ?></h3>
                <p class="text-sm text-gray-600"><?php echo $allservice['description']; ?>.</p>
            </div>
        <?php } ?>



    </div>
</section>