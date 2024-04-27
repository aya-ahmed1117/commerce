{{-- @extends('frontend.layouts.master') --}}
@extends('frontend.layouts.aboutmaster')

@section('content')
    <!-- SLIDER START -->
    @include('frontend.includes.home.slider')
    <!-- SLIDER END -->
    @include('frontend.layouts.milk')


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
    {{-- @include('frontend.pages.blog.index') --}}
    <!-- START BLOG SECTION -->

    <!-- START TEAM SECTION -->
    @include('frontend.includes.home.team')
{{--
    <img id="avatar" src="{{asset('assets/frontend/images/cart/Img-1.jpg')}}" style="position:absolute; z-index:100;" />

    <script lang="javascript">
function updateAvatarPosition(e) {
  var avatar = document.getElementById("avatar");
  avatar.style.left = e.clientX + "px";
  avatar.style.top = e.clientY + "px";
}

// Attach the event listener to the window object
window.addEventListener("mousemove", updateAvatarPosition);
    </script> --}}
    <!-- START TEAM SECTION -->
@endsection

@push('js')
@endpush


@push('css')
@endpush
