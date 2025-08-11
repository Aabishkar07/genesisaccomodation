@extends('frontend.layout.app')
@section('body')


   <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-3  my-12 max-w-screen-2xl mx-auto px-4">
            @include('frontend.component.accomodation')
        </div>

    @endsection
