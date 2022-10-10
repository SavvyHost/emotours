<div class="modal fade login overflow-y-hidden z-max" id="login" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="sign-in-dialog" class="modal-content pt-0" role="document">
            <div class="zoom-anim-dialog">
                <div class="small-dialog-header">
                    <h3>{{ __('Login') }}</h3>
                </div>
                @include('Layout::auth.login-form-panagea')
            </div>
        </div>
    </div>
</div>

<!--form -->
<div class="modal fade z-max" id="register" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div id="sign-in-dialog" class="modal-content pt-0" role="document">
            <div class="zoom-anim-dialog">
                <div class="small-dialog-header">
                    <h3>{{ __('Register') }}</h3>
                </div>
                @include('Layout::auth.register-form-panagea')
            </div>
        </div>
    </div>
</div>
</div>
