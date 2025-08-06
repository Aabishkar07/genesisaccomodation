@extends('frontend.layout.app')
@section('body')

<main class="bg-white">
    <div class="container mx-auto px-4">
        <section class="relative py-16 md:py-24 bg-white">
            <div class="flex flex-wrap -mx-4">
                <!-- Blog Content -->
                <div class="w-full md:w-2/3 px-4">
                    <h1 class="text-3xl md:text-5xl font-bold text-gray-900">{{ $blog->title }}</h1>

                    <div class="flex justify-between items-center mt-4 text-sm text-gray-500">
                        <div>
                            📅 Published: {{ $blog->created_at->format('jS M Y') }}
                        </div>

                    </div>

                    <img src="{{ asset('/uploads/' . $blog->featured_image) }}"
                         alt="{{ $blog->img_alt }}"
                         class="w-full mt-6 rounded-lg shadow" />

                    <div class="mt-8 text-gray-700 leading-relaxed prose prose-blue max-w-none">
                        {!! $blog->content !!}
                    </div>
                </div>

                <!-- Sidebar -->

                @if ($allblogs->count() > 0)


                <div class="w-full md:w-1/3 px-4 mt-10 md:mt-0">
                    <div class="bg-white shadow-lg rounded-lg overflow-hidden">
                        <div class="bg-indigo-800 text-white px-4 py-3">
                            <h5 class="text-lg font-semibold">Related Blogs</h5>
                        </div>
                        <div class="p-4 space-y-6">
                            @foreach ($allblogs as $key => $blog)
                                <a href="{{ route('single', $blog->slug) }}" class="block hover:opacity-90">
                                    <div class="flex items-start gap-4">
                                        <img src="{{ asset('/uploads/' . $blog->featured_image) }}"
                                             alt="{{ $blog->img_alt }}"
                                             class="w-24 h-24 object-cover rounded-md" />
                                        <div class="flex-1">
                                            <div class="font-medium text-gray-800 line-clamp-2">{{ $blog->title }}</div>
                                            <div class="text-sm text-gray-500 mt-1 flex flex-wrap gap-2">
                                                <span>📅 {{ $blog->updated_at->format('jS M Y') }}</span>
                                                @if ($blog->views)
                                                    <span>👁️ {{ $blog->views }}</span>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </a>
                                <hr class="border-t border-gray-200" />
                            @endforeach
                        </div>
                    </div>

                </div>
                @endif
            </div>
        </section>
    </div>
</main>

@endsection
