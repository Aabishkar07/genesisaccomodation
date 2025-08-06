@extends('admin.layouts.app')

@section('title', 'Edit About Us')
@section('page-title', 'Edit About Us Content')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Edit About Us Content</h3>
    </div>

    <form action="{{ route('admin.about-us.update', $aboutUs) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label for="title" class="block text-sm font-medium text-gray-700 mb-2">Title *</label>
                    <input type="text" name="title" id="title" value="{{ old('title', $aboutUs->title) }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('title')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="content" class="block text-sm font-medium text-gray-700 mb-2">Content *</label>
                    <textarea name="content" id="content" rows="12" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('content', $aboutUs->content) }}</textarea>
                    @error('content')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="mission" class="block text-sm font-medium text-gray-700 mb-2">Mission</label>
                    <textarea name="mission" id="mission" rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('mission', $aboutUs->mission) }}</textarea>
                    @error('mission')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="vision" class="block text-sm font-medium text-gray-700 mb-2">Vision</label>
                    <textarea name="vision" id="vision" rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('vision', $aboutUs->vision) }}</textarea>
                    @error('vision')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="values" class="block text-sm font-medium text-gray-700 mb-2">Values</label>
                    <textarea name="values" id="values" rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('values', $aboutUs->values) }}</textarea>
                    @error('values')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <!-- Sidebar -->
            <div class="space-y-6">
                <!-- Status -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-900 mb-4">Publishing</h4>

                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" id="status" required
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                                <option value="active" {{ old('status', $aboutUs->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $aboutUs->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Featured Image -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-900 mb-4">Featured Image</h4>

                    @if($aboutUs->image)
                        <div class="mb-4">
                            <img src="{{ asset('storage/' . $aboutUs->image) }}" alt="{{ $aboutUs->title }}" class="w-full h-32 object-cover rounded-lg">
                        </div>
                    @endif

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Upload New Image</label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-900 mb-4">SEO Settings</h4>

                    <div class="space-y-4">
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $aboutUs->meta_title) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('meta_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('meta_description', $aboutUs->meta_description) }}</textarea>
                            @error('meta_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $aboutUs->meta_keywords) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('meta_keywords')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($aboutUs->meta_image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Meta Image</label>
                                <img src="{{ asset('storage/' . $aboutUs->meta_image) }}" alt="Meta Image" class="w-full h-24 object-cover rounded-lg">
                            </div>
                        @endif

                        <div>
                            <label for="meta_image" class="block text-sm font-medium text-gray-700 mb-2">Upload New Meta Image</label>
                            <input type="file" name="meta_image" id="meta_image" accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('meta_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Social Media -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-900 mb-4">Social Media</h4>

                    <div class="space-y-4">
                        <div>
                            <label for="og_title" class="block text-sm font-medium text-gray-700 mb-2">Open Graph Title</label>
                            <input type="text" name="og_title" id="og_title" value="{{ old('og_title', $aboutUs->og_title) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('og_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="og_description" class="block text-sm font-medium text-gray-700 mb-2">Open Graph Description</label>
                            <textarea name="og_description" id="og_description" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('og_description', $aboutUs->og_description) }}</textarea>
                            @error('og_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($aboutUs->og_image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current OG Image</label>
                                <img src="{{ asset('storage/' . $aboutUs->og_image) }}" alt="OG Image" class="w-full h-24 object-cover rounded-lg">
                            </div>
                        @endif

                        <div>
                            <label for="og_image" class="block text-sm font-medium text-gray-700 mb-2">Upload New OG Image</label>
                            <input type="file" name="og_image" id="og_image" accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('og_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="twitter_title" class="block text-sm font-medium text-gray-700 mb-2">Twitter Title</label>
                            <input type="text" name="twitter_title" id="twitter_title" value="{{ old('twitter_title', $aboutUs->twitter_title) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('twitter_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="twitter_description" class="block text-sm font-medium text-gray-700 mb-2">Twitter Description</label>
                            <textarea name="twitter_description" id="twitter_description" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('twitter_description', $aboutUs->twitter_description) }}</textarea>
                            @error('twitter_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($aboutUs->twitter_image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Twitter Image</label>
                                <img src="{{ asset('storage/' . $aboutUs->twitter_image) }}" alt="Twitter Image" class="w-full h-24 object-cover rounded-lg">
                            </div>
                        @endif

                        <div>
                            <label for="twitter_image" class="block text-sm font-medium text-gray-700 mb-2">Upload New Twitter Image</label>
                            <input type="file" name="twitter_image" id="twitter_image" accept="image/*"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('twitter_image')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3 mt-6 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.about-us.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                Update About Us Content
            </button>
        </div>
    </form>
</div>
@endsection
