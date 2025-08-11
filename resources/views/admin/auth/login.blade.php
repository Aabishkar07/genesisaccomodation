<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login - Genesis Accommodation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    animation: {
                        'fade-in': 'fadeIn 0.5s ease-in-out',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'bounce-in': 'bounceIn 0.8s ease-out',
                    },
                    keyframes: {
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(20px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' },
                        },
                        bounceIn: {
                            '0%': { transform: 'scale(0.3)', opacity: '0' },
                            '50%': { transform: 'scale(1.05)' },
                            '70%': { transform: 'scale(0.9)' },
                            '100%': { transform: 'scale(1)', opacity: '1' },
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class=" min-h-screen">
    <!-- Background Pattern -->
 

    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="max-w-md w-full space-y-8 animate-fade-in">
            <!-- Logo and Header -->
            <div class="text-center animate-fade-in">
    <!-- Logo Container -->
    <div class="mx-auto h-36 w-36 flex items-center justify-center rounded-full bg-white shadow-lg ring-4 ring-blue-100 animate-zoom-in">
        <img src="{{ asset('images/logo.png') }}" 
             alt="Logo"
             class="w-28 h-28 object-cover rounded-full transition-transform duration-300 hover:scale-105" />
    </div>

    <!-- Title -->
    <h2 class="mt-6 text-4xl font-extrabold text-gray-900 tracking-wide">
        Admin Panel
    </h2>

    <!-- Subtitle -->
    <p class="mt-2 text-lg text-gray-600 italic">
        Genesis Accommodation Management
    </p>

    <!-- Dots Animation -->
    <div class="mt-4 flex items-center justify-center space-x-2">
        <div class="w-3 h-3 bg-blue-500 rounded-full animate-ping"></div>
        <div class="w-3 h-3 bg-purple-500 rounded-full animate-ping delay-200"></div>
        <div class="w-3 h-3 bg-indigo-500 rounded-full animate-ping delay-400"></div>
    </div>
</div>

            <!-- Alert Messages -->
            @if(session('error'))
                <div class="bg-red-50 border-l-4 border-red-400 p-4 rounded-lg shadow-sm animate-slide-up" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-400 text-lg"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-red-700 font-medium">{{ session('error') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            @if(session('success'))
                <div class="bg-green-50 border-l-4 border-green-400 p-4 rounded-lg shadow-sm animate-slide-up" role="alert">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-check-circle text-green-400 text-lg"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-sm text-green-700 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Login Form -->
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-2xl border border-white/20 p-8 animate-slide-up" style="animation-delay: 0.2s;">
                <form class="space-y-6" action="{{ route('admin.login.post') }}" method="POST">
                    @csrf
                    
                    <!-- Email Field -->
                    <div class="space-y-2">
                        <label for="email" class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-envelope text-blue-500 mr-2"></i>
                            Email Address
                        </label>
                        <div class="relative">
                            <input id="email" name="email" type="email" autocomplete="email" required
                                   class="w-full px-4 py-3 border @error('email') border-red-300 bg-red-50 @else border-gray-300 bg-white @enderror rounded-xl shadow-sm placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Enter your email address" value="{{ old('email') }}">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-user text-gray-400"></i>
                            </div>
                        </div>
                        @error('email')
                            <p class="text-red-500 text-sm flex items-center">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    <!-- Password Field -->
                    <div class="space-y-2">
                        <label for="password" class="block text-sm font-semibold text-gray-700">
                            <i class="fas fa-lock text-blue-500 mr-2"></i>
                            Password
                        </label>
                        <div class="relative">
                            <input id="password" name="password" type="password" autocomplete="current-password" required
                                   class="w-full px-4 py-3 border @error('password') border-red-300 bg-red-50 @else border-gray-300 bg-white @enderror rounded-xl shadow-sm placeholder-gray-400 text-gray-900 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                   placeholder="Enter your password">
                            <div class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                <i class="fas fa-shield-alt text-gray-400"></i>
                            </div>
                        </div>
                        @error('password')
                            <p class="text-red-500 text-sm flex items-center">
                                <i class="fas fa-exclamation-triangle mr-1"></i>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

              

                    <!-- Submit Button -->
                    <div>
                        <button type="submit"
                                class="group relative w-full flex justify-center py-3 px-4 border border-transparent text-sm font-semibold rounded-xl text-white bg-blue-600 hover:from-blue-700 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transform transition-all duration-200 hover:scale-[1.02] active:scale-[0.98] shadow-lg hover:shadow-xl">
                            
                            <span class="flex items-center">
                                Sign in to Admin Panel
                                <i class="fas fa-arrow-right ml-2 group-hover:translate-x-1 transition-transform duration-200"></i>
                            </span>
                        </button>
                    </div>
                </form>

                <!-- Divider -->
                <div class="mt-6">
                    <div class="relative">
                        <div class="absolute inset-0 flex items-center">
                            <div class="w-full border-t border-gray-300"></div>
                        </div>
                        <div class="relative flex justify-center text-sm">
                            <span class="px-2 bg-white/80 text-gray-500 font-medium">Quick Access</span>
                        </div>
                    </div>
                </div>

                <!-- Back to Website Link -->
                <div class="mt-6 text-center">
                    <a href="{{ route('home') }}" 
                       class="inline-flex items-center px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 hover:shadow-md">
                        <i class="fas fa-arrow-left mr-2"></i>
                        Back to Website
                    </a>
                </div>
            </div>

            <!-- Footer -->
            <div class="text-center animate-slide-up" style="animation-delay: 0.4s;">
                <p class="text-sm text-gray-500">
                    <i class="fas fa-shield-alt text-blue-500 mr-1"></i>
                    Secure Admin Access
                </p>
                <p class="text-xs text-gray-400 mt-1">
                    © {{ date('Y') }} Genesis Accommodation. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <!-- Loading Animation (hidden by default) -->
    <div id="loading" class="hidden fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
        <div class="bg-white rounded-lg p-6 flex items-center space-x-3">
            <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600"></div>
            <span class="text-gray-700 font-medium">Signing in...</span>
        </div>
    </div>

    <script>
        // Form submission with loading animation
        document.querySelector('form').addEventListener('submit', function() {
            document.getElementById('loading').classList.remove('hidden');
        });

        // Input focus effects
        document.querySelectorAll('input[type="email"], input[type="password"]').forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('ring-2', 'ring-blue-500', 'ring-opacity-50');
            });
            
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('ring-2', 'ring-blue-500', 'ring-opacity-50');
            });
        });

        // Password visibility toggle (optional enhancement)
        // You can add this if you want to show/hide password
    </script>
</body>
</html>
