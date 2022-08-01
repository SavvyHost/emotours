@if($list_item)
    <div class="bravo-box-category-tour">
        <div class="container-fluid ">
            @if($title)
                <div class="title">
                    {{$title}}
                </div>
            @endif
            @if(!empty($desc))
                <div class="desc">
                    {{$desc}}
                </div>
            @endif
            <div class="list-item swiper swiper-category">
                <div class="swiper-wrapper">
                @foreach($list_item as $k=>$item)
                    @php $image_url = get_file_url($item['image_id'], 'full'); @endphp
                        @if( !empty( $item_cat =  $categories->firstWhere('id',$item['category_id']) ))
                            @php
                                $translate = $item_cat->translateOrOrigin(app()->getLocale());
                                $page_search = $item_cat->getLinkForPageSearch(false , [ 'cat_id[]' =>  $item_cat->id] );
                            @endphp
                            <div class="item swiper-slide">
                                <a href="{{ $page_search }}">
                                    <img src="{{$image_url}}" alt="{{ $translate->name }}">
                                    <span class="text-title">{{ $translate->name }}</span>
                                </a>
                            </div>
                        @endif
                @endforeach
                </div>
                    <div class="swiper-button-next"></div>
                    <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
@endif
