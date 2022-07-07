<header class="header">
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
                <img src="{{$logo}}" alt="{{setting_item("site_title")}}">
            @endif
        </a>
    </div>
    <ul id="top_menu">
        <li><a href="cart-1.html" class="cart-menu-btn" title="Cart"><strong>4</strong></a></li>
        <li><a href="#sign-in-dialog" id="sign-in" class="login" title="Sign In">Sign In</a></li>
        <li><a href="wishlist.html" class="wishlist_bt_top" title="Your wishlist">Your wishlist</a></li>
    </ul>
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