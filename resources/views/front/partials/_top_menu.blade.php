<header id="top-menu" class="transparent-head" style="{{ request()->path() == '/' ? 'margin-top: 0' : '' }}">
    @php
        $user = \Modules\Ums\Entities\User::find(auth()->user() ? auth()->user()->id : null);
    @endphp
    <div class="main-header-area main-head-02 sticky-02">
        <div class="container custom-container">
            <div class="row align-items-center justify-content-between">
                <div class="col-xl-2 col-lg-2 col-md-5 col-5">
                    <div class="logo">
                        <a class="logo-img" href="{{ route('front.index') }}">
                            <img src="{{ $globalSite->logo->file_url ?? config('core.image.default.logo') }}" style="height: 47px" alt="">
                        </a>
                        <a class="logo-img-02 d-none" href="{{ route('front.index') }}">
                            <img src="{{ $globalSite->logo_sticky->file_url ?? config('core.image.default.logo_sticky') }}" style="height: 47px;" alt="">
                        </a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 d-none d-lg-block text-right">
                    <div class="main-menu main-menu-02 pr-50 d-none d-lg-block">
                        <nav>
                            <ul>
                                @foreach(config('core.front_menu') as $menuKey => $menu)
                                    @if(empty($menu['children']))
                                        <li>
                                            <a href="{{ $menu['url'] }}" class="{{ $active[0] == $menuKey ? 'active' : '' }}">
                                                @if(app()->getLocale() == 'en')
                                                    {{ $menu['name'] }}
                                                @else
                                                    {{ $menu['name_de'] }}
                                                @endif
                                            </a>
                                        </li>
                                    @else
                                        <li>
                                            <a href="javascript:void(0)" class="{{ $active[0] == $menuKey ? 'active' : '' }}">
                                                @if(app()->getLocale() == 'en')
                                                    {{ $menu['name'] }}
                                                @else
                                                    {{ $menu['name_de'] }}
                                                @endif
                                                <i class="far fa-chevron-down"></i>
                                            </a>
                                            <ul class="submenu">
                                                @foreach($menu['children'] as $subMenuKey => $submenu)
                                                    <li>
                                                        <a href="{{ $submenu['url'] }}" class="{{ $active[1] == $subMenuKey ? 'active' : '' }}">
                                                            @if(app()->getLocale() == 'en')
                                                                {{ $submenu['name'] }}
                                                            @else
                                                                {{ $submenu['name_de'] }}
                                                            @endif
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </li>
                                    @endif
                                @endforeach
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-7 col-7 d-flex align-items-center justify-content-end">
                    <div class="quote-btn d-none d-xl-inline-block">
                        <a href="{{ route('front.donate.index') }}" class="theme_btn theme_btn2 theme_btn_bg_02" style="{{ $active[0] == 6 ? 'background: #f15b43 !important;' : '' }}">
                            {{ __('front/master.donate_now') }}
                        </a>
                    </div>
                    <div class="search-area d-none d-sm-inline-block ml-20">
                        @if($user)
                            <div class="profile-link">
                                <a href="javascript:void(0)" class="header-2-icon" style="{{ $active[0] == 8 ? 'color: #f15b43' : '' }}">
                                    <i style="margin-right: 1px" class="far fa-user"></i>
                                    @if(strlen($user->personalInfo->first_name) > 10)
                                        {{ substr($user->personalInfo->first_name, 0, 10) }}
                                    @else
                                        {{ $user->personalInfo->first_name }}
                                    @endif
                                    <i style="margin-left: 1px" class="fas fa-chevron-down"></i>
                                </a>
                                <div class="profile-dropdown">
                                    <ul class="dropdown">
                                        @if(\App\Helpers\AuthManager::isUser())
                                            <li>
                                                <a href="{{ route('front.profile-account-info.index') }}" style="{{ $active[0] == 8 && $active[1] == 0 ? 'color: #f15b43' : '' }}">
                                                    {{ __('front/master.my_profile') }}
                                                </a>
                                            </li>
                                            <li>
                                                <a href="{{ route('front.profile-donation-history.index') }}" style="{{ $active[0] == 8 && $active[1] == 1 ? 'color: #f15b43' : '' }}">
                                                    {{ __('front/master.donation_history') }}
                                                </a>
                                            </li>
                                            <li class="logout">
                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    Logout <i class="fa fa-sign-out-alt"></i>
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
                                                    Logout <i class="fa fa-sign-out-alt"></i>
                                                </a>
                                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        @else
                            <a href="{{ route('login') }}" class="header-2-icon">
                                <i class="fas fa-lock-alt"></i>
                                Login
                            </a>
                        @endif
                    </div>
                    <div class="hamburger-menu ml-20 d-md-block d-lg-none">
                        <a href="javascript:void(0);">
                            <i class="far fa-bars"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
