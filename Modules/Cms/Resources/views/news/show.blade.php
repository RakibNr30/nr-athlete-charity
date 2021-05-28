@extends('admin.layouts.master', ['active' => [2, 3, 0]])

@section('content')
    <div class="page-header page-header-light">
        <div class="page-header-content header-elements-md-inline">
            <div class="page-title d-flex">
                <h4>
                    <i class="icon-arrow-left52 mr-2"></i>
                    <span class="font-weight-semibold">News</span> - Show
                </h4>
            </div>
        </div>
        <div class="breadcrumb-line breadcrumb-line-light header-elements-md-inline">
            <div class="d-flex">
                <div class="breadcrumb">
                    <a href="{{ route('backend.cms.dashboard.index') }}" class="breadcrumb-item">
                        <i class="icon-home2 mr-2"></i> Dashboard
                    </a>
                    <a href="{{ route('backend.cms.news.index') }}" class="breadcrumb-item">
                        News
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
                    <div class="card-body">
                        <div class="mb-4">
                            <div class="mb-3 text-center">
                                <a href="#" class="d-inline-block">
                                    <img src="{{ $news->image->file_url ?? '' }}" class="img-fluid" alt="">
                                </a>
                            </div>
                            <h5 class="font-weight-semibold mb-2">
                                <a href="" class="text-default">
                                    {{ $news->title }}
                                </a>
                            </h5>

                            <ul class="list-inline list-inline-dotted text-muted mb-3">
                                <li class="list-inline-item">
                                    <i class="fa fa-calendar-alt mr-1"></i>
                                    {{ $news->created_at }}
                                </li>
                            </ul>

                            <div class="mb-3">
                                {!! $news->description ?? '' !!}
                            </div>

                            @if($news->attachment)
                                <div class="card card-body bg-light rounded-left-0 border-left-3 border-left-warning">
                                    <a target="_blank" href="{{ $news->attachment->file_url }}">
                                        Download News Attachment
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- /post -->
            </div>
            <!-- /left content -->
            <!-- Right sidebar component -->
            <div class="sidebar sidebar-light bg-transparent sidebar-component sidebar-component-right border-0 shadow-0 order-1 order-md-2 sidebar-expand-md">
                <!-- Sidebar content -->
                <div class="sidebar-content">
                    <!-- Recent comments -->
                    <div class="card">
                        <div class="card-header bg-transparent header-elements-inline">
                            <span class="card-title font-weight-semibold">Recent News</span>
                            <div class="header-elements">
                                <div class="list-icons">
                                    <a class="list-icons-item" data-action="collapse"></a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <ul class="media-list">
                                @foreach($newsList as $index => $recentNews)
                                    <li class="media">
                                        <div class="mr-3">
                                            <img src="{{ $recentNews->image->file_url ?? '' }}" class="rounded-circle" width="36" height="36" alt="">
                                        </div>

                                        <div class="media-body">
                                            <a href="{{ route('backend.cms.news.show', [$recentNews->id]) }}" class="media-title">
                                                <div class="font-weight-semibold">
                                                    {{ $recentNews->title }}
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                            @endforeach
                        </div>
                    </div>
                    <!-- /recent comments -->
                </div>
                <!-- /sidebar content -->
            </div>
            <!-- /right sidebar component -->
        </div>
    </div>
@stop
