@extends('front.layouts.master')

@section('title')
@stop

@section('content')
    <main>
        <!--page-title-area start-->
        <section class="page-title-area" style="background-image: url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.default.breadcrumb_image') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4">
                        <div class="page-title-wrapper text-center pt-125">
                            <div class="page-title-box">
                                <h2 class="page-title">About</h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">About Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page-title-area end-->
        <!--counter-area start-->
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
                            <p>Total Athlete</p>
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
                            <p>Total Donation</p>
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
                            <p>Rice Price (per kg)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--counter-area end-->
        <!--about-us-area start-->
        <section class="about-area pt-130 pb-70">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12">
                        <div class="about-wrap-04 mb-60 pl-40">
                            @if($data->about->about)
                                <div class="section-title text-left wow fadeInUp2 animated" data-wow-delay='.1s'>
                                    <h6>
                                        About {{ $globalSite->title ?? 'Athlete Charity' }}
                                    </h6>
                                </div>
                                <div class="mb-20">
                                    {!! $data->about->about ?? '' !!}
                                </div>
                            @endif
                            <ul class="nav nav-tabs mb-35" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab"
                                       aria-controls="home" aria-selected="true">Mission</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab"
                                       aria-controls="profile" aria-selected="false">Vision</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab"
                                       aria-controls="contact" aria-selected="false">Our Goals</a>
                                </li>
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                <div class="tab-pane fade show active" id="home" role="tabpanel"
                                     aria-labelledby="home-tab">
                                    <div class="inner-content d-sm-flex align-items-center mr-35">
                                        <div class="inner-content__text">
                                            {!! $data->about->mission ?? '' !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                    <div class="inner-content d-sm-flex align-items-center">
                                        <div class="inner-content__text">
                                            {!! $data->about->vision ?? '' !!}
                                        </div>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                                    <div class="inner-content d-sm-flex align-items-center">
                                        <div class="inner-content__text">
                                            {!! $data->about->goals ?? '' !!}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--about-us-area end-->

        <!--testimonial-area start-->
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
                                                {{--I know that I am making an impact in our community. Each gift I give goes directly to providing a nourishing meal to children dealing with food insecurity.--}}
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
        <!--testimonial-area end-->

        <!--brand-area start-->
        @if(count($data->partners))
            <section class="brand-area grey-bg2 pt-70">
                <div class="container custom-container-03">
                    <div class="row brand-active pb-60">
                        @foreach($data->partners as $index => $partner)
                            <div class="col-xl-2">
                                <div class="brand-slide text-center wow fadeInUp animated" data-wow-delay='.1s'>
                                    <div class="brand-img">
                                        <a href="javascript:void(0)">
                                            <img src="{{ $partner->logo->file_url ?? '' }}" style="height: 55px;" alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        @endif
        <!--brand-area end-->
    </main>
@stop

@section('style')
@stop

@section('script')
@stop
