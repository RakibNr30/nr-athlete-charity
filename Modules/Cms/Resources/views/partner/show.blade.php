@extends('admin.layouts.master', ['active' => [2, 7, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">Partner</span> - Show
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.partner.index') }}" class="breadcrumb-item">
                        Partner
                    </a>
                    <span class="breadcrumb-item active">Show</span>
                </div>
            </div>
        </div>
    </div>

    <div class="content">
        <div class="d-flex align-items-start flex-column flex-md-row">
            <!-- Left content -->
            <div class="w-100 overflow-auto order-2 order-md-1">
                <!-- Post -->
                <div class="card">
                    <div class="card-body bg-indigo-400 text-center card-img-top" style="background-image: url({{ asset('admin/global/images/backgrounds/panel_bg.png') }}); background-size: contain;">
                        <div class="card-img-actions d-inline-block mb-3">
                            @if($partner->logo)
                                {{--<img class="img-fluid rounded-circle" src="{{ $partner->logo->file_url }}" width="170" height="170" alt="">--}}
                                <img class="img-fluid" src="{{ $partner->logo->file_url }}" width="170" height="170" alt="">
                            @endif
                        </div>
                        <h6 class="font-weight-semibold mb-0">{{ $partner->name ?? '' }}</h6>
                        <span class="d-block opacity-75">{{ $partner->address ?? '' }}</span>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <!-- /left content -->
        </div>
    </div>
@stop
