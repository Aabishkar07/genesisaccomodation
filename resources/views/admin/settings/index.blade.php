@extends('admin.layouts.app')

@section('title', 'Settings')
@section('page-title', 'Website Settings')

@section('content')
<div class="bg-white rounded-lg shadow-sm">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex items-center justify-between">
            <h3 class="text-lg font-medium text-gray-900">Website Settings</h3>
            <a href="{{ route('admin.settings.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                <i class="fas fa-plus mr-2"></i>
                Add New Setting
            </a>
        </div>
    </div>

    <form action="{{ route('admin.settings.bulk-update') }}" method="POST" class="p-6">
        @csrf
        @method('PUT')

        @foreach($settings as $group => $groupSettings)
        <div class="mb-8">
            <h4 class="text-lg font-medium text-gray-900 mb-4 capitalize">{{ str_replace('_', ' ', $group) }}</h4>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                @foreach($groupSettings as $setting)
                <div class="bg-gray-50 p-4 rounded-lg">
                    <div class="flex items-start justify-between mb-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">{{ $setting->description ?: ucwords(str_replace('_', ' ', $setting->key)) }}</label>
                            <p class="text-xs text-gray-500">{{ $setting->key }}</p>
                        </div>
                        <div class="flex items-center space-x-2">
                            <a href="{{ route('admin.settings.edit', $setting) }}" class="text-indigo-600 hover:text-indigo-900">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('admin.settings.destroy', $setting) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete this setting?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>

                    <input type="hidden" name="settings[{{ $setting->id }}][id]" value="{{ $setting->id }}">

                    @if($setting->type === 'textarea')
                        <textarea name="settings[{{ $setting->id }}][value]" rows="3"
                                  class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">{{ $setting->value }}</textarea>
                    @elseif($setting->type === 'image')
                        <div class="space-y-2">
                            @if($setting->value)
                                <div class="mb-2">
                                    <img src="{{ asset('storage/' . $setting->value) }}" alt="{{ $setting->description }}" class="w-20 h-20 object-cover rounded-lg">
                                </div>
                            @endif
                            <input type="text" name="settings[{{ $setting->id }}][value]" value="{{ $setting->value }}"
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                                   placeholder="Image path or URL">
                        </div>
                    @elseif($setting->type === 'select')
                        <select name="settings[{{ $setting->id }}][value]"
                                class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Select an option</option>
                            <option value="enabled" {{ $setting->value === 'enabled' ? 'selected' : '' }}>Enabled</option>
                            <option value="disabled" {{ $setting->value === 'disabled' ? 'selected' : '' }}>Disabled</option>
                        </select>
                    @else
                        <input type="{{ $setting->type === 'email' ? 'email' : 'text' }}"
                               name="settings[{{ $setting->id }}][value]"
                               value="{{ $setting->value }}"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                    @endif
                </div>
                @endforeach
            </div>
        </div>
        @endforeach

        <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200">
            <button type="submit" class="px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700">
                Save All Settings
            </button>
        </div>
    </form>
</div>
@endsection
