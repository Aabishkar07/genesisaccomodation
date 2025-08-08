<!-- Header -->
<header class="bg-white shadow-sm border-b border-gray-200">
    <div class="flex items-center justify-between px-6 py-4">
        <!-- Mobile menu button -->
        <div class="flex items-center">
            <button onclick="toggleSidebar()" class="lg:hidden text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                <i class="fas fa-bars text-xl"></i>
            </button>

            <!-- Page Title -->
            <h1 class="ml-4 lg:ml-0 text-2xl font-semibold text-gray-900">
                @yield('page-title', 'Dashboard')
            </h1>
        </div>

        <!-- Right side -->
        <div class="flex items-center space-x-4">
            <!-- Notifications -->
            <div class="relative">
                <button class="text-gray-500 hover:text-gray-700 focus:outline-none focus:text-gray-700">
                    <i class="fas fa-bell text-xl"></i>
                    @php
                        $notificationCount = \App\Models\Booking::where('user_id', Auth::guard('customer')->id())
                            ->whereIn('status', ['confirmed', 'cancelled'])
                            ->where('created_at', '>=', now()->subDays(7))
                            ->count();
                    @endphp
                    @if($notificationCount > 0)
                        <span class="absolute -top-1 -right-1 bg-red-500 text-white text-xs rounded-full h-5 w-5 flex items-center justify-center">
                            {{ $notificationCount }}
                        </span>
                    @endif
                </button>
            </div>

            <!-- User Menu -->
            <div class="relative group">
                <button class="flex items-center text-gray-700 hover:text-gray-900 focus:outline-none">
                    <div class="w-8 h-8 bg-primary rounded-full flex items-center justify-center mr-2">
                        <i class="fas fa-user text-white text-sm"></i>
                    </div>
                    <span class="hidden md:block text-sm font-medium">{{ Auth::guard('customer')->user()->name }}</span>
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </button>

                <!-- Dropdown Menu -->
                <div class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 z-50">
                    <div class="py-2">
                        <a href="{{ route('user.profile') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-user-cog mr-3"></i>
                            Profile Settings
                        </a>
                        <a href="{{ route('user.bookings') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-calendar-check mr-3"></i>
                            My Bookings
                        </a>
                        <a href="{{ route('user.change-password') }}" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                            <i class="fas fa-key mr-3"></i>
                            Change Password
                        </a>
                        <div class="border-t border-gray-200 my-2"></div>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="w-full flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 text-left">
                                <i class="fas fa-sign-out-alt mr-3"></i>
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
