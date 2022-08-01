<aside class="col-lg-4" id="sidebar"
       style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
    <div class="box_detail booking" id="bravo_tour_book_app">
        <div class="price">
            <div>
                <span class="label">
                {{__("from")}}
            </span>
                <span class="onsale text-danger"> <s> {{ $row->display_sale_price }} </s> </span>
            </div>

            <span class="mt-2">{{ $row->display_price }}/<small>{{ __('person') }}</small></span>
            <div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div>
        </div>


        <div class="form-group scroll-fix">
            <input class="form-control" type="text" placeholder="When.." ref="start_date_panagea"
                   id="datepicker" value="@{{start_date_html}}">
        </div>


        <div class="panel-dropdown mt-3" id="guests-dropdown">
            <a @click.prevent="show_guests_dropdown = !show_guests_dropdown">Guests <span
                        class="qtyTotal">1</span></a>
            <div class="panel-dropdown-content right"
                 :style=" show_guests_dropdown ? 'opacity: 1;visibility: visible;' : 'opacity: 0;visibility: hidden;'">
                <div class="form-group form-guest-search" v-for="(type,index) in person_types">

                    <div class="qtyButtons">
                        <label>@{{type.name}}</label>
                        <div class="qtyDec" @click="minusPersonType(type)"></div>
                        <span class="input"><input type="number" v-model="type.number" min="1"
                                                   @change="changePersonType(type)" name="qtyInput"/></span>
                        <div class="qtyInc"
                             @click="addPersonType(type)"></div>
                    </div>


                </div>
            </div>
        </div>

        <div class="form-section-group form-group mt-3" v-if="extra_price.length">
            <h4 class="form-section-title">{{__('Extra prices:')}}</h4>
            <div class="form-group" v-for="(type,index) in extra_price">
                <div class="extra-price-wrap d-flex justify-content-between">
                    <div class="flex-grow-1">
                        <label><input type="checkbox" true-value="1" false-value="0" v-model="type.enable"> @{{type.name}}</label>
                        <div class="render" v-if="type.price_type">(@{{type.price_type}})</div>
                    </div>
                    <div class="flex-shrink-0">@{{type.price_html}}</div>
                </div>
            </div>
        </div>
        <div class="form-section-group form-group-padding mt-3" v-if="buyer_fees.length">
            <div class="extra-price-wrap d-flex justify-content-between" v-for="(type,index) in buyer_fees">
                <div class="flex-grow-1">
                    <label>@{{type.type_name}}
                        <i class="icofont-info-circle" v-if="type.desc" data-toggle="tooltip" data-placement="top" :title="type.type_desc"></i>
                    </label>
                    <div class="render" v-if="type.price_type">(@{{type.price_type}})</div>
                </div>
                <div class="flex-shrink-0">
                    <div class="unit" v-if='type.unit == "percent"'>
                        @{{ type.price }}%
                    </div>
                    <div class="unit" v-else >
                        @{{ formatMoney(type.price) }}
                    </div>
                </div>
            </div>
        </div>

        <div class="submit-group mt-3">
            <a class="btn_1 full-width purchase" @click="doSubmit($event)"
               :class="{'disabled':onSubmit,'btn-success':(step == 2),'btn-primary':step == 1}"
               name="submit">
                {{__("Purchase")}}
                <i v-show="onSubmit" class="fa fa-spinner fa-spin"></i>
            </a>
            <div class="alert-text mt10" v-show="message.content" v-html="message.content"
                 :class="{'danger':!message.type,'success':message.type}"></div>
        </div>

        <a href="#" class="btn_1 full-width outline wishlist {{$row->isWishList()}}" data-id="{{$row->id}}"
           data-type="{{$row->type}}"><i class="icon_heart"></i> Add to
            wishlist</a>
    </div>

    <ul class="share-buttons mt-3">
        <li><a class="fb-share"
               href="https://web.whatsapp.com/send?text={{$row->getDetailUrl()}}"><i
                        class="social_facebook"></i> Share</a></li>
        <li><a class="whatsapp-share"
               href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}"><i
                        class="icofont-whatsapp"></i> Message</a></li>
        <li><a class="twitter-share"
               href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}"><i
                        class="social_twitter"></i> Tweet</a></li>
    </ul>
</aside>
@include("Booking::frontend.global.enquiry-form",['service_type'=>'tour'])
