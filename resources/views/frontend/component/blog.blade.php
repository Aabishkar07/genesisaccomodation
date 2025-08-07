    <div class="bg-gray-100 rounded-md overflow-hidden">
            <div class="bg-gray-50 aspect-[23/16]">
              <img src="{{ asset('uploads/' . $blog->featured_image) }}" alt="Blog Post 1" class="w-full h-full object-cover object-top" />
            </div>
            <div class="p-6">
              <h3 class="text-lg font-semibold text-slate-900 mb-3">{{ $blog->title }}</h3>
              <p class="text-slate-600 text-[15px] leading-relaxed line-clamp-3">{{ Str::limit($blog->excerpt, 230, '...') }}.</p>
              <a href="{{ route('single', $blog->slug) }}" class="mt-6 inline-block px-3 py-1.5 rounded-md tracking-wider bg-primary hover:bg-indigo-700 text-white text-sm font-medium">Read More</a>
            </div>
          </div>
