<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

<style>
    .owl-nav button {
        position: absolute;
        top: 40%;
        transform: translateY(-50%);
        background-color: #e2e8f0;
        padding: 0.5rem 1rem;
        border-radius: 9999px;
        font-size: 1.25rem;
        font-weight: bold;
    }

    .owl-nav .owl-prev {
        left: -40px;
    }

    .owl-nav .owl-next {
        right: -40px;
    }
</style>

       <div class="my-20">

        <div class="flex items-center justify-center mb-4">
            <div class="border border-blue-600 w-32"></div>
            <span class="px-4 text-primary font-medium text-xl uppercase tracking-wide">Testimonial</span>
            <div class="border border-blue-600 w-32"></div>
        </div>

        <!-- Main heading -->
        <h2 class="text-4xl text-center md:text-5xl font-bold text-gray-900">
            What our
            <span class="text-primary"> Clients says</span>
        </h2>
    </div>


    <div class="relative p-8 max-w-screen-2xl mx-auto mb-20">

        <div class="owl-carousel owl-theme">

            <!-- Testimonial Card 1 -->
            <div class="item p-6 bg-gray-100 rounded-xl h-full shadow">
                <div class="flex items-center gap-4 mb-4">
                    <!-- Image -->
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop&crop=face"
                            alt="Rohan Shrestha" class="w-full h-full object-cover border border-blue-200" />
                    </div>

                    <!-- Name (centered vertically) -->
                    <div class="flex items-center">
                        <h4 class="font-semibold text-gray-900 text-lg">Rohan Shrestha</h4>
                    </div>

                    <!-- Quote mark -->
                    <div class="text-6xl text-primary font-serif leading-none ml-auto">"</div>
                </div>

                <p class="text-gray-600 mb-4 leading-relaxed">
                    Seamless booking experience! Found the perfect room quickly and the process was super easy. Highly
                    recommend.
                </p>
                <div class="flex gap-1">
                    <!-- 5 Stars -->
                    <svg class="w-4 h-4 fill-yellow-400 text-yellow-400" viewBox="0 0 24 24">
                        <path
                            d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 19.897 4.665 24 6 15.595 0 9.748l8.332-1.73z" />
                    </svg>
                </div>
            </div>

            <!-- Testimonial Card 2 -->
            <div class="item p-6 bg-gray-100 rounded-xl h-full shadow">
                <div class="flex items-center gap-4 mb-4">
                    <!-- Image -->
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop&crop=face"
                            alt="Rohan Shrestha" class="w-full h-full object-cover border border-blue-200" />
                    </div>

                    <!-- Name (centered vertically) -->
                    <div class="flex items-center">
                        <h4 class="font-semibold text-gray-900 text-lg">Rohan Shrestha</h4>
                    </div>

                    <!-- Quote mark -->
                    <div class="text-6xl text-primary font-serif leading-none ml-auto">"</div>
                </div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Fantastic website! User-friendly interface and accurate room descriptions. Had a great stay thanks
                    to this platform.
                </p>
                <div class="flex gap-1">
                    <!-- 5 Stars -->
                    <svg class="w-4 h-4 fill-yellow-400 text-yellow-400" viewBox="0 0 24 24">
                        <path
                            d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 19.897 4.665 24 6 15.595 0 9.748l8.332-1.73z" />
                    </svg>
                </div>
            </div>

            <!-- Testimonial Card 3 -->
            <div class="item p-6 bg-gray-100 rounded-xl h-full shadow">
                <div class="flex items-center gap-4 mb-4">
                    <!-- Image -->
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=200&h=200&fit=crop&crop=face"
                            alt="Rohan Shrestha" class="w-full h-full object-cover border border-blue-200" />
                    </div>

                    <!-- Name (centered vertically) -->
                    <div class="flex items-center">
                        <h4 class="font-semibold text-gray-900 text-lg">Rohan Shrestha</h4>
                    </div>

                    <!-- Quote mark -->
                    <div class="text-6xl text-primary font-serif leading-none ml-auto">"</div>
                </div>
                <p class="text-gray-600 mb-4 leading-relaxed">
                    Impressed with the variety of options and competitive prices. Booked a lovely place without any
                    hassle. Will definitely use again!
                </p>
                <div class="flex gap-1">
                    <!-- 5 Stars -->
                    <svg class="w-4 h-4 fill-yellow-400 text-yellow-400" viewBox="0 0 24 24">
                        <path
                            d="M12 .587l3.668 7.431L24 9.748l-6 5.847L19.335 24 12 19.897 4.665 24 6 15.595 0 9.748l8.332-1.73z" />
                    </svg>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

    <script>
        $(document).ready(function() {
            $(".owl-carousel").owlCarousel({
                loop: true,
                margin: 24,
                nav: true,
                dots: true,
                navText: ["‹", "›"],
                responsive: {
                    0: {
                        items: 1
                    },
                    768: {
                        items: 2
                    },
                    1024: {
                        items: 3
                    }
                }
            });
        });
    </script>
