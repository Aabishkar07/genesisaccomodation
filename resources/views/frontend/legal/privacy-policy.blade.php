@extends('frontend.layout.app')

@section('title', $privacyPolicy->title . ' - Genesis Accommodation')

@section('body')
    <div class="mx-auto max-w-screen-2xl">
        <!-- Page Header -->
        <div class="bg-gradient-to-r from-blue-50 to-indigo-50 py-12">
            <div class="o px-4 sm:px-6 lg:px-8">
                <div class="text-center">
                    <h1 class="text-3xl font-bold text-gray-900 sm:text-4xl lg:text-5xl">
                        {{ $privacyPolicy->title }}
                    </h1>
                    @if ($privacyPolicy->subtitle)
                        <p class="mt-3 max-w-2xl mx-auto text-xl text-gray-600 sm:mt-4">
                            {{ $privacyPolicy->subtitle }}
                        </p>
                    @endif
                    @if ($privacyPolicy->last_updated)
                        <div
                            class="mt-4 inline-flex items-center px-4 py-2 bg-green-100 text-green-800 rounded-full text-sm font-medium">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Last updated: {{ $privacyPolicy->last_updated->format('F j, Y') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <!-- Page Content -->
        <div class=" px-4 sm:px-6 lg:px-8 py-12">
            <!-- Content Navigation (if content has multiple sections) -->
            {{-- @if (str_contains($privacyPolicy->content, '<h2>'))
                <div class="mb-8 p-4 bg-gray-50 rounded-lg">
                    <h3 class="text-lg font-semibold text-gray-900 mb-3">Quick Navigation</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-2 text-sm">
                        @php
                            preg_match_all('/<h2[^>]*>(.*?)<\/h2>/', $privacyPolicy->content, $matches);
                            $sections = $matches[1] ?? [];
                        @endphp
                        @foreach ($sections as $index => $section)
                            <a href="#section-{{ $index + 1 }}"
                                class="text-green-600 hover:text-green-800 hover:underline transition-colors">
                                {{ strip_tags($section) }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif --}}

            <!-- Main Content -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
                <div class="p-6 sm:p-8 lg:p-10">
                    <div
                        class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-p:text-gray-700 prose-li:text-gray-700 prose-strong:text-gray-900">
                        {!! $privacyPolicy->content !!}
                    </div>
                </div>
            </div>

            <!-- Content Footer -->
            <div class="mt-8 p-6 bg-blue-50 rounded-lg border border-blue-200 ">
                <div class="text-center">
                    <h3 class="text-lg font-semibold text-green-900 mb-2">Questions About Your Privacy?</h3>
                    <p class="text-blue-700  mb-4">
                        If you have any questions about our Privacy Policy or how we handle your data, please contact us.
                    </p>
                    <div class="flex flex-col sm:flex-row gap-3 justify-center">
                        <a href="{{ route('contact') }}"
                            class="inline-flex items-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-blue-600 hover:bg-blue-700 transition-colors">
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z">
                                </path>
                            </svg>
                            Contact Us
                        </a>
                        <a href="{{ route('home') }}"
                            class="inline-flex items-center px-6 py-3 border border-gray-300 text-base font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50 transition-colors">
                            <svg class="mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6">
                                </path>
                            </svg>
                            Back to Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add smooth scrolling for navigation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scrolling to navigation links
            const navLinks = document.querySelectorAll('a[href^="#section-"]');
            navLinks.forEach(link => {
                link.addEventListener('click', function(e) {
                    e.preventDefault();
                    const targetId = this.getAttribute('href');
                    const targetElement = document.querySelector(targetId);
                    if (targetElement) {
                        targetElement.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Add section IDs to h2 elements for navigation
            const h2Elements = document.querySelectorAll('h2');
            h2Elements.forEach((element, index) => {
                element.id = `section-${index + 1}`;
            });
        });
    </script>
@endsection
