@extends('admin.layouts.app')

@section('title', 'Edit Room Type')

@section('content')
    <div class="container mx-auto px-4 py-8">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-900">Edit Room Type</h1>
            <a href="{{ route('admin.room_types.index') }}"
                class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md transition duration-200">
                Back to Room Types
            </a>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6">
            <form action="{{ route('admin.room_types.update', $roomType) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Information -->
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                            <input type="text" name="name" id="name" value="{{ old('name', $roomType->name) }}"
                                required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description
                                *</label>
                            <textarea name="description" id="description" rows="4" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('description', $roomType->description) }}</textarea>
                            @error('description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>



                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status *</label>
                            <select name="status" id="status" required
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="">Select Status</option>
                                <option value="available"
                                    {{ old('status', $roomType->status) == 'available' ? 'selected' : '' }}>Available
                                </option>
                                <option value="unavailable"
                                    {{ old('status', $roomType->status) == 'unavailable' ? 'selected' : '' }}>Unavailable
                                </option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label class='block text-sm font-medium text-gray-700 mb-2'>Featured Image</label>
                            <div class=''>
                                <input type="file" name="featured_image"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 "
                                    onchange="loadFile(event)" />
                            </div>
                            <img id="output" style="width: 70px; margin-bottom: 2px;" />
                            @if ($roomType->featured_image)
                                <img class="oldimage" src="{{ asset('uploads/' . $roomType->featured_image) }}"
                                    alt="Card" style="width: 70px;margin-bottom:2px;">
                            @endif
                            @error('featured_image')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
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
                                    value="{{ old('meta_title', $roomType->meta_title) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error('meta_title')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                    Description</label>
                                <textarea name="meta_description" id="meta_description" rows="3"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('meta_description', $roomType->meta_description) }}</textarea>
                                @error('meta_description')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                    Keywords</label>
                                <input type="text" name="meta_keywords" id="meta_keywords"
                                    value="{{ old('meta_keywords', $roomType->meta_keywords) }}"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                @error('meta_keywords')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="meta_image" class="block text-sm font-medium text-gray-700 mb-2">Meta
                                    Image</label>
                                <input type="file" name="meta_image" id="meta_image" accept="image/*"
                                    onchange="loadFile1(event)"
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <img id="output1" style="width: 70px; margin-bottom: 2px;" />
                                @if ($roomType->meta_image)
                                    <img class="oldimage1" src="{{ asset('uploads/' . $roomType->meta_image) }}"
                                        alt="Card" style="width: 70px;margin-bottom:2px;">
                                @endif
                                @error('meta_image')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="bg-gray-50 p-4 rounded-lg mt-6">
                            <h4 class="text-sm font-medium text-gray-900 mb-4">Social Media</h4>
                            <div class="space-y-4">
                                <div>
                                    <label for="og_title" class="block text-sm font-medium text-gray-700 mb-2">Open Graph
                                        Title</label>
                                    <input type="text" name="og_title" id="og_title"
                                        value="{{ old('og_title', $roomType->og_title) }}"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    @error('og_title')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="og_description" class="block text-sm font-medium text-gray-700 mb-2">Open
                                        Graph Description</label>
                                    <textarea name="og_description" id="og_description" rows="3"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('og_description', $roomType->og_description) }}</textarea>
                                    @error('og_description')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                <div>
                                    <label for="og_image" class="block text-sm font-medium text-gray-700 mb-2">Open Graph
                                        Image</label>
                                    <input type="file" name="og_image" id="og_image" accept="image/*" onchange="loadFile2(event)"
                                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                    <img id="output2" style="width: 70px; margin-bottom: 2px;" />
                                    @if ($roomType->og_image)
                                        <img class="oldimage2" src="{{ asset('uploads/' . $roomType->og_image) }}"
                                            alt="Card" style="width: 70px;margin-bottom:2px;">
                                    @endif
                                    @error('og_image')
                                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-end space-x-4 mt-8">
                    <a href="{{ route('admin.room_types.index') }}"
                        class="bg-gray-500 hover:bg-gray-600 text-white px-6 py-2 rounded-md transition duration-200">
                        Cancel
                    </a>
                    <button type="submit"
                        class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-md transition duration-200">
                        Update Room Type
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
