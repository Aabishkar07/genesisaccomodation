@extends('frontend.layout.app')
@section('body')

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-primary to-blue-600 py-20">
    <div class="absolute inset-0 bg-black opacity-20"></div>
    <div class="relative  px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold text-white mb-6">
                Our Accommodations
            </h1>
            <p class="text-xl text-white/90 max-w-3xl mx-auto">
                Discover our carefully curated selection of premium accommodations designed for your comfort and satisfaction.
            </p>
        </div>
    </div>
</section>

<!-- Search and Filter Section -->
<section class="bg-white py-8 border-b border-gray-200">
    <div class=" px-4 sm:px-6 lg:px-8">
        <form method="GET" action="{{ route('accommodations') }}" class="flex flex-col lg:flex-row gap-6 items-center justify-between">
            <!-- Search -->
            <div class="flex-1 max-w-md">
                <div class="relative">
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search accommodations..."
                           class="w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <svg class="absolute left-3 top-3.5 h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Filters -->
            <div class="flex gap-4">
                <select name="room_type" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">All Room Types</option>
                    @foreach($roomTypes as $roomType)
                        <option value="{{ $roomType->id }}" {{ request('room_type') == $roomType->id ? 'selected' : '' }}>
                            {{ $roomType->name }}
                        </option>
                    @endforeach 
                </select>

                <select name="price_range" class="px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-primary focus:border-transparent">
                    <option value="">Price Range</option>
                    <option value="0-100" {{ request('price_range') == '0-100' ? 'selected' : '' }}>$0 - $100</option>
                    <option value="100-200" {{ request('price_range') == '100-200' ? 'selected' : '' }}>$100 - $200</option>
                    <option value="200+" {{ request('price_range') == '200+' ? 'selected' : '' }}>$200+</option>
                </select>

                <button type="submit" class="px-6 py-3 bg-primary text-white rounded-lg hover:bg-primary-dark transition-colors duration-300">
                    Filter
                </button>

                @if(request('search') || request('room_type') || request('price_range') || request('sort'))
                    <a href="{{ route('accommodations') }}" class="px-6 py-3 bg-gray-500 text-white rounded-lg hover:bg-gray-600 transition-colors duration-300">
                        Clear
                    </a>
                @endif
            </div>
        </form>
    </div>
</section>

