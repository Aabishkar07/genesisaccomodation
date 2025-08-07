<section class="py-16 bg-gradient-to-br from-gray-50 to-white">
    <div class=" px-4 sm:px-6 lg:px-8">
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
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 mb-12 max-w-screen-2xl mx-auto px-4">
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

     
    </div>
</section>
