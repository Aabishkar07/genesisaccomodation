@extends('frontend.layout.app')
@section('body')
    @include('frontend.home.heronew')
    {{-- @include('frontend.home.landing') --}}
    {{-- @include('frontend.home.service') --}}

    @include('frontend.home.about')

    @if($displayAll->where('name', 'accommodation')->first()->status)
    @include('frontend.home.accomodation')
    @endif
   


    @include('frontend.component.calltoaction')

    @if($displayAll->where('name', 'blog')->first()->status)

    @include('frontend.home.blog')
    @endif
    @if($displayAll->where('name', 'testimonial')->first()->status)
    @include('frontend.home.testimonial')
    @endif
@endsection
