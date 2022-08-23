@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp


<div class="card-tour-loop row">
        <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
    <div class="col-6 col-md-4 p-0 pr-2 rounded-sm"> 

        <div class="card-tour-img position-relative scale-hover-5">    
        <a class="ripple" @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
            @if($row->discount_percent)
                <div class="sale_info">{{$row->discount_percent}}</div>
            @endif
            @if($row->image_url)
                @if(!empty($disable_lazyload))
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <picture>
                        <img src="{{$row->image_url}}" class="product-image with-fallback scale-container half-ease-in-out" alt="{{$location->name ?? ''}}">
                    </picture>
                </div>
                @else
                    {!! get_image_tag($row->image_id,'full',['class'=>'img-responsive','alt'=>$row->title]) !!}
                @endif
            @endif
       
            @if($row->is_featured == "1")
                <div class="product-card-tags position-absolute position-t-0 attach-top mt-0 rounded-sm">
                    <div class="font-weight-semi-bold product-traveler-ltso-badge">
                        <span class=" product-card-tag product-card-tag-sellout micro ltso-tag-modal ">
                            {{__("Likely to Sell Out ")}} 
                        </span>
                    </div>
                </div>
            @endif
        </a>
                <div class=" service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                    <i class="fa fa-heart-o"></i>
                </div>
        </div>
    </div>

        <div class="col-6 col-md-6 pe-md-1 d-flex flex-column justify-content-md-between">
            <div class="flex-md-1 d-flex flex-column">
                <h2 class="item-title mb-0 pt-md-4">
                    <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
                        {!! clean($translation->title) !!}
                    </a>
                </h2>   
            @if(setting_item('tour_enable_review'))
                <?php
                    $reviewData = $row->getScoreReview();
                    $score_total = $reviewData['score_total'];
                ?>
            <div class="mt-2 service-review media flex-wrap pt-1 pt-md-2 tour-review-{{$score_total}}">
                <div class="list-star">
                    <ul class="booking-item-rating-stars">
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                        <li><i class="fa fa-star-o"></i></li>
                    </ul>
                    <div class="booking-item-rating-stars-active" style="width: {{  $score_total * 2 * 10 ?? 0  }}%">
                        <ul class="booking-item-rating-stars">
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                            <li><i class="fa fa-star"></i></li>
                        </ul>
                    </div>
                </div>
                <span class="review">
                    @if($reviewData['total_review'] > 1)
                        {{ __(":number ",["number"=>$reviewData['total_review'] ]) }}
                    @else
                        {{ __(":number ",["number"=>$reviewData['total_review'] ]) }}
                    @endif
                </span>   
            </div>
        @endif 
                @if($translation->content)
                <div class="g-overview mt-2">
                        <?php $string = $translation->content;
                            if (strlen($string) > 25) {
                            $trimstring = substr($string, 0, 120). ' <a href="{{$row->getDetailUrl($include_param ?? true)}}">..</a>';
                                } else {
                            $trimstring = $string;
                            }
                            echo $trimstring;
                            //Output : Lorem Ipsum is simply dum [readmore...][1]
                        ?>
                </div>
                @endif
                <div class="location mt-1">
                    @if(!empty($row->location->name))
                        @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                        <i class="icofont-paper-plane"></i>
                        {{$location->name ?? ''}}
                    @endif
                </div>
            </div>
            <div class="d-flex flex-column pb-md-4">
                <div class="clearfix">
                    <div class="float-left">
                        <div class="duration">
                            <i class="icofont-wall-clock"></i>
                            {{duration_format($row->duration)}}
                        </div>
                    </div>
                    <div class="float-left ml-5">
                        <div class="freeCancellation">
                            <i class="fa fa-check" aria-hidden="true"></i>
                            {{__("Free Cancellation")}}
                        </div>
                    </div>
                </div>
                    <div class="m-g-price flex-column justify-content-md-center align-items-left align-items-md-right flex-wrap pt-1 pt-md-4 mt-md-0 pe-md-4">   
                        <div class="prefix d-flex flex-md-column justify-content-md-center align-items-baseline align-items-md-end flex-wrap"> 
                            <div class="prefix-icon">
                                <i class="icofont-flash"></i>
                                <span class="fr_text">{{__("from")}}</span>
                            </div>
                            <div class="price">
                                <span class=" h3 line-height-same mb-0 price-font text-md-right ">{{ $row->display_price }}</span>
                                <span class="onsale ">{{ $row->display_sale_price }}</span>
                            </div>
                        </div>

                        <div class="text-body small text-align-right-md">Price varies by group size</div>

                    </div>
            </div>
        </div>
            <div class="col-md-2 d-none d-md-flex flex-column align-items-end ">
                <div class="info w-75 flex-md-1">
                    <div class="g-price d-flex flex-column justify-content-md-center align-items-left align-items-md-right flex-wrap pt-1 pt-md-4 mt-md-0 pe-md-4">   
                        <div class="prefix d-flex flex-md-column justify-content-md-center align-items-baseline align-items-md-end flex-wrap"> 
                                <i class="icofont-flash"></i>
                                <span class="fr_text">{{__("from")}}</span> 
                            <div class="price">
                                <span class=" h3 line-height-same mb-0 price-font text-md-right ">{{ $row->display_price }}</span>
                                <span class="onsale ">{{ $row->display_sale_price }}</span>
                            </div>
                        </div>

                        <div class="text-body small text-align-right-md">Price varies by group size</div>

                    </div>

                </div>
               <a class = "btn btn-primary" href="{{$row->getDetailUrl($include_param ?? true)}}">Book Now</a>   
        </div>
    </a>
</div>  


