@extends('front.layouts.master', ['active' => [4, 0]])

@section('title')
@stop

@section('content')
    <main>
        <section class="page-title-area" style="background-image: url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.default.breadcrumb_image') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4">
                        <div class="page-title-wrapper text-center pt-60">
                            <div class="page-title-box">
                                <h2 class="page-title">
                                    <span>News</span>
                                </h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a href="{{ route('front.news.index') }}">News <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">Read</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-details-area grey-bg2 pt-130 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="blogs-details-left-area mb-50">
                            <div class="blog blogs-02 mb-40 wow fadeInUp2  animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                                <div class="blog__thumb mb-35">
                                    <img src="{{ $news->image->file_url ?? config('core.image.default.preview_image') }}" alt="">
                                </div>
                                <div class="blog__content">
                                    <h3 class="blog-title mb-20">
                                        <a href="">
                                            {{ $news->title ?? '' }}
                                        </a>
                                    </h3>
                                    <ul class="blog-author mb-20">
                                        <li>
                                            <i class="far fa-calendar-alt"></i>
                                            {{ date('d M Y', strtotime($news->created_at)) }}
                                        </li>
                                    </ul>
                                    <p class="mb-35">
                                        {!! $news->description ?? '' !!}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="standard-right-area">
                            <div class="widget white-bg mb-30 wow fadeInUp2 animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                                <div class="widget-post widget-post-02">
                                    <h3 class="cases-title mb-20">Recent News</h3>
                                    @if(count($data->news))
                                        @foreach($data->news as $index => $news)
                                            <div class="post d-flex align-items-center mb-20">
                                                <div class="post__thumb mr-20">
                                                    <div class="latest_thumb" style="background-image:
                                                            url({{ $news->image->file_url ?? config('core.image.default.preview_image') }})">
                                                    </div>
                                                </div>
                                                <div class="post__content">
                                                    <h5>
                                                        <a href="{{ route('front.news.show', [$news->slug]) }}">
                                                            @if(strlen($news->title) > 30)
                                                                {{ substr($news->title, 0, 30) }} ...
                                                            @else
                                                                {{ $news->title }}
                                                            @endif
                                                        </a>
                                                    </h5>
                                                    <a class="view_btn" href="{{ route('front.news.show', [$news->slug]) }}">
                                                        view Details
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <h5 class="text-center mt-35">
                                            <a href="{{ route('front.news.index') }}">
                                                View All
                                            </a>
                                        </h5>
                                    @else
                                        <h6>No news available</h6>
                                    @endif
                                </div>
                            </div>
                            <div class="widget white-bg mb-30 wow fadeInUp2 animated" data-wow-delay='.2s'>
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
