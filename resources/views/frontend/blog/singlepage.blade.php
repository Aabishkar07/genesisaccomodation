@extends('frontend.layout.app')
@section('body')

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-primary to-blue-600 py-7">
        <div class="absolute inset-0 bg-black opacity-20"></div>
        <div class="relative container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-4xl mx-auto text-center">
                <nav class="flex items-center justify-center mb-6 text-white/80">
                    <a href="{{ route('home') }}" class="hover:text-white transition-colors">Home</a>
                    <span class="mx-2">/</span>
                    <a href="{{ route('blogs') }}" class="hover:text-white transition-colors">Blog</a>
                    <span class="mx-2">/</span>
                    <span class="text-white">{{ $blog->title }}</span>
                </nav>

                <h1 class="text-4xl md:text-4xl  font-bold text-white mb-6 leading-tight">
                    {{ $blog->title }}
                </h1>

                <div class="flex flex-wrap items-center justify-center gap-6 text-white/90 text-sm md:text-base">
                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ $blog->created_at->format('F j, Y') }}</span>
                    </div>

                    <div class="flex items-center gap-2">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd"
                                d="M10 18a8 8 0 100-16 8 8 0 000 16zm1-12a1 1 0 10-2 0v4a1 1 0 00.293.707l2.828 2.829a1 1 0 101.415-1.415L11 9.586V6z"
                                clip-rule="evenodd"></path>
                        </svg>
                        <span>{{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read</span>
                    </div>

                    @if ($blog->views)
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                <path fill-rule="evenodd"
                                    d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                    clip-rule="evenodd"></path>
                            </svg>
                            <span>{{ number_format($blog->views) }} views</span>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>

    <!-- Main Content -->
    <main class="bg-gray-50 py-6">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col lg:flex-row gap-12">
                <!-- Blog Content -->
                <article class="lg:w-2/3">
                    <!-- Featured Image -->
                    <div class="relative overflow-hidden rounded-2xl shadow-2xl mb-8">
                        <img src="{{ asset('/uploads/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
                            class="w-full h-96 md:h-[500px] object-cover" />
                        <div class="absolute inset-0 bg-gradient-to-t from-black/50 to-transparent"></div>
                    </div>

                    <!-- Article Content -->
                    <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                        <!-- Excerpt -->
                        @if ($blog->excerpt)
                            <div class="mb-8">
                                <p class="text-xl text-gray-600 leading-relaxed italic border-l-4 border-primary pl-6">
                                    "{{ $blog->excerpt }}"
                                </p>
                            </div>
                        @endif

                        <!-- Content -->
                        <div class="prose prose-lg max-w-none">
                            <div class="text-gray-700 leading-relaxed text-lg">
                                {!! $blog->content !!}
                            </div>
                        </div>

                        <!-- Article Footer -->
                        <div class="mt-12 pt-8 border-t border-gray-200">
                            <!-- Social Sharing -->
                            <div class="flex items-center justify-between mb-6">
                                <h3 class="text-lg font-semibold text-gray-900">Share this article</h3>
                                <div class="flex gap-3">
                                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(request()->url()) }}"
                                        target="_blank"
                                        class="flex items-center justify-center w-10 h-10 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z" />
                                        </svg>
                                    </a>
                                    <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->url()) }}&text={{ urlencode($blog->title) }}"
                                        target="_blank"
                                        class="flex items-center justify-center w-10 h-10 bg-blue-400 text-white rounded-full hover:bg-blue-500 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z" />
                                        </svg>
                                    </a>
                                    <a href="https://www.linkedin.com/sharing/share-offsite/?url={{ urlencode(request()->url()) }}"
                                        target="_blank"
                                        class="flex items-center justify-center w-10 h-10 bg-blue-700 text-white rounded-full hover:bg-blue-800 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                            <path
                                                d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z" />
                                        </svg>
                                    </a>
                                    <button
                                        onclick="navigator.share({title: '{{ $blog->title }}', url: '{{ request()->url() }}'})"
                                        class="flex items-center justify-center w-10 h-10 bg-gray-600 text-white rounded-full hover:bg-gray-700 transition-colors">
                                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20">
                                            <path
                                                d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z">
                                            </path>
                                        </svg>
                                    </button>
                                </div>
                            </div>

                            <!-- Tags -->
                            @if ($blog->meta_keywords)
                                <div class="flex items-center gap-2 mb-6">
                                    <span class="text-sm font-medium text-gray-700">Tags:</span>
                                    <div class="flex flex-wrap gap-2">
                                        @foreach (explode(',', $blog->meta_keywords) as $tag)
                                            <span class="px-3 py-1 bg-gray-100 text-gray-700 text-sm rounded-full">
                                                {{ trim($tag) }}
                                            </span>
                                        @endforeach
                                    </div>
                                </div>
                            @endif

                            <!-- Author Info -->
                            <div class="flex items-center gap-4 p-4 bg-gray-50 rounded-lg">
                                <div class="w-12 h-12 bg-primary rounded-full flex items-center justify-center">
                                    <svg class="w-6 h-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                            clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="font-semibold text-gray-900">Genesis Accommodation</h4>
                                    <p class="text-sm text-gray-600">Published on {{ $blog->created_at->format('F j, Y') }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </article>

                <!-- Sidebar -->
                <aside class="lg:w-1/3">
                    @if ($allblogs->count() > 0)
                        <div class="sticky top-24">
                            <!-- Related Articles -->
                            <div class="bg-white rounded-2xl shadow-lg overflow-hidden mb-8">
                                <div class="bg-gradient-to-r from-primary to-blue-600 text-white px-4 py-2">
                                    <h3 class="text-xl font-bold">Related Articles</h3>
                                    <p class="text-white/80 text-sm mt-1">Discover more from our blog</p>
                                </div>

                                <div class="p-6 space-y-6">
                                    @foreach ($allblogs->take(5) as $relatedBlog)
                                        <article class="group">
                                            <a href="{{ route('single', $relatedBlog->slug) }}"
                                                class="block hover:transform hover:scale-105 transition-all duration-300">
                                                <div class="flex gap-4">
                                                    <div class="flex-shrink-0">
                                                        <img src="{{ asset('/uploads/' . $relatedBlog->featured_image) }}"
                                                            alt="{{ $relatedBlog->title }}"
                                                            class="w-20 h-20 object-cover rounded-lg shadow-md" />
                                                    </div>
                                                    <div class="flex-1 min-w-0">
                                                        <h4
                                                            class="font-semibold text-gray-900 group-hover:text-primary transition-colors line-clamp-2 text-sm leading-tight">
                                                            {{ $relatedBlog->title }}
                                                        </h4>
                                                        <div class="flex items-center gap-3 mt-2 text-xs text-gray-500">
                                                            <span class="flex items-center gap-1">
                                                                <svg class="w-3 h-3" fill="currentColor"
                                                                    viewBox="0 0 20 20">
                                                                    <path fill-rule="evenodd"
                                                                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                                                                        clip-rule="evenodd"></path>
                                                                </svg>
                                                                {{ $relatedBlog->created_at->format('M j') }}
                                                            </span>
                                                            @if ($relatedBlog->views)
                                                                <span class="flex items-center gap-1">
                                                                    <svg class="w-3 h-3" fill="currentColor"
                                                                        viewBox="0 0 20 20">
                                                                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                                                                        <path fill-rule="evenodd"
                                                                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                                                                            clip-rule="evenodd"></path>
                                                                    </svg>
                                                                    {{ number_format($relatedBlog->views) }}
                                                                </span>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                            </a>
                                        </article>
                                    @endforeach
                                </div>

                                <div class="px-6 py-4 bg-gray-50 border-t border-gray-200">
                                    <a href="{{ route('blogs') }}"
                                        class="text-primary hover:text-primary-dark font-medium text-sm flex items-center gap-2">
                                        View all articles
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M9 5l7 7-7 7"></path>
                                        </svg>
                                    </a>
                                </div>
                            </div>


                        </div>
                    @endif
                </aside>
            </div>
        </div>
    </main>

@endsection
