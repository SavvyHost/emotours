@if($row->banner_image_id)
    <div class="bravo_banner">
        <section class="hero_in tours_detail"
                 style="background: url({{$row->getBannerImageUrlAttribute('full')}}) center center no-repeat">
            <div class="wrapper">
                <div class="container">
                    <h1 class="fadeInUp text-center"><span></span> {{ clean($translation->title) }} </h1>
                </div>
                @if($row->video)
                    <span>
                        <a href="{{$row->getBannerImageUrlAttribute('full')}}" class="btn_photos" title="Photo title"
                           data-effect="mfp-zoom-in" data-toggle="modal" data-src="{{ handleVideoUrl($row->video) }}"
                           data-target="#myModal">
                                {{ __('Tour Video') }}
                            </a>
                    </span>
                @endif
            </div>
        </section>
        <div class="modal fade z-max" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
             aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="embed-responsive embed-responsive-16by9">
                            <iframe class="embed-responsive-item bravo_embed_video" src="{{ handleVideoUrl($row->video) }}" allowscriptaccess="always"
                                    allow="autoplay"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endif

