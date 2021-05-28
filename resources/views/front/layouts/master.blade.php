<!DOCTYPE html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ $globalSite->title ?? 'Athlete Charity' }}</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="{{ $globalSite->favicon->file_url ?? config('core.image.default.favicon') }}">
    <link rel="stylesheet" href="{{ asset('front/css/plugins.css') }}">
    <link href="{{ asset('common/plugins/datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/css/main.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('front/css/custom-icon.css') }}">
    @yield('style')
</head>
<body>

{{--@include('front.partials._preloader')--}}
@include('front.partials._top_menu')
@include('front.partials._mobile_menu')
@yield('content')
@include('front.partials._footer')
@include('front.partials._fs_search')

<script src="{{ asset('front/js/plugins.js') }}"></script>
<script src="{{ asset('common/plugins/datepicker/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ asset('front/js/main.js') }}"></script>
<script src="{{ asset('front/js/custom.js') }}"></script>
@yield('script')

<script>
    $('.datepicker').datepicker({
        todayHighlight: true,
        format: 'yyyy-mm-dd',
        //startDate: new Date(),
        changeMonth: true,
        changeYear: true,
        autoclose: true
    })
</script>

</body>
</html>