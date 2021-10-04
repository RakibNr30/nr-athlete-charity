@extends('front.layouts.master', ['active' => [8, 0]])

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
                                    <span>{{ __('front/profile/index.profile') }}</span>
                                </h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">Account Info</a></li>
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
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="standard-right-area">
                            <div class="widget mb-30 wow fadeInUp2  animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                                <ul class="widget-cat">
                                    <li class="active"><a href="{{ route('front.profile-account-info.index') }}">Account Info</a></li>
                                    <li><a href="{{ route('front.profile-personal-info.index') }}">{{ __('front/profile/index.personal_info') }}</a></li>
                                    <li><a href="{{ route('front.profile-donation-history.index') }}">{{ __('front/profile/index.donation_history') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <div class="blogs-details-left-area mb-50">
                            @include('front.partials._alert')
                            <div class="comment-form">
                                <h3 class="cases-title mb-30">Account Info</h3>
                                {!! Form::open(['url' => route('front.profile-account-info.update', [$user->id]), 'method' => 'put', 'files' => true]) !!}
                                    <div class="row">
                                        {{--<div class="col-xl-12">
                                            <div class="input-area pos-rel mb-30">
                                                <label for="avatar" class="@error('avatar') text-danger @enderror">Avatar</label>
                                                <div class="uniform-uploader">
                                                    <input id="avatar" name="avatar" value="{{ old('avatar') }}" type="file" class="form-control form-input-styled @error('avatar') is-invalid @enderror" data-fouc="">
                                                </div>
                                                @if(isset($user->avatar))
                                                    <div class="image-output">
                                                        <a target="_blank" href="{{ $user->avatar->file_url }}">
                                                            <img src="{{ $user->avatar->file_url }}">
                                                        </a>
                                                    </div>
                                                @endif
                                                @error('avatar')
                                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>--}}
                                        <div class="col-xl-12">
                                            <div class="input-area pos-rel mb-30">
                                                <input id="athlete_id" name="athlete_id"
                                                       value="{{ old('athlete_id') ?: $user->athlete_id }}"
                                                       type="text"
                                                       class="form-control @error('athlete_id') is-invalid @enderror"
                                                       placeholder="Enter athlete_id" autofocus readonly>
                                                @error('athlete_id')
                                                <span class="invalid-feedback"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input-area pos-rel mb-30">
                                                <input id="email" name="email"
                                                       value="{{ old('email') ?: $user->email }}"
                                                       type="text"
                                                       class="form-control @error('email') is-invalid @enderror"
                                                       placeholder="Enter email" autofocus>
                                                @error('email')
                                                <span class="invalid-feedback"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12">
                                            <div class="input-area pos-rel mb-30">
                                                <input id="mobile" name="mobile"
                                                       value="{{ old('mobile') ?: $user->mobile }}"
                                                       type="text"
                                                       class="form-control @error('mobile') is-invalid @enderror"
                                                       placeholder="Enter mobile" autofocus>
                                                @error('mobile')
                                                <span class="invalid-feedback"
                                                      role="alert"><strong>{{ $message }}</strong></span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-xl-12 comment-btn">
                                            <button class="theme_btn theme_btn_bg">Save Changes</button>
                                        </div>
                                    </div>
                                {!! Form::close() !!}
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
