@extends('front.layouts.master')

@section('title')
@stop

@section('content')
    <main>
        <section class="page-title-area" style="background-image: url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.default.breadcrumb_image') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 offset-xl-3">
                        <div class="page-title-wrapper text-center pt-125">
                            <div class="page-title-box">
                                <h2 class="page-title">Faq</h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">Faq</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page-title-area end-->
        <!--faq-area start-->
        <section class="faq-area grey-bg2 pt-125 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="faq-wrapper-area white-bg pt-45 pb-50">
                            @if(count($data->faqs))
                                <div id="accordion">
                                    @foreach($data->faqs as $index => $faq)
                                        <div class="card">
                                            <div class="card-header" id="heading{{ $index }}">
                                                <h5 class="mb-0">
                                                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapse{{ $index }}" aria-expanded="true" aria-controls="collapse{{ $index }}">
                                                        {{ $faq->question }}
                                                    </button>
                                                </h5>
                                            </div>
                                            <div id="collapse{{ $index }}" class="collapse show" aria-labelledby="heading{{ $index }}" data-parent="#accordion">
                                                <div class="card-body mb-10">
                                                    {!! $faq->answer !!}
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h6 class="text-center">
                                    <i class="fa fa-exclamation-circle d-block"></i>
                                    No faq found
                                </h6>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="details-right-area">
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
        <!--faq-area end-->
    </main>
@stop

@section('style')
@stop

@section('script')
@stop
