@extends('user.layouts.app')

@section('title', 'Profile Settings')
@section('page-title', 'Profile Settings')

@section('content')
<div class="space-y-6">
    <!-- Profile Header -->
    <div class="bg-white rounded-xl p-6 card-shadow">
        <div class="flex items-center space-x-4">
            <div class="w-20 h-20 bg-primary rounded-full flex items-center justify-center">
                <i class="fas fa-user text-white text-3xl"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">{{ $user->name }}</h2>
                <p class="text-gray-600">{{ $user->email }}</p>
                <p class="text-sm text-gray-500">Member since {{ $user->created_at->format('M Y') }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Profile Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Personal Information</h3>

                    <form method="POST" action="{{ route('user.profile.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Name -->
                        <div>
                            <label for="name" class="block text-sm font-medium text-gray-700 mb-2">
                                Full Name
                            </label>
                            <input type="text"
                                   id="name"
                                   name="name"
                                   value="{{ old('name', $user->name) }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            @error('name')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div>
                            <label for="email" class="block text-sm font-medium text-gray-700 mb-2">
                                Email Address
                            </label>
                            <input type="email"
                                   id="email"
                                   name="email"
                                   value="{{ old('email', $user->email) }}"
                                   required
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                            @error('email')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Phone Number -->
                        <div>
                            <label for="phonenumber" class="block text-sm font-medium text-gray-700 mb-2">
                                Phone Number
                            </label>
                            <input type="tel"
                                   id="phonenumber"
                                   name="phonenumber"
                                   value="{{ old('phonenumber', $user->phonenumber) }}"
                                   class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                   placeholder="Enter your phone number">
                            @error('phonenumber')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end space-x-4">
                            <button type="button"
                                    onclick="window.location.reload()"
                                    class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                    class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-200">
                                <i class="fas fa-save mr-2"></i>
                                Update Profile
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Profile Stats & Actions -->
        <div class="space-y-6">
            <!-- Account Stats -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Account Statistics</h3>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-blue-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-calendar-check text-blue-600 text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-600">Total Bookings</span>
                            </div>
                            <span class="font-semibold text-gray-900">
                                {{ \App\Models\Booking::where('user_id', $user->id)->count() }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-green-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-check-circle text-green-600 text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-600">Confirmed Bookings</span>
                            </div>
                            <span class="font-semibold text-gray-900">
                                {{ \App\Models\Booking::where('user_id', $user->id)->where('status', 'confirmed')->count() }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-purple-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-trophy text-purple-600 text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-600">Completed Stays</span>
                            </div>
                            <span class="font-semibold text-gray-900">
                                {{ \App\Models\Booking::where('user_id', $user->id)->where('status', 'completed')->count() }}
                            </span>
                        </div>

                        <div class="flex items-center justify-between">
                            <div class="flex items-center">
                                <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                    <i class="fas fa-clock text-yellow-600 text-sm"></i>
                                </div>
                                <span class="text-sm text-gray-600">Member Since</span>
                            </div>
                            <span class="font-semibold text-gray-900">
                                {{ $user->created_at->format('M Y') }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Quick Actions</h3>

                    <div class="space-y-3">
                        <a href="{{ route('user.bookings') }}"
                           class="flex items-center w-full px-4 py-3 text-left bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-calendar-check text-primary mr-3"></i>
                            <span class="text-sm font-medium text-gray-900">View My Bookings</span>
                        </a>

                        <a href="{{ route('accommodations') }}"
                           class="flex items-center w-full px-4 py-3 text-left bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-search text-primary mr-3"></i>
                            <span class="text-sm font-medium text-gray-900">Browse Accommodations</span>
                        </a>

                        <a href="{{ route('contact') }}"
                           class="flex items-center w-full px-4 py-3 text-left bg-gray-50 hover:bg-gray-100 rounded-lg transition-colors duration-200">
                            <i class="fas fa-life-ring text-primary mr-3"></i>
                            <span class="text-sm font-medium text-gray-900">Contact Support</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Security -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">Security</h3>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Password</p>
                                <p class="text-xs text-gray-500">Last updated {{ $user->updated_at->diffForHumans() }}</p>
                            </div>
                            <a href="{{ route('user.change-password') }}" class="text-primary hover:text-primary-dark text-sm font-medium">
                                Change
                            </a>
                        </div>

                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-sm font-medium text-gray-900">Two-Factor Auth</p>
                                <p class="text-xs text-gray-500">Add extra security to your account</p>
                            </div>
                            <button class="text-primary hover:text-primary-dark text-sm font-medium">
                                Enable
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
