<article
    class="group bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2">
    <!-- Image Container -->
    <div class="relative overflow-hidden">
        <img src="{{ asset('uploads/' . $blog->featured_image) }}" alt="{{ $blog->title }}"
            class="w-full h-64 object-cover object-center group-hover:scale-110 transition-transform duration-700" />

        <!-- Overlay -->
        <div
            class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300">
        </div>

        <!-- Date Badge -->
        <div class="absolute top-4 left-4">
            <div class="bg-white/90 backdrop-blur-sm text-gray-900 px-3 py-1 rounded-full text-xs font-semibold">
                {{ $blog->created_at->format('M j') }}
            </div>
        </div>

        <!-- Read Time Badge -->
        <div class="absolute top-4 right-4">
            <div class="bg-primary/90 backdrop-blur-sm text-white px-3 py-1 rounded-full text-xs font-semibold">
                {{ ceil(str_word_count(strip_tags($blog->content)) / 200) }} min read
            </div>
        </div>
    </div>

    <!-- Content -->
    <div class="p-6">
        <!-- Meta Information -->
        <div class="flex items-center gap-4 mb-4 text-sm text-gray-500">
            <div class="flex items-center gap-1">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"
                        clip-rule="evenodd"></path>
                </svg>
                <span>{{ $blog->created_at->format('F j, Y') }}</span>
            </div>

            @if ($blog->views)
                <div class="flex items-center gap-1">
                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                        <path d="M10 12a2 2 0 100-4 2 2 0 000 4z"></path>
                        <path fill-rule="evenodd"
                            d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z"
                            clip-rule="evenodd"></path>
                    </svg>
                    <span>{{ number_format($blog->views) }}</span>
                </div>
            @endif
        </div>

        <!-- Title -->
        <h3
            class="text-xl font-bold text-gray-900 mb-3 group-hover:text-primary transition-colors duration-300 line-clamp-2 leading-tight">
            <a href="{{ route('single', $blog->slug) }}" class="hover:text-primary">
                {{ $blog->title }}
            </a>
        </h3>

        <!-- Excerpt -->
        <p class="text-gray-600 text-sm leading-relaxed line-clamp-3 mb-4">
            {{ Str::limit($blog->excerpt, 150, '...') }}
        </p>

        <!-- Tags (if available) -->
        {{-- @if ($blog->meta_keywords)
            <div class="flex flex-wrap gap-2 mb-4">
                @foreach (array_slice(explode(',', $blog->meta_keywords), 0, 3) as $tag)
                    <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">
                        {{ trim($tag) }}
                    </span>
                @endforeach
                @if (count(explode(',', $blog->meta_keywords)) > 3)
                    <span class="px-2 py-1 bg-gray-100 text-gray-700 text-xs rounded-full">
                        +{{ count(explode(',', $blog->meta_keywords)) - 3 }} more
                    </span>
                @endif
            </div>
        @endif --}}

        <!-- Read More Button -->
        <div class="flex items-center justify-between pt-4 border-t border-gray-100">
            <a href="{{ route('single', $blog->slug) }}"
                class="inline-flex items-center gap-2 text-primary hover:text-primary-dark font-semibold text-sm group-hover:gap-3 transition-all duration-300">
                Read More
                <svg class="w-4 h-4 group-hover:translate-x-1 transition-transform duration-300" fill="none"
                    stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path>
                </svg>
            </a>

            <!-- Share Button -->
            <button
                onclick="navigator.share({title: '{{ $blog->title }}', url: '{{ route('single', $blog->slug) }}'})"
                class="p-2 text-gray-400 hover:text-primary transition-colors duration-300">
                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 20 20">
                    <path
                        d="M15 8a3 3 0 10-2.977-2.63l-4.94 2.47a3 3 0 100 4.319l4.94 2.47a3 3 0 10.895-1.789l-4.94-2.47a3.027 3.027 0 000-.74l4.94-2.47C13.456 7.68 14.19 8 15 8z">
                    </path>
                </svg>
            </button>
        </div>
    </div>
</article>
