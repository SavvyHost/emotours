<form class="bravo-form-login" method="POST" action="{{ route('login') }}">
    <input type="hidden" name="redirect" value="{{request()->query('redirect')}}">
    @csrf
    <div class="sign-in-wrapper">
        @if(setting_item('facebook_enable') or setting_item('google_enable'))
            @if(setting_item('facebook_enable'))
                <a href="{{url('/social-login/facebook')}}" class="social_bt facebook" data-channel="facebook">
                    {{ __('Login with Facebook') }}
                </a>
            @endif
            @if(setting_item('google_enable'))
                <a href="{{url('social-login/google')}}" class="social_bt google" data-channel="google">
                    {{ __('Login with Google') }}
                </a>
            @endif

            @if(setting_item('twitter_enable'))
                <a href="{{url('social-login/twitter')}}" class="social_bt btn_login_tw_link" data-channel="twitter">
                    <i class="input-icon fa fa-twitter"></i>
                    {{__('Twitter')}}
                </a>
            @endif

            <div class="divider"><span>{{ __('Or') }}</span></div>
        @endif

        <div class="form-group">
            <label for="email">{{ __('Email') }}</label>
            <input type="email" autocomplete="off" placeholder="{{__('Email address')}}" class="form-control"
                   name="email" id="email">
            <i class="icon_mail_alt"></i>
        </div>
        <div class="form-group">
            <label for="password">{{ __('Password') }}</label>
            <div class="hideShowPassword-wrapper position-relative display-block m-0 align-baseline">
                <input type="password" autocomplete="off" class="form-control hideShowPassword-field m-0 pr-0"
                       name="password" id="password" value="" placeholder="{{__('Password')}}">
            </div>
            <i class="icon_lock_alt"></i>
        </div>
        <div class="clearfix add_bottom_15">
            <div class="checkboxes float-start">
                <label class="container_check">{{__('Remember me')}}
                    <input type="checkbox" name="remember" id="remember-me" value="1">
                    <span class="checkmark"></span>
                </label>
            </div>
            <div class="float-end mt-1">
                <a href="{{ route("password.request") }}">{{__('Forgot Password?')}}</a>
            </div>
        </div>
        @if(setting_item("user_enable_login_recaptcha"))
            <div class="form-group">
                {{recaptcha_field($captcha_action ?? 'login')}}
            </div>
        @endif
        <div class="text-center">
            <input type="submit" value="{{ __('Log in') }}" class="btn_1 full-width  form-submit">
            <span class="spinner-grow spinner-grow-sm icon-loading" role="status" aria-hidden="true"></span>
        </div>

        <div class="error message-error invalid-feedback"></div>
        <div class="text-center">
            {{__('Do not have an account?')}} <a href="" data-target="#register"
                                                 data-toggle="modal">{{__('Sign Up')}}</a>
        </div>
    </div>
</form>

<!-- Close Login Form Button -->
<button title="Close (Esc)" type="button" class="mfp-close c-pointer" data-dismiss="modal" aria-label="Close"></button>