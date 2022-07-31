@extends('layouts.app')
@section('head')
    <link href="{{ asset('dist/frontend/module/tour/css/tour.css?_ver='.config('app.version')) }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset("libs/ion_rangeslider/css/ion.rangeSlider.min.css") }}"/>
@endsection
@section('content')
    <div class="bravo_search_tour">
        {{-- <div class="bravo_banner" @if($bg = setting_item("tour_page_search_banner")) style="background-image: url({{get_file_url($bg,'full')}})" @endif >
            <div class="container">
                <h1>
                    {{setting_item_with_lang("tour_page_search_title")}}
                </h1>
            </div>
        </div> --}}

        <section class="hero_in tours" @if($bg = setting_item("tour_page_search_banner")) style="background-image: url({{get_file_url($bg,'full')}})" @endif>
			<div class="wrapper">
				<div class="container">
					<h1 class="fadeInUp"><span></span>{{setting_item_with_lang("tour_page_search_title")}}</h1>
				</div>
			</div>
		</section>
        <div class="bravo_form_search">
            <div class="container ">
                {{-- <div class="row"> --}}
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
                {{-- </div> --}}
            </div>
        </div>
        <div class="container">
            @include('Tour::frontend.layouts.search.list-item')
        </div>
    </div>
@endsection

@section('footer')
    <script type="text/javascript" src="{{ asset("libs/ion_rangeslider/js/ion.rangeSlider.min.js") }}"></script>
    <script type="text/javascript" src="{{ asset('module/tour/js/tour.js?_ver='.config('app.version')) }}"></script>
@endsection