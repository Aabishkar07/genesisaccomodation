@extends('admin.layouts.app')

@section('title', 'About Us')
@section('page-title', 'About Us')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">About Us Content</h3>
            @if($aboutUs)
                <a href="{{ route('admin.about-us.edit', $aboutUs) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Content
                </a>
            @else
                <a href="{{ route('admin.about-us.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Create Content
                </a>
            @endif
        </div>
    </div>

    <div class="p-6">
        @if($aboutUs)
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Main Content -->
                <div class="space-y-6">
                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Title</h4>
                        <p class="text-gray-700">{{ $aboutUs->title }}</p>
                    </div>

                    <div>
                        <h4 class="text-sm font-medium text-gray-900 mb-2">Content</h4>
                        <div class="prose max-w-none">
                            {!! nl2br(e($aboutUs->content)) !!}
                        </div>
                    </div>

                    @if($aboutUs->mission)
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Mission</h4>
                            <p class="text-gray-700">{{ $aboutUs->mission }}</p>
                        </div>
                    @endif

                    @if($aboutUs->vision)
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Vision</h4>
                            <p class="text-gray-700">{{ $aboutUs->vision }}</p>
                        </div>
                    @endif

                    @if($aboutUs->values)
                        <div>
                            <h4 class="text-sm font-medium text-gray-900 mb-2">Values</h4>
                            <p class="text-gray-700">{{ $aboutUs->values }}</p>
                        </div>
                    @endif
                </div>

                <!-- Sidebar -->
                <div class="space-y-6">
                    <!-- Status -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Status</h4>
                        <div>
                            @if($aboutUs->status === 'active')
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

                    <!-- Image -->
                    @if($aboutUs->image)
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-900 mb-4">Featured Image</h4>
                            <img src="{{ asset('uploads/' . $aboutUs->image) }}" alt="{{ $aboutUs->title }}" class="w-full h-48 object-cover rounded-lg">
                        </div>
                    @endif

                    <!-- SEO Information -->
                    @if($aboutUs->meta_title || $aboutUs->meta_description || $aboutUs->meta_keywords)
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-900 mb-4">SEO Information</h4>

                            @if($aboutUs->meta_title)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $aboutUs->meta_title }}</div>
                                </div>
                            @endif

                            @if($aboutUs->meta_description)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $aboutUs->meta_description }}</div>
                                </div>
                            @endif

                            @if($aboutUs->meta_keywords)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Keywords</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $aboutUs->meta_keywords }}</div>
                                </div>
                            @endif

                            @if($aboutUs->meta_image)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">Meta Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $aboutUs->meta_image) }}" alt="Meta Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Social Media -->
                    @if($aboutUs->og_title || $aboutUs->og_description || $aboutUs->og_image || $aboutUs->twitter_title || $aboutUs->twitter_description || $aboutUs->twitter_image)
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="text-sm font-medium text-gray-900 mb-4">Social Media</h4>

                            @if($aboutUs->og_title)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $aboutUs->og_title }}</div>
                                </div>
                            @endif

                            @if($aboutUs->og_description)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $aboutUs->og_description }}</div>
                                </div>
                            @endif

                            @if($aboutUs->og_image)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">OG Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $aboutUs->og_image) }}" alt="OG Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
                                </div>
                            @endif

                            @if($aboutUs->twitter_title)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Title</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $aboutUs->twitter_title }}</div>
                                </div>
                            @endif

                            @if($aboutUs->twitter_description)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Description</span>
                                    <div class="mt-1 text-sm text-gray-900">{{ $aboutUs->twitter_description }}</div>
                                </div>
                            @endif

                            @if($aboutUs->twitter_image)
                                <div class="mb-3">
                                    <span class="text-xs font-medium text-gray-500 uppercase">Twitter Image</span>
                                    <div class="mt-2">
                                        <img src="{{ asset('storage/' . $aboutUs->twitter_image) }}" alt="Twitter Image" class="w-full h-24 object-cover rounded-lg">
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endif

                    <!-- Actions -->
                    <div class="bg-gray-50 p-4 rounded-lg">
                        <h4 class="text-sm font-medium text-gray-900 mb-4">Actions</h4>
                        <div class="space-y-2">
                            <a href="{{ route('admin.about-us.edit', $aboutUs) }}" class="block w-full text-center px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                                Edit Content
                            </a>
                            {{-- <form action="{{ route('admin.about-us.destroy', $aboutUs) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this content?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="block w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700">
                                    Delete Content
                                </button>
                            </form> --}}


                                    <form action="{{ route('admin.about-us.destroy', $aboutUs) }}" method="POST"
                                        class="delete-form-{{ $aboutUs->id }} inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" onclick="deleteItem('{{ $aboutUs->id }}')"
                                            class="block w-full px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-red-600 hover:bg-red-700 mt-3">
                                            <i class="fas fa-trash"></i> Delete Content
                                        </button>
                                    </form>


                        </div>
                    </div>
                </div>
            </div>
        @else
            <div class="text-center py-12">
                <div class="mx-auto h-12 w-12 bg-gray-200 rounded-lg flex items-center justify-center mb-4">
                    <i class="fas fa-info-circle text-gray-400 text-xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No About Us Content</h3>
                <p class="text-gray-500 mb-6">Create your first About Us content to get started.</p>
                <a href="{{ route('admin.about-us.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center justify-center mx-auto w-fit">
                    <i class="fas fa-plus mr-2"></i>
                    Create About Us Content
                </a>
            </div>
        @endif
    </div>
</div>
@endsection
