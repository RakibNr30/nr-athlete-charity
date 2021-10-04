@extends('admin.layouts.master', ['active' => [2, 9, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Message</span> - Show
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.public-message.index') }}" class="breadcrumb-item">
                        Message
                    </a>
                    <span class="breadcrumb-item active">Show</span>
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
                        <h5 class="card-name">Show Message</h5>
                        <div class="header-elements">
                            <div class="list-icons">
                                <a class="list-icons-item" data-action="collapse"></a>
                                <a class="list-icons-item" data-action="reload"></a>
                            </div>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <label>Sender</label>
                                <div class="form-group">
                                    {{ $publicMessage->name ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Email</label>
                                <div class="form-group">
                                    {{ $publicMessage->email ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Adress</label>
                                <div class="form-group">
                                    {{ $publicMessage->address ?? 'N/A' }}
                                </div>
                            </div>
                            <div class="col-md-12">
                                <label>Message</label>
                                <div class="form-group">
                                    <p class="message-body">
                                        {{ $publicMessage->message ?? 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@stop

@section('style')
    <style>
        label {
            font-weight: bold;
        }
        p.message-body {
            width: 100%;
            border: 1px solid #cecece;
            padding: 5px;
            background: #ece9e9;
        }
    </style>
@stop
