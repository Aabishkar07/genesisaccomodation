@extends('frontend.layout.app')

@section('body')
    <div class="min-h-screen bg-gray-50">
        <!-- Hero Section -->


        <section class="relative bg-gradient-to-br from-primary to-blue-600 py-20">
            <div class="absolute inset-0 bg-black opacity-20"></div>
            <div class="relative  px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                       Our Services
                    </h1>
                    <p class="text-xl text-white/90 max-w-3xl mx-auto">
                        Experience comfort and luxury with our premium accommodation services
                    </p>
                </div>
            </div>
        </section>

        <!-- Main Services Section -->
        <section class="py-16 bg-white">
            <div class="container mx-auto px-6">


                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">


                    @foreach ($services as $key => $service)
                        @include('frontend.component.service' , $service)
                    @endforeach

                </div>
            </div>
        </section>



        <!-- Call to Action -->
      {{-- @include('frontend.component.calltoaction') --}}
    </div>
@endsection
