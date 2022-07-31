@extends('layouts.blank')

@section('content')
    <div id="mm-0" class="mm-page mm-slideout">
        <div id="preloader" style="display: none;">
            <div data-loader="circle-side" style="display: none;"></div>
        </div>
        <div id="login">
            <aside class="overflow-x-hidden">
                <figure>

                    <a href="{{url(app_get_locale(false,'/'))}}" class="bravo-logo">
                        @php
                            $logo_id = setting_item("logo_id");
                            if(!empty($row->custom_logo)){
                                $logo_id = $row->custom_logo;
                            }
                        @endphp
                        @if($logo_id)
                            <?php $logo = get_file_url($logo_id, 'full') ?>
                            <img src="{{$logo}}" alt="{{setting_item("site_title")}}" width="155" height="36"
                                 class="logo_sticky">
                        @endif
                    </a>

                </figure>
                @include('Layout::auth.register-form-panagea',['captcha_action'=>'login_normal','auth_modal'=>false])
            </aside>
        </div>
    </div>


@endsection
