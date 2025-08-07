@extends('admin.layouts.app')

@section('title', 'Edit Accommodation')
@section('page-title', 'Edit Accommodation')

@section('content')
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Edit Accommodation</h3>
        </div>

        <form action="{{ route('admin.accommodations.update', $accommodation) }}" method="POST" enctype="multipart/form-data"
            class="p-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                <!-- Main Content -->
                <div class="lg:col-span-2 space-y-6">
                    <div>
                        <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Accommodation Name
                            *</label>
                        <input type="text" name="name" id="name" value="{{ old('name', $accommodation->name) }}"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description *</label>
                        <textarea name="description" id="description" rows="8" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('description', $accommodation->description) }}</textarea>
                        @error('description')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>



                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="postal_code" class="block text-sm font-medium text-gray-700 mb-2">Postal Code
                                *</label>
                            <input type="text" name="postal_code" id="postal_code"
                                value="{{ old('postal_code', $accommodation->postal_code) }}" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('postal_code')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>


                        <div>
                            <label for="state" class="block text-sm font-medium text-gray-700 mb-2">State/Province
                                *</label>
                            <input type="text" name="state" id="state"
                                value="{{ old('state', $accommodation->state) }}" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('state')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <div>
                        <label for="city" class="block text-sm font-medium text-gray-700 mb-2">City *</label>
                        <input type="text" name="city" id="city" value="{{ old('city', $accommodation->city) }}"
                            required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('city')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="address" class="block text-sm font-medium text-gray-700 mb-2">Address *</label>
                        <textarea name="address" id="address" rows="3" required
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('address', $accommodation->address) }}</textarea>
                        @error('address')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">


                        <div>
                            <label for="room_type_id" class="block text-sm font-medium text-gray-700 mb-2">Room Type</label>
                            <select name="room_type_id" id="room_type_id"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select Room Type</option>
                                @foreach ($roomTypes as $roomType)
                                    <option value="{{ $roomType->id }}"
                                        {{ old('room_type_id', $accommodation->room_type_id) == $roomType->id ? 'selected' : '' }}>
                                        {{ $roomType->name }} - ${{ $roomType->price_per_night }}/night
                                    </option>
                                @endforeach
                            </select>
                            @error('room_type_id')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <label for="amenities" class="block text-sm font-medium text-gray-700 mb-2">Amenities</label>
                        <div class="space-y-2">
                            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                                @php
                                    $commonAmenities = [
                                        'WiFi',
                                        'Air Conditioning',
                                        'Heating',
                                        'Kitchen',
                                        'Washing Machine',
                                        'Dryer',
                                        'Free Parking',
                                        'Pool',
                                        'Gym',
                                        'Spa',
                                        'Restaurant',
                                        'Bar',
                                        'Room Service',
                                        'Concierge',
                                        'Security',
                                        'Elevator',
                                        'Balcony',
                                        'Garden',
                                        'Terrace',
                                        'BBQ Facilities',
                                        'Bicycle Rental',
                                        'Car Rental',
                                        'Airport Shuttle',
                                    ];
                                    $currentAmenities = json_decode($accommodation->amenities)
                                        ? json_decode($accommodation->amenities)
                                        : [];

                                    $customAmenities = [];
                                    // dd($customAmenities);

                                    // Separate common and custom amenities
                                    // if (is_array($currentAmenities)) {
                                    //     // dd('DD');
                                    //     foreach ($currentAmenities as $amenity) {
                                    //         if (!in_array($amenity, $commonAmenities)) {
                                    //             $customAmenities[] = $amenity;
                                    //         }
                                    //     }
                                    // }
                                @endphp
                                @foreach ($commonAmenities as $amenity)
                                    <label class="flex items-center">
                                        <input type="checkbox" name="amenities[]" value="{{ $amenity }}"
                                            {{ in_array($amenity, old('amenities', $currentAmenities)) ? 'checked' : '' }}
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                                        <span class="ml-2 text-sm text-gray-700">{{ $amenity }}</span>
                                    </label>
                                @endforeach
                            </div>
                            {{-- <div class="mt-4">
                                <label for="custom_amenities" class="block text-sm font-medium text-gray-700 mb-2">Custom
                                    Amenities (one per line)</label>
                                <textarea name="custom_amenities" id="custom_amenities" rows="3"
                                    placeholder="Enter custom amenities, one per line"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('custom_amenities', implode("\n", $customAmenities)) }}</textarea>
                                <p class="mt-1 text-xs text-gray-500">Add any additional amenities not listed above. Each
                                    line will be treated as a separate amenity.</p>
                            </div> --}}
                        </div>
                        @error('amenities')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Status -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Publishing</h4>

                        <div class="space-y-4">
                            <div>
                                <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                                <select name="status" id="status" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <option value="active"
                                        {{ old('status', $accommodation->status) == 'active' ? 'selected' : '' }}>Active
                                    </option>
                                    <option value="inactive"
                                        {{ old('status', $accommodation->status) == 'inactive' ? 'selected' : '' }}>
                                        Inactive</option>
                                </select>
                                @error('status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort
                                    Order</label>
                                <input type="number" name="sort_order" id="sort_order"
                                    value="{{ old('sort_order', $accommodation->sort_order) }}" min="0"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error('sort_order')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Featured Image -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Featured Image</h4>

                        @if ($accommodation->featured_image)
                            <div class="mb-4">
                                <img src="{{ asset('uploads/' . $accommodation->featured_image) }}"
                                    alt="{{ $accommodation->name }}" class="w-full h-32 object-cover rounded-lg">
                            </div>
                        @endif

                        <div>
                            <label for="featured_image" class="block text-sm font-medium text-gray-700 mb-2">Upload New
                                Image</label>
                            <input type="file" name="featured_image" id="featured_image" accept="image/*"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('featured_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Gallery -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Gallery Images</h4>

                        @if ($accommodation->gallery)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Gallery Images</label>
                                <div class="grid grid-cols-2 gap-2">
                                    @foreach (json_decode($accommodation->gallery, true) as $image)
                                        <img src="{{ asset('uploads/' . $image) }}" alt="Gallery Image"
                                            class="w-full h-20 object-cover rounded-lg">
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        <div>
                            <label for="gallery" class="block text-sm font-medium text-gray-700 mb-2">Upload New Gallery
                                Images</label>
                            <input type="file" name="gallery[]" id="gallery" accept="image/*" multiple
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('gallery')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                            <p class="mt-1 text-xs text-gray-500">You can select multiple images</p>
                        </div>
                    </div>

                    <!-- SEO Settings -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">SEO Settings</h4>

                        <div class="space-y-4">
                            <div>
                                <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                    Title</label>
                                <input type="text" name="meta_title" id="meta_title"
                                    value="{{ old('meta_title', $accommodation->meta_title) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error('meta_title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                    Description</label>
                                <textarea name="meta_description" id="meta_description" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('meta_description', $accommodation->meta_description) }}</textarea>
                                @error('meta_description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                    Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords"
                                    value="{{ old('meta_keywords', $accommodation->meta_keywords) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error('meta_keywords')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            @if ($accommodation->meta_image)
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Current Meta Image</label>
                                    <img src="{{ asset('uploads/' . $accommodation->meta_image) }}" alt="Meta Image"
                                        class="w-full h-24 object-cover rounded-lg">
                                </div>
                            @endif

                            <div>
                                <label for="meta_image" class="block text-sm font-medium text-gray-700 mb-2">Upload New
                                    Meta Image</label>
                                <input type="file" name="meta_image" id="meta_image" accept="image/*"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error('meta_image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <!-- Social Media -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Social Media</h4>

                        <div class="space-y-4">
                            <div>
                                <label for="og_title" class="block text-sm font-medium text-gray-700 mb-2">Open Graph
                                    Title</label>
                                <input type="text" name="og_title" id="og_title"
                                    value="{{ old('og_title', $accommodation->og_title) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error('og_title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="og_description" class="block text-sm font-medium text-gray-700 mb-2">Open
                                    Graph Description</label>
                                <textarea name="og_description" id="og_description" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('og_description', $accommodation->og_description) }}</textarea>
                                @error('og_description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            @if ($accommodation->og_image)
                                <div class="mb-4">
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Current OG Image</label>
                                    <img src="{{ asset('uploads/' . $accommodation->og_image) }}" alt="OG Image"
                                        class="w-full h-24 object-cover rounded-lg">
                                </div>
                            @endif

                            <div>
                                <label for="og_image" class="block text-sm font-medium text-gray-700 mb-2">Upload New OG
                                    Image</label>
                                <input type="file" name="og_image" id="og_image" accept="image/*"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error('og_image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                          
                        </div>
                    </div>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
                <a href="{{ route('admin.accommodations.index') }}"
                    class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Cancel
                </a>
                <button type="submit"
                    class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                    Update Accommodation
                </button>
            </div>
        </form>
    </div>
@endsection
