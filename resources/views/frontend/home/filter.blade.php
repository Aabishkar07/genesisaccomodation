<style>
    /* Custom colors for primary/secondary */
    .bg-primary {
        background-color: #4f46e5;
    }

    .text-primary {
        color: #4f46e5;
    }

    .focus\:ring-primary\/80:focus {
        --tw-ring-color: rgba(79, 70, 229, 0.8);
    }

    .from-primary {
        --tw-gradient-from: #4f46e5;
    }

    .to-secondary {
        --tw-gradient-to: #3b82f6;
    }
</style>
<!-- Load Alpine.js -->
<script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>

<form method="GET" action="{{ route('filter') }}" class="w-full max-w-6xl mx-auto mb-32 z-[10] relative">
    <div class="bg-white/90 backdrop-blur-xl rounded-2xl p-6 shadow-2xl border flex  justify-center w-full border-gray-100 items-center">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 w-full ">

            <!-- 1. Where (City Select) - Mock Data -->
            <div>
                <label for="city-select" class="block text-xs font-semibold text-gray-600 mb-2">Where</label>
                <select name="city" id="city-select"
                    class="w-full text-gray-800 text-sm p-3 rounded-xl border border-gray-200 focus:ring-2 focus:ring-primary/80 outline-none transition">
                    <option value="">Select City</option>
                    <!-- Mock data simulating $city loop -->
                    @foreach ($city as $type)
                        <option value="{{ $type->city }}">
                            {{ $type->city }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- 2. Who (Guest Counter) - Fixed Alpine Logic -->
            <div x-data="{
                open: false,
                guestMode: 'adult', // 'adult' or 'type'
                guestType: '', // single/couple
                adults: null, // initialize as null
                maxGuest: 100
            }" class="relative">

                <label class="block text-xs font-semibold text-gray-600 mb-2">Who</label>

                <!-- Display Button -->
                <button type="button" @click="open = !open"
                    class="w-full text-left bg-white border border-gray-200 rounded-xl p-3 flex justify-between items-center focus:outline-none transition-all duration-150"
                    :class="{ 'ring-2 ring-primary/80 border-primary/50': open }">
                    <span class="text-gray-800 text-sm"
                        x-text="
            guestMode === 'type' && guestType ? guestType.charAt(0).toUpperCase() + guestType.slice(1) :
            guestMode === 'adult' && adults ? adults + ' Adult' + (adults > 1 ? 's' : '') : 'Select Type'">
                    </span>
                    <svg class="w-4 h-4 text-gray-400 transform transition-transform duration-200"
                        :class="{ 'rotate-180': open }" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                    </svg>
                </button>

                <!-- Dropdown -->
                <div x-show="open" x-cloak @click.away="open = false"
                    x-transition:enter="transition ease-out duration-200" x-transition:enter-start="opacity-0 scale-95"
                    x-transition:enter-end="opacity-100 scale-100" x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100 scale-100" x-transition:leave-end="opacity-0 scale-95"
                    class="absolute z-50 mt-2 w-full bg-white rounded-xl shadow-2xl border border-gray-100 p-4 space-y-4">

                    <!-- Toggle Mode -->
                    <div class="flex gap-2">
                        <button type="button" @click="guestMode='adult'"
                            :class="{ 'bg-primary text-white': guestMode==='adult', 'bg-gray-100 text-gray-700': guestMode!=='adult' }"
                            class="flex-1 py-2 rounded-xl font-semibold transition-colors">Adult</button>
                        <button type="button" @click="guestMode='type'"
                            :class="{ 'bg-primary text-white': guestMode==='type', 'bg-gray-100 text-gray-700': guestMode!=='type' }"
                            class="flex-1 py-2 rounded-xl font-semibold transition-colors">Type</button>
                    </div>

                    <!-- Adult Counter -->
                    <div x-show="guestMode==='adult'" class="flex justify-between items-center mt-2">
                        <p class="text-sm font-medium text-gray-800">Adults</p>
                        <div class="flex items-center space-x-2">
                            <button type="button" @click="adults && adults>1 && adults--"
                                class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-700">-</button>
                            <span x-text="adults ?? '-'" class="w-6 text-center font-semibold text-gray-900"></span>
                            <button type="button" @click="adults<maxGuest ? (adults = adults ? adults+1 : 1) : adults"
                                class="w-8 h-8 rounded-full border border-gray-300 flex items-center justify-center text-gray-700">+</button>
                        </div>
                    </div>

                    <!-- Guest Type Select -->
                    <div x-show="guestMode==='type'" class="mt-2">
                        <label class="block text-sm font-medium text-gray-600 mb-2">Type</label>
                        <select x-model="guestType"
                            class="w-full p-3 border border-gray-200 rounded-xl focus:ring-2 focus:ring-primary/80 outline-none">
                            <option value="">Select Type</option>
                            <option value="single">Single</option>
                            <option value="couple">Couple</option>
                        </select>
                    </div>

                    <!-- Hidden Input to send proper value -->
                    <input type="hidden" name="max_guest" :value="guestMode === 'type' ? guestType : adults">

                    <button type="button" @click="open=false"
                        class="w-full bg-primary text-white rounded-xl py-2 mt-2 font-semibold hover:bg-primary/90 transition-colors">
                        Apply
                    </button>
                </div>
            </div>
            <!-- 4. Search Button -->
            <div class="flex items-end">
                <button type="submit"
                    class="w-full bg-gradient-to-r from-primary to-secondary text-white font-semibold py-3 px-6 rounded-xl shadow-lg hover:shadow-xl hover:scale-[1.02] transition-all duration-300 flex items-center justify-center gap-2">
                    🔍 Search
                </button>
            </div>

        </div>
    </div>
</form>
