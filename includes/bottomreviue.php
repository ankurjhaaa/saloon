<section class="bg-white py-10 px-6 md:px-20">
    <div class="max-w-7xl mx-auto text-center mb-12">
        <h2 class="text-4xl font-bold text-gray-800 mb-4">What Our Clients Say</h2>
        <p class="text-gray-600 text-sm md:text-base max-w-xl mx-auto">
            Real stories from happy clients who've experienced the Glow & Shine magic.
        </p>
    </div>

    <!-- Outer wrapper with overflow -->
    <div class="relative max-w-6xl mx-auto overflow-hidden">

        <!-- Buttons -->
        <button onclick="slideTestimonials(-1)"
            class="absolute left-0 top-1/2 -translate-y-1/2 z-10 bg-white border border-pink-300 text-pink-500 p-2 rounded-full shadow hover:bg-pink-100">
            <= </button>
                <button onclick="slideTestimonials(1)"
                    class="absolute right-0 top-1/2 -translate-y-1/2 z-10 bg-white border border-pink-300 text-pink-500 p-2 rounded-full shadow hover:bg-pink-100">
                    =>
                </button>

                <!-- Slider Track -->
                <div id="testimonialTrack" class="flex transition-transform duration-700 ease-in-out"
                    style="width: max-content;">

                    <!-- Each Slide -->
                    <div
                        class="testimonial-slide bg-pink-50 p-6 rounded-2xl shadow text-left mx-3 min-w-[100%] sm:min-w-[50%] lg:min-w-[33.333%]">
                        <div class="flex items-center gap-4 mb-4">
                            <img src="https://i.pravatar.cc/100?img=20"
                                class="w-12 h-12 rounded-full border-2 border-pink-300" />
                            <div>
                                <h4 class="font-semibold text-gray-800">Ayesha Khan</h4>
                                <p class="text-xs text-gray-500">Entrepreneur</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 italic">"One of the best salons I’ve visited. Super clean,
                            relaxing
                            and amazing results every time!"</p>
                    </div>

                    <div
                        class="testimonial-slide bg-pink-50 p-6 rounded-2xl shadow text-left mx-3 min-w-[100%] sm:min-w-[50%] lg:min-w-[33.333%]">
                        <div class="flex items-center gap-4 mb-4">
                            <img src="https://i.pravatar.cc/100?img=12"
                                class="w-12 h-12 rounded-full border-2 border-pink-300" />
                            <div>
                                <h4 class="font-semibold text-gray-800">Sneha Verma</h4>
                                <p class="text-xs text-gray-500">Wedding Bride</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 italic">"They handled my bridal look perfectly. Everyone
                            appreciated
                            the makeup and styling!"</p>
                    </div>

                    <div
                        class="testimonial-slide bg-pink-50 p-6 rounded-2xl shadow text-left mx-3 min-w-[100%] sm:min-w-[50%] lg:min-w-[33.333%]">
                        <div class="flex items-center gap-4 mb-4">
                            <img src="https://i.pravatar.cc/100?img=32"
                                class="w-12 h-12 rounded-full border-2 border-pink-300" />
                            <div>
                                <h4 class="font-semibold text-gray-800">Radhika Sinha</h4>
                                <p class="text-xs text-gray-500">HR Manager</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 italic">"My go-to place for a quick hair fix or pamper
                            session.
                            Staff is lovely!"</p>
                    </div>

                    <div
                        class="testimonial-slide bg-pink-50 p-6 rounded-2xl shadow text-left mx-3 min-w-[100%] sm:min-w-[50%] lg:min-w-[33.333%]">
                        <div class="flex items-center gap-4 mb-4">
                            <img src="https://i.pravatar.cc/100?img=18"
                                class="w-12 h-12 rounded-full border-2 border-pink-300" />
                            <div>
                                <h4 class="font-semibold text-gray-800">Neha Yadav</h4>
                                <p class="text-xs text-gray-500">Student</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 italic">"Super relaxing spa and very affordable. Highly
                            recommended
                            for monthly pampering!"</p>
                    </div>

                    <div
                        class="testimonial-slide bg-pink-50 p-6 rounded-2xl shadow text-left mx-3 min-w-[100%] sm:min-w-[50%] lg:min-w-[33.333%]">
                        <div class="flex items-center gap-4 mb-4">
                            <img src="https://i.pravatar.cc/100?img=25"
                                class="w-12 h-12 rounded-full border-2 border-pink-300" />
                            <div>
                                <h4 class="font-semibold text-gray-800">Anjali Patel</h4>
                                <p class="text-xs text-gray-500">Makeup Blogger</p>
                            </div>
                        </div>
                        <p class="text-sm text-gray-700 italic">"Loved their hair color service — the tone matched
                            exactly
                            what I wanted!"</p>
                    </div>

                </div>
    </div>
</section>
<!-- JavaScript for sliding -->
<script>
    let testimonialIndex = 0;

    function slideTestimonials(direction) {
        const track = document.getElementById('testimonialTrack');
        const slides = document.querySelectorAll('.testimonial-slide');
        const total = slides.length;

        const visible = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 640 ? 2 : 1;
        const slideWidth = slides[0].offsetWidth + 24; // +gap

        testimonialIndex += direction;

        if (testimonialIndex < 0) testimonialIndex = 0;
        if (testimonialIndex > total - visible) testimonialIndex = total - visible;

        track.style.transform = `translateX(-${testimonialIndex * slideWidth}px)`;
    }

    setInterval(() => {
        slideTestimonials(1);
    }, 7000);
</script>