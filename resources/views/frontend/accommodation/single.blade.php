@extends('frontend.layout.app')
@section('body')

    <div class="max-w-screen-2xl mx-auto">

        <!-- Hero Section -->
        <section class="relative bg-gray-900 py-8 ">
            <div class="absolute inset-0 bg-gradient-to-br from-primary to-blue-600 opacity-90"></div>
            <div class="relative  px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <nav class="flex justify-center mb-6" aria-label="Breadcrumb">
                        <ol class="flex items-center space-x-2 text-sm text-white/80">
                            <li><a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a></li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <a href="{{ route('accommodations') }}"
                                    class="hover:text-white transition-colors">Accommodations</a>
                            </li>
                            <li class="flex items-center">
                                <svg class="w-4 h-4 mx-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                                        clip-rule="evenodd"></path>
                                </svg>
                                <span class="text-white">{{ $accommodation->name }}</span>
                            </li>
                        </ol>
                    </nav>

                    <h1 class="text-3xl md:text-4xl  font-bold text-white mb-4">
                        {{ $accommodation->name }}
                    </h1>

                    <div class="flex flex-wrap justify-center items-center gap-4 md:gap-6 text-white/90 mb-8">
                        <div class="flex items-center">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span class="text-sm md:text-base">{{ $accommodation->address }},
                                {{ $accommodation->city }}</span>
                        </div>

                        @if ($accommodation->roomType)
                            <div class="flex items-center">
                                <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span class="text-sm md:text-base">{{ $accommodation->roomType->name }}</span>
                            </div>
                        @endif

                        <div class="flex items-center">
                            <svg class="w-4 h-4 md:w-5 md:h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path
                                    d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z">
                                </path>
                            </svg>
                            <span class="text-sm md:text-base">4.8 (120 reviews)</span>
                        </div>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-3 md:gap-4 max-w-4xl mx-auto">
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 md:p-4 text-center">
                            <div class="text-lg md:text-2xl font-bold text-white">
                                ${{ number_format($accommodation->price ?? 0) }}</div>
                            <div class="text-white/80 text-xs md:text-sm">per night</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 md:p-4 text-center">
                            <div class="text-lg md:text-2xl font-bold text-white">{{ $accommodation->max_guest ?? 0 }}</div>
                            <div class="text-white/80 text-xs md:text-sm">guests max</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 md:p-4 text-center">
                            <div class="text-lg md:text-2xl font-bold text-white">{{ $accommodation->bedroom ?? 0 }}</div>
                            <div class="text-white/80 text-xs md:text-sm">bedrooms</div>
                        </div>
                        <div class="bg-white/10 backdrop-blur-sm rounded-lg p-3 md:p-4 text-center">
                            <div class="text-lg md:text-2xl font-bold text-white">{{ $accommodation->bathroom ?? 0 }}</div>
                            <div class="text-white/80 text-xs md:text-sm">bathrooms</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Content -->
        <section class="py-8 md:py-16">
            <div class=" px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                    <!-- Main Content -->
                    <div class="lg:col-span-2">
                        <!-- Enhanced Image Gallery -->
                        <div class="mb-8 md:mb-12">
                            <!-- Main Image -->
                            <div class="mb-4">
                                <div class="relative group cursor-pointer">
                                    @php
                                        $gallery = json_decode($accommodation->gallery, true);
                                    @endphp
                                    <a href="{{ asset('uploads/' . $accommodation->featured_image) }}"
                                        data-fancybox="gallery" data-caption="{{ $accommodation->name }}">
                                        <img src="{{ asset('uploads/' . $accommodation->featured_image) }}"
                                            alt="{{ $accommodation->name }}"
                                            class="w-full h-64 md:h-[500px] object-contain rounded-lg">
                                    </a>
                                    <div
                                        class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 rounded-lg flex items-center justify-center pointer-events-none">
                                        <div
                                            class="opacity-0 group-hover:opacity-100 bg-white/90 text-gray-900 px-3 py-2 md:px-4 md:py-2 rounded-lg font-medium transition-all duration-300 text-sm md:text-base">
                                            Click to View
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Thumbnail Gallery -->
                            @if ($gallery && count($gallery) > 0)
                                <div class="grid grid-cols-2 md:grid-cols-4  gap-3 md:gap-4">
                                    @foreach ($gallery as $key => $image)
                                        @if ($key < 4)
                                            <div class="relative group cursor-pointer">
                                                <a href="{{ asset('uploads/' . $image) }}" data-fancybox="gallery"
                                                    data-caption="{{ $accommodation->name }}">
                                                    <img src="{{ asset('uploads/' . $image) }}"
                                                        alt="{{ $accommodation->name }}"
                                                        class="w-full h-24 md:h-32 object-contain rounded-lg">
                                                </a>
                                                <div
                                                    class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-all duration-300 rounded-lg flex items-center justify-center pointer-events-none">
                                                    @if ($key == 3 && count($gallery) > 4)
                                                        <div
                                                            class="opacity-0 group-hover:opacity-100 bg-white/90 text-gray-900 px-2 py-1 md:px-3 md:py-2 rounded-lg font-medium transition-all duration-300 text-xs md:text-sm">
                                                            +{{ count($gallery) - 4 }} More
                                                        </div>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <!-- Enhanced Description -->
                        <div class="mb-8 md:mb-12">
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-6">About This Accommodation
                            </h2>
                            <div class="prose prose-lg max-w-none">
                                <p class="text-gray-600 leading-relaxed mb-6">
                                    {{ $accommodation->description ?? 'This premium accommodation offers the perfect blend of comfort, luxury, and convenience. Located in a prime area, it provides easy access to local attractions while maintaining a peaceful environment for your stay.' }}
                                </p>


                            </div>
                        </div>

                        <!-- Enhanced Amenities -->
                        @if ($accommodation->amenities && is_array($accommodation->amenities))
                            <div class="mb-8 md:mb-12">
                                <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-6">Amenities & Features
                                </h2>
                                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-3 md:gap-6">
                                    @foreach ($accommodation->amenities as $amenity)
                                        <div
                                            class="flex items-center p-3 md:p-4 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                                            <svg class="w-4 h-4 md:w-5 md:h-5 text-primary mr-3 flex-shrink-0"
                                                fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd"
                                                    d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                    clip-rule="evenodd"></path>
                                            </svg>
                                            <span
                                                class="text-gray-700 font-medium text-sm md:text-base">{{ $amenity }}</span>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <!-- Enhanced Location -->
                        <div class="mb-8 md:mb-12">
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-4 md:mb-6">Location & Neighborhood
                            </h2>
                            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 md:gap-8">
                                <div class="bg-gray-50 p-4 md:p-6 rounded-lg">
                                    <div class="flex items-start mb-4">
                                        <svg class="w-5 h-5 md:w-6 md:h-6 text-primary mr-3 md:mr-4 mt-1"
                                            fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd"
                                                d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                                                clip-rule="evenodd"></path>
                                        </svg>
                                        <div>
                                            <h3 class="font-semibold text-gray-900 mb-2 text-sm md:text-base">Address</h3>
                                            <p class="text-gray-600 mb-4 text-sm md:text-base">
                                                {{ $accommodation->address }}, {{ $accommodation->city }}
                                                @if ($accommodation->state)
                                                    , {{ $accommodation->state }}
                                                @endif
                                                @if ($accommodation->postal_code)
                                                    , {{ $accommodation->postal_code }}
                                                @endif
                                            </p>

                                            @if ($accommodation->phone)
                                                <div class="flex items-center mb-2">
                                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 5V3z">
                                                        </path>
                                                    </svg>
                                                    <span
                                                        class="text-gray-600 text-sm md:text-base">{{ $accommodation->phone }}</span>
                                                </div>
                                            @endif

                                            @if ($accommodation->email)
                                                <div class="flex items-center mb-2">
                                                    <svg class="w-4 h-4 text-gray-400 mr-2" fill="currentColor"
                                                        viewBox="0 0 20 20">
                                                        <path
                                                            d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z">
                                                        </path>
                                                        <path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z">
                                                        </path>
                                                    </svg>
                                                    <span
                                                        class="text-gray-600 text-sm md:text-base">{{ $accommodation->email }}</span>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <!-- Map Placeholder -->
                                @if ($accommodation->map)
                                    <div class="relative w-full overflow-hidden rounded-lg" style="padding-top: 56.25%;">
                                        <!-- 16:9 aspect ratio -->
                                        <div class="absolute top-0 left-0 w-full h-full">
                                            {!! $accommodation->map !!}
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>


                    </div>


                    <!-- Enhanced Sidebar -->
                    <div class="lg:col-span-1">
                        <!-- Enhanced Booking Card -->
                        <div class="bg-white border border-gray-200 rounded-xl shadow-lg p-4 md:p-6 sticky top-24">
                            <div class="text-center mb-4 md:mb-6">
                                <div class="text-2xl md:text-3xl font-bold text-primary mb-2">
                                    ${{ number_format($accommodation->price ?? 0) }}
                                </div>
                                <div class="text-gray-600 text-sm md:text-base">per month</div>
                                {{-- <div class="text-xs md:text-sm text-gray-500 mt-1">+ taxes & fees</div> --}}
                            </div>

                            <!-- Enhanced Booking Form -->
                            <form class="space-y-3 md:space-y-4" id="bookingForm" method="POST" action="{{ route('booking.store', $accommodation) }}">
                                @csrf
                                <!-- Personal Information -->
                                <div>
                                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1 md:mb-2">Full
                                        Name</label>
                                    <input type="text" name="full_name"
                                        value="{{ old('full_name', Auth::guard('customer')->user()->name ?? '') }}" required
                                        class="w-full px-2 py-2 md:px-3 md:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-xs md:text-sm"
                                        placeholder="Enter your full name">
                                    @error('full_name')
                                        <div class="text-red-600 text-sm">
                                            * {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1 md:mb-2">Phone
                                        Number</label>
                                    <input type="tel" name="phone_number"
                                        value="{{ old('phone_number', Auth::guard('customer')->user()->phonenumber ?? '') }}" required
                                        class="w-full px-2 py-2 md:px-3 md:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-xs md:text-sm"
                                        placeholder="Enter your phone number">
                                    @error('phone_number')
                                        <div class="text-red-600 text-sm">
                                            * {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Check-in and Check-out Dates -->
                                <div class="grid grid-cols-2 gap-2 md:gap-3">
                                    <div>
                                        <label
                                            class="block text-xs md:text-sm font-medium text-gray-700 mb-1 md:mb-2">Check-in</label>
                                        <input type="date" name="check_in"
                                            value="{{ old('check_in') }}"id="checkinDate" required
                                            class="w-full px-2 py-2 md:px-3 md:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-xs md:text-sm">
                                        @error('check_in')
                                            <div class="text-red-600 text-sm">
                                                * {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div>
                                        <label
                                            class="block text-xs md:text-sm font-medium text-gray-700 mb-1 md:mb-2">Check-out</label>
                                        <input type="date" name="check_out" value="{{ old('check_out') }}"
                                            id="checkoutDate" required
                                            class="w-full px-2 py-2 md:px-3 md:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-xs md:text-sm">
                                        <div class="text-xs text-gray-500 mt-1">Must be at least 8 weeks after check-in date</div>
                                        @error('check_out')
                                            <div class="text-red-600 text-sm">
                                                * {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <!-- Guests -->
                                <div>
                                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1 md:mb-2">Room
                                        Capacity</label>
                                    <input type="number" name="room_capacity" value="{{ old('room_capacity') }}"
                                        id="room_capacity" required min="1" max="{{ $accommodation->max_guest ?? 1 }}"
                                        class="w-full px-2 py-2 md:px-3 md:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-xs md:text-sm">
                                    <div class="text-xs text-gray-500 mt-1">Maximum {{ $accommodation->max_guest ?? 1 }} guests allowed</div>
                                    @error('room_capacity')
                                        <div class="text-red-600 text-sm">
                                            * {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Pickup Option -->
                                <div>
                                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1 md:mb-2">Pickup
                                        Service</label>
                                    <div class="flex space-x-4">
                                        <label class="flex items-center">
                                            <input type="radio" name="pickup" value="yes" id="pickupYes"
                                                class="text-primary focus:ring-primary border-gray-300">
                                            <span class="ml-2 text-xs md:text-sm text-gray-700">Yes</span>
                                        </label>
                                        <label class="flex items-center">
                                            <input type="radio" name="pickup" value="no" id="pickupNo" checked
                                                class="text-primary focus:ring-primary border-gray-300">
                                            <span class="ml-2 text-xs md:text-sm text-gray-700">No</span>
                                        </label>
                                    </div>
                                    @error('pickup')
                                        <div class="text-red-600 text-sm">
                                            * {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <!-- Pickup Details (Hidden by default) -->
                                <div id="pickupDetails" class="hidden space-y-3">
                                    <div class="grid grid-cols-2 gap-2 md:gap-3">
                                        <div>
                                            <label
                                                class="block text-xs md:text-sm font-medium text-gray-700 mb-1 md:mb-2">Arrival
                                                Date</label>
                                            <input type="date" name="arrival_date" id="arrivalDate"
                                                value="{{ old('arrival_date') }}"
                                                class="w-full px-2 py-2 md:px-3 md:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-xs md:text-sm">
                                        </div>
                                        <div>
                                            <label
                                                class="block text-xs md:text-sm font-medium text-gray-700 mb-1 md:mb-2">Arrival
                                                Time</label>
                                            <input type="time" name="arrival_time" value="{{ old('arrival_time') }}"
                                                class="w-full px-2 py-2 md:px-3 md:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-xs md:text-sm">
                                        </div>
                                    </div>
                                </div>

                                <!-- Special Requests -->
                                <div>
                                    <label class="block text-xs md:text-sm font-medium text-gray-700 mb-1 md:mb-2">Special
                                        Requests</label>
                                    <textarea name="special_requests" rows="3"
                                        class="w-full px-2 py-2 md:px-3 md:py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent text-xs md:text-sm resize-none"
                                        placeholder="Any special requests or requirements...">{{ old('special_requests') }}</textarea>
                                    @error('special_requests')
                                        <div class="text-red-600 text-sm">
                                            * {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <button type="submit"
                                    class="w-full bg-primary text-white py-2 md:py-3 rounded-lg font-semibold hover:bg-primary-dark transition-colors duration-300 text-sm md:text-base">
                                    Book Now
                                </button>

                                <div class="text-center">
                                    <p class="text-xs text-gray-500">No charge yet</p>
                                </div>
                            </form>

                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    const checkinInput = document.getElementById('checkinDate');
                                    const checkoutInput = document.getElementById('checkoutDate');
                                    const pickupYes = document.getElementById('pickupYes');
                                    const pickupNo = document.getElementById('pickupNo');
                                    const pickupDetails = document.getElementById('pickupDetails');
                                    const arrivalDate = document.getElementById('arrivalDate');
                                    const roomCapacityInput = document.getElementById('room_capacity');
                                    const maxGuests = {{ $accommodation->max_guest ?? 1 }};

                                    // Set minimum date to 8 weeks from today
                                    const today = new Date();
                                    const eightWeeksFromNow = new Date(today.getTime() + (8 * 7 * 24 * 60 * 60 * 1000));
                                    const minDate = eightWeeksFromNow.toISOString().split('T')[0];
                                    checkinInput.min = minDate;

                                    // Set default check-in date if not already set
                                    if (!checkinInput.value) {
                                        checkinInput.value = minDate;
                                    }

                                    // Set minimum checkout date and default value
                                    function updateCheckoutDate() {
                                        if (checkinInput.value) {
                                            const checkinDate = new Date(checkinInput.value);
                                            const minCheckoutDate = new Date(checkinDate.getTime() + (8 * 7 * 24 * 60 * 60 * 1000));
                                            const minCheckoutDateStr = minCheckoutDate.toISOString().split('T')[0];

                                            // Set minimum date for checkout
                                            checkoutInput.min = minCheckoutDateStr;

                                            // Set default checkout date if not already set or if current value is less than minimum
                                            if (!checkoutInput.value || new Date(checkoutInput.value) < minCheckoutDate) {
                                                checkoutInput.value = minCheckoutDateStr;
                                            }
                                        }
                                    }

                                    // Validate check-in date (must be at least 8 weeks from today)
                                    function validateCheckinDate() {
                                        if (checkinInput.value) {
                                            const selectedDate = new Date(checkinInput.value);
                                            const minAllowedDate = new Date(today.getTime() + (8 * 7 * 24 * 60 * 60 * 1000));

                                            if (selectedDate < minAllowedDate) {
                                                alert('Check-in date must be at least 8 weeks from today.');
                                                checkinInput.value = minDate;
                                                updateCheckoutDate();
                                            }
                                        }
                                    }

                                    // Validate checkout date (must be at least 8 weeks after check-in)
                                    function validateCheckoutDate() {
                                        if (checkinInput.value && checkoutInput.value) {
                                            const checkinDate = new Date(checkinInput.value);
                                            const checkoutDate = new Date(checkoutInput.value);
                                            const minCheckoutDate = new Date(checkinDate.getTime() + (8 * 7 * 24 * 60 * 60 * 1000));

                                            if (checkoutDate < minCheckoutDate) {
                                                alert('Check-out date must be at least 8 weeks after check-in date.');
                                                checkoutInput.value = minCheckoutDate.toISOString().split('T')[0];
                                            }
                                        }
                                    }

                                    // Room capacity validation
                                    function validateRoomCapacity() {
                                        const capacity = parseInt(roomCapacityInput.value);
                                        if (capacity > maxGuests) {
                                            alert(`Room capacity cannot exceed ${maxGuests} guests.`);
                                            roomCapacityInput.value = maxGuests;
                                        } else if (capacity < 1) {
                                            alert('Room capacity must be at least 1 guest.');
                                            roomCapacityInput.value = 1;
                                        }
                                    }

                                    // Initialize checkout date
                                    updateCheckoutDate();

                                    // Event listeners
                                    checkinInput.addEventListener('change', function() {
                                        validateCheckinDate();
                                        updateCheckoutDate();
                                    });

                                    checkoutInput.addEventListener('change', validateCheckoutDate);

                                    roomCapacityInput.addEventListener('change', validateRoomCapacity);
                                    roomCapacityInput.addEventListener('input', validateRoomCapacity);

                                    // Handle pickup option toggle
                                    function togglePickupDetails() {
                                        if (pickupYes.checked) {
                                            pickupDetails.classList.remove('hidden');
                                            arrivalDate.required = true;
                                            // Set arrival date minimum to today
                                            arrivalDate.min = today.toISOString().split('T')[0];
                                        } else {
                                            pickupDetails.classList.add('hidden');
                                            arrivalDate.required = false;
                                            arrivalDate.value = '';
                                        }
                                    }

                                    pickupYes.addEventListener('change', togglePickupDetails);
                                    pickupNo.addEventListener('change', togglePickupDetails);

                                    // Initialize pickup details visibility
                                    togglePickupDetails();
                                });
                            </script>


                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Related Accommodations -->
        @if ($relatedAccommodations->count() > 0)
            <section class="py-8 md:py-16 bg-gray-50">
                <div class=" px-4 sm:px-6 lg:px-8">
                    <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-6 md:mb-8 text-center">Similar
                        Accommodations
                    </h2>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3">
                        @foreach ($relatedAccommodations as $related)
                            <article
                                class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition-all duration-300 hover:shadow-xl hover-scale">
                                <!-- Image Container -->
                                <div class="relative overflow-hidden">
                                    <img src="{{ $related->featured_image ? asset('uploads/' . $related->featured_image) : asset('images/b.png') }}"
                                        alt="{{ $related->name }}"
                                        class="h-40 md:h-48 w-full object-contain image-hover" />

                                    <!-- Price Badge -->
                                    <div class="absolute top-3 md:top-4 right-3 md:right-4">
                                        <span
                                            class="bg-primary text-white px-2 py-1 md:px-3 md:py-1 rounded-full text-xs md:text-sm font-semibold shadow-lg">
                                            ${{ number_format($related->price ?? 0) }}
                                        </span>
                                    </div>
                                </div>

                                <!-- Content -->
                                <div class="p-4 md:p-6">
                                    <h3
                                        class="text-base md:text-lg font-bold text-gray-900 hover:text-primary transition-colors duration-300 mb-2">
                                        <a href="{{ route('accommodation.single', $related->slug) }}">
                                            {{ $related->name }}
                                        </a>
                                    </h3>

                                    <p class="text-gray-600 text-xs md:text-sm mb-3 md:mb-4">
                                        {{ Str::limit($related->description ?? '', 80) }}
                                    </p>

                                    <!-- Room Type -->
                                    @if ($related->roomType)
                                        <div class="mb-3 md:mb-4">
                                            <span
                                                class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                                                {{ $related->roomType->name }}
                                            </span>
                                        </div>
                                    @endif

                                    <!-- Action Button -->
                                    <div class="flex justify-between items-center">
                                        <div class="text-left">
                                            <span class="text-xs text-gray-500">Starting from</span>
                                            <p class="text-base md:text-lg font-bold text-primary">
                                                ${{ number_format($related->price ?? 0) }}</p>
                                        </div>

                                        <a href="{{ route('accommodation.single', $related->slug) }}"
                                            class="px-3 py-2 md:px-4 md:py-2 text-xs md:text-sm font-medium text-primary border border-primary rounded-lg hover:bg-primary hover:text-white transition-colors duration-300">
                                            View Details
                                        </a>
                                    </div>
                                </div>
                            </article>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
    </div>

@endsection
