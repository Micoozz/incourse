<!doctype html>
<html>

<head>
	<title>{{$title}}</title>
	<meta charset="utf-8">
	<!-- CSS -->
    <link rel="stylesheet" href="{{ asset('css/layui/css/layui.css') }}">
	<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="/css/incourseReset.css">
    <link rel="stylesheet" type="text/css" href="/css/index.css"/>
    <style type="text/css">
        .homework-manage-title li a:hover {
            color: #168bee;
        }
    </style>
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

	
</body>
<!-- Javascript -->
<script src="/js/jquery-1.12.4.min.js" charset="utf-8"></script>
<script src="{{ asset('css/layui/layui.js') }}"></script>
<script src="/js/index.js" charset="utf-8"></script>
<script src="/js/incourseReset.js" charset="utf-8"></script>
<script type="text/javascript" src="/js/ajaxfileupload.js"></script>
<script>
var token = "{{csrf_token()}}";
//检测浏览器
function myBrowser(){
    var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串
    var isOpera = userAgent.indexOf("Opera") > -1;
    if (isOpera) {return "Opera";}; //判断是否Opera浏览器
    if (userAgent.indexOf("Firefox") > -1) {return "FF";} //判断是否Firefox浏览器
    if (userAgent.indexOf("Chrome") > -1){return "Chrome";}
    if (userAgent.indexOf("Safari") > -1) {return "Safari";} //判断是否Safari浏览器
    if (userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1 && !isOpera) {return "IE";}; //判断是否IE浏览器
}

//根据浏览器的不同添加样式
(function(){
    var mb = myBrowser();
    if ("IE" == mb) {
    	console.log("IE")
    }
    if ("FF" == mb) {
    	console.log("火狐")
    }
    if ("Chrome" == mb) {
    	console.log("谷歌")
    }
    if ("Opera" == mb) {
    	console.log("Opera")
    }
    if ("Safari" == mb) {
       console.log("Safari")
    }
    $(".go-page").click(function(){
        var page = $(".goPage").val() == ''?$("ul#pagaSkip").find("li.active").find('span').text():$(".goPage").val();
        var pathName = window.location.pathname;
        window.location.href = pathName + '?page=' + page;
    })
})()
</script>
<!-- Plugin -->
@yield('JS:OPTIONAL')
</html>