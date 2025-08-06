@extends('admin.layouts.app')

@section('title', 'View Blog')
@section('page-title', 'View Blog')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">{{ $blog->title }}</h3>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.blogs.edit', $blog) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit
                </a>
                <a href="{{ route('admin.blogs.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Back to List
                </a>
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Featured Image -->
                @if($blog->featured_image)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Featured Image</h4>
                        <img src="{{ asset('uploads/' . $blog->featured_image) }}" alt="{{ $blog->title }}" class="w-full h-full object-cover rounded-lg">
                    </div>
                @endif

                <!-- Content -->
                <div>
                    <h4 class="text-sm font-medium text-gray-900 mb-2">Content</h4>
                    <div class="prose max-w-none">
                        {!! nl2br(e($blog->content)) !!}
                    </div>
                </div>

                @if($blog->excerpt)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Excerpt</h4>
                        <p class="text-gray-700">{{ $blog->excerpt }}</p>
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
                                @if($blog->status === 'published')
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                        Published
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-yellow-100 text-yellow-800">
                                        Draft
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Sort Order</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $blog->sort_order }}</div>
                        </div>

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Slug</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $blog->slug }}</div>
                        </div>

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Created</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $blog->created_at->format('M d, Y H:i') }}</div>
                        </div>

                        <div>
                            <span class="text-xs font-medium text-gray-500 uppercase">Updated</span>
                            <div class="mt-1 text-sm text-gray-900">{{ $blog->updated_at->format('M d, Y H:i') }}</div>
                        </div>
                    </div>
                </div>

                <!-- SEO Information -->
                @if($blog->meta_title || $blog->meta_description || $blog->meta_keywords)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">SEO Information</h4>

                        <div class="space-y-3">
                            @if($blog->meta_title)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $blog->meta_title }}</div>
                                </div>
                            @endif

                            @if($blog->meta_description)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $blog->meta_description }}</div>
                                </div>
                            @endif

                            @if($blog->meta_keywords)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Keywords</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $blog->meta_keywords }}</div>
                                </div>
                            @endif

                            @if($blog->meta_image)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/' . $blog->meta_image) }}" alt="Meta Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                @endif

                <!-- Social Media -->
                @if($blog->og_title || $blog->og_description || $blog->og_image || $blog->twitter_title || $blog->twitter_description || $blog->twitter_image)
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Social Media</h4>

                        <div class="space-y-3">
                            @if($blog->og_title)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $blog->og_title }}</div>
                                </div>
                            @endif

                            @if($blog->og_description)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $blog->og_description }}</div>
                                </div>
                            @endif

                            @if($blog->og_image)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/' . $blog->og_image) }}" alt="OG Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
                                </div>
                            @endif

                            @if($blog->twitter_title)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $blog->twitter_title }}</div>
                                </div>
                            @endif

                            @if($blog->twitter_description)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $blog->twitter_description }}</div>
                                </div>
                            @endif

                            @if($blog->twitter_image)
                                <div>
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('uploads/' . $blog->twitter_image) }}" alt="Twitter Image" class="w-full h-24 object-cover rounded-lg">
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
