@extends('admin.layouts.app')

@section('title', 'Banner Details')
@section('page-title', 'Banner Details')

@section('content')
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Banner Details</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.banners.edit', $banner) }}"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                    <a href="{{ route('admin.banners.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Banner Image -->
                <div>
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Banner Image</h4>
                    <div class="bg-gray-100 rounded-lg p-4">
                        <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}"
                             class="w-full h-64 object-cover rounded">
                    </div>
                </div>

                <!-- Banner Details -->
                <div>
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Banner Information</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $banner->title ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subtitle</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $banner->subtitle ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Description</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $banner->description ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Button Text</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $banner->button_text ?? 'N/A' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Button Link</label>
                            <p class="mt-1 text-sm text-gray-900">
                                @if($banner->button_link)
                                    <a href="{{ $banner->button_link }}" target="_blank" class="text-blue-600 hover:text-blue-800">
                                        {{ $banner->button_link }}
                                    </a>
                                @else
                                    N/A
                                @endif
                            </p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <span class="mt-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $banner->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $banner->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Sort Order</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $banner->sort_order }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Created At</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $banner->created_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $banner->updated_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex items-center justify-between pt-6 border-t border-gray-200">
                <div class="flex space-x-3">
                    <form action="{{ route('admin.banners.destroy', $banner) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this banner?')"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-trash mr-2"></i>
                            Delete Banner
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
