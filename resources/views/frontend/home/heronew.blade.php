<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    {{-- {/* Background Image with Overlay */} --}}
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('uploads/' . $banners->image) }}" alt="Modern student hostel accommodation"
            class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-black/70"></div>
    </div>

    {{-- {/* Content */} --}}
    <div class="relative z-10  px-4 sm:px-6 lg:px-8 text-center text-white">
        <div class="max-w-5xl mx-auto">
            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold mb-6 leading-tight">
                {{ $banners->title }}

            </h1>



            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
                {{ $banners->button_text }}
            </p>

            <form method="GET" action="{{ route('filteraccommodations') }}" class="mb-6">
                <div class="bg-white/98 backdrop-blur-sm rounded-2xl p-4 shadow-xl border border-gray-200/50">
                    <div class="flex flex-col lg:flex-row items-stretch gap-2">


                        <div class="flex-1 min-w-0">
                            <div
                                class="relative flex items-center gap-2 p-2.5 bg-gray-50/80 rounded-lg border border-gray-200/70 hover:border-primary/40 transition-all duration-200 focus-within:border-primary/60 focus-within:bg-white">
                                <svg class="h-4 w-4 text-primary/70 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4">
                                    </path>
                                </svg>
                                <select name="room_type"
                                    class="bg-transparent border-none outline-none text-gray-700 w-full text-sm font-medium cursor-pointer  pr-6">
                                    <option value="" class="text-gray-500 bg-white py-2">Room Type</option>
                                    @foreach ($roomTypes as $type)
                                        <option class="text-gray-800 bg-white py-2 px-3 hover:bg-gray-50"
                                            value="{{ $type->id }}"
                                            {{ request('room_type') == $type->id ? 'selected' : '' }}>
                                            {{ $type->name }}
                                        </option>
                                    @endforeach

                                </select>
                                <svg class="absolute right-2 h-3 w-3 text-gray-400 pointer-events-none" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>





                        <div class="flex-1 min-w-0">
                            <div
                                class="relative flex items-center gap-2 p-2.5 bg-gray-50/80 rounded-lg border border-gray-200/70 hover:border-primary/40 transition-all duration-200 focus-within:border-primary/60 focus-within:bg-white">
                                <svg class="h-4 w-4 text-primary/70 flex-shrink-0" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1">
                                    </path>
                                </svg>
                                <select name="price_range"
                                    class="bg-transparent border-none outline-none text-gray-700 w-full text-sm font-medium cursor-pointer appearance-none pr-6">
                                    <option value="" class="text-gray-500 bg-white py-2">Price Range</option>
                                    <option value="0-500" class="text-gray-800 bg-white py-2 hover:bg-gray-50"
                                        {{ request('price_range') == '0-500' ? 'selected' : '' }}>$0 -
                                        $500</option>
                                    <option value="500-1000" class="text-gray-800 bg-white py-2 hover:bg-gray-50"
                                        {{ request('price_range') == '500-1000' ? 'selected' : '' }}>
                                        $500 - $1,000</option>
                                    <option value="1000-1500" class="text-gray-800 bg-white py-2 hover:bg-gray-50"
                                        {{ request('price_range') == '1000-1500' ? 'selected' : '' }}>
                                        $1,000 - $1,500</option>
                                    <option value="1500-2000" class="text-gray-800 bg-white py-2 hover:bg-gray-50"
                                        {{ request('price_range') == '1500-2000' ? 'selected' : '' }}>
                                        $1,500 - $2,000</option>
                                    <option value="2000+" class="text-gray-800 bg-white py-2 hover:bg-gray-50"
                                        {{ request('price_range') == '2000+' ? 'selected' : '' }}>$2,000+
                                    </option>

                                </select>
                                <svg class="absolute right-2 h-3 w-3 text-gray-400 pointer-events-none" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>




                            <div class="flex-1 min-w-0">
                            <div
                                class="relative flex items-center gap-2 p-2.5 bg-gray-50/80 rounded-lg border border-gray-200/70 hover:border-primary/40 transition-all duration-200 focus-within:border-primary/60 focus-within:bg-white">
                                <svg class="h-4 w-4 text-primary/70 flex-shrink-0" fill="none" stroke="currentColor"
                                    viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z">
                                    </path>
                                </svg>
                                <select name="guests"
                                    class="bg-transparent border-none rounded outline-none text-gray-700 w-full text-sm font-medium cursor-pointer appearance-none pr-6">
                                  <option value="1" class="text-gray-800 bg-white py-2 hover:bg-gray-50" {{ request('guests') == '1' ? 'selected' : '' }}>1 Guest
                                </option>
                                <option value="2" class="text-gray-800 bg-white py-2 hover:bg-gray-50" {{ request('guests') == '2' ? 'selected' : '' }}>2 Guests
                                </option>
                                <option value="3" class="text-gray-800 bg-white py-2 hover:bg-gray-50" {{ request('guests') == '3' ? 'selected' : '' }}>3 Guests
                                </option>
                                <option value="4" class="text-gray-800 bg-white py-2 hover:bg-gray-50" {{ request('guests') == '4' ? 'selected' : '' }}>4+ Guests
                                </option>

                                </select>
                                <svg class="absolute right-2 h-3 w-3 text-gray-400 pointer-events-none" fill="none"
                                    stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M19 9l-7 7-7-7"></path>
                                </svg>
                            </div>
                        </div>



                          <div class="lg:w-auto">
                            <button  type="submit"
                                class="w-full lg:w-auto bg-gradient-to-r from-primary to-secondary hover:from-primary-dark hover:to-secondary-dark text-white font-semibold py-2.5 px-6 rounded-lg transition-all duration-200 hover:shadow-lg flex items-center justify-center gap-2 min-w-[120px]">
                                <svg class="h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <span class="text-sm">Search</span>
                            </button>
                        </div>


                    </div>
                </div>
            </form>



            {{-- {/* Stats Section */} --}}
            <div class="grid grid-cols-3 gap-8 mt-16 max-w-3xl mx-auto">
                <div class="text-center group">
                    <div
                        class="text-3xl md:text-4xl font-bold text-primary-light group-hover:scale-110 transition-transform">
                        500+</div>
                    <div class="text-sm text-gray-300 mt-1">Verified Hostels</div>
                </div>
                <div class="text-center group">
                    <div
                        class="text-3xl md:text-4xl font-bold text-secondary-light group-hover:scale-110 transition-transform">
                        50K+</div>
                    <div class="text-sm text-gray-300 mt-1">Happy Students</div>
                </div>
                <div class="text-center group">
                    <div class="text-3xl md:text-4xl font-bold text-accent group-hover:scale-110 transition-transform">
                        25+</div>
                    <div class="text-sm text-gray-300 mt-1">Cities Covered</div>
                </div>
            </div>
        </div>
    </div>


</section>
