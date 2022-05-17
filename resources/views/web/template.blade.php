<!DOCTYPE html>
<html>
	
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ config('app.name') }} @yield('title')</title>
	<link rel="icon" type="image/gif/png" href="{{ url('storage/media/pizza/default.png') }}"/>

	 <!-- Fontawesome style -->
	 <link rel="stylesheet" href="{{ url(mix('assets/css/fontawesome.css')) }}">
	 <!-- App Style -->
	 <link rel="stylesheet" href="{{ url('assets/css/web/app.css') }}">
</head>

<body>
	<!-- Header -->
	@include('web.common.header')
	<!-- Content -->
    @yield('content')
	<!-- Footer -->
	@include('web.common.footer')

	<!-- Fontawesome script -->
    <script src="{{ url('assets/js/fontawesome.js') }}"></script>
    <!-- JQuery -->
    <script src="{{ url('assets/js/jquery.min.js') }}"></script>
	<!-- App Script -->
    <script src="{{ url(mix('assets/js/web/app.js')) }}"></script>
    @yield('script')
</body>

</html>