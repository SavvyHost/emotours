<div class="container margin_60_35">
    @include('Tour::frontend.layouts.details.tour-attributes')
    <div class="row">
        <div class="col-lg-8">
            <section id="description" class="g-overview">
                <h2>{{__("Overview")}}</h2>
                <div class="description">
                    @php echo $translation->content @endphp
                </div>
                @if($row->getGallery())
                    <h3>{{ __('Pictures from our users') }}</h3>
                    <div class="pictures_grid magnific-gallery clearfix">

                        @if(count($row->getGallery()) < 4)

                            @for($i = 0 ; $i < 4;$i++)

                                @php $item = $row->getGallery()[$i] @endphp

                                <figure>
                                    <a href="{{$item['large']}}" title="Photo title" data-effect="mfp-zoom-in"><img
                                                src="{{$item['thumb']}}" alt=""></a>
                                </figure>

                            @endfor

                        @endif

                        @if(count($row->getGallery()) > 4)

                            @for($i = 0 ; $i < 4;$i++)

                                @php $item = $row->getGallery()[$i] @endphp

                                <figure>
                                    <a href="{{$item['large']}}" title="Photo title" data-effect="mfp-zoom-in"><img
                                                src="{{$item['thumb']}}" alt=""></a>
                                </figure>

                            @endfor

                            <figure>
                                <a href="{{ $row->getGallery()[4]['large'] }}" title="" data-effect="mfp-zoom-in">
                                    <span class="d-flex align-items-center justify-content-center">+10</span>
                                    <img src="{{ $row->getGallery()[4]['thumb'] }}" alt="">
                                </a>

                                @for($i = 5 ; $i < count($row->getGallery());$i++)
                                    <a href="{{ $row->getGallery()[$i]['large'] }}" title="" data-effect="mfp-zoom-in">
                                        <span class="d-flex align-items-center justify-content-center">+10</span>
                                        <img src="{{ $row->getGallery()[$i]['thumb'] }}" alt="">
                                    </a>
                                @endfor

                            </figure>

                        @endif
                    </div>
                    <!-- /pictures -->
                @endif
                <hr>

                <ul class="cbp_tmtimeline">
                    <li>
                        <time class="cbp_tmtime" datetime="09:30"><span>30 min.</span><span>09:30</span>
                        </time>
                        <div class="cbp_tmicon">
                            1
                        </div>
                        <div class="cbp_tmlabel">
                            <div class="hidden-xs">
                                <img src="img/tour_plan_1.jpg" alt="" class="rounded-circle thumb_visit">
                            </div>
                            <h4>Interior of the cathedral</h4>
                            <p>
                                Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam
                                vivendo ne.
                            </p>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="11:30"><span>2 hours</span><span>11:30</span>
                        </time>
                        <div class="cbp_tmicon">
                            2
                        </div>
                        <div class="cbp_tmlabel">
                            <div class="hidden-xs">
                                <img src="img/tour_plan_2.jpg" alt="" class="rounded-circle thumb_visit">
                            </div>
                            <h4>Statue of Saint Reparata</h4>
                            <p>
                                Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam
                                vivendo ne.
                            </p>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="13:30"><span>1 hour</span><span>13:30</span>
                        </time>
                        <div class="cbp_tmicon">
                            3
                        </div>
                        <div class="cbp_tmlabel">
                            <div class="hidden-xs">
                                <img src="img/tour_plan_3.jpg" alt="" class="rounded-circle thumb_visit">
                            </div>
                            <h4>Huge clock decorated</h4>
                            <p>
                                Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam
                                vivendo ne.
                            </p>
                        </div>
                    </li>
                    <li>
                        <time class="cbp_tmtime" datetime="14:30"><span>2 hours</span><span>14:30</span>
                        </time>
                        <div class="cbp_tmicon">
                            4
                        </div>
                        <div class="cbp_tmlabel">
                            <div class="hidden-xs">
                                <img src="img/tour_plan_4.jpg" alt="" class="rounded-circle thumb_visit">
                            </div>
                            <h4>Vasari's fresco</h4>
                            <p>
                                Vero consequat cotidieque ad eam. Ea duis errem qui, impedit blandit sed eu. Ius diam
                                vivendo ne.
                            </p>
                        </div>
                    </li>
                </ul>
                <hr>

                @include('Tour::frontend.layouts.details.tour-include-exclude')
                @include('Tour::frontend.layouts.details.tour-itinerary')
                @include('Tour::frontend.layouts.details.tour-faqs')
                @includeIf("Hotel::frontend.layouts.details.hotel-surrounding")

                @if($row->map_lat && $row->map_lng)
                    <div class="g-location">
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
                    </div>
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
