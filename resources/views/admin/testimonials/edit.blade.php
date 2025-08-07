@extends('admin.layouts.app')

@section('title', 'Edit Testimonial')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <h3 class="text-lg font-medium text-gray-900">Edit Testimonial</h3>
    </div>

    <form action="{{ route('admin.testimonials.update', $testimonial) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            <!-- Main Content -->
            <div class="lg:col-span-2 space-y-6">
                <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Name *</label>
                    <input type="text" name="name" id="name" value="{{ old('name', $testimonial->name) }}" required
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @error('name')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="position" class="block text-sm font-medium text-gray-700 mb-2">Position</label>
                        <input type="text" name="position" id="position" value="{{ old('position', $testimonial->position) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('position')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <div>
                        <label for="company" class="block text-sm font-medium text-gray-700 mb-2">Company</label>
                        <input type="text" name="company" id="company" value="{{ old('company', $testimonial->company) }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('company')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div>
                    <label for="testimonial" class="block text-sm font-medium text-gray-700 mb-2">Testimonial Content *</label>
                    <textarea name="testimonial" id="testimonial" rows="6" required
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('testimonial', $testimonial->testimonial) }}</textarea>
                    @error('testimonial')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <div>
                    <label for="rating" class="block text-sm font-medium text-gray-700 mb-2">Rating</label>
                    <select name="rating" id="rating"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select Rating</option>
                        <option value="1" {{ old('rating', $testimonial->rating) == '1' ? 'selected' : '' }}>1 Star</option>
                        <option value="2" {{ old('rating', $testimonial->rating) == '2' ? 'selected' : '' }}>2 Stars</option>
                        <option value="3" {{ old('rating', $testimonial->rating) == '3' ? 'selected' : '' }}>3 Stars</option>
                        <option value="4" {{ old('rating', $testimonial->rating) == '4' ? 'selected' : '' }}>4 Stars</option>
                        <option value="5" {{ old('rating', $testimonial->rating) == '5' ? 'selected' : '' }}>5 Stars</option>
                    </select>
                    @error('rating')
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
                                <option value="active" {{ old('status', $testimonial->status) == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ old('status', $testimonial->status) == 'inactive' ? 'selected' : '' }}>Inactive</option>
                            </select>
                            @error('status')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="sort_order" class="block text-sm font-medium text-gray-700 mb-2">Sort Order</label>
                            <input type="number" name="sort_order" id="sort_order" value="{{ old('sort_order', $testimonial->sort_order) }}" min="0"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('sort_order')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                <!-- Profile Image -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-900 mb-4">Profile Image</h4>

                    @if($testimonial->image)
                        <div class="mb-4">
                            <img src="{{ asset('uploads/' . $testimonial->image) }}" alt="{{ $testimonial->name }}" class="w-full h-32 object-cover rounded-lg">
                        </div>
                    @endif

                    <div>
                        <label for="image" class="block text-sm font-medium text-gray-700 mb-2">Upload New Image</label>
                        <input type="file" name="image" id="image" accept="image/*"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        @error('image')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                        <p class="mt-1 text-xs text-gray-500">Recommended size: 200x200px</p>
                    </div>
                </div>

                <!-- SEO Settings -->
                <div class="bg-gray-50 p-4 rounded-lg">
                    <h4 class="text-sm font-medium text-gray-900 mb-4">SEO Settings</h4>

                    <div class="space-y-4">
                        <div>
                            <label for="meta_title" class="block text-sm font-medium text-gray-700 mb-2">Meta Title</label>
                            <input type="text" name="meta_title" id="meta_title" value="{{ old('meta_title', $testimonial->meta_title) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('meta_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_description" class="block text-sm font-medium text-gray-700 mb-2">Meta Description</label>
                            <textarea name="meta_description" id="meta_description" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('meta_description', $testimonial->meta_description) }}</textarea>
                            @error('meta_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="meta_keywords" class="block text-sm font-medium text-gray-700 mb-2">Meta Keywords</label>
                            <input type="text" name="meta_keywords" id="meta_keywords" value="{{ old('meta_keywords', $testimonial->meta_keywords) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('meta_keywords')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($testimonial->meta_image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Meta Image</label>
                                <img src="{{ asset('storage/' . $testimonial->meta_image) }}" alt="Meta Image" class="w-full h-24 object-cover rounded-lg">
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
                            <input type="text" name="og_title" id="og_title" value="{{ old('og_title', $testimonial->og_title) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('og_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="og_description" class="block text-sm font-medium text-gray-700 mb-2">Open Graph Description</label>
                            <textarea name="og_description" id="og_description" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('og_description', $testimonial->og_description) }}</textarea>
                            @error('og_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($testimonial->og_image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current OG Image</label>
                                <img src="{{ asset('storage/' . $testimonial->og_image) }}" alt="OG Image" class="w-full h-24 object-cover rounded-lg">
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
                            <input type="text" name="twitter_title" id="twitter_title" value="{{ old('twitter_title', $testimonial->twitter_title) }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            @error('twitter_title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label for="twitter_description" class="block text-sm font-medium text-gray-700 mb-2">Twitter Description</label>
                            <textarea name="twitter_description" id="twitter_description" rows="3"
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ old('twitter_description', $testimonial->twitter_description) }}</textarea>
                            @error('twitter_description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        @if($testimonial->twitter_image)
                            <div class="mb-4">
                                <label class="block text-sm font-medium text-gray-700 mb-2">Current Twitter Image</label>
                                <img src="{{ asset('storage/' . $testimonial->twitter_image) }}" alt="Twitter Image" class="w-full h-24 object-cover rounded-lg">
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
            <a href="{{ route('admin.testimonials.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                Update Testimonial
            </button>
        </div>
    </form>
</div>
@endsection
