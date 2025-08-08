@extends('admin.layouts.app')

@section('title', 'Booking Details - #' . $booking->id)

@section('content')
<div class="container-fluid px-4 py-6">
    <!-- Header Section -->
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6">
        <div>
            <div class="flex items-center mb-2">
                <a href="{{ route('admin.bookings.index') }}" class="text-gray-500 hover:text-gray-700 mr-3">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path>
                    </svg>
                </a>
                <h1 class="text-2xl font-bold text-gray-900">Booking Details</h1>
            </div>
            <p class="text-gray-600">Booking ID: #{{ $booking->id }}</p>
        </div>
        <div class="flex flex-col sm:flex-row gap-3 mt-4 sm:mt-0">
            <span class="inline-flex px-3 py-2 text-sm font-semibold rounded-full {{ $booking->status_badge }}">
                {{ ucfirst($booking->status) }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Customer Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Customer Information</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Full Name</label>
                        <p class="text-sm text-gray-900">{{ $booking->full_name }}</p>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                        <p class="text-sm text-gray-900">{{ $booking->phone_number }}</p>
                    </div>
                    @if($booking->user)
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                            <p class="text-sm text-gray-900">{{ $booking->user->email ?? 'N/A' }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Registration Date</label>
                            <p class="text-sm text-gray-900">{{ $booking->user->created_at->format('M d, Y') ?? 'N/A' }}</p>
                        </div>
                    @endif
                </div>
            </div>

            <!-- Accommodation Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Accommodation Details</h2>
                @if($booking->accommodation)
                    <div class="flex items-start space-x-4">
                        @if($booking->accommodation->featured_image)
                            <img src="{{ asset('uploads/' . $booking->accommodation->featured_image) }}"
                                 alt="{{ $booking->accommodation->name }}"
                                 class="w-20 h-20 object-cover rounded-lg">
                        @endif
                        <div class="flex-1">
                            <h3 class="text-lg font-medium text-gray-900">{{ $booking->accommodation->name }}</h3>
                            <p class="text-sm text-gray-600 mb-2">{{ $booking->accommodation->address }}, {{ $booking->accommodation->city }}</p>
                            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-500">Price per night:</span>
                                    <p class="font-medium">${{ number_format($booking->accommodation->price, 2) }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500">Max Guests:</span>
                                    <p class="font-medium">{{ $booking->accommodation->max_guest }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500">Bedrooms:</span>
                                    <p class="font-medium">{{ $booking->accommodation->bedroom }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500">Bathrooms:</span>
                                    <p class="font-medium">{{ $booking->accommodation->bathroom }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p class="text-gray-500">Accommodation information not available</p>
                @endif
            </div>

            <!-- Booking Details -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Booking Details</h2>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Check-in Date</label>
                            <p class="text-sm text-gray-900">{{ $booking->check_in->format('l, F j, Y') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Check-out Date</label>
                            <p class="text-sm text-gray-900">{{ $booking->check_out->format('l, F j, Y') }}</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Total Nights</label>
                            <p class="text-sm text-gray-900">{{ $booking->total_nights }} nights</p>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Number of Guests</label>
                            <p class="text-sm text-gray-900">{{ $booking->room_capacity }}</p>
                        </div>
                    </div>
                    <div class="space-y-4">
                        @if($booking->pickup)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Pickup Required</label>
                                <p class="text-sm text-green-600 font-medium">Yes</p>
                            </div>
                        @endif
                        @if($booking->arrival_date)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Arrival Date</label>
                                <p class="text-sm text-gray-900">{{ $booking->arrival_date->format('M d, Y') }}</p>
                            </div>
                        @endif
                        @if($booking->arrival_time)
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-1">Arrival Time</label>
                                <p class="text-sm text-gray-900">{{ $booking->arrival_time->format('H:i') }}</p>
                            </div>
                        @endif
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Booking Date</label>
                            <p class="text-sm text-gray-900">{{ $booking->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>
                </div>

                @if($booking->special_requests)
                    <div class="mt-6">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Special Requests</label>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-sm text-gray-900">{{ $booking->special_requests }}</p>
                        </div>
                    </div>
                @endif
            </div>

            <!-- Payment Information -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h2 class="text-lg font-semibold text-gray-900 mb-4">Payment Information</h2>
                <div class="space-y-3">
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Rate per night:</span>
                        <span class="text-sm font-medium">${{ number_format($booking->accommodation->price ?? 0, 2) }}</span>
                    </div>
                    <div class="flex justify-between">
                        <span class="text-sm text-gray-600">Number of nights:</span>
                        <span class="text-sm font-medium">{{ $booking->total_nights }}</span>
                    </div>
                    <div class="border-t pt-3">
                        <div class="flex justify-between">
                            <span class="text-base font-medium text-gray-900">Total Amount:</span>
                            <span class="text-lg font-bold text-gray-900">${{ number_format($booking->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Status Management -->
            @if($booking->status === 'pending')
                <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>
                    <div class="space-y-3">
                        <form action="{{ route('admin.bookings.approve', $booking) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <button type="submit"
                                    class="w-full bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors"
                                    onclick="return confirm('Are you sure you want to approve this booking?')">
                                <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Approve Booking
                            </button>
                        </form>

                        <button type="button"
                                onclick="openRejectModal()"
                                class="w-full bg-red-600 hover:bg-red-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Reject Booking
                        </button>
                    </div>
                </div>
            @endif

            <!-- Status Update -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Update Status</h3>
                <form action="{{ route('admin.bookings.update-status', $booking) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="space-y-4">
                        <div>
                            <label for="status" class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                            <select name="status" id="status" class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500">
                                <option value="pending" {{ $booking->status === 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="confirmed" {{ $booking->status === 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                <option value="completed" {{ $booking->status === 'completed' ? 'selected' : '' }}>Completed</option>
                                <option value="cancelled" {{ $booking->status === 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                            </select>
                        </div>

                        <div>
                            <label for="admin_notes" class="block text-sm font-medium text-gray-700 mb-2">Admin Notes</label>
                            <textarea name="admin_notes" id="admin_notes" rows="3"
                                      class="w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500"
                                      placeholder="Add notes about this status change...">{{ $booking->admin_notes ?? '' }}</textarea>
                        </div>

                        <button type="submit" class="w-full bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-md text-sm font-medium transition-colors">
                            Update Status
                        </button>
                    </div>
                </form>
            </div>

            <!-- Booking Timeline -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Booking Timeline</h3>
                <div class="space-y-4">
                    <div class="flex items-start space-x-3">
                        <div class="flex-shrink-0 w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                        <div>
                            <p class="text-sm font-medium text-gray-900">Booking Created</p>
                            <p class="text-xs text-gray-500">{{ $booking->created_at->format('M d, Y H:i') }}</p>
                        </div>
                    </div>

                    @if($booking->status === 'confirmed')
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-2 h-2 bg-green-500 rounded-full mt-2"></div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Booking Confirmed</p>
                                <p class="text-xs text-gray-500">{{ $booking->updated_at->format('M d, Y H:i') }}</p>
                            </div>
                        </div>
                    @endif

                    @if($booking->status === 'cancelled' && $booking->cancelled_at)
                        <div class="flex items-start space-x-3">
                            <div class="flex-shrink-0 w-2 h-2 bg-red-500 rounded-full mt-2"></div>
                            <div>
                                <p class="text-sm font-medium text-gray-900">Booking Cancelled</p>
                                <p class="text-xs text-gray-500">{{ $booking->cancelled_at->format('M d, Y H:i') }}</p>
                                @if($booking->cancellation_reason)
                                    <p class="text-xs text-gray-600 mt-1">Reason: {{ $booking->cancellation_reason }}</p>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Reject Modal -->
<div id="rejectModal" class="fixed inset-0 bg-gray-600 bg-opacity-50 overflow-y-auto h-full w-full hidden z-50">
    <div class="relative top-20 mx-auto p-5 border w-96 shadow-lg rounded-md bg-white">
        <div class="mt-3">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-medium text-gray-900">Reject Booking</h3>
                <button type="button" onclick="closeRejectModal()" class="text-gray-400 hover:text-gray-600">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>

            <form action="{{ route('admin.bookings.reject', $booking) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="rejection_reason" class="block text-sm font-medium text-gray-700 mb-2">
                        Reason for rejection <span class="text-red-500">*</span>
                    </label>
                    <textarea name="rejection_reason" id="rejection_reason" rows="4" required
                              class="w-full rounded-md border-gray-300 shadow-sm focus:border-red-500 focus:ring-red-500"
                              placeholder="Please provide a reason for rejecting this booking..."></textarea>
                </div>

                <div class="flex justify-end space-x-3">
                    <button type="button" onclick="closeRejectModal()"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-200 hover:bg-gray-300 rounded-md transition-colors">
                        Cancel
                    </button>
                    <button type="submit"
                            class="px-4 py-2 text-sm font-medium text-white bg-red-600 hover:bg-red-700 rounded-md transition-colors">
                        Reject Booking
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
function openRejectModal() {
    document.getElementById('rejectModal').classList.remove('hidden');
}

function closeRejectModal() {
    document.getElementById('rejectModal').classList.add('hidden');
    document.getElementById('rejection_reason').value = '';
}

// Close modal when clicking outside
document.getElementById('rejectModal').addEventListener('click', function(e) {
    if (e.target === this) {
        closeRejectModal();
    }
});
</script>
@endsection
