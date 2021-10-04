@extends('front.layouts.master', ['active' => [0, 0]])

@section('title')
@stop

@section('content')
    <main>
        @if(isset($data->banner))
            <div class="home slider-area-02 black-bg light-red-bg pos-rel">
                <div class="slider-img__shape">
                    <img src="{{ asset('front/img/shape/05.png') }}" alt="">
                </div>
                <div class="slider-actives">
                    <div class="single-slider slider-height-02 pos-rel d-flex align-items-center">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-xl-7 col-lg-7">
                                    <div class="slider__content slider__content__02 pt-135 text-left">
                                        <h5 class="sub-title mb-25 wow fadeInUp2 animated" data-wow-delay=".1s">
                                            {{ $data->banner->tag_line ?? 'Tag line here' }}
                                        </h5>
                                        <h1 class="main-title mb-45 wow fadeInUp2 animated" data-wow-delay=".1s">
                                            {{ $data->banner->title ?? 'Motto/Title here' }}
                                        </h1>
                                        <h6 class="mini-title mb-35 wow fadeInUp2 animated" data-wow-delay=".1s">
                                            {{ $data->banner->brief_description ?? 'Brief description here' }}
                                        </h6>
                                        <ul class="btn-list wow fadeInUp2 animated" data-wow-delay=".3s">
                                            @if(isset($data->banner->button_one) && $data->banner->button_one_link)
                                                <li>
                                                    <a class="theme_btn theme_btn_bg" href="{{ $data->banner->button_one_link }}">
                                                        {{ $data->banner->button_one ?? 'Button One' }}
                                                    </a>
                                                </li>
                                            @endif
                                            @if(isset($data->banner->button_two) && $data->banner->button_two_link)
                                                <li>
                                                    <a class="theme_btn theme_btn2 theme_btn_bg_02" href="{{ $data->banner->button_two_link }}">
                                                        {{ $data->banner->button_two ?? 'Button Two' }}
                                                    </a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-xl-5 col-lg-5 d-none d-lg-inline-block">
                                    <div class="slider-img pos-rel" id="scene">
                                        <div class="slider-img__one layer" data-depth="0.2">
                                            <img class="img-fluid"
                                                 src="{{ $data->banner->avatar_one->file_url ?? config('core.image.default.avatar_one') }}" alt="">
                                        </div>
                                        <div class="slider-img__two d-none d-xl-inline-block">
                                            <img src="{{ $data->banner->avatar_two->file_url ?? config('core.image.default.avatar_two') }}" alt="">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endif

        <!--statistics-area start-->
        <section class="home counter-area theme-bg pt-80 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <div class="counetrs mb-30 text-center wow fadeInUp2  animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp2;">
                            <div class="counetrs__icon mb-20"><i class="flaticon-running"></i></div>
                            <h1>
                            <span class="counter">
                                {{ $data->counter->totalAthlete ?? 0 }}
                            </span>
                            </h1>
                            <p>{{ __('front/home/index.total_athlete') }}</p>
                        </div>
                    </div>
                    {{--<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="counetrs mb-30 text-center wow fadeInUp2  animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                            <div class="counetrs__icon mb-20"><i class="flaticon-calories"></i></div>
                            <h1><span class="counter">0</span></h1>
                            <p>Burn Calories</p>
                        </div>
                    </div>--}}
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <div class="counetrs mb-30 text-center wow fadeInUp2  animated" data-wow-delay=".7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp2;">
                            {{--<div class="counetrs__icon mb-20"><i class="flaticon-dollar-coins"></i></div>--}}
                            <div class="counetrs__icon mb-20"><i class="fas fa-coins"></i></div>
                            <h1>
                                &#128;
                                <span class="counter">
                                {{ $data->counter->totalDonation ?? 0 }}
                            </span>
                            </h1>
                            <p>{{ __('front/home/index.total_donation') }}</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="counetrs mb-30 text-center wow fadeInUp2  animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp2;">
                            <div class="counetrs__icon mb-20"><i class="flaticon-rice"></i></div>
                            <h1>
                            &#128;
                            <span class="counter--">
                                {{ $data->counter->latestRicePrice ?? 0 }}
                            </span>
                            </h1>
                            <p>{{ __('front/home/index.rice_price') }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--statistics-area end-->

        @if(count($data->cases))
            <section class="home cases-area-02 pos-rel pt-100 pb-100">
            <div class="container custom-container-04">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="section-title text-center mb-75 pl-50 pr-50 wow fadeInUp2 animated"
                             data-wow-delay='.1s'>
                            <h6>{{ __('front/home/index.popular_cases') }}</h6> | <a href="{{ route('front.cases.index') }}">
                                {{ __('front/home/index.view_all') }}
                            </a>
                            <h2>
                                {{ __('front/home/index.popular_charity_causes_around_the_world') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach($data->cases as $index => $case)
                        <div class="col-xl-3 col-lg-6 col-md-6 m-auto">
                        <div class="cases white-bg mb-30 wow fadeInUp2 animated" data-wow-delay='.2s'>
                            <div class="cases__box pos-rel">
                                <div class="cases__box--img" style="height: 200px;">
                                    <img src="{{ $case->image->file_url ?? config('core.image.default.preview_image') }}" alt="">
                                </div>
                                <ul class="cases__tag white-bg">
                                    <li>
                                        <div class="cases--author d-flex align-items-center">
                                            <h5 class="semi-02-title ml-15">{{ $case->area->country_name ?? '' }}</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <a class="theme_btn theme_btn_bg d-btn"
                                           href="{{ route('front.donate.index', ['case' => $case->id]) }}">Donate
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="cases__content">
                                <div class="cases-progress mb-25">
                                    <p class="funding">Raised <span>&#128;{{ $case->donations->sum('donate_amount') ?? 0 }}</span></p>
                                    <div class="progress">
                                        <div class="progress-bar wow fadeInLeft" data-wow-delay="0.3s" role="progressbar"
                                             style="width: {{ ($case->donations->sum('donate_amount')/$case->needed_money) * 100 }}%; visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;" aria-valuenow="{{ ($case->donations->sum('donate_amount')/$case->needed_money) * 100 }}" aria-valuemin="0" aria-valuemax="100">
                                            <h5>{{ round(($case->donations->sum('donate_amount')/$case->needed_money) * 100, 2) }}%
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                                <h4>
                                    <a href="{{ route('front.cases.show', [$case->slug]) }}">
                                        @if(strlen($case->title)>65)
                                            {{ substr($case->title, 0, 65) }} ...
                                        @else
                                            {{ $case->title ?? '' }}
                                        @endif
                                    </a>
                                </h4>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
        @endif

        @if(count($data->testimonials))
            <section class="home testimonial-area-02 pt-130 pb-130">
            <div class="container">
                <div class="row">
                    <div class="col-xl-10 testimonial-wrapper mt-10">
                        <div class="testimonial-active-02">
                            @foreach($data->testimonials as $index => $testimonial)
                                <div class="testimonial-item-02 ml-55 d-md-flex align-items-center wow fadeInUp2 animated"
                                 data-wow-delay='.3s'>
                                <div class="author__img pos-re mr-50">
                                    <div class="testimonial__avatar"
                                    style="background-image:
                                            url({{ $testimonial->avatar->file_url ?? config('core.image.default.avatar_male') }})">
                                    </div>
                                </div>
                                <div class="testimonial-item__content">
                                    <h2>
                                        {{ $testimonial->message ?? '' }}
                                    </h2>
                                    <div class="author-box d-flex align-items-center'">
                                        <div class="author-box__icon mr-25">
                                            <i class="fal fa-quote-left"></i>
                                        </div>
                                        <div class="author_box__content">
                                            <h4 class="semi-02-title">
                                                {{ $testimonial->name ?? '' }}
                                            </h4>
                                            <p>
                                                {{ $testimonial->designation ?? '' }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        @if(count($data->news))
            <section class="home blog-area bg-white pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3">
                        <div class="section-title text-center mb-85  wow fadeInUp2  animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                            <h6>{{ __('front/home/index.latest_news') }}</h6> | <a href="{{ route('front.news.index') }}">{{ __('front/home/index.view_all') }}</a>
                            <h2>
                                {{ __('front/home/index.get_our_every_news_and_blog') }}
                            </h2>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-12 wow fadeInUp2  animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp2;">
                        <div class="blog blog-03 mb-30">
                            <div class="blog__thumb mb-20">
                                <img src="{{ $data->news[0]->image->file_url ?? config('core.image.default.preview_image') }}" style="height: 250px" alt="">
                            </div>
                            <div class="blog__content">
                                <h3 class="blog-title mb-15">
                                    <a href="{{ route('front.news.show', [$data->news[0]->slug]) }}">
                                       {{ $data->news[0]->title ?? '' }}
                                    </a>
                                </h3>
                                <ul class="blog-author">
                                    {{--<li>
                                        <a class="mr-30" href="#">
                                            <span>
                                                <i class="far fa-user-circle"></i> Loui Lopez</span>
                                        </a>
                                    </li>--}}
                                    <li>
                                        <i class="far fa-calendar-alt"></i>
                                        {{ date('d M Y', strtotime($data->news[0]->created_at)) }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-6 col-md-12 wow fadeInUp2  animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp2;">
                        <div class="row">
                            @foreach($data->news as $index => $news)
                                @if($index != 0)
                                    <div class="col-xl-12 col-lg-6 col-md-6">
                                    <div class="row blog blog-03 mb-30">
                                        <div class="col-xl-6">
                                            <div class="blog__thumb pos-rel">
                                                <div class="blog__thumb--img">
                                                    <img src="{{ $news->image->file_url ?? config('core.image.default.preview_image') }}" alt="">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-xl-6">
                                            <div class="blog__content">
                                                <h3 class="blog-title mb-15">
                                                    <a href="{{ route('front.news.show', [$news->slug]) }}">
                                                        @if(strlen($news->title)>80)
                                                            {{ substr($news->title, 0, 80) }} ...
                                                        @else
                                                            {{ $news->title ?? '' }}
                                                        @endif
                                                    </a>
                                                </h3>
                                                <ul class="blog-author">
                                                    <li>
                                                        <i class="far fa-calendar-alt"></i>
                                                        {{ date('d M Y', strtotime($news->created_at)) }}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>
        @endif

        {{--<!--cta-area start-->
        <section class="cta-area theme-bg2 pt-50 pb-50">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8 col-md-8">
                        <div class="cta-wrapper pl-100">
                            <h2>Join With Our <a href="volunteer.html">Volunteer</a> Team</h2>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4">
                        <div class="cta-btn">
                            <a class="theme_btn theme_btn_bg" href="#">Join Now <span><i
                                            class="fas fa-check"></i></span></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--cta-area end-->--}}
    </main>
@stop

@section('style')
    <style>
        .home.slider-area-02.light-red-bg {
             background: #ffd6d6 !important;
        }
    </style>
@stop

@section('script')
@stop
