

@extends('frontend.layouts.master')

{{-- @include('frontend.includes.header')
@include('frontend.includes.home.slider') --}}


@section('content')
    @include('frontend.includes.page-banner', ['title' => 'About US'])
    @include('frontend.includes.home.about')
@endsection
