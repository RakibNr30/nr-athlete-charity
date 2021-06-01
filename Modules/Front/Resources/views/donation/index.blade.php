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
                                <h2 class="page-title">Donate Now</h2>
                                <ul class="breadcrumb-list">
                                    <li><a href="{{ route('front.index') }}">Home <i class="far fa-chevron-right"></i></a></li>
                                    <li><a class="active">Donate Now</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--page-title-area end-->
    @include('front.partials._alert_donate')
    <!--statistics-area start-->
        <section class="home counter-area theme-bg pt-80 pb-30">
            <div class="container">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <div class="counetrs mb-30 text-center wow fadeInUp2  animated" data-wow-delay=".3s" style="visibility: visible; animation-delay: 0.3s; animation-name: fadeInUp2;">
                            <div class="counetrs__icon mb-20"><i class="flaticon-running"></i></div>
                            <h1>
                                <span class="counter">
                                    {{ $data->counter->totalAthlete ?? 0 }}
                                </span>
                            </h1>
                            <p>Total Athlete</p>
                        </div>
                    </div>
                    {{--<div class="col-xl-3 col-lg-3 col-md-3 col-sm-6">
                        <div class="counetrs mb-30 text-center wow fadeInUp2  animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                            <div class="counetrs__icon mb-20"><i class="flaticon-calories"></i></div>
                            <h1><span class="counter">0</span></h1>
                            <p>Burn Calories</p>
                        </div>
                    </div>--}}
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6">
                        <div class="counetrs mb-30 text-center wow fadeInUp2  animated" data-wow-delay=".7s" style="visibility: visible; animation-delay: 0.7s; animation-name: fadeInUp2;">
                            {{--<div class="counetrs__icon mb-20"><i class="flaticon-dollar-coins"></i></div>--}}
                            <div class="counetrs__icon mb-20"><i class="fas fa-coins"></i></div>
                            <h1>
                                &#128;
                                <span class="counter">
                                    {{ $data->counter->totalDonation ?? 0 }}
                                </span>
                            </h1>
                            <p>Total Donation</p>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
                        <div class="counetrs mb-30 text-center wow fadeInUp2  animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInUp2;">
                            <div class="counetrs__icon mb-20"><i class="flaticon-rice"></i></div>
                            <h1>
                                &#128;
                                <span class="counter--">
                                {{ $data->counter->latestRicePrice ?? 0 }}
                            </span>
                            </h1>
                            <p>Rice Price (per kg)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--statistics-area end-->

        <!--donation-form-area start-->
        <section class="donation-form-area-02 grey-bg2 pt-125 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-8 col-md-12">
                        <div class="donation-form-left">
                            <div class="doante-select-area donate-select-area-04 mb-30 text-center white-bg wow fadeInUp2 animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                                <div class="row">
                                    <div class="col-12">
                                        <h3 class="mb-20 text-left">Your Last Activity</h3>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12">
                                        <div class="counetrs pos-rel mb-0 grey-bg2 animated mb-2 mt-2 p-2 pb-3">
                                            <div class="row">
                                                <div class="col-12">
                                                    <p class="text-black-50 text-left">
                                                        <span class="font-weight-bold light-black" style="font-size: 18px;">{{ $lastActivity->name ?? 'N/A' }}</span>
                                                    </p>
                                                </div>
                                                <div class="col-4 col-activity">
                                                    <p class="text-black-50 text-left light-black" style="font-size: 12px">Distance
                                                        <span class="font-weight-bold d-block" style="font-size: 18px; line-height: 8px">
                                                            @if(isset($lastActivity->distance))
                                                                {{ $lastActivity->distance ?? 0 }} m
                                                            @else
                                                                0
                                                            @endif
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-4 col-activity">
                                                    <p class="text-black-50 text-left light-black" style="font-size: 12px">Time
                                                        <span class="font-weight-bold d-block" style="font-size: 18px; line-height: 8px">
                                                            @if(isset($lastActivity->moving_time))
                                                                {{ $lastActivity->moving_time ?? 0 }} s
                                                            @else
                                                                0
                                                            @endif
                                                        </span>
                                                    </p>
                                                </div>
                                                <div class="col-4 col-activity col-activity-last">
                                                    <p class="text-black-50 text-left light-black" style="font-size: 12px">Speed
                                                        <span class="font-weight-bold d-block" style="font-size: 18px; line-height: 8px">
                                                            @if(isset($lastActivity->average_speed))
                                                                {{ $lastActivity->average_speed ?? 0 }} m/s
                                                            @else
                                                                0
                                                            @endif
                                                        </span>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @if(isset($lastActivity->map->summary_polyline))
                                        <div class="activity-map-area mb-2 ml-3 mr-3">
                                            <div id="map"></div>
                                        </div>
                                    @endif
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="counetrs statistics pos-rel mb-0 grey-bg2 text-center wow fadeInUp2 animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp2;">
                                            <div class="counetrs__icon mb-20"><i class="flaticon-calories"></i></div>
                                            <h1>
                                                <span class="">
                                                    @if(isset($data->calories))
                                                        {{ $data->calories ? round($data->calories, 2) : 0 }}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </h1>
                                            <p>Calories (kCal)</p>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <div class="counetrs statistics pos-rel mb-0 grey-bg2 text-center wow fadeInUp2 animated" data-wow-delay=".2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp2;">
                                            <div class="counetrs__icon mb-20"><i class="flaticon-rice"></i></div>
                                            <h1>
                                                <span class="">
                                                    @if(isset($data->rices))
                                                        {{ $data->rices ? round($data->rices, 2) : 0 }}
                                                    @else
                                                        0
                                                    @endif
                                                </span>
                                            </h1>
                                            <p>Rice (kg)</p>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="doante-select-area donate-select-area-04 mb-30 text-center white-bg wow fadeInUp2 animated" data-wow-delay=".1s" style="visibility: visible; animation-delay: 0.1s; animation-name: fadeInUp2;">
                                <div class="section-title text-left mb-45">
                                    <h3>Raise Your Hand To Right<br>
                                        Place Or Foundation</h3>
                                </div>
                                <div class="donate-cart pos-rel mb-10">
                                    <form class="donate-btn pos-rel" action="#">
                                        <input type="text" id="donate_amount" value="&#128;{{ round($data->ricePrice, 2) }}" readonly>
                                    </form>
                                </div>
                                {!! Form::open(['url' => route('make.payment'), 'method' => 'post']) !!}
                                <div class="mb-10">
                                    <select name="case_id" class="donate-select donate-select2">
                                        <option value="0">Donate for all</option>
                                        @foreach($data->allCases as $index => $case)
                                            <option value="{{ $case->id }}" {{ old('case_id') == $case->id ? 'selected' : (request()->get('case') == $case->id ? 'selected' : '') }}>
                                                {{ $case->title }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="mt-30">
                                    <input type="hidden" name="donate_amount" value="{{ round($data->ricePrice, 2) }}">
                                    @if(isset($lastActivity->id))
                                        <input type="hidden" name="activity_id" value="{{ $lastActivity->id }}">
                                    @endif
                                    <input type="hidden" name="rice_donate_amount" value="{{ round($data->rices, 2) }}" readonly>
                                    @if(round($data->ricePrice, 2) == 0)
                                        <button class="theme_btn theme_btn_bg w-100" disabled>
                                            <i class="fab fa-paypal"></i> Pay with PayPal
                                        </button>
                                    @else
                                        <button class="theme_btn theme_btn_bg w-100">
                                            <i class="fab fa-paypal"></i> Pay with PayPal
                                        </button>
                                    @endif
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-4 col-md-12">
                        <div class="details-right-area">
                            <div class="widget white-bg mb-30">
                                <div class="widget-post">
                                    <h3 class="cases-title mb-30">Popular Cases</h3>
                                    @if(count($data->cases))
                                        @foreach($data->cases as $index => $case)
                                            <div class="post d-flex align-items-center mb-20">
                                                <div class="post__thumb mr-20">
                                                    <div class="latest_thumb" style="background-image:
                                                        url({{ $case->image->file_url ?? config('core.image.default.preview_image') }})">
                                                    </div>
                                                </div>
                                                <div class="post__content">
                                                    <h5>
                                                        <a href="{{ route('front.cases.show', [$case->slug]) }}">
                                                            @if(strlen($case->title) > 30)
                                                                {{ substr($case->title, 0, 30) }} ...
                                                            @else
                                                                {{ $case->title }}
                                                            @endif
                                                        </a>
                                                    </h5>
                                                    <a class="view_btn" href="{{ route('front.cases.show', [$case->slug]) }}">
                                                        view Details
                                                    </a>
                                                </div>
                                            </div>
                                        @endforeach
                                        <h5 class="text-center mt-35">
                                            <a href="{{ route('front.cases.index') }}">
                                                View All
                                            </a>
                                        </h5>
                                    @else
                                        <h6>No case found</h6>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!--donation-form-area end-->
    </main>
@stop

@section('style')
    <link href="{{ asset('common/plugins/leaflet/css/leaflet.css') }}" rel="stylesheet">
    <link href="{{ asset('common/plugins/leaflet/css/leaflet.pm.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('common/plugins/select2/css/select2.min.css') }}">
    <style>
        #map { height: 100%; width:100%; }
        .donate-select-area-04 {
            padding: 30px 30px 30px 30px;
        }
        .donate-select {
            width: 100%;
        }
        .select2-container--default
        .select2-selection--single {
            background-color: #fff;
            border: 1px solid #e4e4e4;
            border-radius: 0;
            height: 64px;
        }
        .select2-container--default
        .select2-selection--single
        .select2-selection__rendered {
            color: #001234;
            line-height: 60px;
            font-size: 16px;
        }
        .select2-container--default
        .select2-selection--single
        .select2-selection__arrow {
            height: 60px;
        }
    </style>
@stop

@section('script')
    <script src="{{ asset('common/plugins/leaflet/js/leaflet.js') }}"></script>
    <script src="{{ asset('common/plugins/leaflet/js/leaflet.pm.min.js') }}"></script>
    <script src="{{ asset('common/plugins/leaflet/js/polyline.js') }}"></script>
    <script src="{{ asset('common/plugins/select2/js/select2.full.min.js') }}"></script>
    <script>
        $('.donate-select2').select2();
    </script>
    <script>
        function setupMap() {
            var map = L
                .map('map')
                .setView([0, 90], 2);

            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="http://mapbox.com">Mapbox</a>',
                maxZoom: 20,
                id: 'mapbox/streets-v11',
                accessToken: 'pk.eyJ1IjoicmFraWJucjMwIiwiYSI6ImNrcGQ2cHZkejA5cXMyb3Q2enV0azFzZnEifQ.eh9EyKO8cga0v7usw-GacQ'
            }).addTo(map);

            map.pm.addControls({
                position: 'topleft',
                drawMarker: false,
                drawPolyline: true,
                drawRectangle: false,
                drawPolygon: false,
                drawCircle: false,
                cutPolygon: false,
                editMode: true,
                removalMode: true,
            });

            map.pm.setPathOptions({
                color: 'blue',
                width: 4,
            });

            return map;
        }

        var io = document.getElementById('io');
        //var errOut = document.getElementById('error');
        var map = setupMap();
        var curPolyline = [];
        var curMapboxPolyline = null;
        var curInputMode = 0;
        var data = '{{ $lastActivity->map->summary_polyline ?? '' }}';

        function disableDrawLine() {
            map.pm.addControls({
                drawPolyline: false,
            });
        }

        function enableDrawLine() {
            map.pm.addControls({
                drawPolyline: true,
            });
        }

        function syncPolyline() {
            if (curMapboxPolyline) {
                curPolyline = curMapboxPolyline.getLatLngs().map(function(item) {
                    return [item.lat, item.lng];
                });
            } else {
                curPolyline = [];
            }
        }

        function onPmEdit() {
            syncPolyline();
            render();
        }

        function onPmCreate(e) {
            curMapboxPolyline = e.layer;
            curMapboxPolyline.on('pm:edit', onPmEdit);
            disableDrawLine();
            syncPolyline();
            render();
        }

        function onPmRemove(e) {
            curMapboxPolyline.off('pm:edit', onPmEdit);
            curMapboxPolyline = null;
            enableDrawLine();
            syncPolyline();
            render();
        }

        function onInput() {
            const val = data;
            if (val === '') {
                if (curMapboxPolyline) {
                    map.removeLayer(curMapboxPolyline);
                }
                enableDrawLine();
            } else {
                try {
                    curPolyline = polyline.decode(val);
                    if (!curMapboxPolyline) {
                        curMapboxPolyline = L.polyline(curPolyline, {
                            color: '#F15C44',
                            weight: 4,
                        }).addTo(map);
                        curMapboxPolyline.on('pm:edit', onPmEdit);
                        map.fitBounds(curMapboxPolyline.getBounds());
                        disableDrawLine();
                    } else {
                        curMapboxPolyline.setLatLngs(curPolyline.map(item => {
                            return new L.LatLng(item[0], item[1]);
                        }));
                        map.fitBounds(curMapboxPolyline.getBounds());
                    }
                    //errOut.innerHTML = '';
                } catch (err) {
                    //errOut.innerHTML = err.message;
                }
            }
        }

        map.on('pm:create', onPmCreate);
        map.on('pm:remove', onPmRemove);
        onInput();

        function setCurPolyline(encp) {
            curInputMode = 0;
            onInput({
                target: {
                    value: encp,
                },
            });
            render();
            return false;
        }

        function setDisplay(str) {
            const selectionStart = io.selectionStart;
            const selectionEnd = io.selectionEnd;
            console.log(selectionStart, selectionEnd);
            io.value = str;
            io.setSelectionRange(selectionStart, selectionEnd);
        }
    </script>
@stop
