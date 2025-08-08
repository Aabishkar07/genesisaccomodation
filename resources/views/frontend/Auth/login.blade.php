@extends('frontend.layout.app')

@section('body')
    <div class="px-20 py-10 max-w-screen-2xl mx-auto max-lg:px-10 max-sm:px-5">

        <div class="flex bg-white  shadow-xl rounded-xl">

            <section class="flex-1">

                <div class="hidden lg:relative md:block h-full">
                    <img src="{{ asset('images/login.jpg') }}" alt=""
                        class="h-full object-cover rounded-l-xl">
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
                        <div class="mt-5"> <label for=""
                                class="text-sm font-medium text-gray-700">Password</label> <br>
                            <input type="password" name="password"
                                class="mt-1 w-full p-2 border rounded-md border-gray-200 bg-white text-sm text-gray-700 shadow-sm">

                            @error('password')
                                <div class="invalid-feedback text-sm text-primary " style="display: block;">
                                    {{ $message }}

                                </div>
                            @enderror
                        </div>

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
