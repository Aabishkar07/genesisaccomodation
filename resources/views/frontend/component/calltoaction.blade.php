   <section class="py-16 bg-gradient-to-r from-blue-600 to-teal-600 text-white">
            <div class="container mx-auto px-6 text-center">
                <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Book Your Stay?</h2>
                <p class="text-xl mb-8 max-w-2xl mx-auto">
                    Experience exceptional hospitality and comfort. Book now and enjoy our premium services.
                </p>
                <div class="flex flex-col sm:flex-row gap-4 justify-center">
                    <a href="{{ route('accommodations') }}"
                        class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                        Book Now
                    </a>
                    <a href="{{ route('contact') }}"
                        class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                        Contact Us
                    </a>
                </div>
            </div>
        </section>
