@extends('user.layouts.app')

@section('title', 'Change Password')
@section('page-title', 'Change Password')

@section('content')
<div class="space-y-6">
    <!-- Back Button -->
    <div>
        <a href="{{ route('user.profile') }}"
           class="inline-flex items-center text-primary hover:text-primary-dark">
            <i class="fas fa-arrow-left mr-2"></i>
            Back to Profile
        </a>
    </div>

    <!-- Change Password Header -->
    <div class="bg-white rounded-xl p-6 card-shadow">
        <div class="flex items-center space-x-4">
            <div class="w-12 h-12 bg-red-100 rounded-full flex items-center justify-center">
                <i class="fas fa-lock text-red-600 text-xl"></i>
            </div>
            <div>
                <h2 class="text-2xl font-bold text-gray-900">Change Password</h2>
                <p class="text-gray-600">Update your account password for better security</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
        <!-- Change Password Form -->
        <div class="lg:col-span-2">
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-6">Update Password</h3>

                    <form method="POST" action="{{ route('user.change-password.update') }}" class="space-y-6">
                        @csrf
                        @method('PUT')

                        <!-- Current Password -->
                        <div>
                            <label for="current_password" class="block text-sm font-medium text-gray-700 mb-2">
                                Current Password
                            </label>
                            <div class="relative">
                                <input type="password"
                                       id="current_password"
                                       name="current_password"
                                       required
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                       placeholder="Enter your current password">
                                <button type="button"
                                        onclick="togglePassword('current_password')"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="current_password_icon"></i>
                                </button>
                            </div>
                            @error('current_password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- New Password -->
                        <div>
                            <label for="new_password" class="block text-sm font-medium text-gray-700 mb-2">
                                New Password
                            </label>
                            <div class="relative">
                                <input type="password"
                                       id="new_password"
                                       name="new_password"
                                       required
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                       placeholder="Enter your new password">
                                <button type="button"
                                        onclick="togglePassword('new_password')"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="new_password_icon"></i>
                                </button>
                            </div>
                            @error('new_password')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror

                            <!-- Password Requirements -->
                            <div class="mt-2 text-xs text-gray-500">
                                <p class="mb-1">Password must contain:</p>
                                <ul class="list-disc list-inside space-y-1 ml-2">
                                    <li>At least 8 characters</li>
                                    <li>One uppercase letter (A-Z)</li>
                                    <li>One lowercase letter (a-z)</li>
                                    <li>One number (0-9)</li>
                                    <li>One special character (@$!%*?&)</li>
                                </ul>
                            </div>
                        </div>

                        <!-- Confirm New Password -->
                        <div>
                            <label for="new_password_confirmation" class="block text-sm font-medium text-gray-700 mb-2">
                                Confirm New Password
                            </label>
                            <div class="relative">
                                <input type="password"
                                       id="new_password_confirmation"
                                       name="new_password_confirmation"
                                       required
                                       class="w-full px-4 py-3 pr-12 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent"
                                       placeholder="Confirm your new password">
                                <button type="button"
                                        onclick="togglePassword('new_password_confirmation')"
                                        class="absolute inset-y-0 right-0 pr-3 flex items-center">
                                    <i class="fas fa-eye text-gray-400 hover:text-gray-600" id="new_password_confirmation_icon"></i>
                                </button>
                            </div>
                            @error('new_password_confirmation')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Submit Button -->
                        <div class="flex items-center justify-end space-x-4">
                            <a href="{{ route('user.profile') }}"
                               class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 transition-colors duration-200">
                                Cancel
                            </a>
                            <button type="submit"
                                    class="px-6 py-3 bg-red-600 text-white rounded-lg hover:bg-red-700 transition-colors duration-200">
                                <i class="fas fa-key mr-2"></i>
                                Change Password
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <!-- Security Tips -->
        <div class="space-y-6">
            <!-- Security Tips -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        <i class="fas fa-shield-alt text-green-600 mr-2"></i>
                        Security Tips
                    </h3>

                    <div class="space-y-4 text-sm text-gray-600">
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
                            <p>Use a unique password that you don't use elsewhere</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
                            <p>Make it at least 8 characters long</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
                            <p>Include numbers, symbols, and mixed-case letters</p>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-check-circle text-green-500 mt-0.5"></i>
                            <p>Avoid personal information like names or birthdays</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Password Strength Indicator -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        <i class="fas fa-chart-line text-blue-600 mr-2"></i>
                        Password Strength
                    </h3>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between text-sm">
                            <span class="text-gray-600">Strength:</span>
                            <span id="strength-text" class="font-medium text-gray-400">Enter password</span>
                        </div>
                        <div class="w-full bg-gray-200 rounded-full h-2">
                            <div id="strength-bar" class="h-2 rounded-full transition-all duration-300 bg-gray-300" style="width: 0%"></div>
                        </div>
                        <div class="grid grid-cols-4 gap-1 text-xs">
                            <div class="text-center text-red-500">Weak</div>
                            <div class="text-center text-yellow-500">Fair</div>
                            <div class="text-center text-blue-500">Good</div>
                            <div class="text-center text-green-500">Strong</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="bg-white rounded-xl card-shadow">
                <div class="p-6">
                    <h3 class="text-lg font-semibold text-gray-900 mb-4">
                        <i class="fas fa-history text-purple-600 mr-2"></i>
                        Account Security
                    </h3>

                    <div class="space-y-3 text-sm">
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Last password change:</span>
                            <span class="font-medium">{{ Auth::guard('customer')->user()->updated_at->diffForHumans() }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Account created:</span>
                            <span class="font-medium">{{ Auth::guard('customer')->user()->created_at->format('M d, Y') }}</span>
                        </div>
                        <div class="flex items-center justify-between">
                            <span class="text-gray-600">Login sessions:</span>
                            <span class="font-medium text-green-600">Secure</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    // Toggle password visibility
    function togglePassword(fieldId) {
        const field = document.getElementById(fieldId);
        const icon = document.getElementById(fieldId + '_icon');

        if (field.type === 'password') {
            field.type = 'text';
            icon.classList.remove('fa-eye');
            icon.classList.add('fa-eye-slash');
        } else {
            field.type = 'password';
            icon.classList.remove('fa-eye-slash');
            icon.classList.add('fa-eye');
        }
    }

    // Password strength checker
    document.getElementById('new_password').addEventListener('input', function() {
        const password = this.value;
        const strengthBar = document.getElementById('strength-bar');
        const strengthText = document.getElementById('strength-text');

        let strength = 0;
        let feedback = '';

        // Check password criteria
        if (password.length >= 8) strength++;
        if (/[a-z]/.test(password)) strength++;
        if (/[A-Z]/.test(password)) strength++;
        if (/[0-9]/.test(password)) strength++;
        if (/[@$!%*?&]/.test(password)) strength++;

        // Update strength indicator
        switch (strength) {
            case 0:
            case 1:
                strengthBar.style.width = '25%';
                strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-red-500';
                strengthText.textContent = 'Weak';
                strengthText.className = 'font-medium text-red-500';
                break;
            case 2:
            case 3:
                strengthBar.style.width = '50%';
                strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-yellow-500';
                strengthText.textContent = 'Fair';
                strengthText.className = 'font-medium text-yellow-500';
                break;
            case 4:
                strengthBar.style.width = '75%';
                strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-blue-500';
                strengthText.textContent = 'Good';
                strengthText.className = 'font-medium text-blue-500';
                break;
            case 5:
                strengthBar.style.width = '100%';
                strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-green-500';
                strengthText.textContent = 'Strong';
                strengthText.className = 'font-medium text-green-500';
                break;
        }

        if (password.length === 0) {
            strengthBar.style.width = '0%';
            strengthBar.className = 'h-2 rounded-full transition-all duration-300 bg-gray-300';
            strengthText.textContent = 'Enter password';
            strengthText.className = 'font-medium text-gray-400';
        }
    });

    // Password confirmation matching
    document.getElementById('new_password_confirmation').addEventListener('input', function() {
        const password = document.getElementById('new_password').value;
        const confirmation = this.value;

        if (confirmation.length > 0) {
            if (password === confirmation) {
                this.classList.remove('border-red-300');
                this.classList.add('border-green-300');
            } else {
                this.classList.remove('border-green-300');
                this.classList.add('border-red-300');
            }
        } else {
            this.classList.remove('border-red-300', 'border-green-300');
        }
    });
</script>
@endpush
@endsection
