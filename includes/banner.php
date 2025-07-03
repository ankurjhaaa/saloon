<!-- Hero Banner -->
<section class="relative bg-cover bg-center bg-no-repeat h-[100vh] text-white pt-20"
    style="background-image: url('https://picsum.photos/seed/salonbg/1600/900');">

    <!-- Dark Overlay -->
    <div class="absolute inset-0 bg-gradient-to-tr from-black via-black/60 to-transparent"></div>

    <!-- Content + Carousel -->
    <div
        class="relative z-10 flex flex-col md:flex-row justify-between h-full px-6 md:px-20 py-12 space-y-8 md:space-y-0">

        <!-- Left Content -->
        <div class="flex flex-col justify-center md:w-1/2">
            <h1 class="text-3xl sm:text-4xl md:text-6xl font-extrabold leading-tight mb-4 animate-fade-in-up">
                Discover True <span class="text-pink-400">Beauty</span><br />
                With <span class="text-pink-500" id="typing-text">Glow & Shine</span>
            </h1>
            <p class="text-base sm:text-lg md:text-xl text-gray-100 mb-8 animate-fade-in-up delay-200 max-w-xl">
                Experience luxurious haircuts, spa treatments, facials and more in an ambiance that makes you glow
                inside out.
            </p>

            <!-- Buttons -->
            <div class="flex flex-col sm:flex-row gap-4 animate-fade-in-up delay-300">
                <a href="#book"
                    class="bg-pink-600 hover:bg-pink-700 px-6 py-3 rounded-full text-white font-semibold text-sm shadow-lg transition">Book
                    Appointment</a>
                <a href="#services"
                    class="border border-white px-6 py-3 rounded-full text-white font-semibold text-sm hover:bg-white hover:text-pink-600 transition">
                    Explore Services
                </a>

            </div>
        </div>

        <!-- Right Side Carousel -->
        <div class="md:w-1/2 flex items-center justify-center">
            <div class="w-full max-w-md rounded-lg overflow-hidden shadow-lg border border-white/20">
                <img id="carouselImage" class="w-full h-64 object-cover transition duration-500"
                    src="https://picsum.photos/seed/salon1/600/400" alt="Salon Carousel" />
            </div>
        </div>
    </div>
</section>

<!-- Animations -->
<style>
    html {
        scroll-behavior: smooth;
    }

    @keyframes fade-in-up {
        0% {
            opacity: 0;
            transform: translateY(30px);
        }

        100% {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .animate-fade-in-up {
        animation: fade-in-up 1s ease forwards;
    }

    .delay-200 {
        animation-delay: 0.2s;
    }

    .delay-300 {
        animation-delay: 0.3s;
    }
</style>

<!-- Typing Effect Script -->
<script>
    const words = ["Haircuts", "Spa", "Facials", "Makeup", "Styling"];
    let i = 0, j = 0, currentWord = '', isDeleting = false;
    const typingElement = document.getElementById("typing-text");

    function typeEffect() {
        if (i < words.length) {
            if (!isDeleting && j <= words[i].length) {
                currentWord = words[i].substring(0, j++);
                typingElement.innerHTML = currentWord;
            }
            if (isDeleting && j >= 0) {
                currentWord = words[i].substring(0, j--);
                typingElement.innerHTML = currentWord;
            }

            if (j === words[i].length) isDeleting = true;
            if (j === 0 && isDeleting) {
                isDeleting = false;
                i = (i + 1) % words.length;
            }
        }
        setTimeout(typeEffect, isDeleting ? 50 : 150);
    }

    document.addEventListener("DOMContentLoaded", typeEffect);
</script>

<!-- Carousel Script -->
<script>
    const images = [
        "https://picsum.photos/seed/salon1/600/400",
        "https://picsum.photos/seed/salon2/600/400",
        "https://picsum.photos/seed/salon3/600/400",
        "https://picsum.photos/seed/salon4/600/400"
    ];
    let index = 0;
    const img = document.getElementById("carouselImage");

    setInterval(() => {
        index = (index + 1) % images.length;
        img.src = images[index];
    }, 3000);
</script>