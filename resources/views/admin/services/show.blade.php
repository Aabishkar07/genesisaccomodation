@extends('admin.layouts.app')

@section('title', 'View Service')
@section('page-title', 'View Service')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">{{ $service->name }}</h3>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.services.edit', $service) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
                <a href="{{ route('admin.services.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
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
                @if($service->image)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Featured Image</h4>
                        <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="w-full h-64 object-cover rounded-lg">
                    </div>
                @endif

                <!-- Description -->
                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Description</h4>
                    <div class="prose max-w-none">
                        {!! nl2br(e($service->description)) !!}
                    </div>
                </div>

                @if($service->icon)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Icon</h4>
                        <div class="flex items-center">
                            <i class="{{ $service->icon }} text-2xl text-blue-600 mr-3"></i>
                            <span class="text-gray-700">{{ $service->icon }}</span>
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
                                @if($service->status === 'active')
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

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Sort Order</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $service->sort_order ?? 0 }}</div>
                        </div>

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Created</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $service->created_at->format('M d, Y H:i') }}</div>
                        </div>

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Updated</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $service->updated_at->format('M d, Y H:i') }}</div>
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                @if($service->meta_title || $service->meta_description || $service->meta_keywords)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">SEO Information</h4>

                        <div class="space-y-3">
                            @if($service->meta_title)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $service->meta_title }}</div>
                                </div>
                            @endif

                            @if($service->meta_description)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $service->meta_description }}</div>
                                </div>
                            @endif

                            @if($service->meta_keywords)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Keywords</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $service->meta_keywords }}</div>
                                </div>
                            @endif

                            @if($service->meta_image)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $service->meta_image) }}" alt="Meta Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Social Media -->
                @if($service->og_title || $service->og_description || $service->og_image || $service->twitter_title || $service->twitter_description || $service->twitter_image)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Social Media</h4>

                        <div class="space-y-3">
                            @if($service->og_title)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $service->og_title }}</div>
                                </div>
                            @endif

                            @if($service->og_description)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $service->og_description }}</div>
                                </div>
                            @endif

                            @if($service->og_image)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $service->og_image) }}" alt="OG Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
                                </div>
                            @endif

                            @if($service->twitter_title)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $service->twitter_title }}</div>
                                </div>
                            @endif

                            @if($service->twitter_description)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $service->twitter_description }}</div>
                                </div>
                            @endif

                            @if($service->twitter_image)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $service->twitter_image) }}" alt="Twitter Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
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
