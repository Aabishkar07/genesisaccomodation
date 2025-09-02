@extends('frontend.layout.app')

@section('body')
    @if ($accomodations->count() > 0)
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3 my-12 max-w-screen-2xl mx-auto px-4">
            @include('frontend.component.accomodation')
        </div>
    @else
<div class="flex flex-col items-center justify-center my-20">
    <div class="bg-white shadow-md rounded-2xl p-8 max-w-lg w-full text-center border border-gray-100">
        <!-- Icon -->
        <div class="w-16 h-16 mx-auto flex items-center justify-center rounded-full bg-red-50 mb-4">
            <svg class="w-8 h-8 text-red-400" fill="none" stroke="currentColor" stroke-width="2"
                viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M12 9v2m0 4h.01M21 12A9 9 0 1 1 3 12a9 9 0 0 1 18 0z" />
            </svg>
        </div>

        <!-- Heading -->
        <h2 class="text-2xl font-bold text-gray-800">No Accommodations Found</h2>

        <!-- Subtext -->
        <p class="text-gray-600 mt-2">
            Please check back later or try a different search.
        </p>

        <!-- Action button -->
        <a href="{{ route('home') }}"
            class="mt-6 inline-block px-6 py-2 rounded-lg bg-primary text-white font-medium shadow hover:bg-primary/90 transition">
            Go Back Home
        </a>
    </div>
</div>


    @endif
@endsection
