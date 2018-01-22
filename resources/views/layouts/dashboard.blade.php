<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="A project where we count the incoming traffic and check if the parking places are not being kept occupied for too long in Kempenaerstraat.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Project kempenaer</title>

    <!-- Add to homescreen for Chrome on Android -->
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="icon" sizes="192x192" href="/images/android-desktop.png">

    <!-- Add to homescreen for Safari on iOS -->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="Material Design Lite">

    <!-- Tile icon for Win8 (144x144 + tile color) -->
    <meta name="msapplication-TileImage" content="images/touch/ms-touch-icon-144x144-precomposed.png">
    <meta name="msapplication-TileColor" content="#3372DF">

    <link rel="apple-touch-icon" href="apple-touch-icon.png">
    <!-- Place favicon.ico in the root directory -->

    <!-- SEO: If your mobile URL is different from the desktop URL, add a canonical link to the desktop page https://developers.google.com/webmasters/smartphone-sites/feature-phones -->
    <!--
    <link rel="canonical" href="http://www.example.com/">
    -->

    <!-- build:css styles/main.css -->
    <link rel="stylesheet" href=/css/home.css>
    <!-- endbuild -->

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />
</head>
<body>
<!--[if IE]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
<![endif]-->

{{--<div id="app">--}}
{{--<auth user="{{ Auth::user()->voornaam }}"></auth>--}}
{{--<app></app>--}}
{{--</div>--}}

<div class="info-block">
    <h2>Aantal vrachtwagens vandaag gezien:</h2>
    <h1>{{ $kentekens->where('created_at', '>=', Carbon::today())->where('kenteken', 'LIKE', 'B')->count() }}</h1>
    <h2>Waarvan te lang geparkeerd:</h2>
    <h1>0</h1>
</div>
<div class="info-block">
    <br>
    <h2>Totaal aantal kentekens vandaag gescanned:</h2>
    <h1>{{ $kentekens->where('created_at', '>=', Carbon::today())->count() }}</h1>
    <h2>Auto's die langer als 2 uur in de straat zijn:</h2>
    <h1>0</h1>
</div>

<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function(b,o,i,l,e,r){b.GoogleAnalyticsObject=l;b[l]||(b[l]=
        function(){(b[l].q=b[l].q||[]).push(arguments)});b[l].l=+new Date;
        e=o.createElement(i);r=o.getElementsByTagName(i)[0];
        e.src='https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e,r)}(window,document,'script','ga'));
    ga('create','UA-XXXXX-X');ga('send','pageview');
</script>

<!-- CSRF Token Script -->
<script>
    window.Laravel = <?php echo json_encode([
        'csrfToken' => csrf_token(),
    ]); ?>
</script>

<!-- build:js scripts/main.js -->
<script src="/js/app.js"></script>
<!-- endbuild -->
</body>
</html>