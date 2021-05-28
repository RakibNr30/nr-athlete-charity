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
                                <h2 class="page-title">Profile</h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">Personal Info</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="blog-details-area pt-130 pb-70">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-3 col-md-12">
                        <div class="standard-right-area">
                            <div class="widget mb-30 wow fadeInUp2  animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                                <ul class="widget-cat">
                                    <li><a href="{{ route('front.profile-account-info.index') }}">Account Info</a></li>
                                    <li class="active"><a href="{{ route('front.profile-personal-info.index') }}">Personal Info</a></li>
                                    <li><a href="{{ route('front.profile-donation-history.index') }}">Donation History</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <div class="blogs-details-left-area mb-50">
                            @include('front.partials._alert')
                            <div class="comment-form">
                                <h3 class="cases-title mb-30">Personal Info</h3>
                                {!! Form::open(['url' => route('front.profile-personal-info.update', [$userPersonalInfo->id]), 'method' => 'put', 'files' => true]) !!}
                                    <div class="row">
                                    <div class="col-xl-6">
                                        <div class="input-area pos-rel mb-30">
                                            <input id="first_name" name="first_name"
                                                   value="{{ old('first_name') ?: $userPersonalInfo->first_name }}"
                                                   type="text"
                                                   class="form-control @error('first_name') is-invalid @enderror"
                                                   placeholder="Enter first name" autofocus>
                                            @error('first_name')
                                            <span class="invalid-feedback"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-area pos-rel mb-30">
                                            <input id="last_name" name="last_name"
                                                   value="{{ old('last_name') ?: $userPersonalInfo->last_name }}"
                                                   type="text" class="form-control @error('last_name') is-invalid @enderror"
                                                   placeholder="Enter last name" autofocus>
                                            @error('last_name')
                                            <span class="invalid-feedback"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-area pos-rel mb-30">
                                            <select id="gender" name="gender"
                                                    class="form-control @error('gender') is-invalid @enderror">
                                                <option value="">Select Gender</option>
                                                @foreach(config('core.genders') as $gender_key => $gender)
                                                    <option
                                                            value="{{ $gender_key }}" {{ $gender_key == $userPersonalInfo->gender ? 'selected' : '' }}>{{ $gender }}</option>
                                                @endforeach
                                            </select>
                                            @error('gender')
                                            <span class="invalid-feedback"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-area pos-rel mb-30">
                                            <input id="designation" name="designation"
                                                   value="{{ old('designation') ?: $userPersonalInfo->designation }}"
                                                   type="text" class="form-control @error('designation') is-invalid @enderror"
                                                   placeholder="Enter designation" autofocus>
                                            @error('designation')
                                            <span class="invalid-feedback"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="input-area input-comment pos-rel mb-30">
                                            <textarea id="about" name="about" rows="10"
                                                      class="@error('about') is-invalid @enderror"
                                                      placeholder="Enter about yourself">{{ old('about') ?: $userPersonalInfo->about }}</textarea>
                                            @error('about')
                                            <span class="invalid-feedback"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-area pos-rel mb-30">
                                            <input id="personal_email" name="personal_email"
                                                   value="{{ old('personal_email') ?: $userPersonalInfo->personal_email }}"
                                                   type="text"
                                                   class="form-control @error('personal_email') is-invalid @enderror"
                                                   placeholder="Enter personal email" autofocus>
                                            @error('personal_email')
                                            <span class="invalid-feedback"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-area pos-rel mb-30">
                                            <input id="mobile_no" name="mobile_no"
                                                   value="{{ old('mobile_no') ?: $userPersonalInfo->mobile_no }}"
                                                   type="text" class="form-control @error('mobile_no') is-invalid @enderror"
                                                   placeholder="Enter mobile no" autofocus>
                                            @error('mobile_no')
                                            <span class="invalid-feedback"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-area pos-rel mb-30">
                                            <input id="dob" name="dob" value="{{ old('dob') ?: $userPersonalInfo->dob }}"
                                                   type="text" class="form-control datepicker @error('dob') is-invalid @enderror"
                                                   placeholder="Enter date of birth" autofocus>
                                            @error('dob')
                                            <span class="invalid-feedback"
                                                  role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-xl-6">
                                        <div class="input-area pos-rel mb-30">
                                            <select id="blood_group" name="blood_group"
                                                    class="form-control @error('blood_group') is-invalid @enderror">
                                                <option value="">Select Blood Group</option>
                                                @foreach(config('core.blood_groups') as $blood_group_key => $blood_group)
                                                    <option value="{{ $blood_group_key }}" {{ $blood_group_key == $userPersonalInfo->blood_group ? 'selected' : '' }}>{{ $blood_group }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('blood_group')
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