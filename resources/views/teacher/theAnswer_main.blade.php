<!doctype html>
<html>

<head>
	<title>title</title>
	<meta charset="utf-8">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/incourseReset.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}"/>
    <style type="text/css">
        .waitBox {
            text-align: center;
            padding-top: 70px;
            font-size: 12px;
        }
    </style>
	<!-- Plugin -->
    @yield('CSS:OPTIONAL')
</head>

<body>
	<!-- CONTENT -->
	<div id="content">
		<!-- 顶部导航 -->
		@include('include.header')
		<div class="container homeWork-head" style="margin-bottom: 20px">
	        <div class="row">
	            <div class="col-md-3 col-xs-12 cent_nav">
	                <ul class="col-md-12 col-xs-12">
	                    @foreach($class_course as $item)
	                    <li><a class={{$class_id == $item['class_id'] && $course_id == $item['course_id'] ? 'box' : 'p-r of-h class-teacher'}} href="{{'/courseWare/'.$item['class_id'].'/'.$item['course_id']}}">{{$item['title']}}</a></li>
	                    @endforeach
	                </ul>
	            </div>
	            <div class="col-md-6"></div>
	            <div class="col-md-3"></div>
	        </div>
	    </div>
    	<!-- MAIN -->
		<div class="container">
			@yield('THEANSWER')
			<!-- 聊天窗口 -->
			<div class="chatRoom">
			</div>
		</div>
	</div>
	<!-- END CONTENT -->

	
</body>
<!-- Javascript -->
<script src="{{ asset('js/jquery-1.12.4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/jquery-ui-sortable.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/incourseReset.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/echarts.min.js') }}" charset="utf-8"></script>
<script type="text/javascript">
    var token = "{{csrf_token()}}";
</script>
<!-- Plugin -->
@yield('JS:OPTIONAL')
</html>