<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="icon" href="{{url('dist/img/pendudukdesa.png')}}" type="image/x-icon"/>
    <link rel="shortcut icon" href="{{url('dist/img/pendudukdesa.png')}}" type="image/x-icon"/>
    <title>@yield('title') - {{env('APP_NAME')}}</title>
    <!-- CSS files -->
    <link href="{{url('dist/css/tabler.min.css')}}" rel="stylesheet" />
    <link href="{{url('dist/css/tabler-flags.min.css')}}" rel="stylesheet" />
    <link href="{{url('dist/css/tabler-payments.min.css')}}" rel="stylesheet" />
    <link href="{{url('dist/css/tabler-vendors.min.css')}}" rel="stylesheet" />
    <link href="{{url('dist/css/demo.min.css')}}" rel="stylesheet" />
</head>

@php
    if($layout == "auth") {
        $class = "border-top-wide border-primary d-flex flex-column";
    } elseif($layout == "dashboard") {
        $class = "antialiased";
    } else {
        $class = "antialiased";
    }
@endphp

<body class="{{ $class }}">

    @yield('content')
    <!-- Libs JS -->
    <script src="{{url('dist/libs/apexcharts/dist/apexcharts.min.js')}}"></script>
    <!-- Tabler Core -->
    <script src="{{url('dist/js/tabler.min.js')}}"></script>
    <script src="{{url('dist/js/demo.min.js')}}"></script>
    @stack('scripts')
</body>

</html>
