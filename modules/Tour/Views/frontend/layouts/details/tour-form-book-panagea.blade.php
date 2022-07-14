<aside class="col-lg-4" id="sidebar" style="position: relative; overflow: visible; box-sizing: border-box; min-height: 1px;">
    <div class="box_detail booking" id="bravo_tour_book_app">
        <div class="price">
            <span class="fs-5">{{ $row->display_price }}/<small>{{ __('person') }}</small></span>
            <div class="score"><span>Good<em>350 Reviews</em></span><strong>7.0</strong></div>
        </div>


        <div class="form-group scroll-fix">
            <input class="form-control" type="text" placeholder="When.." ref="start_date_panagea"
                   id="datepicker" value="@{{start_date_html}}">
        </div>


        <div class="panel-dropdown">
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

        <div class="submit-group">
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
        <div class="text-center"><small>No money charged in this step</small></div>
    </div>

    <ul class="share-buttons">
        <li><a class="fb-share"
               href="https://www.facebook.com/sharer/sharer.php?u={{$row->getDetailUrl()}}&amp;title={{$translation->title}}"><i
                        class="social_facebook"></i> Share</a></li>
        <li><a class="twitter-share"
               href="https://twitter.com/share?url={{$row->getDetailUrl()}}&amp;title={{$translation->title}}"><i
                        class="social_twitter"></i> Tweet</a></li>
    </ul>
</aside>
@include("Booking::frontend.global.enquiry-form",['service_type'=>'tour'])
