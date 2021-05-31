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
                                    <li><a class="active">Cases</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="cases-area grey-bg2 pt-130 pb-100">
            @if(count($data->cases))
                <div class="container">
                    <div class="row">
                        @foreach($data->cases as $index => $case)
                            <div class="col-xl-6 col-lg-6 col-md-6">
                                <div class="cases cases-04 white-bg d-xl-flex align-items-center mb-30 wow fadeInUp2  animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp2;">
                                    <div class="cases__box pos-rel">
                                        <div class="cases__image" style="background-image: url({{ $case->image->file_url ?? config('core.image.default.preview_image') }})">

                                        </div>
                                    </div>
                                    <div class="cases__content">
                                        <h3>
                                            <a href="{{ route('front.cases.show', [$case->slug]) }}">
                                                @if(strlen($case->title) > 30)
                                                    {{ substr($case->title, 0, 30) }} ...
                                                @else
                                                    {{ $case->title ?? '' }}
                                                @endif
                                            </a>
                                        </h3>
                                        <div class="cases-progress mb-25">
                                            <p class="funding">Raised <span>&#128;{{ $case->donations->sum('donate_amount') ?? 0 }}</span></p>
                                            <div class="progress">
                                                <div class="progress-bar wow fadeInLeft" data-wow-delay="0.3s" role="progressbar"
                                                     style="width: {{ ($case->donations->sum('donate_amount')/$case->needed_money) * 100 }}%; visibility: visible; animation-delay: 0.3s; animation-name: fadeInLeft;" aria-valuenow="{{ ($case->donations->sum('donate_amount')/$case->needed_money) * 100 }}" aria-valuemin="0" aria-valuemax="100">
                                                    <h5>
                                                        {{ round(($case->donations->sum('donate_amount')/$case->needed_money) * 100, 2) }}%
                                                    </h5>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="mb-25">
                                            @if(strlen($case->description) > 70)
                                                {!! substr($case->description, 0, 70) !!} ...
                                            @else
                                                {!! $case->description ?? '' !!}
                                            @endif
                                        </p>
                                        <a class="theme_btn mt-2" href="{{ route('front.donate.index', ['case' => $case->id]) }}">
                                            donate <span><i class="fas fa-check"></i></span></a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="pagination-area mt-30 mb-30">
                                <nav aria-label="Page navigation">
                                    {{ $data->cases->links('front.partials._pagination') }}
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <h6 class="text-center">
                    <i class="fa fa-exclamation-circle d-block"></i>
                    No case found
                </h6>
            @endif
        </section>
    </main>
@stop

@section('style')
@stop

@section('script')
@stop
