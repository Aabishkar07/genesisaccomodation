<style>
    /* Custom animations and styles */
    .nav-link {
        position: relative;
        transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
    }

    .nav-link::before {
        content: '';
        position: absolute;
        bottom: -2px;
        left: 50%;
        width: 0;
        height: 2px;
        background: linear-gradient(90deg, #3B82F6, #1D4ED8);
        transition: all 0.3s ease;
        transform: translateX(-50%);
    }

    .nav-link:hover::before,
    .nav-link.active::before {
        width: 100%;
    }

    .btn-primary {
        background: linear-gradient(135deg, #3B82F6 0%, #1E40AF 100%);
        box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        transition: all 0.3s ease;
    }

    .btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 6px 20px rgba(59, 130, 246, 0.4);
    }

    .btn-secondary {
        border: 2px solid #E5E7EB;
        transition: all 0.3s ease;
    }

    .btn-secondary:hover {
        border-color: #3B82F6;
        background-color: #F8FAFC;
        transform: translateY(-1px);
    }

    .mobile-menu {
        backdrop-filter: blur(20px);
        background: rgba(255, 255, 255, 0.95);
        border-top: 1px solid rgba(229, 231, 235, 0.5);
    }

    .logo-container {
        transition: transform 0.3s ease;
    }

    .logo-container:hover {
        transform: scale(1.05);
    }

    /* Smooth navbar background */
    .navbar-bg {
        background: rgba(255, 255, 255, 0.95);
        backdrop-filter: blur(20px);
        border-bottom: 1px solid rgba(229, 231, 235, 0.3);
    }

    /* Mobile menu animation */
    .mobile-menu-enter {
        animation: slideDown 0.3s ease-out forwards;
    }

    .mobile-menu-exit {
        animation: slideUp 0.3s ease-out forwards;
    }

    @keyframes slideDown {
        from {
            opacity: 0;
            transform: translateY(-10px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    @keyframes slideUp {
        from {
            opacity: 1;
            transform: translateY(0);
        }

        to {
            opacity: 0;
            transform: translateY(-10px);
        }
    }
</style>

<!-- Professional Navbar -->
<nav class="navbar-bg sticky top-0 z-50 shadow-sm">
    <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-20">
            <!-- Logo -->
            <div class="flex items-center">
                <div class="logo-container cursor-pointer">
                    <div class="flex  space-x-3">
                        <!-- Replace with your actual logo -->
                        <img src="{{ asset('images/logo.png') }}" alt="Logo"
                            class="w-24 h-36 rounded-lg object-contain" />
                    </div>
                </div>
            </div>


            <!-- Desktop Navigation -->
            <div class="hidden md:flex items-center space-x-8">
                <a href="/"
                    class="nav-link active text-gray-900 hover:text-blue-600 px-4 py-2 text-sm font-semibold">
                    Home
                </a>
                <a href="/about" class="nav-link text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-semibold">
                    About
                </a>
                <a href="/services" class="nav-link text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-semibold">
                    Services
                </a>
                <a href="/blog" class="nav-link text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-semibold">
                    Blog
                </a>
                <a href="/contact" class="nav-link text-gray-700 hover:text-blue-600 px-4 py-2 text-sm font-semibold">
                    Contact
                </a>
            </div>

            <!-- Desktop Action Buttons -->
            <div class="hidden md:flex items-center space-x-4">
                <button class="btn-secondary px-6 py-2.5 text-sm font-semibold text-gray-700 rounded-lg">
                    Sign In
                </button>
                <button class="btn-primary px-6 py-2.5 text-sm font-semibold text-white rounded-lg">
                   Login
                </button>
            </div>

            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="mobile-menu-btn"
                    class="p-2 rounded-lg text-gray-600 hover:text-gray-900 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-blue-500 transition-colors">
                    <svg id="menu-open" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg id="menu-close" class="h-6 w-6 hidden" fill="none" viewBox="0 0 24 24"
                        stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden hidden mobile-menu">
        <div class="px-4 pt-6 pb-8 space-y-4">
            <!-- Mobile Navigation Links -->
            <div class="space-y-2">
                <a href="/"
                    class="block text-gray-900 font-semibold px-4 py-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    Home
                </a>
                <a href="/about"
                    class="block text-gray-700 font-medium px-4 py-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    About
                </a>
                <a href="/services"
                    class="block text-gray-700 font-medium px-4 py-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    Services
                </a>
                <a href="/blog"
                    class="block text-gray-700 font-medium px-4 py-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    Blog
                </a>
                <a href="/contact"
                    class="block text-gray-700 font-medium px-4 py-3 rounded-lg hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    Contact
                </a>
            </div>

            <!-- Mobile Action Buttons -->
            <div class="pt-6 space-y-3 border-t border-gray-200">
                <button
                    class="w-full px-6 py-3 text-sm font-semibold text-gray-700 bg-white border-2 border-gray-200 rounded-lg hover:border-blue-300 hover:bg-gray-50 transition-all">
                    Sign In
                </button>
                <button
                    class="w-full px-6 py-3 text-sm font-semibold text-white bg-gradient-to-r from-blue-500 to-blue-600 rounded-lg hover:from-blue-600 hover:to-blue-700 transform hover:scale-105 transition-all shadow-lg">
                    Get Started
                </button>
            </div>
        </div>
    </div>
</nav>



<script>
    // Mobile menu toggle functionality
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    const menuOpen = document.getElementById('menu-open');
    const menuClose = document.getElementById('menu-close');

    mobileMenuBtn.addEventListener('click', () => {
        const isHidden = mobileMenu.classList.contains('hidden');

        if (isHidden) {
            mobileMenu.classList.remove('hidden');
            mobileMenu.classList.add('mobile-menu-enter');
            mobileMenu.classList.remove('mobile-menu-exit');
            menuOpen.classList.add('hidden');
            menuClose.classList.remove('hidden');
        } else {
            mobileMenu.classList.add('mobile-menu-exit');
            mobileMenu.classList.remove('mobile-menu-enter');
            menuOpen.classList.remove('hidden');
            menuClose.classList.add('hidden');

            setTimeout(() => {
                mobileMenu.classList.add('hidden');
            }, 300);
        }
    });

    // Close mobile menu when clicking outside
    document.addEventListener('click', (e) => {
        if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
            if (!mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.add('mobile-menu-exit');
                mobileMenu.classList.remove('mobile-menu-enter');
                menuOpen.classList.remove('hidden');
                menuClose.classList.add('hidden');

                setTimeout(() => {
                    mobileMenu.classList.add('hidden');
                }, 300);
            }
        }
    });

    // Active link highlighting (demo functionality)
    const currentPage = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-link');

    navLinks.forEach(link => {
        if (link.getAttribute('href') === currentPage ||
            (currentPage === '/' && link.getAttribute('href') === '/')) {
            link.classList.add('active');
        } else {
            link.classList.remove('active');
        }
    });

    // Navbar scroll effect
    let lastScroll = 0;
    const navbar = document.querySelector('nav');

    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;

        if (currentScroll <= 0) {
            navbar.classList.remove('shadow-lg');
            navbar.classList.add('shadow-sm');
            return;
        }

        if (currentScroll > lastScroll && !navbar.classList.contains('scroll-up')) {
            // Scrolling down
            navbar.classList.add('shadow-lg');
            navbar.classList.remove('shadow-sm');
        } else if (currentScroll < lastScroll && navbar.classList.contains('scroll-down')) {
            // Scrolling up
            navbar.classList.add('shadow-lg');
        }

        lastScroll = currentScroll;
    });
</script>
