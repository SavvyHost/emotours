@if($translation->itinerary)
    <section class="g-itinerary" id="itinerary">
        <h3> {{__("Itinerary")}} </h3>
        <ul class="cbp_tmtimeline position-relative">
            @foreach($translation->itinerary as $key => $item)
                <li>
                    <div class="cbp_tmicon">
                        {{ $key +1 }}
                    </div>
                    <div class="cbp_tmlabel">
                        <div class="hidden-xs">
                            <img src="{{ !empty($item['image_id']) ? get_file_url($item['image_id'],"full") : "" }}"
                                 alt="" class="rounded-circle thumb_visit">
                        </div>
                        <h4>{{$item['desc']}}</h4>
                        <p>
                            {{$item['content']}}
                        </p>
                    </div>
                </li>
            @endforeach
        </ul>
    </section>
@endif
