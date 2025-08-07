<section class="py-10 bg-white">
    <div class="container mx-auto px-6">
        {{-- <div class="text-center mb-10">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">What We Offer</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        From comfortable rooms to exceptional amenities, we provide everything you need for a memorable stay
                    </p>
                </div> --}}
        <div>
            <div class="flex items-center justify-center mb-4">
                <div class="border border-blue-600 w-32"></div>
                <span class="px-4 text-primary font-medium text-xl uppercase tracking-wide">What We Offer</span>
                <div class="border border-blue-600 w-32"></div>
            </div>

            <!-- Main heading -->
            <h2 class="text-4xl text-center md:text-5xl font-bold text-gray-900">
                Our
                <span class="text-primary">Services</span>
            </h2>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mt-14">


            @foreach ($services as $key => $service)
                @include('frontend.component.service', $service)
            @endforeach

        </div>

        @if ($service->count() > 3)


        <div class="mt-8 w-full flex justify-center">
            <a href="{{ route('services') }}" >
            <button class="bg-primary text-white font-semibold px-6 py-3 rounded hover:bg-primary-dark transition">
                View More
            </button>
            </a>
        </div>
          @endif
    </div>
</section>
