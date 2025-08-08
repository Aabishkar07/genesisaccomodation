@extends('admin.layouts.app')

@section('title', 'Contacts')
@section('page-title', 'Contacts')

@section('content')
    <div class="bg-white rounded-lg shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-medium text-gray-900">Contacts</h3>
                <a href="{{ route('admin.contacts.export') }}"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg flex items-center">
                    <i class="fas fa-download mr-2"></i>
                    Export CSV
                </a>
            </div>
        </div>



        <div class="p-6">
            @if ($contacts->count() > 0)
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Name</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Email</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Phone</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Subject</th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Contact Date</th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions</th>
                            </tr>
                        </thead>



                        <tbody class="bg-white divide-y divide-gray-200 ">
                            @foreach ($contacts as $contact)
                                <tr>
                                    <td class="px-5 py-3 ">
                                        <p class="text-gray-900 ">{{ $contact->name }}</p>
                                    </td>

                                    <td class="px-5 py-3 ">
                                        <p class="text-gray-900 ">{{ $contact->email }}</p>
                                    </td>
                                    <td class="px-5 py-3 ">
                                        <p class="text-gray-900 ">{{ $contact->phone }}</p>
                                    </td>
                                    <td class="px-5 py-3 ">
                                        <p class="text-gray-900 ">{{ $contact->subject }}</p>
                                    </td>





                                    <td class="w-48 px-5 py-3 text-sm">
                                        <p class="text-gray-900 ">
                                            {{ $contact->created_at->format('jS M Y') }}
                                        </p>
                                    </td>


                                    <td>
                                        <div class="flex items-center p-2">
                                            <!-- View Button -->
                                            <button type="button" onclick="viewItem({{ $contact->id }})"
                                                class="flex px-2 py-1 mx-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md">
                                                <svg xmlns="http://www.w3.org/2000/svg"
                                                    class="icon icon-tabler icon-tabler-eye" width="24" height="24"
                                                    viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                    fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                    <path d="M12 4c-5 0 -9 4 -9 8s4 8 9 8s9 -4 9 -8s-4 -8 -9 -8z"></path>
                                                    <path d="M15 12c0 1.5 -1.5 3 -3 3s-3 -1.5 -3 -3s1.5 -3 3 -3s3 1.5 3 3z">
                                                    </path>
                                                </svg>
                                            </button>




                                            <form action="{{ route('contactdelete', $contact) }}" method="POST"
                                                class="delete-form-{{ $contact->id }} inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" onclick="deleteItem('{{ $contact->id }}')"
                                                    class="text-red-600 hover:text-red-900">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>

                                        </div>
                                    </td>

                                    <!-- Modal for Viewing Contact Details -->
                                    <div id="view-modal-{{ $contact->id }}"
                                        class=" max-sm:p-4 fixed z-[999] inset-0 flex justify-center items-center bg-gray-800 bg-opacity-50 hidden"
                                        onclick="closeViewModalIfClickedOutside(event, {{ $contact->id }})">
                                        <div class="bg-white max-h-[60vh] overflow-auto text-gray-600 p-6 rounded-lg w-96 shadow-lg"
                                            onclick="event.stopPropagation()">
                                            <h3 class="text-2xl font-semibold text-center mb-4">Contact Details</h3>
                                            <div class="space-y-2">
                                                <p><strong>Name:</strong> {{ $contact->name }}</p>
                                                <p><strong>Email:</strong> {{ $contact->email }}</p>
                                                <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                                                <p><strong>Subject:</strong> {{ $contact->subject }}</p>
                                                <p><strong>Message:</strong> {{ $contact->message }}</p>
                                            </div>
                                            <div class="mt-4 ">
                                                <button onclick="closeViewModal({{ $contact->id }})"
                                                    class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                                    Close
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <script>
                                        // Show View Modal
                                        function viewItem(contactId) {
                                            const modal = document.getElementById(`view-modal-${contactId}`);
                                            modal.classList.remove('hidden');
                                        }

                                        // Close View Modal
                                        function closeViewModal(contactId) {
                                            const modal = document.getElementById(`view-modal-${contactId}`);
                                            modal.classList.add('hidden');
                                        }

                                        // Close View Modal when clicking outside the modal content
                                        function closeViewModalIfClickedOutside(event, contactId) {
                                            // Close modal if the click is outside the modal content (on the background overlay)
                                            if (event.target === event.currentTarget) {
                                                closeViewModal(contactId);
                                            }
                                        }
                                    </script>




                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
        </div>
        @else
            <div class="text-center bg-gray-100 font-semibold text-red-600 border p-10">
                No Contacts Found.
            </div>
        @endif
        {{-- <div class="z-0 mt-3">
            {{ $contacts->links('vendor.pagination.tailwind') }}
        </div> --}}
    </div>
@endsection
