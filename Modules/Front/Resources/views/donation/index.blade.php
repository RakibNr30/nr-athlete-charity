@extends('front.layouts.master')

@section('title')
@stop

@section('content')
    <main>
        <!--page-title-area start-->
        <section class="page-title-area" style="background-image: url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.default.breadcrumb_image') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3">
                        <div class="page-title-wrapper text-center pt-125">
                            <div class="page-title-box">
                                <h2 class="page-title">Donate Now</h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">Donate Now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page-title-area end-->
        @include('front.partials._alert_donate')
        <!--statistics-area start-->
        <section class="home counter-area theme-bg pt-130 pb-80">
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
                            <div class="counetrs__icon mb-20"><i class="flaticon-social-care-1"></i></div>
                            <h1>
                                <span class="counter">
                                    {{ $data->counter->totalSavedPeople ?? 0 }}
                                </span>
                            </h1>
                            <p>Saved People</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--statistics-area end-->

        <!--donation-form-area start-->
        <section class="donation-form-area-02 grey-bg2 pt-125 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="donation-form-left">
                            <div class="doante-select-area donate-select-area-04 mb-30 text-center white-bg wow fadeInUp2 animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                                <div class="row">
                                    <div class="col-12">
                                        <h3>Your Last Activity</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="counetrs pos-rel mb-0 grey-bg2 animated mb-2 mt-2 p-2">
                                            <p class="text-black-50 text-left">Name: <span class="font-weight-bold">{{ $lastActivity->name ?? 'N/A' }}</span></p>
                                            <p class="text-black-50 text-left">Distance:
                                                <span class="font-weight-bold">
                                                    @if(isset($lastActivity->distance))
                                                        {{ $lastActivity->distance ? round($lastActivity->distance/1000, 2) : 0 }} KM
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </p>
                                            <p class="text-black-50 text-left">Elapsed Time:
                                                <span class="font-weight-bold">
                                                    @if(isset($lastActivity->elapsed_time))
                                                        {{ $lastActivity->elapsed_time ? round($lastActivity->elapsed_time/60, 2) : 0 }} M
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="counetrs statistics pos-rel mb-0 grey-bg2 text-center wow fadeInUp2 animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp2;">
                                            <div class="counetrs__icon mb-20"><i class="flaticon-calories"></i></div>
                                            <h1>
                                                <span class="">
                                                    @if(isset($data->calories))
                                                        {{ $data->calories ? round($data->calories, 2) : 0 }}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </h1>
                                            <p>Calories (kCal)</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="counetrs statistics pos-rel mb-0 grey-bg2 text-center wow fadeInUp2 animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp2;">
                                            <div class="counetrs__icon mb-20"><i class="flaticon-rice"></i></div>
                                            <h1>
                                                <span class="">
                                                    @if(isset($data->rices))
                                                        {{ $data->rices ? round($data->rices, 2) : 0 }}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </h1>
                                            <p>Rice (kg)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="doante-select-area donate-select-area-04 mb-30 text-center white-bg wow fadeInUp2 animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                                <div class="section-title text-left mb-45">
                                    <h3>Raise Your Hand To Right<br>
                                        Place Or Foundation</h3>
                                </div>
                                <div class="donate-cart pos-rel mb-10">
                                    <form class="donate-btn pos-rel" action="#">
                                        <input type="text" id="donate_amount" value="&#128;{{ round($data->ricePrice, 2) }}" readonly>
                                    </form>
                                </div>
                                {!! Form::open(['url' => route('make.payment'), 'method' => 'post']) !!}
                                <div class="mb-10">
                                    <select name="case_id" class="donate-select donate-select2">
                                        <option value="0">Donate for all</option>
                                        @foreach($data->allCases as $index => $case)
                                            <option value="{{ $case->id }}" {{ old('case_id') == $case->id ? 'selected' : (request()->get('case') == $case->id ? 'selected' : '') }}>
                                                {{ $case->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-30">
                                    <input type="hidden" name="donate_amount" value="{{ round($data->ricePrice, 2) }}">
                                    @if(isset($lastActivity->id))
                                        <input type="hidden" name="activity_id" value="{{ $lastActivity->id }}">
                                    @endif
                                    <input type="hidden" name="rice_donate_amount" value="{{ round($data->rices, 2) }}" readonly>
                                    @if(round($data->ricePrice, 2) == 0)
                                        <button class="theme_btn theme_btn_bg w-100" disabled>
                                            <i class="fab fa-paypal"></i> Pay with PayPal
                                        </button>
                                    @else
                                        <button class="theme_btn theme_btn_bg w-100">
                                            <i class="fab fa-paypal"></i> Pay with PayPal
                                        </button>
                                    @endif
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="details-right-area">
                            <div class="widget white-bg mb-30">
                                <div class="widget-post">
                                    <h3 class="cases-title mb-30">Popular Cases</h3>
                                    @if(count($data->cases))
                                        @foreach($data->cases as $index => $case)
                                            <div class="post d-flex align-items-center mb-20">
                                                <div class="post__thumb mr-20">
                                                    <div class="latest_thumb" style="background-image:
                                                            url({{ $case->image->file_url ?? config('core.image.default.preview_image') }})">
                                                    </div>
                                                </div>
                                                <div class="post__content">
                                                    <h5>
                                                        <a href="{{ route('front.cases.show', [$case->slug]) }}">
                                                            @if(strlen($case->title) > 30)
                                                                {{ substr($case->title, 0, 30) }} ...
                                                            @else
                                                                {{ $case->title }}
                                                            @endif
                                                        </a>
                                                    </h5>
                                                    <a class="view_btn" href="{{ route('front.cases.show', [$case->slug]) }}">
                                                        view Details
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <h5 class="text-center mt-35">
                                            <a href="{{ route('front.cases.index') }}">
                                                View All
                                            </a>
                                        </h5>
                                    @else
                                        <h6>No case found</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--donation-form-area end-->
    </main>
@stop

@section('style')
    <link rel="stylesheet" href="{{ asset('common/plugins/select2/css/select2.min.css') }}">
    <style>
        .donate-select-area-04 {
            padding: 30px 30px 30px 30px;
        }
        .donate-select {
            width: 100%;
        }
        .select2-container--default
        .select2-selection--single {
            background-color: #fff;
            border: 1px solid #e4e4e4;
            border-radius: 0;
            height: 64px;
        }
        .select2-container--default
        .select2-selection--single
        .select2-selection__rendered {
            color: #001234;
            line-height: 60px;
            font-size: 16px;
        }
        .select2-container--default
        .select2-selection--single
        .select2-selection__arrow {
            height: 60px;
        }
    </style>
@stop

@section('script')
    <script src="{{ asset('common/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.donate-select2').select2();
    </script>
@stop