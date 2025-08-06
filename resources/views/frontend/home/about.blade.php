@php
use App\Models\AboutUs;

$aboutUs = AboutUs::first();
@endphp

<section class="py-16 bg-gradient-card">
      <div class="max-w-screen-2xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">

          <div class="space-y-8">
            <div>
              <h2 class="text-primary text-lg font-semibold mb-2 relative inline-block">
                About us
                <div class="absolute bottom-0 left-0 w-16 h-0.5 bg-primary mt-1"></div>
              </h2>
              <h3 class="text-4xl md:text-5xl font-bold text-foreground leading-tight">
                Welcome to
                <span class="text-primary">Room Finder</span>
              </h3>
            </div>

            <p class="text-muted-foreground text-lg leading-relaxed">
{{$aboutUs->content}}            </p>

            <div class="grid grid-cols-3 gap-6">
              <div class="text-center p-6 border-2 border-dashed border-primary/30 rounded-lg hover:border-primary/50 transition-colors">
                <Home class="h-8 w-8 text-primary mx-auto mb-3" />
                <div class="text-3xl font-bold text-foreground">123</div>
                <div class="text-sm text-muted-foreground">Rooms</div>
              </div>



              <div class="text-center p-6 border-2 border-dashed border-primary/30 rounded-lg hover:border-primary/50 transition-colors">
                <User class="h-8 w-8 text-primary mx-auto mb-3" />
                <div class="text-3xl font-bold text-foreground">86</div>
                <div class="text-sm text-muted-foreground">Clients</div>
              </div>
            </div>

           @if (!Route::is('aboutus'))

    <Button variant="default" size="lg" class="bg-primary p-2 rounded-md text-white hover:bg-primary-dark">
      <a class="mt-20" href="{{ route('aboutus') }}" >   Explore more about us </a>
    </Button>

@endif

          </div>

          <div class="grid grid-cols-2 gap-4 h-96">
            <div class="col-span-1 row-span-2 rounded-2xl overflow-hidden shadow-medium">
              <img
                src="{{ asset('uploads/' . $aboutUs->image) }}"
                alt="Modern bedroom interior"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
              />
            </div>

            <div class="rounded-2xl overflow-hidden shadow-medium">
              <img
                src="https://images.unsplash.com/photo-1551698618-1dfe5d97d256?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="Cozy bedroom with warm lighting"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
              />
            </div>

            <div class="rounded-2xl overflow-hidden shadow-medium">
              <img
                src="https://images.unsplash.com/photo-1560448204-e02f11c3d0e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                alt="Modern living space"
                class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
              />
            </div>
          </div>
        </div>
      </div>
    </section>
