@if($list_item)
    <div class="bravo-featured-item {{$style ?? ''}}">
        <div class="container-fluid">
        <div class="swiper swiper-featured">
            <div class="main_title_2">
            <h2>Why book with Emotours?</h2>
            </div>
            <div class="swiper-wrapper">
                @foreach($list_item as $k=>$item)
                    <?php $image_url = get_file_url($item['icon_image'], 'full') ?>
                    <div class="swiper-slide">
                        <div class="featured-item">
                            <div class="image">
                                @if(!empty($style) and $style == 'style2')
                                    <span class="number-circle">{{$k+1}}</span>
                                @else
                                    <img src="{{$image_url}}" class="img-fluid" alt="{{$item['title']}}">
                                @endif
                            </div>
                            <div class="content">
                                <h3 class="title">
                                    {{$item['title']}}
                                </h3>
                                <div class="desc">{!! clean($item['sub_title']) !!}</div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="swiper-pagination"></div>
        </div>
        </div>
    </div>
@endif
