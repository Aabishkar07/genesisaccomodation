<div x-clock x-data="{ sidebarOpen = true }">
    <div x-cloak x-show="sidebarOpen" class="fixed inset-0 z-20 hidden transition-opacity pointer-events-none lg:block">
    </div>

    <!-- Overlay for Small Screens -->
    <div x-cloak x-show="sidebarOpen" @click="sidebarOpen = false"
        class="fixed inset-0 z-10 block bg-black opacity-50 lg:hidden"></div>
    <style>
        [x-cloak] {
            display: none;
        }
    </style>

    <div x-data="handleSwipe()" x-cloak
        :class="sidebarOpen ? 'translate-x-0 ease-out w-64 lg:w-64' : '-translate-x-full ease-in'"
        @touchstart="touchStart" @touchend="touchEnd"
        class="fixed inset-y-0 left-0 z-30 overflow-y-auto transition duration-300 transform bg-white border"
        style="height: calc(100% - [footer-height]px);">
        <div>
            <nav class="mt-24">
                <a class="{{ request()->segment(2) == 'dashboard' ? ' bg-[#91755d] text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-[#91755d] hover:text-white flex items-center px-6 py-2  text-gray-600' }} "
                    href="

                     ">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="currentColor" class="icon icon-tabler icons-tabler-filled icon-tabler-layout-dashboard">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path
                            d="M9 3a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2zm0 12a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-2a2 2 0 0 1 2 -2zm10 -4a2 2 0 0 1 2 2v6a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-6a2 2 0 0 1 2 -2zm0 -8a2 2 0 0 1 2 2v2a2 2 0 0 1 -2 2h-4a2 2 0 0 1 -2 -2v-2a2 2 0 0 1 2 -2z" />
                    </svg>

                    <span class="mx-3">Dashboard</span>
                </a>


                <a class="{{ request()->segment(2) == 'banner' ? ' bg-[#91755d] text-white flex items-center px-6 py-2  mr-3 flex-1 mt-2 item ' : 'mr-3 flex-1 mt-2 item hover:bg-[#91755d] hover:text-white flex items-center px-6 py-2  text-gray-600' }}"
                    href="">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-photo" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M15 8h.01" />
                        <path d="M3 6a3 3 0 0 1 3 -3h12a3 3 0 0 1 3 3v12a3 3 0 0 1 -3 3h-12a3 3 0 0 1 -3 -3v-12z" />
                        <path d="M3 16l5 -5c.928 -.893 2.072 -.893 3 0l5 5" />
                        <path d="M14 14l1 -1c.928 -.893 2.072 -.893 3 0l3 3" />
                    </svg>

                    <span class="mx-3">Banner</span>
                </a>










            </nav>
        </div>
    </div>
</div>
