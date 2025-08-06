@extends('admin.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Statistics Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-blue-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-blog text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Total Blogs</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Blog::count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-hotel text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Accommodations</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Accommodation::count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-yellow-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-bed text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Room Types</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\RoomType::count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-purple-500 rounded-lg flex items-center justify-center">
                        <i class="fas fa-star text-white"></i>
                    </div>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-500">Testimonials</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ \App\Models\Testimonial::count() }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Quick Actions -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Quick Actions</h3>
        </div>
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <a href="{{ route('admin.blogs.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-blue-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900">Create New Blog</p>
                        <p class="text-sm text-gray-500">Add a new blog post</p>
                    </div>
                </a>

                <a href="{{ route('admin.accommodations.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-green-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900">Add Accommodation</p>
                        <p class="text-sm text-gray-500">Create new accommodation</p>
                    </div>
                </a>

                <a href="{{ route('admin.room-types.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-yellow-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900">Add Room Type</p>
                        <p class="text-sm text-gray-500">Create new room type</p>
                    </div>
                </a>

                <a href="{{ route('admin.testimonials.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-purple-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900">Add Testimonial</p>
                        <p class="text-sm text-gray-500">Create new testimonial</p>
                    </div>
                </a>

                <a href="{{ route('admin.services.create') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-indigo-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-plus text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900">Add Service</p>
                        <p class="text-sm text-gray-500">Create new service</p>
                    </div>
                </a>

                <a href="{{ route('admin.settings.index') }}" class="flex items-center p-4 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="flex-shrink-0">
                        <div class="w-10 h-10 bg-gray-500 rounded-lg flex items-center justify-center">
                            <i class="fas fa-cog text-white"></i>
                        </div>
                    </div>
                    <div class="ml-4">
                        <p class="text-sm font-medium text-gray-900">Manage Settings</p>
                        <p class="text-sm text-gray-500">Update website settings</p>
                    </div>
                </a>
            </div>
        </div>
    </div>

    <!-- Recent Activity -->
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Recent Activity</h3>
        </div>
        <div class="p-6">
            <div class="space-y-4">
                @php
                    $recentBlogs = \App\Models\Blog::latest()->take(5)->get();
                    $recentAccommodations = \App\Models\Accommodation::latest()->take(5)->get();
                @endphp

                @if($recentBlogs->count() > 0)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Recent Blogs</h4>
                        <div class="space-y-2">
                            @foreach($recentBlogs as $blog)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $blog->title }}</p>
                                        <p class="text-xs text-gray-500">{{ $blog->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('admin.blogs.edit', $blog) }}" class="text-blue-600 hover:text-blue-900 text-sm">
                                        Edit
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                @if($recentAccommodations->count() > 0)
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-3">Recent Accommodations</h4>
                        <div class="space-y-2">
                            @foreach($recentAccommodations as $accommodation)
                                <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                    <div>
                                        <p class="text-sm font-medium text-gray-900">{{ $accommodation->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $accommodation->created_at->diffForHumans() }}</p>
                                    </div>
                                    <a href="{{ route('admin.accommodations.edit', $accommodation) }}" class="text-blue-600 hover:text-blue-900 text-sm">
                                        Edit
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
