@extends('admin.layouts.app')

@section('title', 'Create Setting')
@section('page-title', 'Create New Setting')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">Create New Setting</h3>
            <a href="{{ route('admin.settings.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Settings
            </a>
        </div>
    </div>

    <form action="{{ route('admin.settings.store') }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Key Field -->
            <div class="lg:col-span-2">
                <label for="key" class="block text-sm font-medium text-gray-700 mb-2">Setting Key *</label>
                <input type="text" name="key" id="key" value="{{ old('key') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g., site_title, contact_email">
                @error('key')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Group Field -->
            <div>
                <label for="group" class="block text-sm font-medium text-gray-700 mb-2">Group *</label>
                <input type="text" name="group" id="group" value="{{ old('group') }}" required
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       placeholder="e.g., general, contact, social">
                @error('group')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Type Field -->
            {{-- <div>
                <label for="type" class="block text-sm font-medium text-gray-700 mb-2">Type *</label>
                <select name="type" id="type" required
                        class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    <option value="">Select Type</option>
                    <option value="text" {{ old('type') === 'text' ? 'selected' : '' }}>Text</option>
                    <option value="textarea" {{ old('type') === 'textarea' ? 'selected' : '' }}>Textarea</option>
                    <option value="image" {{ old('type') === 'image' ? 'selected' : '' }}>Image</option>
                    <option value="select" {{ old('type') === 'select' ? 'selected' : '' }}>Select</option>
                    <option value="url" {{ old('type') === 'url' ? 'selected' : '' }}>URL</option>
                    <option value="email" {{ old('type') === 'email' ? 'selected' : '' }}>Email</option>
                </select>
                @error('type')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div> --}}

            <!-- Description Field -->
            <div class="lg:col-span-2">
                <label for="description" class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <textarea name="description" id="description" rows="3"
                          class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                          placeholder="Brief description of this setting">{{ old('description') }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Value Field -->
            <div class="lg:col-span-2">
                <label for="value" class="block text-sm font-medium text-gray-700 mb-2">Value</label>
                <input type="text" name="value" id="value" value="{{ old('value') }}"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                       placeholder="Setting value">
                @error('value')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- File Upload Field (for image type) -->
            <div class="lg:col-span-2" id="file-upload-section" style="display: none;">
                <label for="value_file" class="block text-sm font-medium text-gray-700 mb-2">Upload Image</label>
                <input type="file" name="value_file" id="value_file" accept="image/*"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <p class="mt-1 text-sm text-gray-500">Accepted formats: JPEG, PNG, JPG, GIF (max 2MB)</p>
                @error('value_file')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
            <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                Cancel
            </a>
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                Create Setting
            </button>
        </div>
    </form>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const typeSelect = document.getElementById('type');
    const fileUploadSection = document.getElementById('file-upload-section');
    const valueInput = document.getElementById('value');

    function toggleFileUpload() {
        if (typeSelect.value === 'image') {
            fileUploadSection.style.display = 'block';
            valueInput.placeholder = 'Image path or URL (optional if uploading file)';
        } else {
            fileUploadSection.style.display = 'none';
            valueInput.placeholder = 'Setting value';
        }
    }

    typeSelect.addEventListener('change', toggleFileUpload);
    toggleFileUpload(); // Initial call
});
</script>
@endsection
