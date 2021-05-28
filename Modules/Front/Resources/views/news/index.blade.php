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
                                <h2 class="page-title">News</h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">News</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="events-grid-area pt-125 pb-120">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="events-wrapper mb-30">
                            @if(count($data->news))
                                @foreach($data->news as $index => $news)
                                <div class="events grey-bg2 pos-rel d-sm-flex align-items-center2 mb-30 wow fadeInUp2  animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp2;">
                                    <div class="events__back" style="background-image: url({{ $news->image->file_url ?? '' }});">
                                    </div>
                                    <div class="row align-items-center pl-50 pr-50">
                                        <div class="col-xl-8 col-lg-7 col-md-7">
                                            <div class="events__content">
                                                <span>
                                                    <i class="far fa-calendar-alt"></i>
                                                    {{ date('d M Y', strtotime($news->created_at)) }}
                                                </span>
                                                <h3 class="mb-15">
                                                    <a href="{{ route('front.news.show', [$news->slug]) }}">
                                                        @if(strlen($news->title) > 30)
                                                            {{ substr($news->title, 0, 30) }} ...
                                                        @else
                                                            {{ $news->title }}
                                                        @endif
                                                    </a>
                                                </h3>
                                                <p>
                                                    @if(strlen($news->description) > 70)
                                                        {!! substr($news->description, 0, 70) !!} ...
                                                    @else
                                                        {!! $news->description !!}
                                                    @endif
                                                </p>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-lg-5 col-md-5">
                                            <div class="events__btn text-md-center text-lg-right">
                                                <a class="theme_btn theme_btn_bg" href="{{ route('front.news.show', [$news->slug]) }}">
                                                    read
                                                    <span><i class="fas fa-check"></i></span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            @else
                                <h6 class="text-center">
                                    <i class="fa fa-exclamation-circle d-block"></i>
                                    No news found
                                </h6>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="details-right-area">
                            <div class="widget grey-bg2 mb-30 wow fadeInUp2  animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
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