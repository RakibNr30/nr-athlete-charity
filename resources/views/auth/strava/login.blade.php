@extends('auth.layouts.master')
@section('title')
    Login
@stop
@section('content')
    <div class="content justify-content-center align-items-center" style="margin-top: 100px;">
        <div class="row">
            <div class="col-md-3 m-auto">
                <div class="card mb-0">
                    <div class="card-body">
                        @include('admin.partials._alert')
                        <div class="text-center mb-3">
                            <i class="icon-lock icon-2x text-slate-300 border-slate-300 border-3 rounded-round p-3 mb-3 mt-1"></i>
                            <h5 class="mb-0">Login with</h5>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('strava.login') }}" class="btn btn-primary btn-block" style="background: #FF5900">Strava <i class="fab fa-strava ml-2"></i></a>
                        </div>

                        <div class="form-group text-center text-muted content-divider">
                            <span class="px-2">or sign in as</span>
                        </div>

                        <div class="form-group">
                            <a href="{{ route('login', ['user' => 'admin']) }}" class="btn btn-primary btn-block">Administrator</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
