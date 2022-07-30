<div class="bravo-list-news">
    <div class="container">
        @if($title)
            <div class="title">
                {{$title}}
                @if(!empty($desc))
                    <div class="sub-title">
                        {{$desc}}
                    </div>
                @endif
            </div>
        @endif
        <div class="list-item swiper swiper-locations ">
            <div class="swiper-wrapper">
                @foreach($rows as $row)
                    <div class="col-lg-3 col-md-4 swiper-slide">
                        @include('News::frontend.blocks.list-news.loop')
                    </div>
                @endforeach
            </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
        </div>
    </div>
</div>