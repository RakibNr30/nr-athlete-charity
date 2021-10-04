<footer class="footer-area black-bg pos-rel pt-50 pb-50" style="background-image:url({{ asset('front/img/bg/02.html') }})">
    <div class="container">

        <div class="row mb-20">
            <div class="col-xl-4 col-lg-6 col-md-6  wow fadeInUp2  animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                <div class="footer__widget mb-30">
                    <h5 class="semi-02-title mb-25">{{ $globalSite->title ?? 'Athlete Charity' }}</h5>
                    <div class="footer-log mt-25">
                        <a href="{{ route('front.index') }}" class="footer-logo mb-30">
                            <img src="{{ $globalSite->logo->file_url ?? config('core.image.default.logo') }}" style="width: 80px" alt="">
                        </a>
                    </div>
                    <p class="">
                        {{ $globalSite->description ?? 'Site Details Here' }}
                    </p>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6 wow fadeInUp2  animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp2;">
                <div class="footer__widget fot_abot mb-30 pl-40">
                    <h5 class="semi-02-title mb-25">Quick Link</h5>
                    <ul class="fot-list">
                        <li><a href="{{ route('front.about-us.index') }}">{{ __('front/footer.about_us') }}</a></li>
                        <li><a href="{{ route('front.cases.index') }}">{{ __('front/footer.cases') }}</a></li>
                        <li><a href="{{ route('front.news.index') }}">{{ __('front/footer.news') }}</a></li>
                        <li><a href="{{ route('front.team.index') }}">{{ __('front/footer.team') }}</a></li>
                        <li><a href="{{ route('front.faq.index') }}">{{ __('front/footer.faq') }}</a></li>
                        <li><a href="{{ route('front.contact.index') }}">{{ __('front/footer.contact') }}</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-xl-4 col-lg-6 col-md-6  wow fadeInUp2  animated" data-wow-delay=".7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp2;">
                <div class="footer__widget fot_abot mb-30 pl-60">
                    <h5 class="semi-02-title mb-25">{{ __('front/footer.get_in_touch') }}</h5>
                    <ul class="widget_address_list">
                        <li>
                            <div class="widget_address d-flex- mb-20">
                                <div class="widget_address__icon mr-20-">
                                    <i class="flaticon-location"></i>
                                </div>
                                <div class="widget_address__content">
                                    <h4 class="semi-02-title contact">
                                        <a>{{ __('front/footer.location') }}</a>
                                    </h4>
                                    <span>{{ $globalContact->address ?? 'Address here' }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="widget_events d-flex- mb-20">
                                <div class="widget_address__icon mr-20-">
                                    <i class="flaticon-chat"></i>
                                </div>
                                <div class="widget_address__content">
                                    <h4 class="semi-02-title contact">
                                        <a>{{ __('front/footer.email_us') }}</a>
                                    </h4>
                                    <span>{{ $globalContact->email ?? 'Email here' }}</span>
                                </div>
                            </div>
                        </li>
                        <li>
                            <div class="widget_events d-flex- mb-20">
                                <div class="widget_address__icon mr-20-">
                                    <i class="flaticon-phone-call"></i>
                                </div>
                                <div class="widget_address__content">
                                    <h4 class="semi-02-title contact"><a>{{ __('front/footer.phone') }}</a></h4>
                                    <span>{{ $globalContact->phone ?? 'Phone here' }}</span>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="copy-right-area copy-area-02">
            <div class="row align-items-center">
                <div class="col-xl-12">
                    <div class="copyright text-center">
                        <p>Copyright © 2021
                            <i class="fa fa-circle" style="font-size: 5px; margin-right: 2px"></i>
                            All Rights Reserved<br>
                            <span><a href="{{ route('front.privacy-policy.index') }}">{{ __('front/master.privacy_policy') }}</a> </span>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
