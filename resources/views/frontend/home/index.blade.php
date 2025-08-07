@extends('frontend.layout.app')
@section('body')

@include('frontend.home.landing')
@include('frontend.home.service')

@include('frontend.home.about')

@include('frontend.home.accomodation')
      @include('frontend.component.calltoaction')

@include('frontend.home.testimonial')
@include('frontend.home.blog')



@endsection
