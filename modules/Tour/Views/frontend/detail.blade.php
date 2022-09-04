@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/tour/css/tour.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>
@endsection
@section('content')
    <div class="bravo_detail_tour">
        @include('Tour::frontend.layouts.details.tour-banner')
        <div class="bravo_content pt-0">
            <nav class="secondary_nav sticky_horizontal">
                <div class="container-fluid">
                    <ul class="clearfix">
                        <li><a href="#description" class="active">{{__("Overview")}}</a></li>
                        <li><a href="#included-excluded">{{__("Included/Excluded")}}</a></li>
                        <li><a href="#itinerary">{{__("Itinerary")}}</a></li>
                        <li><a href="#faqs">{{__("FAQs")}}</a></li>
                        <li><a href="#location">{{__("Location")}}</a></li>
                        <li><a href="#bravo-reviews">{{__("Reviews")}}</a></li>
                        <li><a href="#suggestion">{{__("Suggestions")}}</a></li>
                    </ul>
                    <div data-toggle="modal" data-target="#enquiry_form_modal" class="enquiry-item"><a href=""><span>Enquiry</span></a>
                    </div>
                </div>
            </nav>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        @php $review_score = $row->review_data @endphp
                        @include('Tour::frontend.layouts.details.tour-detail')
                        @include('Tour::frontend.layouts.details.tour-review')
                    </div>
                   <aside class="col-md-12 col-lg-4" id="sidebar">
                        @include('Tour::frontend.layouts.details.tour-form-book-panagea')
                   </aside>
                    <div class="row end_tour_sticky">
                        <div class="col-md-12">
                        @include('Tour::frontend.layouts.details.tour-related')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="bravo-more-book-mobile">
            <div class="container">
                <div class="left">
                    <div class="g-price">
                        <div class="prefix">
                            <span class="fr_text">{{__("from")}}</span>
                        </div>
                        <div class="price">
                            <span class="onsale">{{ $row->display_sale_price }}</span>
                            <span class="text-price">{{ $row->display_price }}</span>
                        </div>
                    </div>
                    @if(setting_item('tour_enable_review'))
                        <?php
                        $reviewData = $row->getScoreReview();
                        $score_total = $reviewData['score_total'];
                        ?>
                        <div class="service-review tour-review-{{$score_total}}">
                            <div class="list-star">
                                <ul class="booking-item-rating-stars">
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                    <li><i class="fa fa-star-o"></i></li>
                                </ul>
                                <div class="booking-item-rating-stars-active"
                                     style="width: {{  $score_total * 2 * 10 ?? 0  }}%">
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
                        </div>
                    @endif
                </div>
                <div class="right">
                    @if($row->getBookingEnquiryType() === "book")
                        <a href="#sidebar" class="btn btn-primary bravo-button-book-mobile" data-toggle="modal"
                           data-target="#tour-form-book">{{__("Book Now")}}</a>
                    @else
                        <a class="btn btn-primary" data-toggle="modal"
                           data-target="#enquiry_form_modal">{{__("Contact Now")}}</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section('footer')
    {!! App\Helpers\MapEngine::scripts() !!}
    <script>
        jQuery(function ($) {
            @if($row->map_lat && $row->map_lng)
            new BravoMapEngine('map_content', {
                disableScripts: true,
                fitBounds: true,
                center: [{{$row->map_lat}}, {{$row->map_lng}}],
                zoom:{{$row->map_zoom ?? "8"}},
                ready: function (engineMap) {
                    engineMap.addMarker([{{$row->map_lat}}, {{$row->map_lng}}], {
                        icon_options: {
                            iconUrl: "{{get_file_url(setting_item("tour_icon_marker_map"),'full') ?? url('images/icons/png/pin.png') }}"
                        }
                    });
                }
            });
            @endif
        })
    </script>
    <script>
        var bravo_booking_data = {!! json_encode($booking_data) !!}
        var bravo_booking_i18n = {
            no_date_select: '{{__('Please select Start date')}}',
            no_guest_select: '{{__('Please select at least one guest')}}',
            load_dates_url: '{{route('tour.vendor.availability.loadDates')}}',
            name_required: '{{ __("Name is Required") }}',
            email_required: '{{ __("Email is Required") }}',
        };
    </script>
    <script src="{{ asset('js/easepick.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('module/tour/js/single-tour.js?_ver='.config('app.version')) }}"></script>
    <script type="text/javascript" src="{{ asset("libs/fotorama/fotorama.js") }}"></script>

    <script src="{{ asset('panagea/js/input_qty.js') }}"></script>
    <script src="{{ asset('js/easepick.min.js') }}"></script>

    <script>

        // Initialize date picker
        const picker = new easepick.create({
            element: document.getElementById('datepicker'),
            css: [
                '{{ asset('css/easepick.css') }}',
            ],
            setup(picker) {
                picker.on('select', (event) => {
                    setTimeout(() => {
                        let guestDropdown = document.querySelector('#guests-dropdown > a')
                        guestDropdown.click()
                    }, 100)

                })
            }
        })
        const pickerModal = new easepick.create({
            element: document.getElementById('datepicker-modal'),
            css: [
                '{{ asset('css/easepick.css') }}',
            ],
            setup(picker) {
                picker.on('select', (event) => {
                    setTimeout(() => {
                        let guestDropdown = document.querySelector('#guests-dropdown-modal > a')
                        guestDropdown.click()
                    }, 100)

                })
            }
        })

    </script>

@endsection
