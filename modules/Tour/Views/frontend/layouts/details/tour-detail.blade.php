<div class="container margin_60_35">
    <div class="row">
        <div class="col-lg-8">

            @if(!empty($row->duration) or !empty($row->category_tour->name) or !empty($row->max_people) or !empty($row->location->name))
                <div class="g-tour-feature">
                    <div class="row">
                        @if($row->duration)
                            <div class="col-xs-6 col-lg-3 col-md-6">
                                <div class="item">
                                    <div class="icon">
                                        <i class="icofont-wall-clock"></i>
                                    </div>
                                    <div class="info">
                                        <h4 class="name">{{__("Duration")}}</h4>
                                        <p class="value">
                                            {{duration_format($row->duration,true)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($row->category_tour->name))
                            @php $cat =  $row->category_tour->translateOrOrigin(app()->getLocale()) @endphp
                            <div class="col-xs-6 col-lg-3 col-md-6">
                                <div class="item">
                                    <div class="icon">
                                        <i class="icofont-beach"></i>
                                    </div>
                                    <div class="info">
                                        <h4 class="name">{{__("Tour Type")}}</h4>
                                        <p class="value">
                                            {{$cat->name ?? ''}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if($row->max_people)
                            <div class="col-xs-6 col-lg-3 col-md-6">
                                <div class="item">
                                    <div class="icon">
                                        <i class="icofont-travelling"></i>
                                    </div>
                                    <div class="info">
                                        <h4 class="name">{{__("Group Size")}}</h4>
                                        <p class="value">
                                            @if($row->max_people > 1)
                                                {{ __(":number persons",array('number'=>$row->max_people)) }}
                                            @else
                                                {{ __(":number person",array('number'=>$row->max_people)) }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                        @if(!empty($row->location->name))
                            @php $location =  $row->location->translateOrOrigin(app()->getLocale()) @endphp
                            <div class="col-xs-6 col-lg-3 col-md-6">
                                <div class="item">
                                    <div class="icon">
                                        <i class="icofont-island-alt"></i>
                                    </div>
                                    <div class="info">
                                        <h4 class="name">{{__("Location")}}</h4>
                                        <p class="value">
                                            {{$location->name ?? ''}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            @endif


                @if($row->getGallery())
                    <div class="g-gallery">
                        <div class="fotorama" data-width="100%" data-thumbwidth="135" data-thumbheight="135" data-thumbmargin="15" data-nav="thumbs" data-allowfullscreen="true">
                            @foreach($row->getGallery() as $key=>$item)
                                <a href="{{$item['large']}}" data-thumb="{{$item['thumb']}}" data-alt="{{ __("Gallery") }}"></a>
                            @endforeach
                        </div>
                        <div class="social">
                            <div class="social-share">
                <span class="social-icon">
                    <i class="icofont-share"></i>
                </span>
                                <ul class="share-wrapper">
                                    <li>
                                        <a class="facebook" href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Facebook")}}">
                                            <i class="fa fa-facebook fa-lg"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}" target="_blank" rel="noopener" original-title="{{__("Twitter")}}">
                                            <i class="fa fa-twitter fa-lg"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}" data-type="{{$row->type}}">
                                <i class="fa fa-heart-o"></i>
                            </div>
                        </div>
                    </div>
                @endif


                <section id="description" class="g-overview">
                <h2>{{__("Overview")}}</h2>
                <div class="description">
                    @php echo $translation->content @endphp
                </div>

                @include('Tour::frontend.layouts.details.tour-include-exclude')
                @include('Tour::frontend.layouts.details.tour-attributes')
                @include('Tour::frontend.layouts.details.tour-itinerary')
                @include('Tour::frontend.layouts.details.tour-faqs')
                @includeIf("Hotel::frontend.layouts.details.hotel-surrounding")

                @if($row->map_lat && $row->map_lng)
                    <section class="g-location" id="location">
                        <div class="location-title">
                            <h3>{{__("Tour Location")}}</h3>
                            @if($translation->address)
                                <div class="address">
                                    <i class="icofont-location-arrow"></i>
                                    {{$translation->address}}
                                </div>
                            @endif
                        </div>

                        <div class="location-map">
                            <div id="map_content"></div>
                        </div>
                    </section>
            @endif
            <!-- /row -->

            </section>
            <!-- /section -->


        </div>
        <!-- /col -->
        <!--  Reviews  -->
        @include('Tour::frontend.layouts.details.tour-form-book-panagea')
    </div>
</div>
