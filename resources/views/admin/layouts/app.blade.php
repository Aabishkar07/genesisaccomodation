<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin Dashboard') - Genesis Accommodation</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <style>
        /* Ensure sidebar works properly */
        .sidebar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 50;
        }

        /* Prevent body scroll when sidebar is open on mobile */
        body.sidebar-open {
            overflow: hidden;
        }

        /* Ensure smooth transitions */
        .sidebar-transition {
            transition: transform 0.3s ease-in-out;
        }

        /* Desktop sidebar should always be visible */
        @media (min-width: 1024px) {
            .sidebar-desktop {
                transform: translateX(0) !important;
            }
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gray-50">
    <div x-data="{ sidebarOpen: false }" class="min-h-screen">
        <!-- Sidebar -->
        <div class="fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-lg transform transition-transform duration-300 ease-in-out lg:translate-x-0 sidebar-fixed sidebar-transition"
            :class="{ 'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen }"
            :class="{ 'sidebar-desktop': window.innerWidth >= 1024 }">
            <div class="flex items-center justify-between h-16 px-6 bg-blue-600 text-white">
                <h1 class="text-xl font-bold">Admin Panel</h1>
                <button @click="sidebarOpen = false" class="lg:hidden">
                    <i class="fas fa-times"></i>
                </button>
            </div>

            <nav class="mt-6">
                <div class="px-4 mb-4">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Main</h3>
                </div>

                <a href="{{ route('dashboard') }}"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-tachometer-alt w-5 h-5 mr-3"></i>
                    <span>Dashboard</span>
                </a>

                <div class="px-4 mt-6 mb-4">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Content</h3>
                </div>

                <a href="{{ route('admin.blogs.index') }}"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-blog w-5 h-5 mr-3"></i>
                    <span>Blogs</span>
                </a>

                <a href="{{ route('admin.about-us.index') }}"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-info-circle w-5 h-5 mr-3"></i>
                    <span>About Us</span>
                </a>

                <a href="{{ route('admin.services.index') }}"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-concierge-bell w-5 h-5 mr-3"></i>
                    <span>Services</span>
                </a>



                <a href="{{ route('admin.room_types.index') }}"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-bed w-5 h-5 mr-3"></i>
                    <span>Room Types</span>
                </a>

                <a href="{{ route('admin.accommodations.index') }}"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-hotel w-5 h-5 mr-3"></i>
                    <span>Accommodations</span>
                </a>

                <a href="{{ route('admin.testimonials.index') }}"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-star w-5 h-5 mr-3"></i>
                    <span>Testimonials</span>
                </a>

                <div class="px-4 mt-6 mb-4">
                    <h3 class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Settings</h3>
                </div>

                <a href="{{ route('admin.settings.index') }}"
                    class="flex items-center px-6 py-3 text-gray-700 hover:bg-blue-50 hover:text-blue-600 transition-colors">
                    <i class="fas fa-cog w-5 h-5 mr-3"></i>
                    <span>Settings</span>
                </a>
            </nav>
        </div>

        <!-- Overlay for mobile -->
        <div x-show="sidebarOpen" x-transition:enter="transition-opacity ease-linear duration-300"
            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
            x-transition:leave="transition-opacity ease-linear duration-300" x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0" class="fixed inset-0 z-40 bg-gray-600 bg-opacity-75 lg:hidden"
            @click="sidebarOpen = false">
        </div>

        <!-- Main Content -->
        <div class="lg:ml-64">
            <!-- Top Navigation -->
            <div class="bg-white shadow-sm border-b">
                <div class="flex items-center justify-between h-16 px-6">
                    <div class="flex items-center">
                        <button @click="sidebarOpen = true"
                            class="lg:hidden mr-4 p-2 rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-100">
                            <i class="fas fa-bars"></i>
                        </button>
                        <h2 class="text-xl font-semibold text-gray-800">@yield('page-title', 'Dashboard')</h2>
                    </div>

                    <div class="flex items-center space-x-4">
                            

                        <div class="relative">
                            <button class="flex items-center text-gray-600 hover:text-gray-800">
                                <img class="h-8 w-8 rounded-full"
                                    src="https://ui-avatars.com/api/?name=Admin&background=0D9488&color=fff"
                                    alt="Admin">
                                <span class="ml-2">Admin</span>
                                <i class="fas fa-chevron-down ml-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <main class="p-6">
                @if (session('success'))
                    <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded">
                        {{ session('error') }}
                    </div>
                @endif

                @yield('content')
            </main>
        </div>
    </div>

    <script>
        // Ensure sidebar works properly on all screen sizes
        document.addEventListener('DOMContentLoaded', function() {
            // Handle window resize
            window.addEventListener('resize', function() {
                const sidebar = document.querySelector('[x-data]');
                if (window.innerWidth >= 1024) { // lg breakpoint
                    // On desktop, ensure sidebar is visible
                    if (sidebar && sidebar.__x) {
                        sidebar.__x.$data.sidebarOpen = true;
                    }
                } else {
                    // On mobile, ensure sidebar is hidden by default
                    if (sidebar && sidebar.__x) {
                        sidebar.__x.$data.sidebarOpen = false;
                    }
                }
            });

            // Initialize sidebar state based on screen size
            if (window.innerWidth >= 1024) {
                const sidebar = document.querySelector('[x-data]');
                if (sidebar && sidebar.__x) {
                    sidebar.__x.$data.sidebarOpen = true;
                }
            }

            // Handle body scroll when sidebar is open on mobile
            const body = document.body;
            const sidebarToggle = document.querySelector('[x-data]');

            if (sidebarToggle && sidebarToggle.__x) {
                sidebarToggle.__x.$watch('sidebarOpen', function(value) {
                    if (window.innerWidth < 1024) {
                        if (value) {
                            body.classList.add('sidebar-open');
                        } else {
                            body.classList.remove('sidebar-open');
                        }
                    }
                });
            }
        });
    </script>


    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script>
        function deleteItem(itemSlug) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this !',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    // alert("delete-form-"+itemSlug)
                    let form = document.querySelector(".delete-form-" + itemSlug)
                    form.submit();
                }
            });
        }
    </script>

    <script>
        var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            var old = document.getElementsByClassName('oldimage')[0];

            old.classList.add("hidden");

        };

        var loadFile1 = function(event) {
            var output = document.getElementById('output1');
            output.src = URL.createObjectURL(event.target.files[0]);
            var old = document.getElementsByClassName('oldimage1')[0];

            old.classList.add("hidden");

        };
        var loadFile2 = function(event) {
            var output = document.getElementById('output2');
            output.src = URL.createObjectURL(event.target.files[0]);
            var old = document.getElementsByClassName('oldimage2')[0];

            old.classList.add("hidden");

        };
    </script>



    @stack('scripts')
</body>

</html>
