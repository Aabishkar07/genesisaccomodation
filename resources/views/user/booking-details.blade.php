@extends('user.layouts.app')

@section('title', 'Booking Details')
@section('page-title', 'Booking Details')

@section('content')
<div class="space-y-6">
    <!-- Back Button -->
    <div>
        <a href="{{ route('user.bookings') }}"
           class="inline-flex items-center text-primary hover:text-primary-dark">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to My Bookings
        </a>
    </div>

    <!-- Booking Header -->
    <div class="bg-white rounded-xl p-6 card-shadow">
        <div class="flex items-start justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900 mb-2">Booking #{{ $booking->id }}</h2>
                <p class="text-gray-600">Booked on {{ $booking->created_at->format('M d, Y \a\t g:i A') }}</p>
            </div>
            <span class="inline-flex items-center px-4 py-2 rounded-full text-sm font-medium {{ $booking->status_badge }}">
                {{ ucfirst($booking->status) }}
            </span>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-6">
            <!-- Accommodation Details -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Accommodation Details</h3>

                    <div class="flex items-start space-x-4">
                        @if($booking->accommodation->featured_image)
                            <img src="{{ asset('uploads/' . $booking->accommodation->featured_image) }}"
                                 alt="{{ $booking->accommodation->name }}"
                                 class="w-32 h-32 rounded-lg object-cover">
                        @else
                            <div class="w-32 h-32 bg-gray-200 rounded-lg flex items-center justify-center">
                                <i class="fas fa-home text-gray-400 text-3xl"></i>
                            </div>
                        @endif

                        <div class="flex-1">
                            <h4 class="text-xl font-semibold text-gray-900 mb-2">{{ $booking->accommodation->name }}</h4>
                            <p class="text-gray-600 mb-3">
                                <i class="fas fa-map-marker-alt mr-2"></i>
                                {{ $booking->accommodation->address }}, {{ $booking->accommodation->city }}
                            </p>

                            <div class="grid grid-cols-2 gap-4 text-sm">
                                <div>
                                    <span class="text-gray-500">Room Type:</span>
                                    <p class="font-medium">{{ $booking->accommodation->roomType->name ?? 'N/A' }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500">Max Guests:</span>
                                    <p class="font-medium">{{ $booking->accommodation->max_guest }} guests</p>
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

                            <div class="mt-4">
                                <a href="{{ route('accommodation.single', $booking->accommodation->slug) }}"
                                   class="inline-flex items-center text-primary hover:text-primary-dark text-sm">
                                    View Accommodation <i class="fas fa-external-link-alt ml-1"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Booking Information -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Booking Information</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Guest Information -->
                        <div>
                            <h4 class="font-medium text-gray-900 mb-3">Guest Information</h4>
                            <div class="space-y-2 text-sm">
                                <div>
                                    <span class="text-gray-500">Full Name:</span>
                                    <p class="font-medium">{{ $booking->full_name }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500">Phone Number:</span>
                                    <p class="font-medium">{{ $booking->phone_number }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500">Number of Guests:</span>
                                    <p class="font-medium">{{ $booking->room_capacity }} guests</p>
                                </div>
                            </div>
                        </div>

                        <!-- Stay Information -->
                        <div>
                            <h4 class="font-medium text-gray-900 mb-3">Stay Information</h4>
                            <div class="space-y-2 text-sm">
                                <div>
                                    <span class="text-gray-500">Check-in Date:</span>
                                    <p class="font-medium">{{ $booking->check_in->format('l, M d, Y') }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500">Check-out Date:</span>
                                    <p class="font-medium">{{ $booking->check_out->format('l, M d, Y') }}</p>
                                </div>
                                <div>
                                    <span class="text-gray-500">Duration:</span>
                                    <p class="font-medium">{{ $booking->total_nights }} nights</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Pickup Service -->
            @if($booking->pickup === 'yes')
                <div class="bg-white rounded-xl card-shadow">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-car mr-2 text-primary"></i>
                            Pickup Service
                        </h3>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <span class="text-gray-500">Arrival Date:</span>
                                <p class="font-medium">{{ $booking->arrival_date ? $booking->arrival_date->format('l, M d, Y') : 'Not specified' }}</p>
                            </div>
                            <div>
                                <span class="text-gray-500">Arrival Time:</span>
                                <p class="font-medium">{{ $booking->arrival_time ? $booking->arrival_time->format('g:i A') : 'Not specified' }}</p>
                            </div>
                        </div>

                        <div class="mt-4 p-4 bg-blue-50 rounded-lg">
                            <p class="text-sm text-blue-800">
                                <i class="fas fa-info-circle mr-2"></i>
                                Our team will contact you to arrange the pickup details.
                            </p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Special Requests -->
            @if($booking->special_requests)
                <div class="bg-white rounded-xl card-shadow">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">Special Requests</h3>
                        <div class="bg-gray-50 rounded-lg p-4">
                            <p class="text-gray-700">{{ $booking->special_requests }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Admin Notes -->
            @if($booking->admin_notes)
                <div class="bg-white rounded-xl card-shadow">
                    <div class="p-6">
                        <h3 class="text-lg font-semibold text-gray-900 mb-4">
                            <i class="fas fa-info-circle mr-2 text-blue-500"></i>
                            Admin Note
                        </h3>
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <i class="fas fa-user-shield text-blue-500 text-lg mt-1 mr-3"></i>
                                <div>
                                    <p class="text-sm font-medium text-blue-800 mb-2">Message from our team:</p>
                                    <p class="text-blue-700">{{ $booking->admin_notes }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <!-- Booking Summary -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Booking Summary</h3>

                    <div class="space-y-3">
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Rate per night:</span>
                            <span class="font-medium">${{ number_format($booking->accommodation->price, 2) }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Number of nights:</span>
                            <span class="font-medium">{{ $booking->total_nights }}</span>
                        </div>
                        <div class="flex justify-between text-sm">
                            <span class="text-gray-600">Subtotal:</span>
                            <span class="font-medium">${{ number_format($booking->total_amount, 2) }}</span>
                        </div>
                        <hr class="my-3">
                        <div class="flex justify-between text-lg font-bold">
                            <span>Total Amount:</span>
                            <span class="text-primary">${{ number_format($booking->total_amount, 2) }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Timeline -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Booking Status</h3>

                    <div class="space-y-4">
                        <!-- Pending -->
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full {{ $booking->status === 'pending' ? 'bg-yellow-500' : ($booking->status === 'confirmed' || $booking->status === 'completed' ? 'bg-green-500' : 'bg-gray-300') }} flex items-center justify-center">
                                <i class="fas fa-clock text-white text-xs"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Booking Submitted</p>
                                <p class="text-xs text-gray-500">{{ $booking->created_at->format('M d, Y g:i A') }}</p>
                            </div>
                        </div>

                        <!-- Confirmed -->
                        <div class="flex items-center">
                            <div class="w-8 h-8 rounded-full {{ $booking->status === 'confirmed' || $booking->status === 'completed' ? 'bg-green-500' : 'bg-gray-300' }} flex items-center justify-center">
                                <i class="fas fa-check text-white text-xs"></i>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">Booking Confirmed</p>
                                @if($booking->status === 'confirmed' || $booking->status === 'completed')
                                    <p class="text-xs text-gray-500">{{ $booking->updated_at->format('M d, Y g:i A') }}</p>
                                @else
                                    <p class="text-xs text-gray-500">Pending confirmation</p>
                                @endif
                            </div>
                        </div>

                        <!-- Cancelled (if applicable) -->
                        @if($booking->status === 'cancelled')
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full bg-red-500 flex items-center justify-center">
                                    <i class="fas fa-times text-white text-xs"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Booking Cancelled</p>
                                    @if($booking->cancelled_at)
                                        <p class="text-xs text-gray-500">{{ $booking->cancelled_at->format('M d, Y g:i A') }}</p>
                                    @endif
                                    @if($booking->cancellation_reason)
                                        <p class="text-xs text-gray-500">{{ $booking->cancellation_reason }}</p>
                                    @endif
                                </div>
                            </div>
                        @else
                            <!-- Completed -->
                            <div class="flex items-center">
                                <div class="w-8 h-8 rounded-full {{ $booking->status === 'completed' ? 'bg-blue-500' : 'bg-gray-300' }} flex items-center justify-center">
                                    <i class="fas fa-flag-checkered text-white text-xs"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">Stay Completed</p>
                                    @if($booking->status === 'completed')
                                        <p class="text-xs text-gray-500">{{ $booking->updated_at->format('M d, Y g:i A') }}</p>
                                    @else
                                        <p class="text-xs text-gray-500">{{ $booking->check_out->format('M d, Y') }}</p>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>

            <!-- Actions -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Actions</h3>

                    <div class="space-y-3">
                        @if($booking->canBeCancelled())
                            <button onclick="showCancelModal({{ $booking->id }}, '{{ addslashes($booking->accommodation->name) }}', '{{ $booking->check_in->format('M d, Y') }}', '{{ $booking->check_out->format('M d, Y') }}')"
                                    class="w-full px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                                <i class="fas fa-times mr-2"></i>
                                Cancel Booking
                            </button>
                        @elseif($booking->status === 'cancelled')
                            <div class="w-full px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-center">
                                <i class="fas fa-ban mr-2"></i>
                                Booking Cancelled
                                @if($booking->cancelled_at)
                                    <br><span class="text-sm">{{ $booking->cancelled_at->format('M d, Y H:i') }}</span>
                                @endif
                                @if($booking->cancellation_reason)
                                    <br><span class="text-sm">Reason: {{ $booking->cancellation_reason }}</span>
                                @endif
                            </div>
                        @elseif(!$booking->canBeCancelled() && $booking->status !== 'cancelled')
                            <div class="w-full px-4 py-2 bg-gray-100 text-gray-600 rounded-lg text-center">
                                <i class="fas fa-info-circle mr-2"></i>
                                Cannot Cancel
                                <br><span class="text-sm">Cancellation not allowed (less than 24 hours to check-in)</span>
                            </div>
                        @endif

                        <a href="{{ route('contact') }}"
                           class="block w-full px-4 py-2 bg-gray-600 text-white text-center rounded-lg hover:bg-gray-700 transition-colors duration-200">
                            <i class="fas fa-envelope mr-2"></i>
                            Contact Support
                        </a>

                        <button onclick="window.print()"
                                class="w-full px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200">
                            <i class="fas fa-print mr-2"></i>
                            Print Details
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Custom Cancel Booking Modal -->
<div id="cancelModal" class="fixed inset-0 bg-black bg-opacity-50 hidden z-50 flex items-center justify-center p-4">
    <div class="bg-white rounded-2xl max-w-md w-full mx-4 transform transition-all duration-300 scale-95 opacity-0" id="cancelModalContent">
        <!-- Modal Header -->
        <div class="p-6 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <div class="w-10 h-10 bg-red-100 rounded-full flex items-center justify-center">
                        <i class="fas fa-exclamation-triangle text-red-600 text-lg"></i>
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900">Cancel Booking</h3>
                </div>
                <button onclick="hideCancelModal()" class="text-gray-400 hover:text-gray-600 transition-colors">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>
        </div>

        <!-- Modal Body -->
        <div class="p-6">
            <div class="mb-6">
                <p class="text-gray-600 mb-4">Are you sure you want to cancel this booking? This action cannot be undone.</p>

                <!-- Booking Details -->
                <div class="bg-gray-50 rounded-lg p-4 space-y-2">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-home text-gray-500"></i>
                        <span class="font-medium text-gray-900" id="modalAccommodationName"></span>
                    </div>
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-calendar text-gray-500"></i>
                        <span class="text-gray-600">
                            <span id="modalCheckIn"></span> - <span id="modalCheckOut"></span>
                        </span>
                    </div>
                </div>
            </div>

            <!-- Warning Message -->
            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4 mb-6">
                <div class="flex items-start space-x-3">
                    <i class="fas fa-info-circle text-yellow-600 mt-0.5"></i>
                    <div class="text-sm text-yellow-800">
                        <p class="font-medium mb-1">Cancellation Policy</p>
                        <p>Once cancelled, this booking cannot be restored. Please make sure you want to proceed with the cancellation.</p>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="flex space-x-3">
                <button onclick="hideCancelModal()"
                        class="flex-1 px-4 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200 font-medium">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Keep Booking
                </button>
                <button onclick="confirmCancellation()"
                        class="flex-1 px-4 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200 font-medium">
                    <i class="fas fa-times mr-2"></i>
                    Cancel Booking
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Hidden form for cancellation -->
<form id="cancelForm" method="POST" style="display: none;">
    @csrf
    @method('PUT')
</form>

@push('scripts')
<script>
    // Modal functions
    let currentBookingId = null;

    function showCancelModal(bookingId, accommodationName, checkIn, checkOut) {
        currentBookingId = bookingId;

        // Update modal content
        document.getElementById('modalAccommodationName').textContent = accommodationName;
        document.getElementById('modalCheckIn').textContent = checkIn;
        document.getElementById('modalCheckOut').textContent = checkOut;

        // Show modal with animation
        const modal = document.getElementById('cancelModal');
        const modalContent = document.getElementById('cancelModalContent');

        modal.classList.remove('hidden');

        // Trigger animation
        setTimeout(() => {
            modalContent.classList.remove('scale-95', 'opacity-0');
            modalContent.classList.add('scale-100', 'opacity-100');
        }, 10);

        // Prevent body scroll
        document.body.style.overflow = 'hidden';
    }

    function hideCancelModal() {
        const modal = document.getElementById('cancelModal');
        const modalContent = document.getElementById('cancelModalContent');

        // Hide with animation
        modalContent.classList.remove('scale-100', 'opacity-100');
        modalContent.classList.add('scale-95', 'opacity-0');

        setTimeout(() => {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }, 300);

        currentBookingId = null;
    }

    function confirmCancellation() {
        if (currentBookingId) {
            // Update form action and submit
            const form = document.getElementById('cancelForm');
            form.action = `/user/booking/${currentBookingId}/cancel`;
            form.submit();
        }
    }

    // Close modal when clicking outside
    document.getElementById('cancelModal').addEventListener('click', function(e) {
        if (e.target === this) {
            hideCancelModal();
        }
    });

    // Close modal with Escape key
    document.addEventListener('keydown', function(e) {
        if (e.key === 'Escape' && !document.getElementById('cancelModal').classList.contains('hidden')) {
            hideCancelModal();
        }
    });
</script>
@endpush
@endsection
