<div class="container container-custom margin_80_0">
   <div class="main_title_2">
      <span><em></em></span>
      <h2>Our Popular Tours</h2>
      <p>Cum doctus civibus efficiantur in imperdiet deterruisset.</p>
   </div>
   <div class="list-item">
      <div id="reccomended" class="owl-carousel owl-theme">
         @foreach($rows as $row)
         @php
         $translation = $row->translateOrOrigin(app()
         ->getLocale());
         @endphp
         <div class="item {{$wrap_class ?? ''}}">
            <div class="box_grid">
               <figure>
                  <a class="wish_bt service-wishlist {{$row->isWishList()}}" data-id="{{$row->id}}"
                     data-type="{{$row->type}}"></a>
                  <a href="{{$row->getDetailUrl($include_param ?? true)}}">

                     <img src="{{$row->image_url}}" class="img-fluid" alt="{{$location->name ?? ''}}" width="800"
                        height="533">
                     <div class="read_more"><span>Read more</span></div>
                  </a>
                  <small>{{__("Featured")}}</small>
               </figure>
               <div class="wrapper">
                  <h3><a href="{{$row->getDetailUrl($include_param ?? true)}}">{!! clean($translation->title) !!}</a></h3>
                  @if($translation->content)
                  <p>{{ Str::limit(($translation->content), 80) }}</p>
                  @endif
                  <span class="price">From <strong>{{ $row->display_price }}</strong> /per person</span>
               </div>
               <ul>
                  <li><i class="icon_clock_alt"></i> 1h 30min</li>
                  <li>
                     <div class="score"><span>Superb<em>350 Reviews</em></span><strong>8.9</strong></div>
                  </li>
               </ul>
            </div>
         </div>
         @endforeach
         <!-- /item -->
      </div>
   </div>
</div>