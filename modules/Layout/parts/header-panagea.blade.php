<header class="{{ Request::is('tour/*') ? 'static-header' : 'header' }}">
    <div id="preloader" style="display: none;">
        <div data-loader="circle-side" style="display: none;"></div>
    </div><!-- /Page Preload -->
    <div id="logo">
        <a href="{{url(app_get_locale(false,'/'))}}">
            @php
                $logo_id = setting_item("logo_id");
                if(!empty($row->custom_logo)){
                    $logo_id = $row->custom_logo;
                }
            @endphp
            @if($logo_id)
                <?php $logo = get_file_url($logo_id, 'full') ?>
                <img src="{{$logo}}" alt="" class="logo_normal" width="180"  alt="{{setting_item("site_title")}}">
                <img src="{{$logo}}" alt="" class="logo_sticky" width="160" alt="{{setting_item("site_title")}}">
            @endif
        </a>
    </div>
    <div>
        <ul id="top_menu">

           <li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>


        @auth()
                <li class="dropdown-user">
                    <a href="#">
                        @if($avatar_url = Auth::user()->getAvatarUrl())
                            <img class="avatar rounded-circle mr-1" src="{{$avatar_url}}"
                                 alt="{{ Auth::user()->getDisplayName()}}" width="36x">
                        @endif

                           <span class="avatar-text">{{__("Hi, :Name",['name'=>Auth::user()->getDisplayName()])}}</span>
                    </a>
                    <div class="dropdown-menu">
                        <ul>
                            @if(Auth::user()->hasPermissionTo('dashboard_vendor_access'))
                                <li>
                                    <a href="{{route('vendor.dashboard')}}">
                                        <i class="icon ion-md-analytics"></i> {{__("Vendor Dashboard")}}
                                    </a>
                                </li>
                            @endif
                            <li class="@if(Auth::user()->hasPermissionTo('dashboard_vendor_access')) @endif">

                                <a href="{{route('user.profile.index')}}">
                                    <i class="icon ion-md-construct"></i> {{__("My profile")}}
                                </a>
                            </li>
                            @if(setting_item('inbox_enable'))
                                <li>
                                    <a href="{{route('user.chat')}}">
                                        <i class="fa fa-comments"></i> {{__("Messages")}}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="{{route('user.booking_history')}}">
                                    <i class="fa fa-clock-o"></i> {{__("Booking History")}}
                                </a>
                            </li>

                            <li>
                                <a href="{{route('user.change_password')}}">
                                    <i class="fa fa-lock"></i> {{__("Change password")}}
                                </a>
                            </li>
                            @if(Auth::user()->hasPermissionTo('dashboard_access'))
                                <li>
                                    <a href="{{url('/admin')}}">
                                        <i class="icon ion-ios-ribbon"></i> {{__("Admin Dashboard")}}
                                    </a>
                                </li>
                            @endif
                            <li>
                                <a href="#"
                                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa fa-sign-out"></i> {{__('Logout')}}
                                </a>
                            </li>
                        </ul>
                    </div>
                    <form id="logout-form" action="{{ route('auth.logout') }}" method="POST" style="display: none;">
                        {{ csrf_field() }}
                    </form>
                </li>
            @else
                <li><a href="#login" data-toggle="modal" data-target="#login" class="login">{{__('Login')}}</a></li>
                <li><a href="#register" data-toggle="modal" data-target="#register" class="register"></a></li>
            @endauth

        </ul>

    </div>
    <!-- /top_menu -->
    <a href="#menu" class="btn_mobile">
        <div class="hamburger hamburger--spin" id="hamburger">
            <div class="hamburger-box">
                <div class="hamburger-inner"></div>
            </div>
        </div>
    </a>
    <nav id="menu" class="main-menu">
        <ul>
            <?php generate_menu('primary') ?>
            @include('Core::frontend.currency-switcher')
            @include('Language::frontend.switcher')
        </ul>
    </nav>
</header>