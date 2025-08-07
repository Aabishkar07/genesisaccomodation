@extends('frontend.layout.app')

@section('body')
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->
        <section class="relative bg-gradient-to-r from-blue-600 to-teal-600 text-white py-20">
            <div class="container mx-auto px-6 text-center">
                <h1 class="text-4xl md:text-6xl font-bold mb-6">Our Services</h1>
                <p class="text-xl md:text-2xl font-light max-w-3xl mx-auto">
                    Experience comfort and luxury with our premium accommodation services
                </p>
            </div>
        </section>

        <!-- Main Services Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-6">
                <div class="text-center mb-16">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">What We Offer</h2>
                    <p class="text-lg text-gray-600 max-w-3xl mx-auto">
                        From comfortable rooms to exceptional amenities, we provide everything you need for a memorable stay
                    </p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">


                    @foreach ($services as $key => $service)
                        @include('frontend.component.service' , $service)
                    @endforeach

                </div>
            </div>
        </section>



        <!-- Call to Action -->
      @include('frontend.component.calltoaction')
    </div>
@endsection
