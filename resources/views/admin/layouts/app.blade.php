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
        /* Custom scrollbar for sidebar */
        .sidebar-scrollbar::-webkit-scrollbar {
            width: 4px;
        }
        .sidebar-scrollbar::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        .sidebar-scrollbar::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 2px;
        }
        .sidebar-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Firefox scrollbar styling */
        .sidebar-scrollbar {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f1f5f9;
        }

        /* Smooth transitions */
        .transition-all {
            transition: all 0.3s ease-in-out;
        }

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

        /* Sticky navbar styles */
        .sticky-navbar {
            position: sticky;
            top: 0;
            z-index: 40;
        }

        /* Main content area adjustments */
        .main-content {
            transition: margin-left 0.3s ease-in-out;
        }

        .main-content-sidebar-open {
            margin-left: 16rem; /* 256px = 16rem */
        }

        .main-content-sidebar-closed {
            margin-left: 0;
        }

        /* Responsive adjustments */
        @media (max-width: 1023px) {
            .main-content-sidebar-open,
            .main-content-sidebar-closed {
                margin-left: 0;
            }
        }

        /* Sidebar scrollbar styling */
        .sidebar-nav::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-nav::-webkit-scrollbar-track {
            background: #f8fafc;
            border-radius: 3px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 3px;
        }

        .sidebar-nav::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }

        /* Firefox scrollbar for sidebar */
        .sidebar-nav {
            scrollbar-width: thin;
            scrollbar-color: #cbd5e1 #f8fafc;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gray-50">
    <div x-data="{ sidebarOpen: true }" class="min-h-screen">
        <!-- Include Sidebar Component -->
        @include('admin.layouts.sidebar')

        <!-- Main Content Area -->
        <div class="main-content transition-all duration-300"
            :class="sidebarOpen ? 'main-content-sidebar-open' : 'main-content-sidebar-closed'">
            <!-- Include Navbar Component -->
            @include('admin.layouts.navbar')

            <!-- Page Content -->
            <main class="p-6">
                <!-- Flash Messages -->
                @if (session('success'))
                    <div class="mb-6 bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ session('success') }}
                        </div>
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-6 bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"></path>
                            </svg>
                            {{ session('error') }}
                        </div>
                    </div>
                @endif

                @if (session('warning'))
                    <div class="mb-6 bg-yellow-50 border border-yellow-200 text-yellow-700 px-4 py-3 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                            </svg>
                            {{ session('warning') }}
                        </div>
                    </div>
                @endif

                @if (session('info'))
                    <div class="mb-6 bg-blue-50 border border-blue-200 text-blue-700 px-4 py-3 rounded-lg shadow-sm">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                            </svg>
                            {{ session('info') }}
                        </div>
                    </div>
                @endif

                <!-- Main Content -->
                @yield('content')
            </main>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>

    <script>
        // Ensure sidebar works properly on all screen sizes
        document.addEventListener('DOMContentLoaded', function() {
            // Handle window resize
            window.addEventListener('resize', function() {
                const sidebar = document.querySelector('[x-data]');
                if (window.innerWidth >= 1024) { // lg breakpoint
                    // On desktop, sidebar is open by default
                    if (sidebar && sidebar.__x) {
                        sidebar.__x.$data.sidebarOpen = true;
                    }
                } else {
                    // On mobile, sidebar is hidden by default for better UX
                    if (sidebar && sidebar.__x) {
                        sidebar.__x.$data.sidebarOpen = false;
                    }
                }
            });

            // Initialize sidebar state based on screen size
            if (window.innerWidth >= 1024) {
                // On desktop, sidebar is open by default
                const sidebar = document.querySelector('[x-data]');
                if (sidebar && sidebar.__x) {
                    sidebar.__x.$data.sidebarOpen = true;
                }
            } else {
                // On mobile, sidebar is hidden by default for better UX
                const sidebar = document.querySelector('[x-data]');
                if (sidebar && sidebar.__x) {
                    sidebar.__x.$data.sidebarOpen = false;
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

            // Add keyboard shortcut for sidebar toggle (Ctrl/Cmd + B)
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'b') {
                    e.preventDefault();
                    const sidebar = document.querySelector('[x-data]');
                    if (sidebar && sidebar.__x) {
                        sidebar.__x.$data.sidebarOpen = !sidebar.__x.$data.sidebarOpen;
                    }
                }
            });
        });

        // Delete confirmation function
        function deleteItem(itemSlug) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this item!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    let form = document.querySelector(".delete-form-" + itemSlug);
                    if (form) {
                        form.submit();
                    }
                }
            });
        }

        // File upload preview functions
        var loadFile = function(event) {
            var output = document.getElementById('output');
            if (output) {
                output.src = URL.createObjectURL(event.target.files[0]);
                var old = document.getElementsByClassName('oldimage')[0];
                if (old) {
                    old.classList.add("hidden");
                }
            }
        };

        var loadFile1 = function(event) {
            var output = document.getElementById('output1');
            if (output) {
                output.src = URL.createObjectURL(event.target.files[0]);
                var old = document.getElementsByClassName('oldimage1')[0];
                if (old) {
                    old.classList.add("hidden");
                }
            }
        };

        var loadFile2 = function(event) {
            var output = document.getElementById('output2');
            if (output) {
                output.src = URL.createObjectURL(event.target.files[0]);
                var old = document.getElementsByClassName('oldimage2')[0];
                if (old) {
                    old.classList.add("hidden");
                }
            }
        };
    </script>

    @stack('scripts')
</body>

</html>
