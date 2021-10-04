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
            @foreach(config('core.front_menu') as $menuKey => $menu)
                @if(empty($menu['children']))
                    <li>
                        <a href="{{ $menu['url'] }}" class="{{ $active[0] == $menuKey ? 'active' : '' }}" href="{{ $menu['url'] }}">
                            @if(app()->getLocale() == 'en')
                                {{ $menu['name'] }}
                            @else
                                {{ $menu['name_de'] }}
                            @endif
                        </a>
                    </li>
                @else
                    <li class="has-dropdown">
                        <a href="javascript:void(0)" class="{{ $active[0] == $menuKey ? 'active' : '' }}">
                            @if(app()->getLocale() == 'en')
                                {{ $menu['name'] }}
                            @else
                                {{ $menu['name_de'] }}
                            @endif
                        </a>
                        <ul class="submenu">
                            @foreach($menu['children'] as $submenu)
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

            <hr style="margin: 10px 0;">

            <li>
                <a href="{{ route('front.donate.index') }}" aria-expanded="false"  class="{{ $active[0] == 6 ? 'active' : '' }}">
                    <i style="margin-right: 3px" class="fas fa-donate"></i>
                    {{ __('front/master.donate_now') }}
                </a>
            </li>

            @if($user)
                <li class="has-dropdown">
                    <a href="javascript:void(0)" aria-expanded="false" class="{{ $active[0] == 8 ? 'active' : '' }}">
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
                                <a href="{{ route('front.profile-account-info.index') }}" class="{{ $active[0] == 8 && $active[1] == 0 ? 'active' : '' }}">
                                    My Profile
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('front.profile-donation-history.index') }}" class="{{ $active[0] == 8 && $active[1] == 1 ? 'active' : '' }}">
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
</aside>
<div class="body-overlay"></div>
