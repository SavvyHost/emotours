
<div class="row mt-3">
    
    <div class="col-lg-3 col-md-12">
        @include('Tour::frontend.layouts.search.filter-search')
    </div>
    <div class="col-lg-9 col-md-12">

        <div class="bravo-list-item">
            <!-- sticky_horizontal -->
<div class="filters_listing " style="">
			<div class="container">
				<ul class="clearfix">
					<li>
                    <div class="item">
                        @php
                            $param = request()->input();
                            $orderby =  request()->input("orderby");
                        @endphp
                        <div class="dropdown">
                            <span class=" dropdown-toggle"  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                @switch($orderby)
                                    @case("price_low_high")
                                    {{ __("Price (Low to high)") }}
                                    @break
                                    @case("price_high_low")
                                    {{ __("Price (High to low)") }}
                                    @break
                                    @case("rate_high_low")
                                    {{ __("Rating (High to low)") }}
                                    @break
                                    @default
                                    {{ __("Recommended") }}
                                @endswitch
                            </span>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                @php $param['orderby'] = "" @endphp
                                <a class="dropdown-item" href="{{ route("tour.search",$param) }}">{{ __("Recommended") }}</a>
                                @php $param['orderby'] = "price_low_high" @endphp
                                <a class="dropdown-item" href="{{ route("tour.search",$param) }}">{{ __("Price (Low to high)") }}</a>
                                @php $param['orderby'] = "price_high_low" @endphp
                                <a class="dropdown-item" href="{{ route("tour.search",$param) }}">{{ __("Price (High to low)") }}</a>
                                @php $param['orderby'] = "rate_high_low" @endphp
                                <a class="dropdown-item" href="{{ route("tour.search",$param) }}">{{ __("Rating (High to low)") }}</a>
                            </div>
                        </div>
                    </div>
					</li>
					<li>
                       <a  class="btn_mapp" href="{{ route("tour.search",['_layout'=>'map']) }}">{{__("Show on the map")}}</a>
					</li>
				</ul>
			</div>
			<!-- /container -->
</div>
            <div class="topbar-search mt-2">
                <h2 class="text">
                    @if($rows->total() > 1)
                        {{ __(":count tours found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count tour found",['count'=>$rows->total()]) }}
                    @endif
                </h2>
                <!-- <div class="control">
                    @include('Tour::frontend.layouts.search.orderby')
                </div> -->
            </div>
            <div class="list-item">
                <div class="row">
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            <div class="col-lg-12 col-md-6">
                                @include('Tour::frontend.layouts.search.loop-list')
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("Tour not found")}}
                        </div>
                    @endif
                </div>
            </div>
            <div class="bravo-pagination">
                {{$rows->appends(request()->query())->links()}}
                @if($rows->total() > 0)
                    <span class="count-string">{{ __("Showing :from - :to of :total Tours",["from"=>$rows->firstItem(),"to"=>$rows->lastItem(),"total"=>$rows->total()]) }}</span>
                @endif
            </div>
        </div>
    </div>
</div>