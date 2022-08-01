<div class="container-fluid">
    <div class="bravo-list-locations @if(!empty($layout)) {{ $layout }} @endif">
        <div class="title">
            {{$title}}
        </div>
        @if(!empty($desc))
            <div class="sub-title">
                {{$desc}}
            </div>
        @endif
        @if(!empty($rows))
            <div class="list-item swiper swiper-locations">
                <div class="swiper-wrapper">
                    @foreach($rows as $key=>$row)
                        <div class="col-lg-3 col-md-4 swiper-slide">
                            @include('Location::frontend.blocks.list-locations.loop')
                        </div>
                    @endforeach
                </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
            </div>
        @endif
    </div>
</div>