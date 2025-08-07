@extends('admin.layouts.app')

@section('title', 'View Setting')
@section('page-title', 'Setting Details')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">Setting Details: {{ $setting->key }}</h3>
            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.settings.edit', $setting) }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Setting
                </a>
                <a href="{{ route('admin.settings.index') }}" class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Back to Settings
                </a>
            </div>
        </div>
    </div>

    <div class="p-6">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Key -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Setting Key</label>
                <div class="bg-gray-50 px-3 py-2 rounded-md border border-gray-300">
                    <code class="text-sm text-gray-900">{{ $setting->key }}</code>
                </div>
            </div>

            <!-- Group -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Group</label>
                <div class="bg-gray-50 px-3 py-2 rounded-md border border-gray-300">
                    <span class="text-sm text-gray-900 capitalize">{{ str_replace('_', ' ', $setting->group) }}</span>
                </div>
            </div>

            <!-- Type -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Type</label>
                <div class="bg-gray-50 px-3 py-2 rounded-md border border-gray-300">
                    <span class="text-sm text-gray-900 capitalize">{{ $setting->type }}</span>
                </div>
            </div>

            <!-- Description -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                <div class="bg-gray-50 px-3 py-2 rounded-md border border-gray-300">
                    <span class="text-sm text-gray-900">{{ $setting->description ?: 'No description provided' }}</span>
                </div>
            </div>

            <!-- Value -->
            <div class="lg:col-span-2">
                <label class="block text-sm font-medium text-gray-700 mb-2">Value</label>
                <div class="bg-gray-50 px-3 py-2 rounded-md border border-gray-300">
                    @if($setting->type === 'image' && $setting->value)
                        <div class="flex items-center space-x-4">
                            <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->description }}"
                                 class="w-16 h-16 object-cover rounded-lg border border-gray-300">
                            <div>
                                <p class="text-sm text-gray-900">{{ $setting->value }}</p>
                                <p class="text-xs text-gray-500">Image path</p>
                            </div>
                        </div>
                    @elseif($setting->type === 'textarea')
                        <div class="whitespace-pre-wrap text-sm text-gray-900">{{ $setting->value ?: 'No value set' }}</div>
                    @else
                        <span class="text-sm text-gray-900">{{ $setting->value ?: 'No value set' }}</span>
                    @endif
                </div>
            </div>

            <!-- Created At -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Created At</label>
                <div class="bg-gray-50 px-3 py-2 rounded-md border border-gray-300">
                    <span class="text-sm text-gray-900">{{ $setting->created_at->format('F j, Y \a\t g:i A') }}</span>
                </div>
            </div>

            <!-- Updated At -->
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Last Updated</label>
                <div class="bg-gray-50 px-3 py-2 rounded-md border border-gray-300">
                    <span class="text-sm text-gray-900">{{ $setting->updated_at->format('F j, Y \a\t g:i A') }}</span>
                </div>
            </div>
        </div>

        <!-- Action Buttons -->
        <div class="flex items-center justify-between pt-6 border-t border-gray-200">
            <div class="flex items-center space-x-3">
                <form action="{{ route('admin.settings.destroy', $setting) }}" method="POST" class="inline"
                      onsubmit="return confirm('Are you sure you want to delete this setting? This action cannot be undone.')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="px-4 py-2 border border-red-300 rounded-md shadow-sm text-sm font-medium text-red-700 bg-white hover:bg-red-50">
                        <i class="fas fa-trash mr-2"></i>
                        Delete Setting
                    </button>
                </form>
            </div>

            <div class="flex items-center space-x-3">
                <a href="{{ route('admin.settings.edit', $setting) }}" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                    <i class="fas fa-edit mr-2"></i>
                    Edit Setting
                </a>
                <a href="{{ route('admin.settings.index') }}" class="px-4 py-2 border border-gray-300 rounded-md shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50">
                    Back to Settings
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
