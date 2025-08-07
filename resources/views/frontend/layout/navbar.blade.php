<!-- Navbar -->

<nav style="background: #10142c" class=" backdrop-blur-md  sticky top-0 z-50">
    <div class="max-w-screen-2xl mx-auto">
        <div class="flex justify-between items-center h-16">
            <!-- Logo -->
            <div class="flex items-center">
                <a href="/" class="text-2xl font-bold bg-gradient-to-r from-blue-500 to-purple-600 bg-clip-text text-transparent">
                    Genesis
                </a>
            </div>

            <!-- Desktop Navigation -->
            <div class="hidden md:flex space-x-4 ml-10">
                <a href="/" class="flex items-center gap-2 text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition {{ Route::is('home') ? 'border-b-2 border-white' : '' }}">
                    <span>Home</span>
                </a>
                <a href="{{ route('aboutus') }}" class="flex items-center gap-2 text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition {{ Route::is('aboutus') ? 'border-b-2 border-white' : '' }}">
                    <span>About</span>
                </a>
                <a href="{{ route('services') }}" class="flex items-center gap-2 text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition {{ Route::is('services') ? 'border-b-2 border-white' : '' }}">
                    <span>Service</span>
                </a>
                <a href="{{ route('blogs') }}" class="flex items-center gap-2 text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition {{ Route::is('blogs') ? 'border-b-2 border-white' : '' }}">
                    <span>Blogs</span>
                </a>
                <a href="{{ route('contact') }}" class="flex items-center gap-2 text-white hover:text-blue-600 px-3 py-2 rounded-md text-sm font-medium transition" {{ Route::is('contact') ? 'border-b-2 border-white' : '' }}>
                    <span>Contact</span>
                </a>
            </div>

            <!-- Desktop Buttons -->
            <div class="bg-white rounded-full border-2 border-orange-300 overflow-hidden hidden md:flex">
                <button class="px-4 py-2 text-sm font-medium text-black bg-white focus:outline-none">
                    Sign up
                </button>
                <button class="px-6 py-2 text-sm font-medium text-white bg-primary focus:outline-none rounded-full">
                    Login
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="menu-toggle" class="p-2 rounded-md text-gray-600 hover:bg-gray-100 focus:outline-none">
                    <svg id="menu-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="close-icon" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 hidden" fill="none"
                        viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden">
        <div class="px-4 pt-2 pb-4 space-y-1 bg-white border-t border-gray-200">
            <a href="/" class="block text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition">Home</a>
            <a href="{{ route('aboutus') }}" class="block text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition">About</a>
            <a href="{{ route('services') }}" class="block text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition">Service</a>
            <a href="{{ route('blogs') }}" class="block text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition">Blogs</a>
            <a href="#" class="block text-gray-600 hover:text-blue-600 px-3 py-2 rounded-md text-base font-medium transition">Contact</a>
            <div class="flex flex-col gap-2 pt-4">
                <button class="w-full px-4 py-2 border border-gray-300 text-gray-700 rounded-md text-sm hover:bg-gray-100 transition">
                    Sign In
                </button>
                <button class="w-full px-4 py-2 bg-gradient-to-r from-blue-500 to-purple-600 text-white rounded-md text-sm hover:opacity-90 transition">
                    Get Started
                </button>
            </div>
        </div>
    </div>
</nav>

<script>
    const toggleBtn = document.getElementById('menu-toggle');
    const menu = document.getElementById('mobile-menu');
    const menuIcon = document.getElementById('menu-icon');
    const closeIcon = document.getElementById('close-icon');

    toggleBtn.addEventListener('click', () => {
        menu.classList.toggle('hidden');
        menuIcon.classList.toggle('hidden');
        closeIcon.classList.toggle('hidden');
    });
</script>
