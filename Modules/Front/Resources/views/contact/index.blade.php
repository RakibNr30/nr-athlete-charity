@extends('front.layouts.master', ['active' => [5, 0]])

@section('title')
@stop

@section('content')
    <main>
        <!--page-title-area start-->
        <section class="page-title-area" style="background-image: url({{ $globalSite->breadcrumb_image->file_url ?? config('core.image.default.breadcrumb_image') }});">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 offset-xl-2">
                        <div class="page-title-wrapper text-center pt-60">
                            <div class="page-title-box">
                                <h2 class="page-title">
                                    <span>{{ __('front/contact/index.contact') }}</span>
                                </h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">{{ __('front/contact/index.contact') }}</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="contacts-details-area grey-bg2 pt-130 pb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="get-touch-area pl-50 pr-50">
                            <div class="section-title text-left mb-30 wow fadeInUp2 animated" data-wow-delay='.1s'>
                                <h6>{{ __('front/contact/index.get_in_touch') }}</h6>
                                <h2>{{ __('front/contact/index.dont_hesited_to_contact_us') }}</h2>
                            </div>
                            @if(isset($data->contact->phone))
                                <div class="contacts d-flex align-items-center mb-30">
                                    <div class="contacts__icon mr-25">
                                        <i class="flaticon-phone-call"></i>
                                    </div>
                                    <div class="contacts__text">
                                        <h4 class="semi-02-title">{{ __('front/contact/index.phone_number') }}</h4>
                                        <h5>{{ $data->contact->phone }}</h5>
                                    </div>
                                </div>
                            @endif
                            @if(isset($data->contact->email))
                                <div class="contacts d-flex align-items-center mb-30">
                                    <div class="contacts__icon mr-25">
                                        <i class="flaticon-chat"></i>
                                    </div>
                                    <div class="contacts__text">
                                        <h4 class="semi-02-title">{{ __('front/contact/index.email_address') }}</h4>
                                        <h5>{{ $data->contact->email }}</h5>
                                    </div>
                                </div>
                            @endif
                            @if($data->contact->address)
                                <div class="contacts d-flex align-items-center mb-30">
                                    <div class="contacts__icon mr-25">
                                        <i class="flaticon-location"></i>
                                    </div>
                                    <div class="contacts__text">
                                        <h4 class="semi-02-title">{{ __('front/contact/index.our_location') }}</h4>
                                        <h5>{{ $data->contact->address }}</h5>
                                    </div>
                                </div>
                            @endif
                        </div>
                    </div>
                    <div class="col-xl-7 col-lg-6 col-md-6">
                        <div class="donar-information donation-form grey-bg2 mb-30 pr-50 pl-50">
                            <div class="section-title text-left mb-50 wow fadeInUp2 animated" data-wow-delay='.1s'>
                                <h6>{{ __('front/contact/index.send_message') }}</h6>
                                <h2>{{ __('front/contact/index.feel_free_to_write_us_message') }}</h2>
                            </div>
                            <div class="main-contact-area">
                                @include('front.partials._alert')
                                {!! Form::open(['url' => route('front.contact.store'), 'method' => 'contact']) !!}
                                    <div class="input-area mb-10">
                                        <div class="form-group">
                                            <input id="name" name="name" value="{{ old('name') }}" type="text"
                                                   class="form-control @error('name') is-invalid @enderror"
                                                   placeholder="{{ __('front/contact/index.your_name') }}" autofocus>
                                            @error('name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-area mb-10">
                                        <div class="form-group">
                                            <input id="email" name="email" value="{{ old('email') }}" type="email"
                                                   class="form-control @error('email') is-invalid @enderror"
                                                   placeholder="{{ __('front/contact/index.email_address') }}" autofocus>
                                            @error('email')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-area mb-10">
                                        <div class="form-group">
                                            <input id="address" name="address" value="{{ old('address') }}" type="text"
                                                   class="form-control @error('address') is-invalid @enderror"
                                                   placeholder="{{ __('front/contact/index.your_location') }}" autofocus>
                                            @error('address')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-area mb-10">
                                        <div class="form-group">
                                            <textarea id="message" name="message" class="@error('message') is-invalid @enderror" cols="30" rows="10" placeholder="{{ __('front/contact/index.message') }}">{{ old('message') }}</textarea>
                                            @error('message')
                                            <span class="invalid-feedback" style="display: block" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="input-btn">
                                        <button class="theme_btn theme_btn_bg large_btn">{{ __('front/contact/index.send_message') }}</button>
                                    </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--join-team-area end-->
        {{--<!--full-map-area end-->
        <section class="full-map-area">
            <div class="container-fluid pr-0 pl-0">
                <div class="row no-gutters">
                    <div class="col-xl-12">
                        <div class="map-area-02 map-area-03">
                            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d29169.94591227534!2d90.37409288955075!3d23.951837400000002!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1sen!2sbd!4v1608827553239!5m2!1sen!2sbd"></iframe>
                        </div>
                    </div>

                </div>
            </div>
        </section>
        <!--full-map-area start-->--}}
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
