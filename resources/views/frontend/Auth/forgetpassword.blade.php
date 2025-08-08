@extends('frontend.layout.app')

@section('body')
<div class="px-6 lg:px-20 max-w-screen-2xl mx-auto">
    @include('frontend.message.index')

    <div class="flex flex-col lg:flex-row bg-white shadow-lg rounded-2xl overflow-hidden mt-16 lg:mt-20">
        <!-- Left Image -->
        <div class="hidden lg:block lg:w-1/2">
            <img src="{{ asset('images/forgot.jpg') }}"
                 alt="Forgot Password"
                 class="h-full w-full object-cover">
        </div>

        <!-- Right Form -->
        <div class="w-full lg:w-1/2 flex items-center justify-center p-6 lg:p-10">
            <div class="w-full max-w-md">
                <div class="text-center mb-6">
                    <h3 class="text-3xl font-extrabold text-primary mb-2">Forgot Your Password?</h3>
                    <p class="text-gray-600 text-sm leading-relaxed">
                        We get it — stuff happens. Enter your email below and we’ll send you an OTP to reset your password.
                    </p>
                </div>

                <form method="POST" action="{{ route('checkemail') }}" class="space-y-5">
                    @csrf
                    <!-- Email -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-1" for="email">Email</label>
                        <input id="email" name="email" type="email" value="{{ old('email') }}"
                               class="w-full px-4 py-2 border border-gray-300 rounded-lg shadow-sm text-sm focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary"
                               placeholder="Enter your email address">
                        @error('email')
                            <div class="text-red-500 text-xs mt-1">* {{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Button -->
                    <div>
                        <button type="submit"
                                class="w-full py-3 px-4 bg-primary hover:bg-primary/90 text-white text-sm font-semibold rounded-lg shadow-md transition duration-300 ease-in-out">
                            Send OTP
                        </button>
                    </div>
                </form>

                <!-- Back to Login -->
                <div class="text-center mt-6">
                    <a href="{{ route('login') }}" class="text-primary text-sm font-medium hover:underline">
                        &larr; Back to Login
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
