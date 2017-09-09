<!doctype html>
<html>

<head>
	<title>{{$title}}</title>
	<meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/incourseReset.css">
    <link rel="stylesheet" type="text/css" href="/css/index.css"/>
	<!-- Plugin -->
    @yield('CSS:OPTIONAL')
</head>

<body>
	<!-- HEADER -->
	@include('include.header')
	<!-- CONTENT -->
	<div id="content">

		<!-- MAIN -->
		@yield('CLIENT')

	</div>
	<!-- END CONTENT -->

	<!-- Plugin -->
	@yield('JS:OPTIONAL')
</body>
<!-- Javascript -->
<script src="/js/jquery-1.12.4.min.js" charset="utf-8"></script>
<script src="/js/index.js" charset="utf-8"></script>
<script src="/js/incourseReset.js" charset="utf-8"></script>
</html>