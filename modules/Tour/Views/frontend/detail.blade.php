@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/tour/css/tour.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/fotorama/fotorama.css") }}"/>

@endsection
@section('content')
    <div class="bravo_detail_tour">
        @include('Tour::frontend.layouts.details.tour-banner')
        <div class="bravo_content pt-0">
            @include('Tour::frontend.layouts.details.sticky-tabs')
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 col-lg-8">
                        @php $review_score = $row->review_data @endphp
                        @include('Tour::frontend.layouts.details.tour-detail')
                        @include('Tour::frontend.layouts.details.tour-review')
                    </div>
                   <aside class="col-md-12 col-lg-4 mt-4" id="sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
                        @include('Tour::frontend.layouts.details.tour-form-book-panagea')
                   </aside>
                    <div class="row">
                        <div class="col-md-12">
                        @include('Tour::frontend.layouts.details.tour-related')
                        </div>
                    </div>
                </div>
            </div>
        @include ('Tour::frontend.layouts.details.book-mobile')
        @include('Tour::frontend.layouts.details.tour-form-book-modal-panagea')
        @include("Booking::frontend.global.enquiry-form",['service_type'=>'tour'])
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
  <!-- Instantiate single textfield component rendered in the document -->

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
