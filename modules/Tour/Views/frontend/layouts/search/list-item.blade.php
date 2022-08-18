
<div class="row mt-3">
    <div class="h-100 col-lg-3 px-0 pl-3 mb-3 d-none d-lg-block left-rail plp-left-nav-filters" id="sidebar">
        <div class="border rounded bg-md-white">
            @include('Tour::frontend.layouts.search.filter-search')
        </div>
    </div>
    <div class="col-lg-9 right-column filters-applied" id="list_sidebar">
        <div class="bravo-list-tour">
            <!-- sticky_horizontal -->


            <div class="topbar-search mt-2">
                <h2 class="text">
                    @if($rows->total() > 1)
                        {{ __(":count tours found",['count'=>$rows->total()]) }}
                    @else
                        {{ __(":count tour found",['count'=>$rows->total()]) }}
                    @endif
                </h2>
            </div>


            <div class="list-tours">
                {{-- <div class="row"> --}}
                    @if($rows->total() > 0)
                        @foreach($rows as $row)
                            <div class="col-12 p-0 align-items-stretch mt-0 mb-3 mt-sm-3 mt-md-3">
                                @include('Tour::frontend.layouts.search.loop-list')
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            {{__("Tour not found")}}
                        </div>
                    @endif
                {{-- </div> --}}
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