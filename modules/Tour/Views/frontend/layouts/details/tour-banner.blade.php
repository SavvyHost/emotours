@if($row->banner_image_id)
    <div class="bravo_banner">
        <section class="hero_in tours_detail" style="background: url({{$row->getBannerImageUrlAttribute('full')}}) center center no-repeat">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp text-center"><span></span> {{ clean($translation->title) }} </h1>
                </div>
                <span class="magnific-gallery">
					<a href="{{$row->getBannerImageUrlAttribute('full')}}" class="btn_photos" title="Photo title" data-effect="mfp-zoom-in">{{ __('View photos') }}</a>
                </span>
            </div>
        </section>
    </div>
@endif

