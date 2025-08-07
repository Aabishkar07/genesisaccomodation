@extends('frontend.layout.app')
@section('body')
    {{-- @php
    use App\Models\Setting;
    $setting = Setting::where('id', 1)->first();
@endphp --}}

    <script src="https://www.google.com/recaptcha/enterprise.js?render=6LfihZUrAAAAAL6Slny-3cRTcUDmY8h6JHD_tq9m"></script>

    <section id="contact" class="py-20  relative overflow-hidden">
        <!-- Background Decorative Elements -->
        <div class="absolute top-0 left-0 w-full h-full">
            <div class="absolute top-10 left-10 w-20 h-20 bg-[#6a68AF] opacity-10 rounded-full"></div>
            <div class="absolute top-40 right-20 w-16 h-16 bg-blue-400 opacity-10 rounded-full"></div>
            <div class="absolute bottom-20 left-1/4 w-12 h-12 bg-purple-400 opacity-10 rounded-full"></div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Section Title -->
            <div class="text-center mb-16" data-aos="fade-up">
                <div class="inline-block">
                    <span class="text-sm font-semibold text-[#6a68AF] uppercase tracking-wide mb-2 block">Get In
                        Touch</span>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-800 mb-4">Contact Us</h2>
                    <div class="w-24 h-1 bg-gradient-to-r from-[#6a68AF] to-blue-500 mx-auto rounded-full"></div>
                </div>
                <p class="text-xl text-gray-600 mt-6 max-w-2xl mx-auto">We'd love to hear from you. Send us a message and
                    we'll respond as soon as possible.</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-5 gap-12" data-aos="fade-up" data-aos-delay="100">
                <!-- Contact Info -->
                <div class="lg:col-span-2 space-y-6">
                    <!-- Address Card -->
                    <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-8 border border-gray-100 hover:border-[#6a68AF]/20"
                        data-aos="fade-up" data-aos-delay="200">
                        <div class="flex items-start space-x-4">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-14 h-14 bg-gradient-to-br from-[#6a68AF] to-blue-500 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">

                                    <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                        viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.25"
                                        stroke-linecap="round" stroke-linejoin="round">
                                        <path d="M9 11a3 3 0 1 0 6 0a3 3 0 0 0 -6 0" />
                                        <path
                                            d="M17.657 16.657l-4.243 4.243a2 2 0 0 1 -2.827 0l-4.244 -4.243a8 8 0 1 1 11.314 0z" />
                                    </svg>

                                </div>
                            </div>
                            <div class="flex-grow">
                                <h3 class="text-xl font-bold text-gray-800 mb-2">Our Address</h3>
                                <p class="text-gray-600 leading-relaxed">
                                    {{-- {{ $setting->address }} --}}
                                    <span class="text-gray-400">Your business address will appear here</span>
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Details -->
                    <div class="grid grid-cols-1 gap-6">
                        <!-- Phone -->
                        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-gray-100 hover:border-[#6a68AF]/20"
                            data-aos="fade-up" data-aos-delay="300">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-green-400 to-green-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">

                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                            viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2" />
                                            <path d="M15 7a2 2 0 0 1 2 2" />
                                            <path d="M15 3a6 6 0 0 1 6 6" />
                                        </svg>

                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-lg font-bold text-gray-800">Call Us</h3>
                                    <p class="text-gray-600">
                                        {{-- {{ $setting->contact_number }} --}}
                                        <span class="text-gray-400">+1 (555) 123-4567</span>
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Email -->
                        <div class="group bg-white rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-300 p-6 border border-gray-100 hover:border-[#6a68AF]/20"
                            data-aos="fade-up" data-aos-delay="400">
                            <div class="flex items-center space-x-4">
                                <div class="flex-shrink-0">
                                    <div
                                        class="w-12 h-12 bg-gradient-to-br from-blue-400 to-blue-600 rounded-xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">


                                        <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28"
                                            viewBox="0 0 24 24" fill="none" stroke="#ffffff" stroke-width="1.25"
                                            stroke-linecap="round" stroke-linejoin="round">
                                            <path
                                                d="M3 7a2 2 0 0 1 2 -2h14a2 2 0 0 1 2 2v10a2 2 0 0 1 -2 2h-14a2 2 0 0 1 -2 -2v-10z" />
                                            <path d="M3 7l9 6l9 -6" />
                                        </svg>

                                    </div>
                                </div>
                                <div class="flex-grow">
                                    <h3 class="text-lg font-bold text-gray-800">Email Us</h3>
                                    <p class="text-gray-600">
                                        {{-- {{ $setting->email }} --}}
                                        <span class="text-gray-400">hello@company.com</span>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Additional Info Card -->
                    <div class="bg-gradient-to-br from-[#6a68AF] to-blue-600 rounded-2xl p-6 text-white" data-aos="fade-up"
                        data-aos-delay="500">
                        <h3 class="text-xl font-bold mb-3">Why Choose Us?</h3>
                        <ul class="space-y-2 text-sm opacity-90">
                            <li class="flex items-center space-x-2">
                                <i class="bi bi-check-circle-fill text-green-300"></i>
                                <span>Quick response time</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <i class="bi bi-check-circle-fill text-green-300"></i>
                                <span>Professional support</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <i class="bi bi-check-circle-fill text-green-300"></i>
                                <span>Available 24/7</span>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-3">
                    @if (session('popsuccess'))
                        <div class="bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 text-green-800 px-6 py-4 rounded-xl mb-6 flex items-center space-x-3"
                            data-aos="fade-up">
                            <i class="bi bi-check-circle-fill text-green-500 text-xl"></i>
                            <span class="font-medium">{{ session('popsuccess') }}</span>
                        </div>
                    @endif

                    <form id="submitform" action="{{ route('contact.store') }}" method="POST"
                        class="bg-white rounded-2xl shadow-xl p-8 border border-gray-100 backdrop-blur-sm"
                        data-aos="fade-up" data-aos-delay="500">
                        @csrf

                        <div class="mb-8">
                            <h3 class="text-2xl font-bold text-gray-800 mb-2">Send us a Message</h3>
                            <p class="text-gray-600">Fill out the form below and we'll get back to you shortly.</p>
                        </div>

                        <div class="space-y-6">
                            <!-- Name & Email Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Full Name *</label>
                                    <div class="relative">
                                        <input type="text" name="name" placeholder="Enter your full name"
                                            class="w-full border-2 border-gray-200 focus:border-[#6a68AF] focus:ring-4 focus:ring-[#6a68AF]/10 p-4 rounded-xl transition-all duration-300 outline-none bg-gray-50 focus:bg-white"
                                            required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                            <i
                                                class="bi bi-person text-gray-400 group-focus-within:text-[#6a68AF] transition-colors"></i>
                                        </div>
                                    </div>
                                    @error('name')
                                        <div class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                            <i class="bi bi-exclamation-circle"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Email Address *</label>
                                    <div class="relative">
                                        <input type="email" name="email" placeholder="Enter your email address"
                                            class="w-full border-2 border-gray-200 focus:border-[#6a68AF] focus:ring-4 focus:ring-[#6a68AF]/10 p-4 rounded-xl transition-all duration-300 outline-none bg-gray-50 focus:bg-white"
                                            required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                            <i
                                                class="bi bi-envelope text-gray-400 group-focus-within:text-[#6a68AF] transition-colors"></i>
                                        </div>
                                    </div>
                                    @error('email')
                                        <div class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                            <i class="bi bi-exclamation-circle"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Phone & Subject Row -->
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Phone Number *</label>
                                    <div class="relative">
                                        <input type="tel" name="phone" placeholder="Enter your phone number"
                                            class="w-full border-2 border-gray-200 focus:border-[#6a68AF] focus:ring-4 focus:ring-[#6a68AF]/10 p-4 rounded-xl transition-all duration-300 outline-none bg-gray-50 focus:bg-white"
                                            required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                            <i
                                                class="bi bi-telephone text-gray-400 group-focus-within:text-[#6a68AF] transition-colors"></i>
                                        </div>
                                    </div>
                                    @error('phone')
                                        <div class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                            <i class="bi bi-exclamation-circle"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>

                                <div class="group">
                                    <label class="block text-sm font-semibold text-gray-700 mb-2">Subject *</label>
                                    <div class="relative">
                                        <input type="text" name="subject" placeholder="What is this about?"
                                            class="w-full border-2 border-gray-200 focus:border-[#6a68AF] focus:ring-4 focus:ring-[#6a68AF]/10 p-4 rounded-xl transition-all duration-300 outline-none bg-gray-50 focus:bg-white"
                                            required>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                            <i
                                                class="bi bi-chat-dots text-gray-400 group-focus-within:text-[#6a68AF] transition-colors"></i>
                                        </div>
                                    </div>
                                    @error('subject')
                                        <div class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                            <i class="bi bi-exclamation-circle"></i>
                                            <span>{{ $message }}</span>
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <!-- Message -->
                            <div class="group">
                                <label class="block text-sm font-semibold text-gray-700 mb-2">Message *</label>
                                <div class="relative">
                                    <textarea name="message" rows="5" placeholder="Tell us more about your inquiry..."
                                        class="w-full border-2 border-gray-200 focus:border-[#6a68AF] focus:ring-4 focus:ring-[#6a68AF]/10 p-4 rounded-xl transition-all duration-300 outline-none bg-gray-50 focus:bg-white resize-none"
                                        required></textarea>
                                    <div class="absolute top-4 right-4 pointer-events-none">
                                        <i
                                            class="bi bi-pencil text-gray-400 group-focus-within:text-[#6a68AF] transition-colors"></i>
                                    </div>
                                </div>
                                @error('message')
                                    <div class="text-red-500 text-sm mt-2 flex items-center space-x-1">
                                        <i class="bi bi-exclamation-circle"></i>
                                        <span>{{ $message }}</span>
                                    </div>
                                @enderror
                            </div>

                            <input type="hidden" name="g-token" id="g-token" value="" />

                            <!-- Submit Button -->
                            <div class="pt-4">
                                <button type="button" onclick="onClick()"
                                    class="w-full bg-gradient-to-r from-[#6a68AF] to-blue-600 hover:from-[#5a58a0] hover:to-blue-700 text-white font-bold text-lg px-8 py-4 rounded-xl shadow-lg hover:shadow-xl transform hover:scale-[1.02] transition-all duration-300 flex items-center justify-center space-x-3 group">
                                    <i class="bi bi-send group-hover:translate-x-1 transition-transform duration-300"></i>
                                    <span>Send Message</span>
                                </button>
                            </div>

                            <!-- Privacy Notice -->
                            <div class="text-center pt-4">
                                <p class="text-sm text-gray-500">
                                    <i class="bi bi-shield-check text-green-500 mr-1"></i>
                                    Your information is secure and will never be shared with third parties.
                                </p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <script>
            function onClick() {
                // Add loading state to button
                const button = event.target;
                const originalText = button.innerHTML;
                button.innerHTML = '<i class="bi bi-arrow-clockwise animate-spin mr-2"></i>Sending...';
                button.disabled = true;

                grecaptcha.enterprise.ready(async () => {
                    try {
                        const token = await grecaptcha.enterprise.execute(
                            '6LfihZUrAAAAAL6Slny-3cRTcUDmY8h6JHD_tq9m', {
                                action: 'LOGIN'
                            });
                        document.getElementById("g-token").value = token;
                        document.getElementById("submitform").submit();
                    } catch (error) {
                        // Reset button state on error
                        button.innerHTML = originalText;
                        button.disabled = false;
                        console.error('reCAPTCHA error:', error);
                    }
                });
            }

            // Add form validation feedback
            document.querySelectorAll('input, textarea').forEach(field => {
                field.addEventListener('blur', function() {
                    if (this.hasAttribute('required') && !this.value.trim()) {
                        this.classList.add('border-red-300', 'focus:border-red-500');
                        this.classList.remove('border-gray-200', 'focus:border-[#6a68AF]');
                    } else {
                        this.classList.remove('border-red-300', 'focus:border-red-500');
                        this.classList.add('border-gray-200', 'focus:border-[#6a68AF]');
                    }
                });
            });
        </script>

        <style>
            /* Custom animations */
            @keyframes float {

                0%,
                100% {
                    transform: translateY(0px);
                }

                50% {
                    transform: translateY(-10px);
                }
            }

            .animate-float {
                animation: float 6s ease-in-out infinite;
            }

            /* Smooth focus transitions */
            input:focus,
            textarea:focus {
                transform: translateY(-2px);
            }

            /* Loading animation for button */
            @keyframes spin {
                from {
                    transform: rotate(0deg);
                }

                to {
                    transform: rotate(360deg);
                }
            }

            .animate-spin {
                animation: spin 1s linear infinite;
            }
        </style>
    </section>
@endsection
