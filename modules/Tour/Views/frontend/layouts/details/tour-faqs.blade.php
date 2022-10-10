@if($translation->faqs)
    <section class="g-faq" id="faqs">
        <h3> {{__("FAQs")}} </h3>
        @foreach($translation->faqs as $item)
            <div class="item">
                <div class="header">
                    <i class="field-icon icofont-support-faq"></i>
                    <h5>{{$item['title']}}</h5>
                    <span class="arrow"><i class="fa fa-angle-down"></i></span>
                </div>
                <div class="body">
                    {!! clean($item['content']) !!}
                </div>
            </div>
        @endforeach
    </section>
@endif