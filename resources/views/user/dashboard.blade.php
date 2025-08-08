@extends('user.layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')
<div class="space-y-6">
    <!-- Welcome Section -->
    <div class="bg-gradient-to-r from-primary to-primary-dark rounded-xl p-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h2 class="text-2xl font-bold mb-2">Welcome back, {{ Auth::guard('customer')->user()->name }}!</h2>
                <p class="text-blue-100">Manage your bookings and explore new accommodations.</p>
            </div>
            <div class="hidden md:block">
                <i class="fas fa-home text-6xl text-blue-200"></i>
            </div>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Total Bookings -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-calendar-alt text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Bookings</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['total_bookings'] }}</p>
                </div>
            </div>
        </div>

        <!-- Pending Bookings -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <i class="fas fa-clock text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Pending</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['pending_bookings'] }}</p>
                </div>
            </div>
        </div>

        <!-- Confirmed Bookings -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fas fa-check-circle text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Confirmed</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['confirmed_bookings'] }}</p>
                </div>
            </div>
        </div>

        <!-- Upcoming Bookings -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-purple-100 text-purple-600">
                    <i class="fas fa-plane-departure text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Upcoming</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['upcoming_bookings'] }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Additional Stats Row -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Completed Bookings -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fas fa-trophy text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Completed</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['completed_bookings'] }}</p>
                </div>
            </div>
        </div>

        <!-- Cancelled Bookings -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-red-100 text-red-600">
                    <i class="fas fa-times-circle text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Cancelled</p>
                    <p class="text-2xl font-bold text-gray-900">{{ $stats['cancelled_bookings'] }}</p>
                </div>
            </div>
        </div>

        <!-- Total Spent -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-indigo-100 text-indigo-600">
                    <i class="fas fa-dollar-sign text-xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Spent</p>
                    <p class="text-2xl font-bold text-gray-900">${{ number_format($stats['total_spent'], 0) }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Recent Bookings -->
    <div class="bg-white rounded-xl shadow-sm">
        <div class="px-6 py-4 border-b border-gray-200">
            <div class="flex items-center justify-between">
                <h3 class="text-lg font-semibold text-gray-900">Recent Bookings</h3>
                <a href="{{ route('user.bookings') }}" class="text-primary hover:text-primary-dark text-sm font-medium">
                    View All <i class="fas fa-arrow-right ml-1"></i>
                </a>
            </div>
        </div>

        @if($bookings->count() > 0)
            <div class="divide-y divide-gray-200">
                @foreach($bookings->take(5) as $booking)
                    <div class="px-6 py-4 hover:bg-gray-50 transition-colors duration-200">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    @if($booking->accommodation->featured_image)
                                        <img src="{{ asset('uploads/' . $booking->accommodation->featured_image) }}"
                                             alt="{{ $booking->accommodation->name }}"
                                             class="w-12 h-12 rounded-lg object-cover">
                                    @else
                                        <div class="w-12 h-12 bg-gray-200 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-home text-gray-400"></i>
                                        </div>
                                    @endif
                                </div>
                                <div class="flex-1">
                                    <h4 class="text-sm font-medium text-gray-900">{{ $booking->accommodation->name }}</h4>
                                    <p class="text-sm text-gray-500">
                                        {{ $booking->check_in->format('M d, Y') }} - {{ $booking->check_out->format('M d, Y') }}
                                    </p>
                                    <p class="text-xs text-gray-400">{{ $booking->room_capacity }} guests</p>

                                    @if($booking->admin_notes)
                                        <div class="mt-2 p-2 bg-blue-50 border border-blue-200 rounded-md">
                                            <div class="flex items-start">
                                                <i class="fas fa-info-circle text-blue-500 text-xs mt-0.5 mr-2"></i>
                                                <div>
                                                    <p class="text-xs font-medium text-blue-800">Admin Note:</p>
                                                    <p class="text-xs text-blue-700">{{ $booking->admin_notes }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                            <div class="flex items-center space-x-4">
                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $booking->status_badge }}">
                                    {{ ucfirst($booking->status) }}
                                </span>
                                <div class="text-right">
                                    <p class="text-sm font-medium text-gray-900">${{ number_format($booking->total_amount, 2) }}</p>
                                    <p class="text-xs text-gray-500">{{ $booking->total_nights }} nights</p>
                                </div>
                                <a href="{{ route('user.booking.details', $booking->id) }}"
                                   class="text-primary hover:text-primary-dark">
                                    <i class="fas fa-eye"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="px-6 py-12 text-center">
                <div class="w-16 h-16 mx-auto bg-gray-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-calendar-alt text-gray-400 text-2xl"></i>
                </div>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No bookings yet</h3>
                <p class="text-gray-500 mb-6">Start exploring our amazing accommodations!</p>
                <a href="{{ route('accommodations') }}"
                   class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200">
                    <i class="fas fa-search mr-2"></i>
                    Browse Accommodations
                </a>
            </div>
        @endif
    </div>

    <!-- Quick Actions -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Browse Accommodations -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="text-center">
                <div class="w-12 h-12 mx-auto bg-blue-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-search text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Browse Accommodations</h3>
                <p class="text-gray-600 text-sm mb-4">Discover amazing places to stay</p>
                <a href="{{ route('accommodations') }}"
                   class="inline-flex items-center px-4 py-2 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200">
                    Explore Now
                </a>
            </div>
        </div>

        <!-- Update Profile -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="text-center">
                <div class="w-12 h-12 mx-auto bg-green-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-user-cog text-green-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Update Profile</h3>
                <p class="text-gray-600 text-sm mb-4">Keep your information up to date</p>
                <a href="{{ route('user.profile') }}"
                   class="inline-flex items-center px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 transition-colors duration-200">
                    Edit Profile
                </a>
            </div>
        </div>

        <!-- Contact Support -->
        <div class="bg-white rounded-xl p-6 card-shadow hover-scale">
            <div class="text-center">
                <div class="w-12 h-12 mx-auto bg-purple-100 rounded-full flex items-center justify-center mb-4">
                    <i class="fas fa-life-ring text-purple-600 text-xl"></i>
                </div>
                <h3 class="text-lg font-semibold text-gray-900 mb-2">Need Help?</h3>
                <p class="text-gray-600 text-sm mb-4">Get support from our team</p>
                <a href="{{ route('contact') }}"
                   class="inline-flex items-center px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700 transition-colors duration-200">
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
