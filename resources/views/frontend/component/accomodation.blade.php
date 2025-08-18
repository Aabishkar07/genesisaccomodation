@foreach ($accomodations as $accommodation)
    <article
        class="group relative  overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition-all duration-300 hover:shadow-xl hover-scale">
        <!-- Image Container -->
        <div class="relative overflow-hidden">
            <img src="{{ $accommodation->featured_image ? asset('uploads/' . $accommodation->featured_image) : asset('images/b.png') }}"
                alt="{{ $accommodation->name }}" class="h-64 w-full object-cover image-hover" />

            <!-- Price Badge -->
            <div class="absolute top-4 right-4">
                <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                    ${{ number_format($accommodation->price ?? 0) }}
                </span>
            </div>

            <!-- Status Badge -->
            @if ($accommodation->status === 'active')
                <div class="absolute top-4 left-4">
                    <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                        Available
                    </span>
                </div>
            @endif
        </div>

        <!-- Content -->
        <div class="p-6">
            <!-- Title -->
            <div class="mb-4">
                <h3 class="text-xl font-bold text-gray-900 hover:text-primary transition-colors duration-300 mb-2">
                    {{ $accommodation->name }}
                </h3>
                <p class="text-gray-600 text-sm flex items-center">
                    <svg class="w-4 h-4 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd"
                            d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z"
                            clip-rule="evenodd"></path>
                    </svg>
                    {{ $accommodation->address }}, {{ $accommodation->city }}
                </p>
            </div>

            <!-- Description -->
            @if ($accommodation->description)
                <div class="mb-4">
                    <p class="text-gray-600 text-sm line-clamp-2">
                        {{ Str::limit($accommodation->description, 100) }}
                    </p>
                </div>
            @endif

            <!-- Room Type -->
            {{-- @if ($accommodation->roomType)
                <div class="mb-4">
                    <span
                        class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $accommodation->roomType->name }}
                    </span>
                </div>
            @endif --}}

            <!-- Amenities -->
            {{-- @if ($accommodation->amenities && is_array($accommodation->amenities))
                <div class="mb-4">
                    <div class="flex flex-wrap gap-2">
                        @foreach (array_slice($accommodation->amenities, 0, 3) as $amenity)
                            <span
                                class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-700">
                                {{ $amenity }}
                            </span>
                        @endforeach
                        @if (count($accommodation->amenities) > 3)
                            <span
                                class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-700">
                                +{{ count($accommodation->amenities) - 3 }} more
                            </span>
                        @endif
                    </div>
                </div>
            @endif --}}



            <!-- Action Buttons -->
            <div class="flex items-center border-t border-gray-200 justify-between">
                <div class="text-left">
                    <span class="text-xs text-gray-500">Starting from</span>
                    <p class="text-lg font-bold text-primary">${{ number_format($accommodation->price ?? 0) }}</p>
                </div>

                                         <div class="flex space-x-2">
                             <a href="{{ route('accommodation.single', $accommodation->slug) }}"
                                class="px-4 py-2 text-sm font-medium text-primary border border-primary rounded-lg hover:bg-primary hover:text-white transition-colors duration-300">
                                 View Details
                             </a>

                         </div>
            </div>
        </div>
    </article>
@endforeach
