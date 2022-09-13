<div class="container-fluid">
    <div class="bravo-list-locations @if(!empty($layout)) {{ $layout }} @endif">
            @if($title)
            <div class="main_title_3">
                <span><em></em></span>
                <h3>{{$title}}</h3> 
                @if(!empty($desc))
                <p>{{$desc}}</p>
                @endif
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