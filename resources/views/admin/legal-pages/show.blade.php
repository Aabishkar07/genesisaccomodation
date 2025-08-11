@extends('admin.layouts.app')

@section('title', 'Legal Page Details')
@section('page-title', 'Legal Page Details')

@section('content')
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Legal Page Details</h3>
                <div class="flex space-x-2">
                    <a href="{{ route('admin.legal-pages.edit', $legalPage) }}"
                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-edit mr-2"></i>
                        Edit
                    </a>
                    <a href="{{ route('admin.legal-pages.index') }}"
                        class="bg-gray-600 hover:bg-gray-700 text-white px-4 py-2 rounded-lg flex items-center">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back
                    </a>
                </div>
            </div>
        </div>

        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <!-- Page Information -->
                <div>
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Page Information</h4>
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Page Type</label>
                            <span class="mt-1 px-2 py-1 text-xs font-medium rounded-full
                                {{ $legalPage->type === 'privacy_policy' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                {{ $legalPage->type_display_name }}
                            </span>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Title</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $legalPage->title }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Subtitle</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $legalPage->subtitle ?? 'No subtitle' }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Status</label>
                            <span class="mt-1 px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                {{ $legalPage->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $legalPage->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Created At</label>
                            <p class="mt-1 text-sm text-gray-900">{{ $legalPage->created_at->format('F j, Y \a\t g:i A') }}</p>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Last Updated</label>
                            <p class="mt-1 text-sm text-gray-900">
                                {{ $legalPage->last_updated ? $legalPage->last_updated->format('F j, Y \a\t g:i A') : 'Never' }}
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Page Preview -->
                <div>
                    <h4 class="text-lg font-medium text-gray-900 mb-4">Page Preview</h4>
                    <div class="bg-gray-50 rounded-lg p-4 max-h-96 overflow-y-auto">
                        <div class="prose max-w-none">
                            {!! $legalPage->content !!}
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="mt-8 flex items-center justify-between pt-6 border-t border-gray-200">
                <div class="flex space-x-3">
                    <form action="{{ route('admin.legal-pages.destroy', $legalPage) }}" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete this legal page?')"
                            class="bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-lg flex items-center">
                            <i class="fas fa-trash mr-2"></i>
                            Delete Page
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
