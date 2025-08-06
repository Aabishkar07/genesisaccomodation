@extends('admin.layouts.app')

@section('title', 'View Room Type')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">View Room Type</h3>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.room-types.edit', $roomType) }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Edit
                </a>
                <a href="{{ route('admin.room-types.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Basic Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Basic Information</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Room Type Name</label>
                            <p class="text-sm text-gray-900">{{ $roomType->name }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $roomType->status == 'available' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($roomType->status) }}
                            </span>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Price per Night</label>
                            <p class="text-sm text-gray-900">{{ $roomType->price_per_night ? '$' . number_format($roomType->price_per_night, 2) : 'Not set' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Capacity</label>
                            <p class="text-sm text-gray-900">{{ $roomType->capacity ?: 'Not set' }} {{ $roomType->capacity == 1 ? 'person' : 'people' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bedrooms</label>
                            <p class="text-sm text-gray-900">{{ $roomType->bedrooms ?: 'Not set' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bathrooms</label>
                            <p class="text-sm text-gray-900">{{ $roomType->bathrooms ?: 'Not set' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Size</label>
                            <p class="text-sm text-gray-900">{{ $roomType->size ?: 'Not specified' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                            <p class="text-sm text-gray-900">{{ $roomType->sort_order ?: 'Not set' }}</p>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Description</h4>
                    <div class="bg-white p-4 rounded-lg border">
                        <p class="text-gray-700 leading-relaxed">{{ $roomType->description }}</p>
                    </div>
                </div>

                <!-- Amenities -->
                @if($roomType->amenities && is_array($roomType->amenities) && count($roomType->amenities) > 0)
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Amenities</h4>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                        @foreach($roomType->amenities as $amenity)
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-green-500 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/>
                                </svg>
                                <span class="text-sm text-gray-700">{{ $amenity }}</span>
                            </div>
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- Status Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Status Information</h4>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Created At</label>
                            <p class="text-sm text-gray-900">{{ $roomType->created_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Updated At</label>
                            <p class="text-sm text-gray-900">{{ $roomType->updated_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Featured Image -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Featured Image</h4>
                    
                    @if($roomType->featured_image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $roomType->featured_image) }}" alt="{{ $roomType->name }}" class="w-full h-48 object-cover rounded-lg">
                        </div>
                    @else
                        <div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center">
                            <span class="text-gray-500">No image uploaded</span>
                        </div>
                    @endif
                </div>

                <!-- Gallery -->
                @if($roomType->gallery && is_array($roomType->gallery) && count($roomType->gallery) > 0)
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Gallery Images</h4>
                    
                    <div class="grid grid-cols-2 gap-2">
                        @foreach($roomType->gallery as $image)
                            <img src="{{ asset('storage/' . $image) }}" alt="Gallery Image" class="w-full h-24 object-cover rounded-lg">
                        @endforeach
                    </div>
                </div>
                @endif

                <!-- SEO Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">SEO Information</h4>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                            <p class="text-sm text-gray-900">{{ $roomType->meta_title ?: 'Not set' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                            <p class="text-sm text-gray-900">{{ $roomType->meta_description ?: 'Not set' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Keywords</label>
                            <p class="text-sm text-gray-900">{{ $roomType->meta_keywords ?: 'Not set' }}</p>
                        </div>
                        
                        @if($roomType->meta_image)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Image</label>
                                <img src="{{ asset('storage/' . $roomType->meta_image) }}" alt="Meta Image" class="w-full h-24 object-cover rounded-lg">
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Social Media Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Social Media</h4>
                    
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">OG Title</label>
                            <p class="text-sm text-gray-900">{{ $roomType->og_title ?: 'Not set' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">OG Description</label>
                            <p class="text-sm text-gray-900">{{ $roomType->og_description ?: 'Not set' }}</p>
                        </div>
                        
                        @if($roomType->og_image)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">OG Image</label>
                                <img src="{{ asset('storage/' . $roomType->og_image) }}" alt="OG Image" class="w-full h-24 object-cover rounded-lg">
                            </div>
                        @endif
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Twitter Title</label>
                            <p class="text-sm text-gray-900">{{ $roomType->twitter_title ?: 'Not set' }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Twitter Description</label>
                            <p class="text-sm text-gray-900">{{ $roomType->twitter_description ?: 'Not set' }}</p>
                        </div>
                        
                        @if($roomType->twitter_image)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Twitter Image</label>
                                <img src="{{ asset('storage/' . $roomType->twitter_image) }}" alt="Twitter Image" class="w-full h-24 object-cover rounded-lg">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 