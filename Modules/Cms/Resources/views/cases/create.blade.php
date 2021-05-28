@extends('admin.layouts.master', ['active' => [2, 2, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Cases</span> - Create
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.cases.index') }}" class="breadcrumb-item">
                        Cases
                    </a>
                    <span class="breadcrumb-item active">Create</span>
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
                        <h5 class="card-title">Create Cases</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    {!! Form::open(['url' => route('backend.cms.cases.store'), 'method' => 'cases', 'files' => true]) !!}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="title" class="@error('title') text-danger @enderror">Title</label>
                                    <input id="title" name="title" value="{{ old('title') }}" type="text" class="form-control @error('title') is-invalid @enderror" placeholder="Enter title" autofocus>
                                    @error('title')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="description" class="@error('description') text-danger @enderror">Description</label>
                                    <textarea id="description" name="description" class="form-control ck-text-editor @error('description') is-invalid @enderror" rows="3" placeholder="Enter description">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="area_id" class="@error('area_id') text-danger @enderror">Cases Area</label>
                                    <select id="area_id" name="area_id" type="text" class="form-control form-control-select2 @error('area_id') is-invalid @enderror" autofocus>
                                        <option>Select cases area</option>
                                        @foreach($countries as $country)
                                            <option value="{{ $country->id }}" {{ old('area_id') == $country->id ? 'selected' : '' }}>{{ $country->country_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('area_id')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="affected_people" class="@error('affected_people') text-danger @enderror">Affected People</label>
                                    <input id="affected_people" name="affected_people" value="{{ old('affected_people') }}" type="number" min="1" class="form-control @error('affected_people') is-invalid @enderror" placeholder="Enter affected people" autofocus>
                                    @error('affected_people')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="needed_money" class="@error('needed_money') text-danger @enderror">Amount of Needed Money (EUR)</label>
                                    <input id="needed_money" name="needed_money" value="{{ old('needed_money') }}" type="number" min="0" step="any" class="form-control @error('needed_money') is-invalid @enderror" placeholder="Enter needed money" autofocus>
                                    @error('needed_money')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="image" class="@error('image') text-danger @enderror">Feature Image</label>
                                    <div class="uniform-uploader">
                                        <input id="image" name="image" value="{{ old('image') }}" type="file" class="form-control form-input-styled @error('image') is-invalid @enderror" autofocus>
                                    </div>
                                    @error('image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="attachment" class="@error('attachment') text-danger @enderror">Cases Attachment (In Any)</label>
                                    <div class="uniform-uploader">
                                        <input id="attachment" name="attachment" value="{{ old('attachment') }}" type="file" class="form-control form-input-styled @error('attachment') is-invalid @enderror" autofocus>
                                    </div>
                                    @error('attachment')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="text-right">
                                        <button type="submit" class="btn btn-primary">Submit
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
