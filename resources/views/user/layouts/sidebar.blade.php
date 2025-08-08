<!-- Sidebar -->
<div id="sidebar" class="bg-white w-64 min-h-screen shadow-lg sidebar-transition transform -translate-x-full lg:translate-x-0 fixed lg:static z-30">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 bg-gradient-to-r from-primary to-primary-dark">
        <div class="flex items-center">
            <i class="fas fa-home text-white text-2xl mr-2"></i>
            <span class="text-white text-xl font-bold">User Panel</span>
        </div>
    </div>

    <!-- User Info -->
    <div class="p-4 border-b border-gray-200">
        <div class="flex items-center">
            <div class="w-10 h-10 bg-primary rounded-full flex items-center justify-center">
                <i class="fas fa-user text-white"></i>
            </div>
            <div class="ml-3">
                <p class="text-sm font-medium text-gray-900">{{ Auth::guard('customer')->user()->name }}</p>
                <p class="text-xs text-gray-500">{{ Auth::guard('customer')->user()->email }}</p>
            </div>
        </div>
    </div>

    <!-- Navigation -->
    <nav class="mt-4">
        <div class="px-4 space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('user.dashboard') }}"
               class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary hover:text-white transition-colors duration-200 {{ request()->routeIs('user.dashboard') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>
                <span>Dashboard</span>
            </a>

            <!-- My Bookings -->
            <a href="{{ route('user.bookings') }}"
               class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary hover:text-white transition-colors duration-200 {{ request()->routeIs('user.bookings*') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-calendar-check w-5 h-5 mr-3"></i>
                <span>My Bookings</span>
                @php
                    $pendingCount = \App\Models\Booking::where('user_id', Auth::guard('customer')->id())->where('status', 'pending')->count();
                @endphp
                @if($pendingCount > 0)
                    <span class="ml-auto bg-red-500 text-white text-xs rounded-full px-2 py-1">{{ $pendingCount }}</span>
                @endif
            </a>

            <!-- Profile -->
            <a href="{{ route('user.profile') }}"
               class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary hover:text-white transition-colors duration-200 {{ request()->routeIs('user.profile') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-user-cog w-5 h-5 mr-3"></i>
                <span>Profile Settings</span>
            </a>

            <!-- Change Password -->
            <a href="{{ route('user.change-password') }}"
               class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary hover:text-white transition-colors duration-200 {{ request()->routeIs('user.change-password*') ? 'bg-primary text-white' : '' }}">
                <i class="fas fa-key w-5 h-5 mr-3"></i>
                <span>Change Password</span>
            </a>

            <!-- Browse Accommodations -->
            <a href="{{ route('accommodations') }}"
               class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary hover:text-white transition-colors duration-200">
                <i class="fas fa-search w-5 h-5 mr-3"></i>
                <span>Browse Accommodations</span>
            </a>

            <!-- Back to Website -->
            <a href="{{ route('home') }}"
               class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary hover:text-white transition-colors duration-200">
                <i class="fas fa-globe w-5 h-5 mr-3"></i>
                <span>Back to Website</span>
            </a>
        </div>

        <!-- Divider -->
        <div class="border-t border-gray-200 mt-6 pt-6">
            <div class="px-4 space-y-2">
                <!-- Support -->
                <a href="{{ route('contact') }}"
                   class="flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-primary hover:text-white transition-colors duration-200">
                    <i class="fas fa-life-ring w-5 h-5 mr-3"></i>
                    <span>Support</span>
                </a>

                <!-- Logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="submit"
                            class="w-full flex items-center px-4 py-3 text-gray-700 rounded-lg hover:bg-red-500 hover:text-white transition-colors duration-200">
                        <i class="fas fa-sign-out-alt w-5 h-5 mr-3"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </nav>
</div>
