<div class="container-fluid">
    <div class="hero-call-to-action">
        <div class="row">
            <div class="col-md-6 col-sm-12 section ">
                <div class="context-new">
                    <div class="title">
                    {{$title}}
                    </div>
                    <div class="sub_title">
                    {{$sub_title}}
                    </div>
                    @if($link_title)
                        <a class="btn-more" href="{{$link_more}}">
                        {{$link_title}}
                        </a>
                    @endif
                </div>
            </div>
            <div class=" col-md-6 col-sm-12 section">
                <picture>
                <source media="(max-width: 767px)" srcset="/uploads/0000/1/2022/08/06/mobile-offer-banner.jpg">
                <img class="offer-banner" src="{{ $bg_image_url ?? "" }}" alt="offerBanner">
                </picture>
            </div>
        </div>
    </div>
</div>