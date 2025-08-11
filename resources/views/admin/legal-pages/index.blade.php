@extends('admin.layouts.app')

@section('title', 'Legal Pages')
@section('page-title', 'Legal Pages')

@section('content')
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Legal Pages</h3>
                <a href="{{ route('admin.legal-pages.create') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-plus mr-2"></i>
                    Add New Page
                </a>
            </div>
        </div>

        <div class="p-6">
            @if ($legalPages->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Type</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Title</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Status</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Last Updated</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($legalPages as $legalPage)
                                <tr>
                                    <td class="px-5 py-3">
                                        <span class="px-2 py-1 text-xs font-medium rounded-full
                                            {{ $legalPage->type === 'privacy_policy' ? 'bg-blue-100 text-blue-800' : 'bg-green-100 text-green-800' }}">
                                            {{ $legalPage->type_display_name }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-3">
                                        <p class="text-gray-900 font-medium">{{ $legalPage->title }}</p>
                                    </td>

                                    <td class="px-5 py-3">
                                        <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full
                                            {{ $legalPage->is_active ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $legalPage->is_active ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-3">
                                        <p class="text-gray-900 text-sm">
                                            {{ $legalPage->last_updated ? $legalPage->last_updated->format('jS M Y') : 'Never' }}
                                        </p>
                                    </td>

                                    <td>
                                        <div class="flex items-center p-2">
                                            <!-- View Button -->
                                            <a href="{{ route('admin.legal-pages.show', $legalPage) }}"
                                                class="flex px-2 py-1 mx-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 4c-5 0 -9 4 -9 8s4 8 9 8s9 -4 9 -8s-4 -8 -9 -8z"></path>
                                                    <path d="M15 12c0 1.5 -1.5 3 -3 3s-3 -1.5 -3 -3s1.5 -3 3 -3s3 1.5 3 3z"></path>
                                                </svg>
                                            </a>

                                            <!-- Edit Button -->
                                            <a href="{{ route('admin.legal-pages.edit', $legalPage) }}"
                                                class="flex px-2 py-1 mx-2 text-white bg-yellow-500 hover:bg-yellow-600 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit"
                                                     width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                     stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1"></path>
                                                    <path d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z"></path>
                                                    <path d="M16 5l3 3"></path>
                                                </svg>
                                            </a>

                                            <!-- Toggle Status Button -->
                                            <form action="{{ route('admin.legal-pages.toggle-status', $legalPage) }}" method="POST" class="inline">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit"
                                                    class="flex px-2 py-1 mx-2 text-white {{ $legalPage->is_active ? 'bg-orange-500 hover:bg-orange-600' : 'bg-green-500 hover:bg-green-600' }} rounded-md"
                                                    title="{{ $legalPage->is_active ? 'Deactivate' : 'Activate' }}">
                                                    @if($legalPage->is_active)
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye-off"
                                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M10.585 10.587a2 2 0 0 0 2.829 2.828"></path>
                                                            <path d="M16.681 16.673a8.717 8.717 0 0 1 -4.681 1.327c-3.314 0 -6 -2.686 -6 -6a8.717 8.717 0 0 1 1.327 -4.681"></path>
                                                            <path d="M3 3l18 18"></path>
                                                            <path d="M12 4c-5 0 -9 4 -9 8s4 8 9 8s9 -4 9 -8s-4 -8 -9 -8z"></path>
                                                        </svg>
                                                    @else
                                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                                             width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                             stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M12 4c-5 0 -9 4 -9 8s4 8 9 8s9 -4 9 -8s-4 -8 -9 -8z"></path>
                                                            <path d="M15 12c0 1.5 -1.5 3 -3 3s-3 -1.5 -3 -3s1.5 -3 3 -3s3 1.5 3 3z"></path>
                                                        </svg>
                                                    @endif
                                                </button>
                                            </form>

                                            <!-- Delete Button -->
                                            <form action="{{ route('admin.legal-pages.destroy', $legalPage) }}" method="POST"
                                                class="delete-form-{{ $legalPage->id }} inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deleteItem('{{ $legalPage->id }}')"
                                                    class="text-red-600 hover:text-red-900">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="text-center bg-gray-100 font-semibold text-red-600 border p-10">
                    No Legal Pages Found.
                </div>
            @endif
        </div>
    </div>

    <script>
        function deleteItem(legalPageId) {
            if (confirm('Are you sure you want to delete this legal page?')) {
                document.querySelector('.delete-form-' + legalPageId).submit();
            }
        }
    </script>
@endsection
