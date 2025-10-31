<section class="relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background Image with Overlay -->
    <div class="absolute inset-0 z-0">
        <img src="{{ asset('uploads/' . $banners->image) }}" alt="Modern student hostel accommodation"
            class="w-full h-full object-cover" />
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/60 to-black/70"></div>
    </div>

    <!-- Content -->
    <div class="relative z-10 px-4 sm:px-6 lg:px-8 text-center text-white w-full">
        <div class="max-w-screen-xl mx-auto space-y-10">

            <!-- Hero Text -->
            <h1 class="text-3xl md:text-4xl lg:text-5xl pt-10 font-extrabold tracking-tight leading-tight">
                {{ $banners->title }}
            </h1>



            <p class="text-lg md:text-xl text-gray-200 mb-8 max-w-3xl mx-auto">
                {{ $banners->description }}
            </p>

            <!-- Search Form -->
            <form method="GET" action="{{ route('filteraccommodations') }}" class="mb-12">
                <div class="bg-white/90 backdrop-blur-xl rounded-2xl p-6 shadow-2xl border border-gray-100">
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

                        <!-- Room Type -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-2">Room Type</label>
                            <select name="room_type"
                                class="w-full text-gray-800 text-sm p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/80 outline-none transition">
                                <option value="">Select Room</option>
                                @foreach ($roomTypes as $type)
                                    <option value="{{ $type->id }}"
                                        {{ request('room_type') == $type->id ? 'selected' : '' }}>
                                        {{ $type->name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Price Range -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-2">Price Range</label>
                            <select name="price_range"
                                class="w-full text-gray-800 text-sm p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/80 outline-none transition">
                                <option value="">Select Price</option>
                                <option value="0-500" {{ request('price_range') == '0-500' ? 'selected' : '' }}>$0 -
                                    $500</option>
                                <option value="500-1000" {{ request('price_range') == '500-1000' ? 'selected' : '' }}>
                                    $500 - $1,000</option>
                                <option value="1000-1500" {{ request('price_range') == '1000-1500' ? 'selected' : '' }}>
                                    $1,000 - $1,500</option>
                                <option value="1500-2000"
                                    {{ request('price_range') == '1500-2000' ? 'selected' : '' }}>$1,500 - $2,000
                                </option>
                                <option value="2000+" {{ request('price_range') == '2000+' ? 'selected' : '' }}>
                                    $2,000+</option>
                            </select>
                        </div>

                        <!-- Guests -->
                        <div>
                            <label class="block text-xs font-semibold text-gray-600 mb-2">Guests</label>
                            <select name="guests"
                                class="w-full text-gray-800 text-sm p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/80 outline-none transition">
                                <option value="1" {{ request('guests') == '1' ? 'selected' : '' }}>1 Guest
                                </option>
                                <option value="2" {{ request('guests') == '2' ? 'selected' : '' }}>2 Guests
                                </option>
                                <option value="3" {{ request('guests') == '3' ? 'selected' : '' }}>3 Guests
                                </option>
                                <option value="4" {{ request('guests') == '4' ? 'selected' : '' }}>4+ Guests
                                </option>
                            </select>
                        </div>

                        <!-- Search Button -->
                        <div class="flex items-end">
                            <button type="submit"
                                class="w-full bg-gradient-to-r from-primary to-secondary text-white font-semibold py-3 px-6 rounded-xl hover:shadow-xl hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2">
                                <span>🔍 Search</span>
                            </button>
                        </div>
                    </div>
                </div>
            </form>

            <!-- Contact Form -->
            <div class="max-w-2xl mx-auto pb-12">
                <form id="submitform" action="{{ route('contact.store') }}" method="POST"
                    class="bg-white rounded-2xl shadow-2xl p-8 border border-gray-100 backdrop-blur-lg space-y-5 text-left">
                    @csrf
                    <h3 class="text-2xl font-bold text-gray-800">Send us a Message</h3>
                    <p class="text-gray-500 text-sm">We'll get back to you shortly.</p>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="text" name="name" placeholder="Full Name" required
                            class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/80 outline-none text-gray-700 transition">
                        <input type="email" name="email" placeholder="Email Address" required
                            class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/80 outline-none text-gray-700 transition">
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <input type="tel" name="phone" placeholder="Phone Number" required
                            class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/80 outline-none text-gray-700 transition">
                        <input type="text" name="subject" placeholder="Subject" required
                            class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/80 outline-none text-gray-700 transition">
                    </div>

                    <textarea name="message" rows="4" placeholder="Your Message" required
                        class="w-full p-3 rounded-lg border border-gray-200 focus:ring-2 focus:ring-primary/80 outline-none text-gray-700 resize-none transition"></textarea>

                    <div class="col-span-6">
                        <label for="MarketingAccept" class="flex items-center gap-2">
                            <input type="checkbox" id="MarketingAccept" name="marketing_accept"
                                class="rounded border-gray-300 text-primary focus:ring-primary" required />
                            <a href="{{ route('terms-conditions') }}">
                                <span class="text-sm text-gray-700">I agree to

                                    <span class="text-blue-500">terms and conditions
                                    </span>
                                </span>
                            </a>
                        </label>
                    </div>

                    <button type="submit"
                        class="w-full bg-gradient-to-r from-primary to-secondary hover:from-secondary hover:to-primary text-white font-semibold py-3 rounded-lg shadow-md hover:shadow-xl transition-all duration-300">
                        📩 Send Message
                    </button>

                    <p class="text-xs text-gray-500 text-center mt-3 flex items-center justify-center gap-1">
                        <i class="bi bi-shield-check text-green-500"></i>
                        Your information is secure and will never be shared.
                    </p>
                </form>
            </div>

        </div>
    </div>
</section>
