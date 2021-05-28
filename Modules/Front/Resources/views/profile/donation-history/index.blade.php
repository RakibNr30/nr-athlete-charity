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
                                    <li><a class="active">Donation History</a></li>
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
                                    <li><a href="{{ route('front.profile-personal-info.index') }}">Personal Info</a></li>
                                    <li class="active"><a href="{{ route('front.profile-donation-history.index') }}">Donation History</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-9 col-md-12">
                        <div class="blogs-details-left-area mb-50">
                            <div class="comment-form">
                                <h3 class="cases-title mb-30">Donation History</h3>
                                <div class="row">
                                    <div class="col-xl-12">
                                        <table class="table">
                                            <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Rice (kg)</th>
                                                <th scope="col">Donation (&#x20AC;)</th>
                                                <th scope="col">Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if(count($data->donations))
                                                @foreach($data->donations as $index => $donation)
                                                    <tr>
                                                        <th scope="row">{{ $index + 1 }}</th>
                                                        <td>{{ $donation->created_at }}</td>
                                                        <td>{{ $donation->rice_donate_amount }}</td>
                                                        <td>&#x20AC; {{ $donation->donate_amount }}</td>
                                                        <td>
                                                            <a class="text-primary" href="{{ route('front.cases.show', [\Modules\Cms\Entities\Cases::find($donation->case_id)->slug ?? '']) }}">
                                                                View Case
                                                            </a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @else
                                                <tr>
                                                    <th scope="row" colspan="5">No donation history found.</th>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
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