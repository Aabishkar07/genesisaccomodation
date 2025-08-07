@extends('admin.layouts.app')

@section('title', 'View Accommodation')
@section('page-title', 'View Accommodation')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">{{ $accommodation->name }}</h3>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.accommodations.edit', $accommodation) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
                <a href="{{ route('admin.accommodations.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Main Content -->
            <div class="space-y-6">
                <!-- Featured Image -->
                @if($accommodation->featured_image)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Featured Image</h4>
                        <img src="{{ asset('uploads/' . $accommodation->featured_image) }}" alt="{{ $accommodation->name }}" class="w-full h-64 object-contain rounded-lg">
                    </div>
                @endif

                <!-- Gallery Images -->
                @if($accommodation->gallery)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Gallery Images</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                            @foreach(json_decode($accommodation->gallery, true) as $image)
                                <img src="{{ asset('uploads/' . $image) }}" alt="Gallery Image" class="w-full h-32 object-cover rounded-lg">
                            @endforeach
                        </div>
                    </div>
                @endif

                <!-- Description -->
                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Description</h4>
                    <div class="prose max-w-none">
                        {!! nl2br(e($accommodation->description)) !!}
                    </div>
                </div>

                @if($accommodation->address)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Address</h4>
                        <p class="text-gray-700">{{ $accommodation->address }}</p>
                        <p class="text-gray-600 text-sm mt-1">{{ $accommodation->city }}, {{ $accommodation->state }} {{ $accommodation->postal_code }}</p>
                        <p class="text-gray-600 text-sm">{{ $accommodation->country }}</p>
                    </div>
                @endif

                @if($accommodation->latitude && $accommodation->longitude)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Coordinates</h4>
                        <p class="text-gray-700">Latitude: {{ $accommodation->latitude }}, Longitude: {{ $accommodation->longitude }}</p>
                    </div>
                @endif

                @if($accommodation->amenities)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Amenities</h4>
                        <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                            @if(is_array($accommodation->amenities))
                                @foreach($accommodation->amenities as $amenity)
                                    <div class="flex items-center">
                                        <i class="fas fa-check text-green-500 mr-2"></i>
                                        <span class="text-sm text-gray-700">{{ $amenity }}</span>
                                    </div>
                                @endforeach
                            @else
                                <div class="prose max-w-none">
                                    {!! nl2br(e($accommodation->amenities)) !!}
                                </div>
                            @endif
                        </div>
                    </div>
                @endif
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Basic Info -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-900 mb-4">Basic Information</h4>

                    <div class="space-y-3">
                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Status</span>
                            <div class="mt-1">
                                @if($accommodation->status === 'active')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Active
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                        Inactive
                                    </span>
                                @endif
                            </div>
                        </div>

                        @if($accommodation->price)
                            <div>
                                <span class="text-xs font-medium text-gray-500 uppercase">Price</span>
                                <div class="mt-1 text-sm text-gray-900">${{ number_format($accommodation->price, 2) }}</div>
                            </div>
                        @endif

                        @if($accommodation->phone)
                            <div>
                                <span class="text-xs font-medium text-gray-500 uppercase">Phone</span>
                                <div class="mt-1 text-sm text-gray-900">{{ $accommodation->phone }}</div>
                            </div>
                        @endif

                        @if($accommodation->email)
                            <div>
                                <span class="text-xs font-medium text-gray-500 uppercase">Email</span>
                                <div class="mt-1 text-sm text-gray-900">{{ $accommodation->email }}</div>
                            </div>
                        @endif

                        @if($accommodation->website)
                            <div>
                                <span class="text-xs font-medium text-gray-500 uppercase">Website</span>
                                <div class="mt-1 text-sm text-gray-900">
                                    <a href="{{ $accommodation->website }}" target="_blank" class="text-blue-600 hover:text-blue-800">{{ $accommodation->website }}</a>
                                </div>
                            </div>
                        @endif

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Sort Order</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $accommodation->sort_order ?? 0 }}</div>
                        </div>

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Created</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $accommodation->created_at->format('M d, Y H:i') }}</div>
                        </div>

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Updated</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $accommodation->updated_at->format('M d, Y H:i') }}</div>
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                @if($accommodation->meta_title || $accommodation->meta_description || $accommodation->meta_keywords)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">SEO Information</h4>

                        <div class="space-y-3">
                            @if($accommodation->meta_title)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $accommodation->meta_title }}</div>
                                </div>
                            @endif

                            @if($accommodation->meta_description)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $accommodation->meta_description }}</div>
                                </div>
                            @endif

                            @if($accommodation->meta_keywords)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Keywords</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $accommodation->meta_keywords }}</div>
                                </div>
                            @endif

                            @if($accommodation->meta_image)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/' . $accommodation->meta_image) }}" alt="Meta Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Social Media -->
                @if($accommodation->og_title || $accommodation->og_description || $accommodation->og_image || $accommodation->twitter_title || $accommodation->twitter_description || $accommodation->twitter_image)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Social Media</h4>

                        <div class="space-y-3">
                            @if($accommodation->og_title)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $accommodation->og_title }}</div>
                                </div>
                            @endif

                            @if($accommodation->og_description)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $accommodation->og_description }}</div>
                                </div>
                            @endif

                            @if($accommodation->og_image)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/' . $accommodation->og_image) }}" alt="OG Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
                                </div>
                            @endif

                            @if($accommodation->twitter_title)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $accommodation->twitter_title }}</div>
                                </div>
                            @endif

                            @if($accommodation->twitter_description)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $accommodation->twitter_description }}</div>
                                </div>
                            @endif


                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
