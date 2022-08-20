@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/tour/css/tour.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link href="{{ asset('public\panagea\css\mdb.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
	 
@endsection
@section('content')
   <div class="bravo_search_tour">
        <section class="hero_in tours" @if($bg = setting_item("tour_page_search_banner")) style="background-image: url({{get_file_url($bg,'full')}})" @endif>
				<div class="wrapper">
					<div class="container">
						<h1 class="fadeInUp"><span></span>{{setting_item_with_lang("tour_page_search_title")}}</h1>
					</div>
				</div>
			</section>
   <div class="bravo_form_search">
      <div class="container">
                <div class="row">
                    <div class="col-12">
					<div class="row g-0 custom-search-input-2 inner">
					<div class="col-lg-4">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="What are you looking for...">
							<i class="icon_search"></i>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="form-group">
							<input class="form-control" type="text" placeholder="Where">
							<i class="icon_pin_alt"></i>
						</div>
					</div>
					<div class="col-lg-3">
						<select class="wide">
							<option>All Categories</option>	
							<option>Churches</option>
							<option>Historic</option>
							<option>Museums</option>
							<option>Walking tours</option>
						</select>
					</div>
					<div class="col-lg-2">
						<input type="submit" class="btn_search" value="Search">
					</div>
				</div>
         </div>
                </div>
            </div>
        </div>
		  		<div class="filters_listing sticky_horizontal">
			<div class="container-fluid">
				<ul class="clearfix">
					<li>
						<div class="switch-field">
							<input type="radio" id="all" name="listing_filter" value="all" checked data-filter="*" class="selected">
							<label for="all">All</label>
							<input type="radio" id="popular" name="listing_filter" value="popular" data-filter=".popular">
							<label for="popular">Popular</label>
							<input type="radio" id="latest" name="listing_filter" value="latest" data-filter=".latest">
							<label for="latest">Latest</label>
						</div>
					</li>
					<li>
						<div class="layout_view">
							<a href="tours-grid-isotope.html"><i class="icon-th"></i></a>
							<a href="#0" class="active"><i class="icon-th-list"></i></a>
						</div>
					</li>
					<li>
						<a class="btn_map" data-bs-toggle="collapse" href="#collapseMap" aria-expanded="false" aria-controls="collapseMap" data-text-swap="Hide map" data-text-original="View on map">View on map</a>
					</li>
				</ul>
			</div>
			<!-- /container -->
		</div>
		<!-- /filters -->
		<div class="collapse" id="collapseMap">
			<div id="map" class="map"></div>
		</div>
		<!-- End Map -->

         <div class="container-fluid">
            @include('Tour::frontend.layouts.search.list-item')
         </div>
   </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/tour/js/tour.js?_ver='.config('app.version')) }}"></script>
 
	 	<!-- Map -->
	<script src="http://maps.googleapis.com/maps/api/js"></script>
	<script src="{{ asset("panagea/js/markerclusterer.js")}}"></script>
	<script src="{{ asset("panagea/js/map_tours.js")}}"></script>
	<script src="{{ asset("panagea/js/infobox.js")}}"></script>
	
	<!-- Masonry Filtering -->
	<script src="{{ asset("panagea/js/isotope.min.js")}}"></script>
	<script>
	$(window).on('load', function(){
	  var $container = $('.isotope-wrapper');
	  $container.isotope({ itemSelector: '.isotope-item', layoutMode: 'masonry' });
	});

	$('.filters_listing').on( 'click', 'input', 'change', function(){
	  var selector = $(this).attr('data-filter');
	  $('.isotope-wrapper').isotope({ filter: selector });
	});
	</script>
	
	<!-- Range Slider -->
	<script>
		 $("#range").ionRangeSlider({
            hide_min_max: true,
            keyboard: true,
            min: 30,
            max: 180,
            from: 60,
            to: 130,
            type: 'double',
            step: 1,
            prefix: "Min. ",
            grid: false
        });
	</script>

	<script src="{{ asset('js/easepick.min.js') }}"></script>
@endsection
