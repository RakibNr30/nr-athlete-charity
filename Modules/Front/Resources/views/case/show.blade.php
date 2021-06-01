@extends('front.layouts.master')

@section('title')
@stop

@section('content')
    <main>
        <section class="page-title-area" style="background-image: url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.default.breadcrumb_image') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4">
                        <div class="page-title-wrapper text-center pt-125">
                            <div class="page-title-box">
                                <h2 class="page-title">Cases</h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a href="{{ route('front.cases.index') }}">Cases <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">Read</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cases-details-area grey-bg2 pt-125">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="details-left-area pb-100">
                            <div class="cases cases-wrapper-box wow fadeInUp2  animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp2;">
                                <div class="cases__content">
                                    <h2>
                                        <a href="">
                                            {{ $case->title ?? '' }}
                                        </a>
                                    </h2>
                                    <div class="cases--author d-flex align-items-center mb-25">
                                        <h4 class="semi-02-title">
                                            <i class="fa fa-map-marker-alt mr-1 color-primary"></i>
                                            {{ $case->area->country_name ?? '' }}
                                        </h4>
                                    </div>
                                    <div class="cases-meta d-sm-flex justify-content-between">
                                        <div class="cases-progress mb-60">
                                            <h4 class="funding semi-02-title">Raised <span>&#128;{{ $case->donations->sum('donate_amount') ?? 0 }}</span></h4>
                                            <div class="progress">
                                                <div class="progress-bar wow fadeInLeft" data-wow-delay="0.3s" role="progressbar"
                                                     style="width: {{ ($case->donations->sum('donate_amount')/$case->needed_money) * 100 }}%; visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;" aria-valuenow="{{ ($case->donations->sum('donate_amount')/$case->needed_money) * 100 }}" aria-valuemin="0" aria-valuemax="100">
                                                    <h3>{{ round(($case->donations->sum('donate_amount')/$case->needed_money) * 100, 2) }}%
                                                    </h3>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="cases-btn mb-10 d-none d-xl-inline-block">
                                            <a href="{{ route('front.donate.index', ['case' => $case->id]) }}" class="theme_btn theme_btn2 theme_btn_bg_02">
                                                donate Now
                                                <span><i class="fas fa-check"></i></span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="cases__box mb-40">
                                        <img class="img-fluid" src="{{ $case->image->file_url ?? config('core.image.default.preview_image') }}" alt="">
                                    </div>
                                    <p>
                                        {!! $case->description ?? '' !!}
                                    </p>
                                </div>
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
    </main>
@stop

@section('style')
@stop

@section('script')
@stop
