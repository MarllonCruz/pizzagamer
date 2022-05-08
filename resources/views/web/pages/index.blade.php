@extends('web.template')

@section('content')
	<!-- Main Content -->
	<main>
		<!-- Feed SlideShow -->
		@include('web.common.slide')
		<!-- Feed Highlights -->
		@include('web.common.highlight')
		<!-- Feed Videos -->
		@include('web.common.video')
	</main>
@endsection