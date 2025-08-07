@extends('admin.layouts.app')

@section('title', 'View Testimonial')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">View Testimonial</h3>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.testimonials.edit', $testimonial) }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Edit
                </a>
                <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
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
                            <label class="block text-sm font-medium text-gray-700 mb-1">Name</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->name }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Position</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->position ?: 'Not specified' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Company</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->company ?: 'Not specified' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Rating</label>
                            <div class="flex items-center">
                                @if($testimonial->rating)
                                    <div class="flex items-center">
                                        @for($i = 1; $i <= 5; $i++)
                                            @if($i <= $testimonial->rating)
                                                <svg class="w-5 h-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @else
                                                <svg class="w-5 h-5 text-gray-300" fill="currentColor" viewBox="0 0 20 20">
                                                    <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
                                                </svg>
                                            @endif
                                        @endfor
                                        <span class="ml-2 text-sm text-gray-600">{{ $testimonial->rating }}/5</span>
                                    </div>
                                @else
                                    <span class="text-sm text-gray-500">No rating</span>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Content -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Testimonial Content</h4>
                    <div class="bg-white p-4 rounded-lg border">
                        <p class="text-gray-700 leading-relaxed">{{ $testimonial->testimonial }}</p>
                    </div>
                </div>

                <!-- Status Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Status Information</h4>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $testimonial->status == 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ ucfirst($testimonial->status) }}
                            </span>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Sort Order</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->sort_order ?: 'Not set' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Created At</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->created_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Updated At</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->updated_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Profile Image -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Profile Image</h4>

                    @if($testimonial->image)
                        <div class="mb-4">
                            <img src="{{ asset('uploads/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-full h-48 object-cover rounded-lg">
                        </div>
                    @else
                        <div class="bg-gray-200 h-48 rounded-lg flex items-center justify-center">
                            <span class="text-gray-500">No image uploaded</span>
                        </div>
                    @endif
                </div>

                <!-- SEO Information -->
                <div class="bg-gray-50 p-6 rounded-lg">
                    <h4 class="text-lg font-medium text-gray-900 mb-4">SEO Information</h4>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Title</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->meta_title ?: 'Not set' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Description</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->meta_description ?: 'Not set' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Meta Keywords</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->meta_keywords ?: 'Not set' }}</p>
                        </div>

                        @if($testimonial->meta_image)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Meta Image</label>
                                <img src="{{ asset('storage/' . $testimonial->meta_image) }}" alt="Meta Image" class="w-full h-24 object-cover rounded-lg">
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
                            <p class="text-sm text-gray-900">{{ $testimonial->og_title ?: 'Not set' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">OG Description</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->og_description ?: 'Not set' }}</p>
                        </div>

                        @if($testimonial->og_image)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">OG Image</label>
                                <img src="{{ asset('storage/' . $testimonial->og_image) }}" alt="OG Image" class="w-full h-24 object-cover rounded-lg">
                            </div>
                        @endif

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Twitter Title</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->twitter_title ?: 'Not set' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Twitter Description</label>
                            <p class="text-sm text-gray-900">{{ $testimonial->twitter_description ?: 'Not set' }}</p>
                        </div>

                        @if($testimonial->twitter_image)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Twitter Image</label>
                                <img src="{{ asset('storage/' . $testimonial->twitter_image) }}" alt="Twitter Image" class="w-full h-24 object-cover rounded-lg">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
