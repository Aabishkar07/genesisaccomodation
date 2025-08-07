@extends('admin.layouts.app')

@section('title', 'Edit Setting')
@section('page-title', 'Edit Setting')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">Edit Setting: {{ $setting->key }}</h3>
            <a href="{{ route('admin.settings.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-arrow-left mr-2"></i>
                Back to Settings
            </a>
        </div>
    </div>

    <form action="{{ route('admin.settings.update', $setting) }}" method="POST" enctype="multipart/form-data" class="p-6">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Key Field (Read-only) -->
            <div class="lg:col-span-2">
                <label for="key" class="block text-sm font-medium text-gray-700 mb-2">Setting Key</label>
                <input type="text" value="{{ $setting->key }}" disabled
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm bg-gray-50 text-gray-500">
                <p class="mt-1 text-sm text-gray-500">Setting key cannot be changed after creation</p>
            </div>

            <!-- Group Field -->
            <div>
                <label for="group" class="block text-sm font-medium text-gray-700 mb-2">Group *</label>
                <input type="text" name="group" id="group" value="{{ old('group', $setting->group) }}" required
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
                    <option value="text" {{ old('type', $setting->type) === 'text' ? 'selected' : '' }}>Text</option>
                    <option value="textarea" {{ old('type', $setting->type) === 'textarea' ? 'selected' : '' }}>Textarea</option>
                    <option value="image" {{ old('type', $setting->type) === 'image' ? 'selected' : '' }}>Image</option>
                    <option value="select" {{ old('type', $setting->type) === 'select' ? 'selected' : '' }}>Select</option>
                    <option value="url" {{ old('type', $setting->type) === 'url' ? 'selected' : '' }}>URL</option>
                    <option value="email" {{ old('type', $setting->type) === 'email' ? 'selected' : '' }}>Email</option>
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
                          placeholder="Brief description of this setting">{{ old('description', $setting->description) }}</textarea>
                @error('description')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Value Field -->
            <div class="lg:col-span-2">
                <label for="value" class="block text-sm font-medium text-gray-700 mb-2">Value</label>
                @if($setting->type === 'textarea')
                    <textarea name="value" id="value" rows="4"
                              class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                              placeholder="Setting value">{{ old('value', $setting->value) }}</textarea>
                @elseif($setting->type === 'select')
                    <select name="value" id="value"
                            class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                        <option value="">Select an option</option>
                        <option value="enabled" {{ old('value', $setting->value) === 'enabled' ? 'selected' : '' }}>Enabled</option>
                        <option value="disabled" {{ old('value', $setting->value) === 'disabled' ? 'selected' : '' }}>Disabled</option>
                    </select>
                @else
                    <input type="{{ $setting->type === 'email' ? 'email' : 'text' }}" name="value" id="value"
                           value="{{ old('value', $setting->value) }}"
                           class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           placeholder="Setting value">
                @endif
                @error('value')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Current Image Display (for image type) -->
            @if($setting->type === 'image' && $setting->value)
            <div class="lg:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Current Image</label>
                <div class="flex items-center space-x-4">
                    <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->description }}"
                         class="w-20 h-20 object-cover rounded-lg border border-gray-300">
                    <div>
                        <p class="text-sm text-gray-600">{{ $setting->value }}</p>
                        <p class="text-xs text-gray-500">Current image path</p>
                    </div>
                </div>
            </div>
            @endif

            <!-- File Upload Field (for image type) -->
            <div class="lg:col-span-2" id="file-upload-section" style="display: {{ $setting->type === 'image' ? 'block' : 'none' }};">
                <label for="value_file" class="block text-sm font-medium text-gray-700 mb-2">Upload New Image</label>
                <input type="file" name="value_file" id="value_file" accept="image/*"
                       class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                <p class="mt-1 text-sm text-gray-500">Accepted formats: JPEG, PNG, JPG, GIF (max 2MB). Leave empty to keep current image.</p>
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
                Update Setting
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
        } else {
            fileUploadSection.style.display = 'none';
        }
    }

    typeSelect.addEventListener('change', toggleFileUpload);
});
</script>
@endsection
