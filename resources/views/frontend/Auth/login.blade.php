@extends('frontend.layout.app')

@section('body')
    <div class="px-20 py-10 max-w-screen-2xl mx-auto max-lg:px-10 max-sm:px-5">

        <div class="flex bg-white  shadow-xl rounded-xl">

            <section class="flex-1">

                <div class="hidden lg:relative md:block h-full">
                    <img src="{{ asset('images/login.jpg') }}" alt="" class="h-full object-cover rounded-l-xl">
                </div>
            </section>



            <main class="md:flex-1  md:p-6 p-3 max-sm:mx-5 max-md:w-full">
                <div class="max-md:w-full">

                    <div class="pb-8 max-sm:text-center">
                        <h1 class="text-3xl font-semibold text-primary  ">Welcome Back</h1>
                        <p class="text-gray-500 font-medium py-2">Please Login to your account</p>
                    </div>
                    @include('frontend.message.index')


                    <form action=" {{ route('customerlogin') }}" method="POST">
                        @csrf
                        @method('post')
                        <div class=""><label for="" class="text-sm font-medium text-gray-700">Email</label>
                            <br>
                            <input type="email" name="email"
                                class="mt-1 w-full p-2 border rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">
                            @error('email')
                                <div class="invalid-feedback text-sm text-primary " style="display: block;">
                                    {{ $message }}

                                </div>
                            @enderror
                        </div>
                        <div class="mt-5 relative">
                            <label for="password" class="text-sm font-medium text-gray-700">Password</label> <br>
                            <input type="password" name="password" id="password"
                                class="mt-1 w-full p-2 pr-10 border rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm" />

                            <!-- Eye toggle button -->
                            <button type="button" class="absolute right-3 top-9 text-black hover:text-gray-800"
                                onclick="togglePassword('password', this)" aria-label="Toggle password visibility">
                                <!-- Eye closed with slash (default) -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M13.875 18.825A10.05 10.05 0 0112 19c-4.478 0-8.27-2.944-9.543-7a10.05 10.05 0 012.13-3.516m1.732-1.732A9.955 9.955 0 0112 5c4.478 0 8.27 2.944 9.543 7a9.956 9.956 0 01-4.132 4.944M3 3l18 18" />
                                </svg>
                            </button>

                            @error('password')
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


                        <div class="flex justify-between mt-5">
                            <div class="flex gap-2">
                                <input type="checkbox">
                                <span class="text-sm text-gray-700 ">Remember Me</span>
                            </div>
                            <a href="{{ route('forgotpassword') }}">
                                <div class="font-medium text-primary  ">Forgot Password ? </div>
                            </a>
                        </div>
                        <button
                            class=" mt-5  rounded-md border border-primary bg-primary py-3 text-sm font-medium text-white transition hover:bg-transparent hover:text-[#F1612D] w-full focus:outline-none focus:ring active:text-[#7065d4]">
                            Login
                        </button>

                        <div class=" text-gray-700 mt-5 text-center flex flex-col justify-center item-center">
                            <div>
                                Don't have an account ?
                            </div>

                            <a href="{{ route('register') }}">
                                <div class="font-medium text-primary my-2">Register for free</div>
                            </a>
                        </div>
                    </form>


                </div>
            </main>
        </div>
    </div>
@endsection
