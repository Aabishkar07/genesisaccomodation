@extends('frontend.layout.app')
@section('body')

<div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        @forelse($accommodations as $accommodation)
            <div class="border rounded-lg p-4 shadow hover:shadow-lg transition">
                <img src="{{ asset('uploads/'.$accommodation->featured_image) }}" alt="{{ $accommodation->name }}" class="w-full h-40 object-cover rounded">
                <h2 class="text-lg font-bold mt-2">{{ $accommodation->name }}</h2>
                <p class="text-gray-600 text-sm">{{ $accommodation->roomType->name ?? 'N/A' }}</p>
                <p class="font-semibold text-primary mt-1">${{ number_format($accommodation->price, 2) }}</p>
                <p class="text-xs text-gray-500">Max Guests: {{ $accommodation->max_guest }}</p>
            </div>
        @empty
            <p class="col-span-3 text-center text-gray-500">No accommodations found.</p>
        @endforelse
    </div>

    @endsection
