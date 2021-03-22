<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">

        <!-- Scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.26.0/moment.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,400i,600,700,800,900" rel="stylesheet" />
        <link href="{{asset('dist-assets/css/themes/lite-purple.min.css')}}" rel="stylesheet" />
        <link href="{{asset('dist-assets/css/plugins/perfect-scrollbar.min.css')}}" rel="stylesheet" />
        <link rel="stylesheet" href="{{asset('dist-assets/css/plugins/datatables.min.css')}}" />

        <!-- Scripts -->
        @routes
        <script src="{{ mix('js/app.js') }}" defer></script>
    </head>
    <body class="font-sans antialiased">
        @inertia
    </body>
    <script src="{{asset('dist-assets/js/plugins/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/plugins/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/script.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/sidebar.large.script.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/plugins/echarts.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/echart.options.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/dashboard.v1.script.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/plugins/datatables.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/datatables.script.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/plugins/tagging.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/tagging.script.min.js')}}"></script>
    <script src="{{asset('dist-assets/js/scripts/customizer.script.min.js')}}"></script>

</html>
