<aside class="slide-bar">
    <div class="close-mobile-menu">
        <a href="javascript:void(0);">
            <i class="fas fa-times"></i>
        </a>
    </div>
    <nav class="side-mobile-menu">
        <ul id="mobile-menu-active">
            @foreach(config('core.front_menu') as $menu)
                @if(empty($menu['children']))
                    <li>
                        <a href="{{ $menu['url'] }}">
                            {{ $menu['name'] }}
                        </a>
                    </li>
                @else
                    <li class="has-dropdown">
                        <a class="" href="javascript:void(0)">
                            {{ $menu['name'] }}
                        </a>
                        <ul class="submenu">
                            @foreach($menu['children'] as $submenu)
                                <li>
                                    <a href="{{ $submenu['url'] }}">
                                        {{ $submenu['name'] }}
                                    </a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                @endif
            @endforeach
        </ul>
    </nav>
    {{--<div class="offset-sidebar">
        <div class="offset-widget offset-logo mb-30">
            <a href="{{ route('front.index') }}">
                <img src="{{ asset('front/img/logo/header_logo_one.png') }}" alt="">
            </a>
        </div>
        <div class="offset-widget mb-40">
            <div class="info-widget">
                <h4 class="offset-title mb-20">About Us</h4>
                <p class="mb-30">
                    But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain
                    was born and will give you a complete account of the system and expound the actual teachings of
                    the great explore
                </p>
                <a class="theme_btn theme_btn_bg" href="#">
                    Donate Now
                    <span>
                        <i class="fas fa-heart"></i>
                    </span>
                </a>
            </div>
        </div>
        <div class="offset-widget mb-30 pr-10">
            <div class="info-widget info-widget2">
                <h4 class="offset-title mb-20">Contact Info</h4>
                <p> <i class="fal fa-address-book"></i> 23/A, Miranda City Likaoli Prikano, Dope</p>
                <p> <i class="fal fa-phone"></i> +0989 7876 9865 9 </p>
                <p> <i class="fal fa-envelope-open"></i> info@example.com </p>
            </div>
        </div>
    </div>--}}
</aside>
<div class="body-overlay"></div>