@php
    $translation = $row->translateOrOrigin(app()->getLocale());
@endphp

<div class="item-tour card product-item {{$wrap_class ?? ''}}">
        <div class="product-card-inner-row row m-0 ">
            <div class="col-6 col-md-4 p-0 pr-2 rounded-sm">
                @if($row->is_featured == "1")
                <div class="featured">
                    {{__("Featured")}}
                </div>
                @endif
                <div class="thumb-image">
                @if($row->discount_percent)
                    <div class="sale_info">{{$row->discount_percent}}</div>
                @endif
                    <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
                        @if($row->image_url)
                            @if(!empty($disable_lazyload))
                                <img src="{{$row->image_url}}" class="img-responsive" alt="{{$location->name ?? ''}}">
                            @else
                            {!! get_image_tag($row->image_id,'medium',['class'=>'img-responsive','alt'=>$row->title]) !!}
                        @endif
                        @endif
                    </a>
                    <div class=" service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                    <i class="fa fa-heart-o"></i>
                    </div>
                </div>
            </div>
            <div class="col-6 col-md-6 px-0 pl-2 pr-md-1 d-flex flex-column justify-content-md-between">
                <div class="product-card-row-title mb-0 pt-md-4">
                    <a @if(!empty($blank)) target="_blank" @endif href="{{$row->getDetailUrl($include_param ?? true)}}">
                        {!! clean($translation->title) !!}
                    </a>
                </div>  
            
                @if($translation->content)
                <div class="g-overview mt-2 listTour">
                    <div class="description">
                        <?php $string = $translation->content;
                            if (strlen($string) > 25) {
                            $trimstring = substr($string, 0, 120). ' <a href="#">..</a>';
                            } else {
                            $trimstring = $string;
                            }
                            echo $trimstring;
                            //Output : Lorem Ipsum is simply dum [readmore...][1]
                        ?>
                    </div>
                </div>
                @endif
                <div class="item-title mt-1">
                    @if(!empty($row->location->name))
                        @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                        <i class="icofont-paper-plane"></i>
                        {{$location->name ?? ''}}
                    @endif
                </div>
                    @if(setting_item('tour_enable_review'))
                    <?php
                    $reviewData = $row->getScoreReview();
                    $score_total = $reviewData['score_total'];
                    ?>
                <div class="mt-2 service-review tour-review-{{$score_total}}">
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
                            {{ __(":number Reviews",["number"=>$reviewData['total_review'] ]) }}
                        @else
                            {{ __(":number Review",["number"=>$reviewData['total_review'] ]) }}
                        @endif
                    </span>
                <!-- <div class="float-right">
                    <div class="info">
                        <div class="g-price">
                            
                            <div class="prefix">
                                <i class="icofont-flash"></i>
                                <span class="fr_text">{{__("from")}}</span>
                                
                                
                            </div>
                            <div class="price">
                                <span class="onsale">{{ $row->display_sale_price }}</span>
                                <span class="text-price">{{ $row->display_price }}</span>
                            </div>
                        </div>
                    </div>
                </div> -->
                
                </div>
                @endif
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

  
            </div>

            <div class="col-md-2 d-none d-md-flex flex-column align-items-end px-0">
                <div class="info">
                    <div class="g-price">   
                        <div class="prefix">
                            <i class="icofont-flash"></i>
                            <span class="fr_text">{{__("from")}}</span>     
                        </div>
                            <div class="price">
                                <span class="onsale">{{ $row->display_sale_price }}</span>
                                <span class="text-price">{{ $row->display_price }}</span>
                            </div>
                    </div>
                </div>
                 <a class = "btn btn-danger" href="">Book Now</a> 
            </div>

        </div>
        

            <!-- <div class="col">
            <a class="btn btn-primary" href="#" role="button">Link</a>
            </div> -->
</div>
