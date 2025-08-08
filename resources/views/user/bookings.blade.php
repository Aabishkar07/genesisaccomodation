@extends('user.layouts.app')

@section('title', 'My Bookings')
@section('page-title', 'My Bookings')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="bg-white rounded-xl p-6 card-shadow">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">My Bookings</h2>
                <p class="text-gray-600 mt-1">Manage and track all your accommodation bookings</p>
            </div>
            <a href="{{ route('accommodations') }}"
               class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200">
                <i class="fas fa-plus mr-2"></i>
                New Booking
            </a>
        </div>
    </div>

    <!-- Booking Statistics -->
    <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
        <div class="bg-white rounded-xl p-4 card-shadow text-center">
            <div class="text-2xl font-bold text-blue-600">{{ $stats['total_bookings'] }}</div>
            <div class="text-sm text-gray-600">Total</div>
        </div>
        <div class="bg-white rounded-xl p-4 card-shadow text-center">
            <div class="text-2xl font-bold text-yellow-600">{{ $stats['pending_bookings'] }}</div>
            <div class="text-sm text-gray-600">Pending</div>
        </div>
        <div class="bg-white rounded-xl p-4 card-shadow text-center">
            <div class="text-2xl font-bold text-green-600">{{ $stats['confirmed_bookings'] }}</div>
            <div class="text-sm text-gray-600">Confirmed</div>
        </div>
        <div class="bg-white rounded-xl p-4 card-shadow text-center">
            <div class="text-2xl font-bold text-purple-600">{{ $stats['completed_bookings'] }}</div>
            <div class="text-sm text-gray-600">Completed</div>
        </div>
        <div class="bg-white rounded-xl p-4 card-shadow text-center">
            <div class="text-2xl font-bold text-red-600">{{ $stats['cancelled_bookings'] }}</div>
            <div class="text-sm text-gray-600">Cancelled</div>
        </div>
    </div>

    <!-- Filters -->
    <div class="bg-white rounded-xl p-6 card-shadow">
        <form method="GET" action="{{ route('user.bookings') }}" class="space-y-4">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Status Filter -->
                <div>
                    <label for="status" class="block text-sm font-medium text-gray-700 mb-1">Status</label>
                    <select name="status" id="status" class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                        <option value="">All Status</option>
                        <option value="pending" {{ request('status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="confirmed" {{ request('status') == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                        <option value="completed" {{ request('status') == 'completed' ? 'selected' : '' }}>Completed</option>
                        <option value="cancelled" {{ request('status') == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                    </select>
                </div>

                <!-- Date From -->
                <div>
                    <label for="date_from" class="block text-sm font-medium text-gray-700 mb-1">Check-in From</label>
                    <input type="date" name="date_from" id="date_from" value="{{ request('date_from') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                </div>

                <!-- Date To -->
                <div>
                    <label for="date_to" class="block text-sm font-medium text-gray-700 mb-1">Check-out To</label>
                    <input type="date" name="date_to" id="date_to" value="{{ request('date_to') }}"
                           class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                </div>

                <!-- Search -->
                <div>
                    <label for="search" class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                    <input type="text" name="search" id="search" value="{{ request('search') }}"
                           placeholder="Accommodation or city..."
                           class="w-full rounded-lg border-gray-300 focus:border-primary focus:ring-primary">
                </div>
            </div>

            <div class="flex items-center space-x-3">
                <button type="submit" class="px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors">
                    <i class="fas fa-search mr-2"></i>Apply Filters
                </button>
                <a href="{{ route('user.bookings') }}" class="px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors">
                    <i class="fas fa-times mr-2"></i>Clear Filters
                </a>
            </div>
        </form>
    </div>

    <!-- Bookings List -->
    @if($bookings->count() > 0)
        <div class="space-y-4">
            @foreach($bookings as $booking)
                <div class="bg-white rounded-xl card-shadow hover-scale booking-item" data-status="{{ $booking->status }}">
                    <div class="p-6">
                        <div class="flex items-start justify-between">
                            <!-- Booking Info -->
                            <div class="flex items-start space-x-4 flex-1">
                                <!-- Image -->
                                <div class="flex-shrink-0">
                                    @if($booking->accommodation->featured_image)
                                        <img src="{{ asset('uploads/' . $booking->accommodation->featured_image) }}"
                                             alt="{{ $booking->accommodation->name }}"
                                             class="w-20 h-20 rounded-lg object-cover">
                                    @else
                                        <div class="w-20 h-20 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-home text-gray-400 text-2xl"></i>
                                        </div>
                                    @endif
                                </div>

                                <!-- Details -->
                                <div class="flex-1">
                                    <div class="flex items-start justify-between">
                                        <div>
                                            <h3 class="text-lg font-semibold text-gray-900 mb-1">
                                                {{ $booking->accommodation->name }}
                                            </h3>
                                            <p class="text-sm text-gray-600 mb-2">
                                                <i class="fas fa-map-marker-alt mr-1"></i>
                                                {{ $booking->accommodation->address }}, {{ $booking->accommodation->city }}
                                            </p>

                                            <!-- Booking Details -->
                                            <div class="grid grid-cols-1 md:grid-cols-3 gap-4 text-sm">
                                                <div>
                                                    <span class="text-gray-500">Check-in:</span>
                                                    <p class="font-medium">{{ $booking->check_in->format('M d, Y') }}</p>
                                                </div>
                                                <div>
                                                    <span class="text-gray-500">Check-out:</span>
                                                    <p class="font-medium">{{ $booking->check_out->format('M d, Y') }}</p>
                                                </div>
                                                <div>
                                                    <span class="text-gray-500">Guests:</span>
                                                    <p class="font-medium">{{ $booking->room_capacity }} guests</p>
                                                </div>
                                            </div>

                                            <!-- Additional Info -->
                                            <div class="mt-3 flex items-center space-x-4 text-sm text-gray-600">
                                                <span><i class="fas fa-calendar mr-1"></i>{{ $booking->total_nights }} nights</span>
                                                @if($booking->pickup === 'yes')
                                                    <span><i class="fas fa-car mr-1"></i>Pickup included</span>
                                                @endif
                                                <span><i class="fas fa-clock mr-1"></i>Booked {{ $booking->created_at->diffForHumans() }}</span>
                                            </div>

                                            <!-- Admin Notes -->
                                            @if($booking->admin_notes)
                                                <div class="mt-4 p-3 bg-blue-50 border border-blue-200 rounded-lg">
                                                    <div class="flex items-start">
                                                        <i class="fas fa-info-circle text-blue-500 text-sm mt-0.5 mr-2"></i>
                                                        <div>
                                                            <p class="text-sm font-medium text-blue-800 mb-1">Admin Note:</p>
                                                            <p class="text-sm text-blue-700">{{ $booking->admin_notes }}</p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>

                                        <!-- Status and Actions -->
                                        <div class="text-right">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $booking->status_badge }} mb-3">
                                                {{ ucfirst($booking->status) }}
                                            </span>
                                            <p class="text-lg font-bold text-gray-900">${{ number_format($booking->total_amount, 2) }}</p>
                                            <p class="text-sm text-gray-500">Total Amount</p>

                                            <!-- Action Buttons -->
                                            <div class="mt-4 space-y-2">
                                                <a href="{{ route('user.booking.details', $booking->id) }}"
                                                   class="block w-full px-4 py-2 bg-primary text-white text-center rounded-lg hover:bg-primary-dark transition-colors duration-200 text-sm">
                                                    View Details
                                                </a>
                                                @if($booking->canBeCancelled())
                                                    <button onclick="showCancelModal({{ $booking->id }}, '{{ addslashes($booking->accommodation->name) }}', '{{ $booking->check_in->format('M d, Y') }}', '{{ $booking->check_out->format('M d, Y') }}')"
                                                            class="block w-full px-4 py-2 bg-red-600 text-white text-center rounded-lg hover:bg-red-700 transition-colors duration-200 text-sm">
                                                        <i class="fas fa-times mr-1"></i>
                                                        Cancel Booking
                                                    </button>
                                                @elseif($booking->status === 'cancelled')
                                                    <div class="text-center text-sm text-gray-500 py-2">
                                                        <i class="fas fa-ban mr-1"></i>
                                                        Booking Cancelled
                                                        @if($booking->cancelled_at)
                                                            <br><span class="text-xs">{{ $booking->cancelled_at->format('M d, Y H:i') }}</span>
                                                        @endif
                                                    </div>
                                                @elseif(!$booking->canBeCancelled() && $booking->status !== 'cancelled')
                                                    <div class="text-center text-sm text-gray-500 py-2">
                                                        <i class="fas fa-info-circle mr-1"></i>
                                                        Cannot cancel
                                                        <br><span class="text-xs">(Less than 24h to check-in)</span>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="bg-white rounded-xl p-6 card-shadow">
            {{ $bookings->appends(request()->query())->links() }}
        </div>
    @else
        <!-- Empty State -->
        <div class="bg-white rounded-xl p-12 text-center card-shadow">
            <div class="w-24 h-24 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-6">
                <i class="fas fa-calendar-alt text-gray-400 text-3xl"></i>
            </div>
            <h3 class="text-xl font-semibold text-gray-900 mb-2">No bookings found</h3>
            <p class="text-gray-600 mb-8">You haven't made any bookings yet. Start exploring our amazing accommodations!</p>
            <a href="{{ route('accommodations') }}"
               class="inline-flex items-center px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200">
                <i class="fas fa-search mr-2"></i>
                Browse Accommodations
            </a>
        </div>
    @endif
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