<!-- Accommodations Grid -->
<section class="py-16 bg-gray-50">
    <div class=" px-4 sm:px-6 lg:px-8">
        <!-- Results Info -->
        <div class="flex justify-between items-center mb-8">
            <div>
                <h2 class="text-2xl font-bold text-gray-900">
                    {{ $accommodations->total() }} Accommodations Found
                </h2>
                <p class="text-gray-600">Showing {{ $accommodations->firstItem() }}-{{ $accommodations->lastItem() }} of {{ $accommodations->total() }} results</p>
            </div>

            <div class="flex items-center gap-4">
                <span class="text-sm text-gray-600">Sort by:</span>
                <form method="GET" action="{{ route('accommodations') }}" class="flex items-center gap-2">
                    @if(request('search'))
                        <input type="hidden" name="search" value="{{ request('search') }}">
                    @endif
                    @if(request('room_type'))
                        <input type="hidden" name="room_type" value="{{ request('room_type') }}">
                    @endif
                    @if(request('price_range'))
                        <input type="hidden" name="price_range" value="{{ request('price_range') }}">
                    @endif
                    <select name="sort" onchange="this.form.submit()" class="px-3 py-2 border border-gray-300 rounded-lg text-sm focus:ring-2 focus:ring-primary focus:border-transparent">
                        <option value="latest" {{ request('sort', 'latest') == 'latest' ? 'selected' : '' }}>Latest</option>
                        <option value="price_low" {{ request('sort') == 'price_low' ? 'selected' : '' }}>Price: Low to High</option>
                        <option value="price_high" {{ request('sort') == 'price_high' ? 'selected' : '' }}>Price: High to Low</option>
                        <option value="name_asc" {{ request('sort') == 'name_asc' ? 'selected' : '' }}>Name: A to Z</option>
                    </select>
                </form>
            </div>
        </div>

        <!-- Grid -->
        @if($accommodations->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-3 mb-12">
            @foreach($accommodations as $accommodation)
            <article class="group relative overflow-hidden rounded-xl border border-gray-200 bg-white shadow-sm transition-all duration-300 hover:shadow-xl hover-scale">
                <!-- Image Container -->
                <div class="relative overflow-hidden">
                    <img src="{{ $accommodation->featured_image ? asset('uploads/' . $accommodation->featured_image) : asset('images/b.png') }}"
                         alt="{{ $accommodation->name }}"
                         class="h-64 w-full object-cover image-hover" />

                    <!-- Price Badge -->
                    <div class="absolute top-4 right-4">
                        <span class="bg-primary text-white px-3 py-1 rounded-full text-sm font-semibold shadow-lg">
                            ${{ number_format($accommodation->price ?? 0) }}
                        </span>
                    </div>

                    <!-- Status Badge -->
                    @if($accommodation->status === 'active')
                    <div class="absolute top-4 left-4">
                        <span class="bg-green-500 text-white px-2 py-1 rounded-full text-xs font-medium">
                            Available
                        </span>
                    </div>
                    @endif
                </div>

                <!-- Content -->
                <div class="p-6">
                    <!-- Title -->
                    <div class="mb-4">
                        <h3 class="text-xl font-bold text-gray-900 hover:text-primary transition-colors duration-300 mb-2">
                            <a href="{{ route('accommodation.single', $accommodation->slug) }}">
                                {{ $accommodation->name }}
                            </a>
                        </h3>
                        <p class="text-gray-600 text-sm flex items-center">
                            <svg class="w-4 h-4 mr-2 text-gray-400" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"></path>
                            </svg>
                            {{ $accommodation->address }}, {{ $accommodation->city }}
                        </p>
                    </div>

                    <!-- Description -->
                    @if($accommodation->description)
                    <div class="mb-4">
                        <p class="text-gray-600 text-sm line-clamp-2">
                            {{ Str::limit($accommodation->description, 100) }}
                        </p>
                    </div>
                    @endif

                    <!-- Room Type -->
                    @if($accommodation->roomType)
                    <div class="mb-4">
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                            {{ $accommodation->roomType->name }}
                        </span>
                    </div>
                    @endif

                    <!-- Amenities -->
                    @if($accommodation->amenities && is_array($accommodation->amenities))
                    <div class="mb-4">
                        <div class="flex flex-wrap gap-2">
                            @foreach(array_slice($accommodation->amenities, 0, 3) as $amenity)
                            <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-700">
                                {{ $amenity }}
                            </span>
                            @endforeach
                            @if(count($accommodation->amenities) > 3)
                            <span class="inline-flex items-center px-2 py-1 rounded-md text-xs font-medium bg-gray-100 text-gray-700">
                                +{{ count($accommodation->amenities) - 3 }} more
                            </span>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-between border-t border-gray-200 pt-4">
                        <div class="text-left">
                            <span class="text-xs text-gray-500">Starting from</span>
                            <p class="text-lg font-bold text-primary">${{ number_format($accommodation->price ?? 0) }}</p>
                        </div>

                        <div class="flex space-x-2">
                            <a href="{{ route('accommodation.single', $accommodation->slug) }}"
                               class="px-4 py-2 text-sm font-medium text-primary border border-primary rounded-lg hover:bg-primary hover:text-white transition-colors duration-300">
                                View Details
                            </a>

                        </div>
                    </div>
                </div>
            </article>
            @endforeach
        </div>
        @else
        <!-- No Results Found -->
        <div class="text-center py-16">
            <div class="max-w-md mx-auto">
                <svg class="mx-auto h-16 w-16 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
                <h3 class="text-lg font-medium text-gray-900 mb-2">No accommodations found</h3>
                <p class="text-gray-600 mb-6">
                    @if(request('search') || request('room_type') || request('price_range'))
                        Try adjusting your search criteria or
                        <a href="{{ route('accommodations') }}" class="text-primary hover:underline">clear all filters</a>
                    @else
                        No accommodations are currently available.
                    @endif
                </p>
                @if(request('search') || request('room_type') || request('price_range'))
                    <a href="{{ route('accommodations') }}" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-primary hover:bg-primary-dark">
                        View All Accommodations
                    </a>
                @endif
            </div>
        </div>
        @endif

        <!-- Pagination -->
        @if($accommodations->hasPages())
        <div class="flex justify-center">
            {{ $accommodations->links() }}
        </div>
        @endif
    </div>
</section>

@endsection

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Auto-submit search form when user stops typing
    const searchInput = document.querySelector('input[name="search"]');
    let searchTimeout;

    searchInput.addEventListener('input', function() {
        clearTimeout(searchTimeout);
        searchTimeout = setTimeout(() => {
            showLoading();
            this.closest('form').submit();
        }, 500); // Submit after 500ms of no typing
    });

    // Auto-submit when room type or price range changes
    const filterSelects = document.querySelectorAll('select[name="room_type"], select[name="price_range"]');
    filterSelects.forEach(select => {
        select.addEventListener('change', function() {
            showLoading();
            this.closest('form').submit();
        });
    });

    // Show loading indicator
    function showLoading() {
        const loadingDiv = document.createElement('div');
        loadingDiv.id = 'loading-overlay';
        loadingDiv.innerHTML = `
            <div class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded-lg shadow-lg">
                    <div class="flex items-center space-x-3">
                        <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-primary"></div>
                        <span class="text-gray-700">Searching accommodations...</span>
                    </div>
                </div>
            </div>
        `;
        document.body.appendChild(loadingDiv);
    }

    // Remove loading indicator when page loads
    window.addEventListener('load', function() {
        const loadingDiv = document.getElementById('loading-overlay');
        if (loadingDiv) {
            loadingDiv.remove();
        }
    });
});
</script>
@endpush
