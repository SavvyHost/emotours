<form class="form bravo-form-register" method="POST">
    @csrf
    <div class="form-group">
        <label for="first_name">{{ __('Your Name') }}</label>
        <input class="form-control" type="text" id="first_name" name="first_name" autocomplete="off"
               placeholder="{{__("First Name")}}">
        <i class="ti-user"></i>
        <span class="invalid-feedback error error-first_name"></span>
    </div>
    <div class="form-group">
        <label for="last_name">{{ __('Your Last Name') }}</label>
        <input class="form-control" type="text" id="last_name" name="last_name" autocomplete="off"
               placeholder="{{__("Last Name")}}">
        <i class="ti-user"></i>
        <span class="invalid-feedback error error-last_name"></span>
    </div>
    <div class="form-group">
        <label for="last_name">{{__('Phone Number')}}</label>
        <input type="text" class="form-control" name="phone" autocomplete="off" placeholder="{{__('Phone')}}">
        <i class="input-icon field-icon icofont-ui-touch-phone"></i>
        <span class="invalid-feedback error error-phone"></span>
    </div>
    <div class="form-group">
        <label for="email">{{__('Your Email')}}</label>
        <input class="form-control" type="email" id="email" name="email" autocomplete="off"
               placeholder="{{__('Email address')}}">
        <i class="icon_mail_alt"></i>
        <span class="invalid-feedback error error-email"></span>
    </div>
    <div class="form-group">
        <label for="password">{{__('Your password')}}</label>
        <input class="form-control" type="password" id="password" name="password" autocomplete="off"
               placeholder="{{__('Password')}}">
        <i class="icon_lock_alt"></i>
        <span class="invalid-feedback error error-password"></span>
    </div>
    <div class="form-group">
        <label for="term">
            <input id="term" type="checkbox" name="term" class="mr5">
            {!! __("I have read and accept the <a href=':link' target='_blank'>Terms and Privacy Policy</a>",['link'=>get_page_url(setting_item('booking_term_conditions'))]) !!}
            <span class="checkmark fcheckbox"></span>
        </label>
        <div><span class="invalid-feedback error error-term"></span></div>
    </div>

    @if(setting_item("user_enable_register_recaptcha"))
        <div class="form-group">
            {{recaptcha_field($captcha_action ?? 'register')}}
        </div>
        <div><span class="invalid-feedback error error-g-recaptcha-response"></span></div>
    @endif
    <div class="error message-error invalid-feedback"></div>

    <div class="form-group">
        <button type="submit" class="btn_1 full-width add_top_30 form-submit">
            {{ __('Register Now!') }}
            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </button>
    </div>

    @if(setting_item('facebook_enable') or setting_item('google_enable') or setting_item('twitter_enable'))
        <div class="advanced">
            <p class="text-center f14 c-grey">{{__("or continue with")}}</p>
            <div class="row">
                @if(setting_item('facebook_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('/social-login/facebook')}}" class="btn btn_login_fb_link"
                           data-channel="facebook">
                            <i class="input-icon fa fa-facebook"></i>
                            {{__('Facebook')}}
                        </a>
                    </div>
                @endif
                @if(setting_item('google_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('social-login/google')}}" class="btn btn_login_gg_link" data-channel="google">
                            <i class="input-icon fa fa-google"></i>
                            {{__('Google')}}
                        </a>
                    </div>
                @endif
                @if(setting_item('twitter_enable'))
                    <div class="col-xs-12 col-sm-4">
                        <a href="{{url('social-login/twitter')}}" class="btn btn_login_tw_link" data-channel="twitter">
                            <i class="input-icon fa fa-twitter"></i>
                            {{__('Twitter')}}
                        </a>
                    </div>
                @endif
            </div>
        </div>
    @endif

    <div class="c-grey f14 text-center">
        {{__(" Already have an account?")}}
        <a href="#" data-target="#login" data-toggle="modal">{{__("Log In")}}</a>
    </div>
</form>

<!-- Close Login Form Button -->
<button title="Close (Esc)" type="button" class="mfp-close c-pointer" data-dismiss="modal" aria-label="Close"></button>