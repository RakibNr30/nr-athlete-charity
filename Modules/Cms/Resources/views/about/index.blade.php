@extends('admin.layouts.master', ['active' => [2, 1, 0]])
@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">About Us</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.about-us.index') }}" class="breadcrumb-item">
                        About Us
                    </a>
                    <span class="breadcrumb-item active">Update</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="row">
            <div class="col-md-12">
                @include('admin.partials._alert')
                <div class="card">
                    <div class="card-header header-elements-inline">
                        <h5 class="card-title">Update About Us</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.cms.about-us.update', [$about->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="about" class="@error('about') text-danger @enderror">About</label>
                                    <textarea id="about" name="about" class="form-control ck-text-editor @error('about') is-invalid @enderror" rows="3"
                                              placeholder="Enter about us">{{ old('about') ?? $about->about }}</textarea>
                                    @error('about')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            {{--<div class="col-md-12">
                                <div class="form-group">
                                    <label for="mission" class="@error('mission') text-danger @enderror">Our Mission</label>
                                    <textarea id="mission" name="mission" class="form-control ck-text-editor @error('mission') is-invalid @enderror" rows="3"
                                              placeholder="Enter mission">{{ old('mission') ?? $about->mission }}</textarea>
                                    @error('mission')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>--}}
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="vision" class="@error('vision') text-danger @enderror">Our Vision</label>
                                    <textarea id="vision" name="vision" class="form-control ck-text-editor @error('vision') is-invalid @enderror" rows="3"
                                              placeholder="Enter vision">{{ old('vision') ?? $about->vision }}</textarea>
                                    @error('vision')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="goals" class="@error('goals') text-danger @enderror">Our Goals</label>
                                    <textarea id="goals" name="goals" class="form-control ck-text-editor @error('goals') is-invalid @enderror" rows="3"
                                              placeholder="Enter goals">{{ old('goals') ?? $about->goals }}</textarea>
                                    @error('goals')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Save Changes
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    {!! Form::close() !!}

                </div>
            </div>
        </div>
    </div>
@stop
