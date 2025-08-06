@extends('frontend.layout.app')

@section('body')
<div class="min-h-screen bg-gray-50">
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-blue-600 to-purple-600 text-white py-20">
        <div class="container mx-auto px-6 text-center">
            <h1 class="text-4xl md:text-6xl font-bold mb-6">About Us</h1>
            <p class="text-xl md:text-2xl font-light max-w-3xl mx-auto">
                Discover our story, values, and commitment to excellence
            </p>
        </div>
    </section>

 @include('frontend.home.about')


    <!-- Mission, Vision, Values Section -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Our Foundation</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    The principles that guide our every decision and action
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <!-- Mission -->
                <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Our Mission</h3>
                    <p class="text-gray-600 text-center leading-relaxed">
                        {{$aboutus->mission}}
                    </p>
                </div>

                <!-- Vision -->
                <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-purple-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-purple-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Our Vision</h3>
                    <p class="text-gray-600 text-center leading-relaxed">
                                               {{$aboutus->vision}}

                    </p>
                </div>

                <!-- Values -->
                <div class="bg-white rounded-xl shadow-lg p-8 transform hover:scale-105 transition duration-300">
                    <div class="w-16 h-16 bg-green-100 rounded-full flex items-center justify-center mb-6 mx-auto">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"></path>
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-4 text-center">Our Values</h3>
                     <p class="text-gray-600 text-center leading-relaxed">
                                               {{$aboutus->values}}

                    </p>
                </div>
            </div>
        </div>
    </section>
 <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
        <div class="container mx-auto px-6 text-center">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">Ready to Work With Us?</h2>
            <p class="text-xl mb-8 max-w-2xl mx-auto">
                Let's collaborate to bring your vision to life and achieve extraordinary results together.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#contact" class="bg-white text-blue-600 px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 transition duration-300">
                    Get In Touch
                </a>
                <a href="#services" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-blue-600 transition duration-300">
                    View Our Services
                </a>
            </div>
        </div>
    </section>

@include('frontend.home.testimonial')

    <!-- Team Section -->
    {{-- <section class="py-16 bg-white">
        <div class="container mx-auto px-6">
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Meet Our Team</h2>
                <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                    The talented individuals who make our vision a reality
                </p>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="text-center group">
                    <div class="relative mb-6">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80"
                             alt="Team Member"
                             class="w-32 h-32 mx-auto rounded-full object-cover shadow-lg group-hover:shadow-xl transition duration-300">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">John Smith</h3>
                    <p class="text-blue-600 font-medium mb-3">CEO & Founder</p>
                    <p class="text-gray-600 text-sm">Visionary leader with 15+ years of experience in technology and business development.</p>
                </div>

                <div class="text-center group">
                    <div class="relative mb-6">
                        <img src="https://images.unsplash.com/photo-1494790108755-2616b612b786?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80"
                             alt="Team Member"
                             class="w-32 h-32 mx-auto rounded-full object-cover shadow-lg group-hover:shadow-xl transition duration-300">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Sarah Johnson</h3>
                    <p class="text-blue-600 font-medium mb-3">CTO</p>
                    <p class="text-gray-600 text-sm">Technical expert specializing in innovative solutions and system architecture.</p>
                </div>

                <div class="text-center group">
                    <div class="relative mb-6">
                        <img src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=400&q=80"
                             alt="Team Member"
                             class="w-32 h-32 mx-auto rounded-full object-cover shadow-lg group-hover:shadow-xl transition duration-300">
                    </div>
                    <h3 class="text-xl font-semibold text-gray-800 mb-2">Michael Davis</h3>
                    <p class="text-blue-600 font-medium mb-3">Head of Operations</p>
                    <p class="text-gray-600 text-sm">Operations specialist ensuring smooth delivery and exceptional client satisfaction.</p>
                </div>
            </div>
        </div>
    </section> --}}


</div>
@endsection
