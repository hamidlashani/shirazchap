<!DOCTYPE html>
<!--[if IE 6]>
<html id="ie6" dir="rtl" lang="fa-IR" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 7]>
<html id="ie7" dir="rtl" lang="fa-IR" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if IE 8]>
<html id="ie8" dir="rtl" lang="fa-IR" prefix="og: http://ogp.me/ns#">
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html dir="rtl" lang="fa-IR" prefix="og: http://ogp.me/ns#" class="no-js no-svg"
      xmlns:livewire="http://www.w3.org/1999/html">
<!--<![endif]-->
<head>

    {!! SEO::generate(true) !!}


    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    @livewireStyles

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css">
    <script src="/js/jquery.magnific-popup.min.js"></script>

</head>
<body class="body-home dashboard_rez">

{{ $slot }}










<script src="{{ asset('js/app.js') }}"></script>
@include('sweet::alert')
<script src="/js/lib.min.js?ver=1.5"></script>

@livewireScripts

</body>
</html>