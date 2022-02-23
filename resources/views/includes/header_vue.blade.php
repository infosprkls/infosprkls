<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>{{ __('Ai Solutions Dashboard') }}</title>
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#00aba9">
	<meta name="theme-color" content="#ffffff">
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />


	<link type="text/css" rel="stylesheet" href="{{asset('bootstrap.min.css?v=1.1')}}" media="print" onload="this.media='all'" />
	<link type="text/css" rel="stylesheet" href="{{asset('bootstrap-vue.min.css?v=1.1')}}" media="print" onload="this.media='all'" />





	<link type="text/css" rel="stylesheet" href="{{asset('css/layout/_sidebar.css?v=1.1')}}" media="print" onload="this.media='all'" />
	<link type="text/css" rel="stylesheet" href="{{asset('css/layout/_nav.css?v=1.1')}}" media="print" onload="this.media='all'" />
	<link type="text/css" rel="stylesheet" href="{{asset('css/layout/_structure.css?v=1.1')}}" media="print" onload="this.media='all'" />
	<link type="text/css" rel="stylesheet" href="{{asset('css/components/_alert.css?v=1.1')}}" media="print" onload="this.media='all'" />
	<!-- <link type="text/css" rel="stylesheet" href="{{-- {{asset('css/layout/main.css?v=1.1')}} --}}" media="print" onload="this.media='all'" /> -->

	@yield('page-script-head')
	<script src="{{ mix('js/ai-solutions/manifest.js') }}" defer></script>
	<script src="{{ mix('js/ai-solutions/vendor.js') }}" defer></script>
	<script src="{{ mix('js/ai-solutions/app.min.js') }}" defer></script>

	<script src="{{-- {{ asset('js/bootstrap-vue.min.js') }} --}}" defer></script>


	<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>