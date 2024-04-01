
<title> {{ $title }}</title>


    @foreach ($slider_img as $img)
  <div class="aon-page-benner-area2" style="background-image: url({{ asset('storage/' . $img->image) }});">
    <!-- Your other HTML elements here -->

@endforeach



    <div class="aon-page-banner-row2">
        <div class="aon-page-benner-overlay2"></div>
        <div class="sf-banner-heading-wrap2">
            <div class="sf-banner-heading-area2">
                <div class="sf-banner-breadcrumbs-nav2">
                    <ul class="list-inline">
                        <li><a href="/" class="text-light"> Home </a></li>
                        <li class="text-light">{{ $title }}</li>
                    </ul>
                </div>
                <div class="sf-banner-heading-large2">{{ $title }}</div>
            </div>
            <div class="sf-banner-vid-section">
                <div class="video-play-btn2">
                    <a class="mfp-video" href="https://www.youtube.com/watch?v=c1XNqw2gSbU">
                        <i class="fa fa-play"></i>
                    </a>
                    <span>Watch Now</span>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- @endforeach --}}

