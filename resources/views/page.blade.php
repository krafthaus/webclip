<!doctype html>
<html lang="en">
<head>

    <!-- GENERATED WITH ♡ BY WEBCLIP -->

    <meta charset="UTF-8" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <meta name="generator" content="webclip.co" />

    <title>{{ $resource->name }}</title>

    <link rel="stylesheet" type="text/css" href="{{ mix('css/frontend.css', 'vendor/webclip') }}" media="all" />
    <link rel="stylesheet" type="text/css" href="{{ url('css/style.css') }}" media="all" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.min.js"></script>
    <![endif]-->
    <script type="text/javascript">
        document.domain = '{{ config('webclip.domain') }}';
    </script>

</head>
<body class="body">

@foreach ($elements as $element)
    {!! $element->render() !!}
@endforeach

    <!--[if lte IE 9]>
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script>
    <![endif]-->
    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

</body>
</html>
