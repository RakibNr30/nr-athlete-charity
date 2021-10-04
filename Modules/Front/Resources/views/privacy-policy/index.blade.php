@extends('front.layouts.master', ['active' => [-1, 0]])

@section('title')
@stop

@section('content')
    <main>
        <!--page-title-area start-->
        <section class="page-title-area" style="background-image: url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.default.breadcrumb_image') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 offset-xl-4">
                        <div class="page-title-wrapper text-center pt-60">
                            <div class="page-title-box">
                                <h2 class="page-title">
                                    <span>Privacy</span>
                                </h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li>
                                        <a class="active">
                                            Privacy Policy
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page-title-area end-->

        <!--about-us-area start-->
        <section class="about-area grey-bg2 pt-40 pb-40">
            <div class="container">
                <div class="inner-content__text text-justify">
                    {!! $data->privacyPolicy->description ?? '' !!}
                </div>
            </div>
        </section>
        <!--about-us-area end-->

    </main>
@stop

@section('style')
@stop

@section('script')
@stop
