@extends('frontend.layouts.master')

@section('content')
    <!-- SLIDER START -->
    {{-- @include('frontend.includes.home.slider') --}}
    <!-- SLIDER END -->
    <!-- START HERO SECTION -->

    {{-- @include('frontend.includes.home.hero') --}}
    <!-- END HERO SECTION -->

    <!-- START ABOUT SECTION -->
    @include('frontend.includes.home.about')
    <!-- START ABOUT SECTION -->

    <!-- START SERVICES SECTION -->
    @include('frontend.includes.home.services')
    <!-- START SERVICES SECTION -->

    <!-- START VIDEO SECTION -->
    @include('frontend.includes.home.video')
    <!-- START VIDEO SECTION -->

    <!-- START BLOG SECTION -->
    @include('frontend.includes.home.blog')
    <!-- START BLOG SECTION -->

    <!-- START TEAM SECTION -->
    @include('frontend.includes.home.team')
    <!-- START TEAM SECTION -->
@endsection

@push('js')
@endpush

@push('css')
@endpush
