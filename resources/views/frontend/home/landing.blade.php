<div class="relative">
    <!-- Background Image -->
    <div class="max-sm:mt-0 md:h-[700px] relative">
        <img src="{{ asset('images/bg.jpg   ') }}" alt="Banner Image"
            class="w-full h-full max-sm:object-contain md:object-cover" />

        <!-- Overlaid Text Content -->
        <div class="absolute inset-0 flex flex-col items-center justify-center text-center px-4 text-white">
            <p class="text-lg md:text-xl font-medium tracking-wide text-blue-100">Luxury Living</p>
            <h1 class="text-3xl md:text-5xl font-extrabold text-white md:leading-tight">
                Discover Your <span class="text-blue-500">Next Room</span>
            </h1>
            <a href="#"
                class="mt-6 inline-block px-6 py-3 bg-primary text-white font-semibold rounded-lg shadow hover:bg-blue-100 transition">
                BOOK A ROOM
            </a>
        </div>
    </div>

    <!-- Search Form -->
    <div class="relative m-4 -mt-32 max-sm:-mt-20">
        <form action="" method="GET" class="container mx-auto my-10">
            <div class="grid grid-cols-2 gap-6 p-8 bg-white rounded-lg shadow-lg lg:flex lg:items-center lg:space-x-6">

                <!-- Location -->
                <div class="w-full">
                    <label for="location" class="block text-sm font-semibold text-gray-700">
                        <i class="mr-2 fas fa-concierge-bell"></i> Location
                    </label>
                    <select id="location" name="location"
                        class="w-full p-3 mt-2 text-gray-700 border rounded-lg appearance-none focus:ring focus:ring-blue-300"
                        required>
                        <option value="">Select location</option>
                        <option value="locationone">Location One</option>
                    </select>
                </div>

                <!-- Room Type -->
                <div class="w-full">
                    <label for="roomtype" class="block text-sm font-semibold text-gray-700">
                        <i class="mr-2 fas fa-door-closed"></i> Room Type
                    </label>
                    <select id="roomtype" name="roomtype"
                        class="w-full p-3 mt-2 text-gray-700 border rounded-lg appearance-none focus:ring focus:ring-blue-300"
                        required>
                        <option value="">Select room type</option>
                        <option value="roomtypeone">Room Type One</option>
                    </select>
                </div>

                <!-- Price Range -->
                <div class="w-full">
                    <label for="pricerange" class="block text-sm font-semibold text-gray-700">
                        <i class="mr-2 fas fa-dollar-sign"></i> Price Range
                    </label>
                    <select id="pricerange" name="pricerange"
                        class="w-full p-3 mt-2 text-gray-700 border rounded-lg appearance-none focus:ring focus:ring-blue-300"
                        required>
                        <option value="">Select price range</option>
                        <option value="pricerange">Price Range One</option>
                    </select>
                </div>

                <!-- Features -->
                <div class="w-full">
                    <label for="features" class="block text-sm font-semibold text-gray-700">
                        <i class="mr-2 fas fa-star"></i> Features
                    </label>
                    <select id="features" name="features"
                        class="w-full p-3 mt-2 text-gray-700 border rounded-lg appearance-none focus:ring focus:ring-blue-300"
                        required>
                        <option value="">Select features</option>
                        <option value="features">Features One</option>
                    </select>
                </div>

                <!-- Search Button -->
                <div class="w-full col-span-2 lg:col-span-1">
                    <button type="submit"
                        class="w-full p-3 mt-6 text-white font-semibold rounded-lg bg-gradient-to-r from-[#1F4A9A] to-[#10B5FC] hover:from-[#174385] hover:to-[#0E92D0] transition-all duration-300 shadow-md">
                        Search
                    </button>
                </div>

            </div>
        </form>
    </div>
</div>
