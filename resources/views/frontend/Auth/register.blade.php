@extends('frontend.layout.app')

@section('body')

<div class=" flex items-center justify-center px-4 py-12">
    <div class="bg-white shadow-xl rounded-xl w-full max-w-4xl p-8 sm:p-10">
        <main class="w-full">
            <div class="mb-6 text-center">
                <h1 class="text-3xl font-semibold text-primary mb-2">Sign Up</h1>
                <p class="text-gray-500 font-medium text-sm sm:text-base">
                    Create a new account today to reap the benefits of a personalized shopping experience.
                </p>
            </div>

            <form action="{{ route('user.register') }}" method="POST" class="grid grid-cols-6 gap-6">
                @csrf

                <div class="col-span-6 sm:col-span-3">
                    <label for="FullName" class="block text-sm font-medium text-gray-700">Full Name</label>
                    <input type="text" id="FullName" name="name"
                        class="mt-1 p-2 border w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                        value="{{ old('name') }}" />
                    @error('name')
                        <div class="text-sm text-[#f15a28]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="mt-1 p-2 border w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                        value="{{ old('email') }}" />
                    @error('email')
                        <div class="text-sm text-[#f15a28]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="phone" class="block text-sm font-medium text-gray-700">Phone Number</label>
                    <input type="number" id="phone" name="phonenumber"
                        class="mt-1 p-2 border w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                        value="{{ old('phonenumber') }}" />
                    @error('phonenumber')
                        <div class="text-sm text-[#f15a28]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="address" class="block text-sm font-medium text-gray-700">Address</label>
                    <input type="text" id="address" name="address"
                        class="mt-1 p-2 border w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                        value="{{ old('address') }}" />
                    @error('address')
                        <div class="text-sm text-[#f15a28]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="Password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="Password" name="password"
                        class="mt-1 p-2 border w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                        value="{{ old('password') }}" />
                    @error('password')
                        <div class="text-sm text-[#f15a28]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-span-6 sm:col-span-3">
                    <label for="PasswordConfirmation" class="block text-sm font-medium text-gray-700">Password Confirmation</label>
                    <input type="password" id="PasswordConfirmation" name="confirm_password"
                        class="mt-1 p-2 border w-full rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm"
                        value="{{ old('confirm_password') }}" />
                    @error('confirm_password')
                        <div class="text-sm text-[#f15a28]">{{ $message }}</div>
                    @enderror
                </div>

                <div class="col-span-6">
                    <label for="MarketingAccept" class="flex items-center gap-2">
                        <input type="checkbox" id="MarketingAccept" name="marketing_accept"
                            class="rounded border-gray-300 text-primary focus:ring-primary" />
                        <span class="text-sm text-gray-700">I agree to terms and conditions</span>
                    </label>
                </div>

                <div class="col-span-6 flex flex-col sm:flex-row items-center gap-4">
                    <button type="submit"
                        class="w-full sm:w-auto bg-primary hover:bg-transparent text-white hover:text-primary border border-primary px-6 py-2 rounded-md text-sm font-medium transition-all">
                        Create an account
                    </button>

                    <p class="text-sm text-gray-600">
                        Already have an account?
                        <a href="{{ route('login') }}" class="text-primary underline font-medium">Log in</a>.
                    </p>
                </div>
            </form>
        </main>
    </div>
</div>

@endsection
