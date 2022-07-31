<div class="modal fade" tabindex="-2" role="dialog" id="tour-form-book">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{__("BOOK NOW")}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="box_detail booking" id="bravo_tour_book_modal_app">
                    <div class="price">
                        <div>
                            <span class="label">
                                {{__("from")}}
                            </span>
                            <span class="onsale text-danger"> <s> {{ $row->display_sale_price }} </s> </span>
                        </div>

                        <span class="mt-2">{{ $row->display_price }}/<small>{{ __('person') }}</small></span>
                        <div class="score"><span>{{ __('Good') }}<em>350 {{ __ ('Reviews') }}</em></span><strong>7.0</strong></div>
                    </div>


                    <div class="form-group scroll-fix">
                        <input class="form-control" type="text" placeholder="When.." ref="start_date_panagea"
                               id="datepicker-modal" value="{{ \Carbon\Carbon::now()->toDateString()  }}">
                    </div>


                    <div class="panel-dropdown" id="guests-dropdown">
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

                    <div class="form-section-group form-group" v-if="extra_price.length">
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
                    <div class="form-section-group form-group-padding" v-if="buyer_fees.length">
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
                       data-type="{{$row->type}}"><i class="icon_heart"></i>{{ __ ('Add to
                        wishlist') }}</a>
                </div>
            </div>
        </div>
    </div>
</div>