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
                        <div class="swiper-slide">
                            @include('Location::frontend.blocks.list-locations.loop')
                        </div>
                    @endforeach
                </div>
                <div class="row">
                    <div class="swiper-button-next .button-next"></div>
                    <div class="swiper-button-prev .button-prev"></div>
                </div>
            </div>
        @endif
    </div>
</div>