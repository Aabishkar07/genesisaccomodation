@extends('frontend.layout.app')

@section('body')
    <div class="px-20 pt-20 max-lg:px-10 max-sm:px-5 max-w-screen-2xl mx-auto">

        <div class="flex bg-white  shadow-xl rounded-xl">

            <section class="flex-1">

                <div class="hidden lg:relative md:block h-full">
                    <img src="{{ asset('images/password.jpg') }}" alt="" class="object-cover rounded-l-xl">
                </div>
            </section>

            @include('frontend.message.index')

            <main class="md:flex-1  md:p-6 p-3 max-sm:mx-5 max-md:w-full">
                <div class="max-md:w-full">

                    <div class="pb-8 max-sm:text-center">
                        <h1 class="text-3xl font-semibold text-primary ">Change your password</h1>
                        {{-- <p class="text-gray-500 font-medium py-2">Please Login to your account</p> --}}
                    </div>


                    <form action=" {{ route('changepassword', $checkotp->membercode) }}" method="POST">
                        @csrf
                        <div class="mt-1 relative">
                            <label for="newpassword" class="text-sm font-medium text-gray-700">New Password</label> <br>
                            <input type="password" id="newpassword" name="newpassword"
                                class="mt-1 w-full p-2 pr-10 border rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            <button type="button" class="absolute right-3 top-9 text-black hover:text-gray-800"
                                onclick="togglePassword('newpassword', this)" aria-label="Toggle new password visibility">
                                <!-- Eye closed with slash -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.944-9.543-7a10.05 10.05 0 012.13-3.516m1.732-1.732A9.955 9.955 0 0112 5c4.478 0 8.27 2.944 9.543 7a9.956 9.956 0 01-4.132 4.944M3 3l18 18" />
                                </svg>
                            </button>
                            @error('newpassword')
                                <div class="invalid-feedback text-sm text-primary" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-5 relative">
                            <label for="confirmpassword" class="text-sm font-medium text-gray-700">Confirm Password</label>
                            <br>
                            <input type="password" id="confirmpassword" name="confirmpassword"
                                class="mt-1 w-full p-2 pr-10 border rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />
                            <button type="button" class="absolute right-3 top-9 text-black hover:text-gray-800"
                                onclick="togglePassword('confirmpassword', this)"
                                aria-label="Toggle confirm password visibility">
                                <!-- Eye closed with slash -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.944-9.543-7a10.05 10.05 0 012.13-3.516m1.732-1.732A9.955 9.955 0 0112 5c4.478 0 8.27 2.944 9.543 7a9.956 9.956 0 01-4.132 4.944M3 3l18 18" />
                                </svg>
                            </button>
                            @error('confirmpassword')
                                <div class="invalid-feedback text-sm text-primary" style="display: block;">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <script>
                            function togglePassword(inputId, btn) {
                                const input = document.getElementById(inputId);
                                const svg = btn.querySelector("svg");

                                if (input.type === "password") {
                                    input.type = "text";
                                    // Eye open (no slash)
                                    svg.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7
          -1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />`;
                                } else {
                                    input.type = "password";
                                    // Eye closed with slash
                                    svg.innerHTML = `
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
          d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.944-9.543-7
          a10.05 10.05 0 012.13-3.516m1.732-1.732A9.955 9.955 0 0112 5
          c4.478 0 8.27 2.944 9.543 7a9.956 9.956 0 01-4.132 4.944M3 3l18 18" />`;
                                }
                            }
                        </script>


                        <button
                            class=" mt-5  rounded-md border border-primary bg-primary py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-primary w-full focus:outline-none focus:ring active:text-[#7065d4]">
                            Change Password
                        </button>

                    </form>
                </div>
            </main>
        </div>
    </div>
@endsection
