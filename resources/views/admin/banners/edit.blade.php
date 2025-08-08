@extends('admin.layouts.app')

@section('title', 'Edit Banner')
@section('page-title', 'Edit Banner')

@section('content')
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <h3 class="text-lg font-medium text-gray-900">Edit Banner</h3>
        </div>

        <div class="p-6">
            <form action="{{ route('admin.banners.update', $banner) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Title -->
                    <div>
                        <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title</label>
                        <input type="text" name="title" id="title" value="{{ old('title', $banner->title) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter banner title">
                        @error('title')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Subtitle -->
                    <div>
                        <label for="subtitle" class="block text-sm font-medium text-gray-700 mb-2">Subtitle</label>
                        <input type="text" name="subtitle" id="subtitle"
                            value="{{ old('subtitle', $banner->subtitle) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter banner subtitle">
                        @error('subtitle')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Button Text -->
                    <div>
                        <label for="button_text" class="block text-sm font-medium text-gray-700 mb-2">Button Text</label>
                        <input type="text" name="button_text" id="button_text"
                            value="{{ old('button_text', $banner->button_text) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter button text">
                        @error('button_text')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Button Link -->
                    <div>
                        <label for="button_link" class="block text-sm font-medium text-gray-700 mb-2">Button Link</label>
                        <input type="text" name="button_link" id="button_link"
                            value="{{ old('button_link', $banner->button_link) }}"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            placeholder="Enter button link">
                        @error('button_link')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                   

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <div class="flex items-center">
                            <input type="checkbox" name="is_active" id="is_active" value="1"
                                {{ old('is_active', $banner->is_active) ? 'checked' : '' }}
                                class="h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                            <label for="is_active" class="ml-2 block text-sm text-gray-900">
                                Active
                            </label>
                        </div>
                        @error('is_active')
                            <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Description -->
                <div class="mt-6">
                    <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                    <textarea name="description" id="description" rows="4"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Enter banner description">{{ old('description', $banner->description) }}</textarea>
                    @error('description')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Current Image -->
                @if ($banner->image)
                    <div class="mt-6 oldimage">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                        <div class="flex items-center space-x-4">
                            <img src="{{ $banner->image_url }}" alt="{{ $banner->title }}"
                                class="w-32 h-24 object-cover rounded border">
                            <div>
                                <p class="text-sm text-gray-600">{{ $banner->image }}</p>
                                <p class="text-xs text-gray-500">Upload a new image to replace this one</p>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- Image Upload -->
                <div class="mt-6">
                    <label for="image" class="block text-sm font-medium text-gray-700 mb-2">
                        {{ $banner->image ? 'New Banner Image' : 'Banner Image' }}
                    </label>
                    <input type="file" name="image" id="image" accept="image/*" onchange="loadFile(event)"
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                    <p class="text-sm text-gray-500 mt-1">Upload an image (JPEG, PNG, JPG, GIF). Max size: 2MB.</p>

                    <img id="output" style="width: 70px; margin-bottom: 2px;" />

                    @error('image')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Buttons -->
                <div class="mt-6 flex items-center justify-end space-x-3">
                    <a href="{{ route('admin.banners.index') }}"
                        class="px-4 py-2 border border-gray-300 rounded-md text-sm font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Cancel
                    </a>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 border border-transparent rounded-md text-sm font-medium text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Update Banner
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
