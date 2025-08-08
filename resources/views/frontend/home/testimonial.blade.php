<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
<link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />

<style>
    .owl-nav button {
        position: absolute;
        top: 40%;
        transform: translateY(-50%);
        background-color: #e2e8f0;
        width: 22px !important;
        height: 22px !important;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 9999px;
        font-size: 1.25rem;
        font-weight: bold;
        padding: 0;
    }

    .owl-nav .owl-prev {
        left: -32px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: background 0.2s;
    }

    .owl-nav .owl-next {
        right: -32px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        transition: background 0.2s;
    }
</style>



<div class="my-20">

    <div class="flex items-center justify-center mb-4">
        <div class="border border-blue-600 w-32"></div>
        <span class="px-4 text-primary font-medium text-xl uppercase tracking-wide">Testimonial</span>
        <div class="border border-blue-600 w-32"></div>
    </div>

    <!-- Main heading -->
    <h2 class="text-4xl text-center md:text-5xl font-bold text-gray-900">
        What our
        <span class="text-primary"> Clients says</span>
    </h2>
</div>


<div class="relative p-8  mb-20">

    <div class="owl-carousel owl-theme">

        <!-- Testimonial Card 1 -->

        @foreach ($testimonials as $key => $testimonial)
            <div class="item p-6 bg-gray-100 rounded-xl h-full shadow">
                <div class="flex items-center gap-4 mb-4">
                    <!-- Image -->
                    <div class="w-24 h-24 rounded-full overflow-hidden">
                        <img src="{{ asset('uploads/' . $testimonial->image) }}" alt="{{ $testimonial->name }}"
                            class="w-full h-full object-cover border border-blue-200" />
                    </div>

                    <!-- Name (centered vertically) -->
                    <div class="flex items-center">
                        <h4 class="font-semibold text-gray-900 text-lg">{{ $testimonial->name }}</h4>
                    </div>

                    <!-- Quote mark -->
                    <div class="text-6xl text-primary font-serif leading-none ml-auto">"</div>
                </div>

                <p class="text-gray-600 mb-4 leading-relaxed">
                    {{ $testimonial->testimonial }}
                </p>


                <div class="flex items-center">
                    @for ($i = 1; $i <= 5; $i++)
                        @if ($i <= $testimonial->rating)
                            <i class="fas fa-star text-yellow-400 text-sm"></i>
                        @else
                            <i class="far fa-star text-gray-300 text-sm"></i>
                        @endif
                    @endfor
                    <span class="ml-2 text-sm text-gray-600">({{ $testimonial->rating }})</span>
                </div>
            </div>
        @endforeach

    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>

<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            loop: true,
            margin: 24,
            nav: true,
            dots: true,
            navText: [
                `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' class='w-4 h-4'><path stroke-linecap='round' stroke-linejoin='round' d='M15.75 19.5L8.25 12l7.5-7.5' /></svg>`,
                `<svg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 24 24' stroke-width='2' stroke='currentColor' class='w-4 h-4'><path stroke-linecap='round' stroke-linejoin='round' d='M8.25 4.5l7.5 7.5-7.5 7.5' /></svg>`
            ],
            responsive: {
                0: {
                    items: 1
                },
                768: {
                    items: 2
                },
                1024: {
                    items: 3
                }
            }
        });
    });
</script>
