@extends('frontend.layout.app')
@section('body')

<script src="https://www.google.com/recaptcha/enterprise.js?render=6LfihZUrAAAAAL6Slny-3cRTcUDmY8h6JHD_tq9m"></script>
@php
    use App\Models\Setting;
    $settings = Setting::pluck('value', 'key')->toArray();

@endphp
<section class="py-20 bg-gradient-to-br from-gray-50 via-white to-blue-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Header Section -->
        <div class="text-center mb-20">
            <div class="inline-flex items-center justify-center w-20 h-20 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full mb-6 shadow-lg">
                <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                </svg>
            </div>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent mb-6">
                Get In Touch
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto leading-relaxed">
                We'd love to hear from you. Send us a message and we'll respond as soon as possible.
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 lg:gap-24">
            <!-- Contact Information -->
            <div class="space-y-10">
                <div class="bg-white/70 backdrop-blur-sm rounded-2xl p-8 shadow-xl border border-white/20">
                    <h2 class="text-2xl font-bold text-gray-900 mb-8 text-center">Contact Information</h2>

                    <!-- Contact Details -->
                    <div class="space-y-8">
                        <div class="group flex items-start space-x-5 p-4 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Our Location</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{-- {{ $setting->address }} --}}
                                    <span class="text-gray-500">{{ $settings['contact_address'] }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="group flex items-start space-x-5 p-4 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-green-600 to-blue-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Phone Number</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{-- {{ $setting->contact_number }} --}}
                                    <span class="text-gray-500"> {{ $settings['contact_phone'] }}</span>
                                </p>
                            </div>
                        </div>

                        <div class="group flex items-start space-x-5 p-4 rounded-xl hover:bg-gradient-to-r hover:from-blue-50 hover:to-purple-50 transition-all duration-300">
                            <div class="flex-shrink-0 w-14 h-14 bg-gradient-to-r from-purple-600 to-pink-600 rounded-xl flex items-center justify-center shadow-lg group-hover:scale-110 transition-transform duration-300">
                                <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-gray-900 mb-2">Email Address</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{-- {{ $setting->email }} --}}
                                    <span class="text-gray-500"> {{ $settings['contact_email'] }}</span>
                                </p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <!-- Contact Form -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl border border-white/30 p-8 md:p-10 relative overflow-hidden">
                <!-- Decorative Elements -->
                <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-blue-400/20 to-purple-400/20 rounded-full -translate-y-16 translate-x-16"></div>
                <div class="absolute bottom-0 left-0 w-24 h-24 bg-gradient-to-tr from-green-400/20 to-blue-400/20 rounded-full translate-y-12 -translate-x-12"></div>

                <div class="relative z-10">
                    <div class="text-center mb-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-2">Send Message</h2>
                        <p class="text-gray-600">We'll get back to you within 24 hours</p>
                    </div>

                    @if (session('popsuccess'))
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-8 flex items-center space-x-3 shadow-lg">
                            <div class="w-10 h-10 bg-green-500 rounded-full flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-white" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                            <span class="font-medium text-lg">{{ session('popsuccess') }}</span>
                        </div>
                    @endif

                    <form id="submitform" action="{{ route('contact.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                    Full Name *
                                </label>
                                <input type="text" value="{{ old('name') }}" name="name" placeholder="Enter your full name"
                                    class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    required>
                                @error('name')
                                    <p class="text-red-600 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    Email Address *
                                </label>
                                <input type="email" value="{{ old('email') }}" name="email" placeholder="Enter your email address"
                                    class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    required>
                                @error('email')
                                    <p class="text-red-600 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                    </svg>
                                    Phone Number *
                                </label>
                                <input type="tel" value="{{ old('phone') }}" name="phone" placeholder="Enter your phone number"
                                    class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    required>
                                @error('phone')
                                    <p class="text-red-600 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                                    </svg>
                                    Subject *
                                </label>
                                <input type="text" value="{{ old('subject') }}" name="subject" placeholder="What is this about?"
                                    class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-white/50 backdrop-blur-sm"
                                    required>
                                @error('subject')
                                    <p class="text-red-600 text-sm mt-2 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <div class="group">
                            <label class="block text-sm font-semibold text-gray-700 mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-2 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z"/>
                                </svg>
                                Message *
                            </label>
                            <textarea  name="message" rows="5" placeholder="Tell us more about your inquiry..."
                                class="w-full px-5 py-4 border-2 border-gray-200 rounded-xl focus:ring-4 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-300 bg-white/50 backdrop-blur-sm resize-none"
                                required>{{ old('message') }}</textarea>
                            @error('message')
                                <p class="text-red-600 text-sm mt-2 flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <input type="hidden" name="g-token" id="g-token" value="" />

                        <button type="button" onclick="onClick()"
                            class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white font-semibold py-4 px-8 rounded-xl hover:from-blue-700 hover:to-purple-700 focus:ring-4 focus:ring-blue-500/30 focus:ring-offset-2 transition-all duration-300 transform hover:scale-[1.02] shadow-xl hover:shadow-2xl flex items-center justify-center space-x-3 group">
                            <svg class="w-6 h-6 group-hover:animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                            </svg>
                            <span class="text-lg">Send Message</span>
                        </button>

                        <p class="text-sm text-gray-500 text-center leading-relaxed">
                            By submitting this form, you agree to our
                            <a href="#" class="text-blue-600 hover:text-blue-800 underline">privacy policy</a>
                            and
                            <a href="#" class="text-blue-600 hover:text-blue-800 underline">terms of service</a>.
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function onClick() {
            const button = event.target.closest('button');
            const originalText = button.innerHTML;
            button.innerHTML = '<svg class="w-6 h-6 animate-spin mr-3" fill="none" viewBox="0 0 24 24"><circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle><path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path></svg>Sending...';
            button.disabled = true;
            button.classList.add('opacity-75', 'cursor-not-allowed');

            grecaptcha.enterprise.ready(async () => {
                try {
                    const token = await grecaptcha.enterprise.execute(
                        '6LfihZUrAAAAAL6Slny-3cRTcUDmY8h6JHD_tq9m', {
                            action: 'LOGIN'
                        });
                    document.getElementById("g-token").value = token;
                    document.getElementById("submitform").submit();
                } catch (error) {
                    button.innerHTML = originalText;
                    button.disabled = false;
                    button.classList.remove('opacity-75', 'cursor-not-allowed');
                    console.error('reCAPTCHA error:', error);
                }
            });
        }

        // Enhanced form validation with visual feedback
        document.querySelectorAll('input, textarea').forEach(field => {
            field.addEventListener('blur', function() {
                if (this.hasAttribute('required') && !this.value.trim()) {
                    this.classList.add('border-red-400', 'bg-red-50/50');
                    this.classList.remove('border-gray-200', 'bg-white/50');
                } else {
                    this.classList.remove('border-red-400', 'bg-red-50/50');
                    this.classList.add('border-gray-200', 'bg-white/50');
                }
            });

            field.addEventListener('focus', function() {
                this.classList.remove('border-red-400', 'bg-red-50/50');
                this.classList.add('border-blue-500', 'bg-white/80');
            });

            field.addEventListener('input', function() {
                if (this.value.trim()) {
                    this.classList.remove('border-red-400', 'bg-red-50/50');
                    this.classList.add('border-green-400', 'bg-green-50/30');
                }
            });
        });

        // Add floating label effect
        document.querySelectorAll('input, textarea').forEach(field => {
            field.addEventListener('focus', function() {
                // this.parentElement.classList.add('ring-2', 'ring-blue-500/20');
            });

            field.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-blue-500/20');
            });
        });
    </script>

    <style>
        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        .animate-spin {
            animation: spin 1s linear infinite;
        }

        @keyframes bounce {
            0%, 20%, 53%, 80%, 100% {
                transform: translate3d(0,0,0);
            }
            40%, 43% {
                transform: translate3d(0,-8px,0);
            }
            70% {
                transform: translate3d(0,-4px,0);
            }
            90% {
                transform: translate3d(0,-2px,0);
            }
        }
        .animate-bounce {
            animation: bounce 1s infinite;
        }

        /* Smooth transitions for all elements */
        * {
            transition-property: all;
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }

        /* Custom scrollbar */
        textarea::-webkit-scrollbar {
            width: 8px;
        }

        textarea::-webkit-scrollbar-track {
            background: #f1f5f9;
            border-radius: 4px;
        }

        textarea::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }

        textarea::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
    </style>
</section>
@endsection
