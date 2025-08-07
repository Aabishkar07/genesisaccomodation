<section class="py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <!-- Decorative Line with Text -->
            <div class="flex items-center justify-center mb-6">
                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-primary to-transparent"></div>
                <span class="px-6 text-primary font-semibold text-lg uppercase tracking-wider">Our Accommodations</span>
                <div class="flex-1 h-px bg-gradient-to-r from-transparent via-primary to-transparent"></div>
            </div>

            <!-- Main Heading -->
            <h2 class="text-4xl md:text-5xl lg:text-6xl font-bold text-gray-900 mb-4">
                Discover Our
                <span
                    class="text-primary bg-gradient-to-r from-primary to-blue-600 bg-clip-text text-transparent">Premium
                    Rooms</span>
            </h2>

            <!-- Subtitle -->
            <p class="text-lg text-gray-600 max-w-3xl mx-auto leading-relaxed">
                Experience luxury and comfort in our carefully curated accommodations, designed to provide you with the
                perfect stay.
            </p>
        </div>

        <!-- Accommodations Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
            @include('frontend.component.accomodation')
        </div>

                 <!-- View More Section -->
         @if ($accomodations->count() > 6)
             <div class="text-center">
                 <a href="{{ route('accommodations') }}"
                    class="inline-flex items-center space-x-2 bg-white rounded-full shadow-lg px-8 py-4 border border-gray-200 hover:shadow-xl transition-shadow duration-300">
                     <span class="text-gray-700 font-medium">View All Accommodations</span>
                     <svg class="w-5 h-5 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                         <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                             d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                     </svg>
                 </a>
             </div>
         @endif

        <!-- Stats Section -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="w-16 h-16 bg-primary/10 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-primary" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">{{ $accomodations->count() }}+</h3>
                <p class="text-gray-600">Premium Rooms</p>
            </div>

            <div class="text-center p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">100%</h3>
                <p class="text-gray-600">Verified Quality</p>
            </div>

            <div class="text-center p-6 bg-white rounded-xl shadow-sm border border-gray-100">
                <div class="w-16 h-16 bg-yellow-100 rounded-full flex items-center justify-center mx-auto mb-4">
                    <svg class="w-8 h-8 text-yellow-600" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                        </path>
                    </svg>
                </div>
                <h3 class="text-2xl font-bold text-gray-900 mb-2">4.8</h3>
                <p class="text-gray-600">Guest Rating</p>
            </div>
        </div>
    </div>
</section>
