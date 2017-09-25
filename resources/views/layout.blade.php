<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>

    <!-- MADE WITH ♡ BY WEBCLIP -->

    <style id="acj">body{display:none !important;}</style>
    <script type="text/javascript">
        if(self===top){var acj=document.getElementById("acj");
        acj.parentNode.removeChild(acj)}else top.location=self.location;
    </script>

    <meta charset="utf-8">
    <meta name="robots" content="noindex, nofollow">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="Content-Language" content="{{ app()->getLocale() }}">

    <meta name="webclip-commit-hash" content="{{ exec('git rev-parse --verify --short HEAD') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="theme-color" content="#000000">
    <meta name="msapplication-TileColor" content="#000000">
    <meta name="msapplication-TileImage" content="awesome-image.png">
    <link rel="apple-touch-icon" sizes="180x180" type="image/png" href="">
    <link rel="icon" sizes="192x192" type="image/png" href="">
    <link rel="icon" sizes="16x16 24x24 32x32 64x64" type="image/x-icon" href="">
    <link rel="mask-icon" href="" color="#000000">

    <title>WebClip</title>

    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    @env('production')
        <style type="text/css">
            {!! file_get_contents(WEBCLIP_PATH.'/public/css/app.css') !!}
        </style>
    @else
        <link rel="stylesheet" type="text/css" href="{{ asset(mix('css/app.css', 'vendor/webclip')) }}">
    @endif

    <script>
        document.domain = '{{ config('webclip.domain') }}';
    </script>

</head>
<body>

    <div id="app">
        <noscript>
            For full functionality of this site it is necessary to enable JavaScript.
            Here are the <a href="http://www.enable-javascript.com/" target="_blank">
            instructions how to enable JavaScript in your web browser</a>.
        </noscript>
    </div>

    @yield('content')

    @env('production')
    <script type="text/javascript">
        {!! file_get_contents(WEBCLIP_PATH.'/public/js/manifest.js') !!}
    </script>
    @else
        <script type="text/javascript" defer src="{{ asset(mix('js/manifest.js', 'vendor/webclip')) }}"></script>
    @endif
    <script type="text/javascript" defer src="{{ asset(mix('js/vendor.js', 'vendor/webclip')) }}"></script>
    <script type="text/javascript" defer src="{{ asset(mix('js/app.js', 'vendor/webclip')) }}"></script>

</body>
</html>
