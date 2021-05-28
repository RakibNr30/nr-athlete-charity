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
                                <h2 class="page-title">Team Member</h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">Team Member</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page-title-area end-->
        <!--team-area start-->
        <section class="team-area-02 pt-130 pb-60">
            <div class="container">
                <div class="row">
                    @if(count($data->teamMembers))
                        @foreach($data->teamMembers as $index => $teamMember)
                            <div class="col-xl-3 col-lg-6 col-md-6 mb-30 wow fadeInUp  animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
                                <div class="teams white-bg mb-30">
                                    <div class="teams__thumb pos-rel mb-30">
                                        <div class="teams__thumb--img pos-rel">
                                            <div class="team_thumb"
                                                 style="background-image: url({{ $teamMember->avatar->file_url ?? ($teamMember->personalInfo->gender == "Male" ?
                                                 config('core.image.default.avatar_male') : config('core.image.default.avatar_female')) }})">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="teams__content text-center">
                                        <h3 class="semi-02-title">
                                            <a href="javascript:void(0)">
                                                {{ $teamMember->name }}
                                            </a>
                                        </h3>
                                        <p>
                                            {{ $teamMember->designation }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h6 class="w-100 text-center">No member available</h6>
                    @endif
                </div>
            </div>
        </section>
        <!--team-area end-->
    </main>
@stop

@section('style')
@stop

@section('script')
@stop