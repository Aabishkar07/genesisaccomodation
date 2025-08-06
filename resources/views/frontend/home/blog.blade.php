<div class="p-4">
       <div class="">

        <div class="flex items-center justify-center mb-4">
            <div class="border border-blue-600 w-32"></div>
            <span class="px-4 text-primary font-medium text-xl uppercase tracking-wide">Blogs</span>
            <div class="border border-blue-600 w-32"></div>
        </div>

        <!-- Main heading -->
        <h2 class="text-4xl text-center md:text-5xl font-bold text-gray-900">
            Thoughts we
            <span class="text-primary"> love to share</span>
        </h2>
    </div>
      <div class="max-w-screen-2xl pt-20 mx-auto px-5">
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 max-sm:gap-8">


            @foreach ($blogs as $key => $blog)


            @include('frontend.component.blog' , $blog);
            @endforeach



        </div>
      </div>
    </div>
