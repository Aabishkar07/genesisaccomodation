@extends('frontend.layout.app')
@section('body')
    <!-- component -->
    @include('frontend.message.index')

    <div class="relative flex flex-col lg:flex-row justify-center overflow-hidden py-12 lg:items-center lg:space-x-8 max-w-6xl mx-auto">

        <!-- Left: Image -->
        <div class="lg:w-1/2 w-full flex justify-center items-center">
            <img src="{{ asset('images/otp.jpg') }}"
                 alt="Email Verification"
                 class="rounded-2xl shadow-lg w-full h-auto object-cover max-h-[500px]">
        </div>

        <!-- Right: Form -->
        <div class="lg:w-1/2 w-full">
            <div class="relative bg-white px-6 pt-10 pb-9 shadow-xl rounded-2xl">
                <div class="mx-auto flex w-full flex-col space-y-8">
                    <div class="flex flex-col items-center justify-center text-center space-y-2">
                        <div class="font-semibold text-3xl text-primary">
                            <p>Email Verification</p>
                        </div>
                        <div class="flex flex-row text-sm font-medium text-gray-400">
                            <p>We have sent a code to your email</p>
                        </div>
                    </div>

                    <div>
                        <form action="{{ route('checkotp', $checkmember->membercode) }}" method="post">
                            @csrf
                            <div class="flex flex-col space-y-8">
                                <div class="w-full">
                                    <input
                                        class="w-full p-3 text-center rounded-xl border border-gray-200 text-lg bg-white focus:bg-gray-50 focus:ring-1 ring-blue-700 outline-none"
                                        placeholder="Please Enter OTP"
                                        type="text" name="userotp">
                                    @error('userotp')
                                        <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                            * {{ $message }}
                                        </div>
                                    @enderror
                                </div>

                                <div>
                                    <button
                                        class="w-full py-4 bg-primary text-white rounded-xl text-sm shadow-sm hover:bg-white hover:text-primary border border-primary transition">
                                        Verify Account
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
