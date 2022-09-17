<div class="container-fluid">
    <div class="row">
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


            <section id="description" class="g-overview" for='tab1' >
                <h2>{{__("Overview")}}</h2>
                <div class="description">
                    @php echo $translation->content @endphp
                </div>
<div>
    <section id="dynamic-demo-toolbar">
  <nav id="dynamic-tab-bar" class="mdc-tab-bar" role="tablist">
    <a role="tab" aria-controls="panel-1"
       class="mdc-tab mdc-tab--active" href="#panel-1">Item One</a>
    <a role="tab" aria-controls="panel-2"
       class="mdc-tab" href="#panel-2">Item Two</a>
    <a role="tab" aria-controls="panel-3"
       class="mdc-tab" href="#panel-3">Item Three</a>
    <span class="mdc-tab-bar__indicator"></span>
  </nav>
</section>
<section>
  <div class="panels">
    <p class="panel active" id="panel-1" role="tabpanel" aria-hidden="false">Item One</p>
    <p class="panel" id="panel-2" role="tabpanel" aria-hidden="true">Item Two</p>
    <p class="panel" id="panel-3" role="tabpanel" aria-hidden="true">Item Three</p>
  </div>
  <div class="dots">
    <a class="dot active" data-trigger="panel-1" href="#panel-1"></a>
    <a class="dot" data-trigger="panel-2" href="#panel-2"></a>
    <a class="dot" data-trigger="panel-3" href="#panel-3"></a>
  </div>
</section>
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
            </section>
    </div>
</div>
