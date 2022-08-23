<div class="container-fluid">
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
    <div class="list-item swiper swiper-featured-tours">
            {{-- @if($style_list === "normal")
                <div class="row ">
                    @foreach($rows as $row)
                        <div class="col-lg-{{$col ?? 3}} col-md-6">
                            @include('Tour::frontend.layouts.search.loop-gird')
                        </div>
                    @endforeach
                </div>
            @endif --}}
        @if($style_list === "carousel")
            <div class="swiper-wrapper">
                @foreach($rows as $row)
                <div class="swiper-slide">
                    @include('Tour::frontend.layouts.search.loop-gird')
                </div>
                @endforeach
            </div>
            <div class="swiper-button-next"></div>
            <div class="swiper-button-prev"></div>
        @endif
        {{-- @if($style_list === "box_shadow")
            <div class="row row-eq-height">
                @foreach($rows as $row)
                    <div class="col-lg-{{$col ?? 4}} col-md-6 col-item">
                        @include('Tour::frontend.blocks.list-tour.loop-box-shadow')
                    </div>
                @endforeach
            </div>
        @endif --}}
    </div>
    
</div>