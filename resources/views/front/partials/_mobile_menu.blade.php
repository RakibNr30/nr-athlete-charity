<aside class="slide-bar">

    @php
        $user = \Modules\Ums\Entities\User::find(auth()->user() ? auth()->user()->id : null);
    @endphp

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

            <hr style="margin: 10px 0;">

            @if($user)
                <li class="has-dropdown">
                    <a href="javascript:void(0)" aria-expanded="false">
                        <i style="margin-right: 3px" class="far fa-user"></i>
                        @if(strlen($user->personalInfo->first_name) > 10)
                                {{ substr($user->personalInfo->first_name, 0, 10) }}
                        @else
                            {{ $user->personalInfo->first_name }}
                        @endif
                    </a>
                    <ul class="sub-menu mm-collapse" style="height: 0px;">
                        @if(\App\Helpers\AuthManager::isUser())
                            <li>
                                <a href="{{ route('front.profile-account-info.index') }}">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.profile-donation-history.index') }}">
                                    Donation History
                                </a>
                            </li>
                            <li class="logout">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li>
                                <a href="{{ route('backend.cms.dashboard.index') }}">
                                    Dashboard
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.ums.profile-account-info.index') }}">
                                    Account Info
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('backend.ums.profile-password-change.index') }}">
                                    Change Password
                                </a>
                            </li>
                            <li class="logout">
                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    Logout
                                </a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @endif
                    </ul>
                </li>
            @else
                <li>
                    <a href="{{ route('login') }}" aria-expanded="false">
                        <i style="margin-right: 3px" class="far fa-user"></i>
                        Login
                    </a>
                </li>
            @endif

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
