@extends('admin.layouts.master', ['active' => [2, 0, 0]])
@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Banner</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.banner.index') }}" class="breadcrumb-item">
                        Banner
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
                        <h5 class="card-title">Update Banner</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.cms.banner.update', [$banner->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="tag_line" class="@error('tag_line') text-danger @enderror">Tag Line</label>
                                    <input id="tag_line" name="tag_line" value="{{ old('tag_line') ?? $banner->tag_line }}"
                                           type="text" class="form-control @error('tag_line') is-invalid @enderror"
                                           placeholder="Enter tag line" autofocus>
                                    @error('tag_line')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="@error('title') text-danger @enderror">Title</label>
                                    <input id="title" name="title" value="{{ old('title') ?? $banner->title }}"
                                           type="text" class="form-control @error('title') is-invalid @enderror"
                                           placeholder="Enter title" autofocus>
                                    @error('title')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="brief_description" class="@error('brief_description') text-danger @enderror">Brief Description</label>
                                    <textarea id="brief_description" name="brief_description" class="form-control @error('brief_description') is-invalid @enderror" rows="3"
                                              placeholder="Enter brief description">{{ old('brief_description') ?? $banner->brief_description }}</textarea>
                                    @error('brief_description')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="button_one" class="@error('button_one') text-danger @enderror">Button One</label>
                                    <input id="button_one" name="button_one" value="{{ old('button_one') ?? $banner->button_one }}"
                                           type="text" class="form-control @error('button_one') is-invalid @enderror"
                                           placeholder="Enter button one" autofocus>
                                    @error('button_one')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="button_one_link" class="@error('button_one_link') text-danger @enderror">Button One Link</label>
                                    <input id="button_one_link" name="button_one_link" value="{{ old('button_one_link') ?? $banner->button_one_link }}"
                                           type="text" class="form-control @error('button_one_link') is-invalid @enderror"
                                           placeholder="Enter button one link" autofocus>
                                    @error('button_one_link')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="button_two" class="@error('button_two') text-danger @enderror">Button Two</label>
                                    <input id="button_two" name="button_two" value="{{ old('button_two') ?? $banner->button_two }}"
                                           type="text" class="form-control @error('button_two') is-invalid @enderror"
                                           placeholder="Enter button two" autofocus>
                                    @error('button_two')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="button_two_link" class="@error('button_two_link') text-danger @enderror">Button Two Link</label>
                                    <input id="button_two_link" name="button_two_link" value="{{ old('button_two_link') ?? $banner->button_two_link }}"
                                           type="text" class="form-control @error('button_two_link') is-invalid @enderror"
                                           placeholder="Enter button two link" autofocus>
                                    @error('button_two_link')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="avatar_one" class="@error('avatar_one') text-danger @enderror">Avatar One</label>
                                    <div class="uniform-uploader">
                                        <input id="avatar_one" name="avatar_one" value="{{ old('avatar_one') }}" type="file" class="form-control form-input-styled @error('avatar_one') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($banner->avatar_one))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $banner->avatar_one->file_url }}">
                                                <img src="{{ $banner->avatar_one->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('avatar_one')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="avatar_two" class="@error('avatar_two') text-danger @enderror">Avatar Two</label>
                                    <div class="uniform-uploader">
                                        <input id="avatar_two" name="avatar_two" value="{{ old('avatar_two') }}" type="file" class="form-control form-input-styled @error('avatar_two') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($banner->avatar_two))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $banner->avatar_two->file_url }}">
                                                <img src="{{ $banner->avatar_two->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('avatar_two')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
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
