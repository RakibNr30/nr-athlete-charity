@extends('admin.layouts.master', ['active' => [2, 4, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Team Member</span> - Update
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.team.index') }}" class="breadcrumb-item">
                        Team
                    </a>
                    <span class="breadcrumb-item active">Member Update</span>
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
                        <h5 class="card-name">Update Team Member</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.cms.team.update', [$team->id]), 'method' => 'put', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="name" class="@error('name') text-danger @enderror">Name</label>
                                    <input id="name" name="name" value="{{ old('name') ?? $team->name }}"
                                           type="text" class="form-control @error('name') is-invalid @enderror"
                                           placeholder="Enter name" autofocus>
                                    @error('name')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="designation" class="@error('designation') text-danger @enderror">Designation</label>
                                    <input id="designation" name="designation" value="{{ old('designation') ?? $team->designation }}"
                                           type="text" class="form-control @error('designation') is-invalid @enderror"
                                           placeholder="Enter designation" autofocus>
                                    @error('designation')
                                    <span class="invalid-feedback"
                                          role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="avatar" class="@error('avatar') text-danger @enderror">Profile Avatar</label>
                                    <div class="uniform-uploader">
                                        <input id="avatar" name="avatar" value="{{ old('avatar') }}" type="file" class="form-control form-input-styled @error('avatar') is-invalid @enderror" data-fouc="">
                                    </div>
                                    @if(isset($team->avatar))
                                        <div class="image-output">
                                            <a target="_blank" href="{{ $team->avatar->file_url }}">
                                                <img src="{{ $team->avatar->file_url }}">
                                            </a>
                                        </div>
                                    @endif
                                    @error('avatar')
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
