@php
    $actives = \App\Currency::getActiveCurrency();
    $current = \App\Currency::getCurrent('currency_main');
@endphp
{{--Multi Language--}}
@if(!empty($actives) and count($actives) > 1)
    <li class="dropdown">
        @foreach($actives as $currency)
            @if($current == $currency['currency_main'])
                <span>
                    <a href="#" data-toggle="dropdown" class="is_login">
                        {{strtoupper($currency['currency_main'])}}
                    </a>
                </span>
            @endif
        @endforeach
        <ul class="text-left">
            @foreach($actives as $currency)
                @if($current != $currency['currency_main'])
                    <li>
                        <a href="{{get_currency_switcher_url($currency['currency_main'])}}" class="is_login">
                            {{strtoupper($currency['currency_main'])}}
                        </a>
                    </li>
                @endif
            @endforeach
        </ul>
    </li>
@endif
{{--End Multi language--}}