<section class="flex flex-col items-center bg-white mt-10">
  <!-- Blue line with "Testimonial" text -->
  <div>
    <div class="flex items-center justify-center mb-4">
      <div class="border border-blue-600 w-32"></div>
      <span class="px-4 text-primary font-medium text-xl uppercase tracking-wide">Our Rooms</span>
      <div class="border border-blue-600 w-32"></div>
    </div>

    <!-- Main heading -->
    <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
      Explore our
      <span class="text-primary">Room</span>
    </h2>
  </div>

  <div
    class="mt-10 pt-10 grid max-w-screen-2xl mx-auto grid-cols-1 gap-6 px-2 sm:max-w-lg sm:px-20 md:max-w-screen-2xl md:grid-cols-2 md:px-10 lg:grid-cols-3 lg:gap-8">

    @include('frontend.component.accomodation')
  </div>

  <!-- View More button -->
  <div class="mt-8 w-full flex justify-center">
    <button
      class="bg-primary text-white font-semibold px-6 py-3 rounded hover:bg-primary-dark transition">
      View More
    </button>
  </div>
</section>
