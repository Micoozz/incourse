@extends('student.exerciseBase.wrongNotebook_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{asset('css/student/errorReports.css')}}" />
<style>
    .canvasModule{
    	width: 400px;
    	height: 400px;
    	margin: 0 auto;
    }
    .sumTimeConsuming{
    	margin: 15px auto;
    	width: 100%;
    	height: 24px;
    	line-height: 24px;
    	font-size: 14px;
    	color: #333;
    	text-align: center;
    }
    .listBtnSkip{
    	width: 100%;
    	height: auto;
    	overflow: hidden;
    }
    .listBtnSkip span{
    	line-height: 20px;
    	text-align: left;
    	font-size: 12px;
    	color: #333;
    }
    .listBtnSkip ul{
    	width: 100%;
    	height: auto;
    	overflow: hidden;
    }
    .listBtnSkip ul li{
    	float: left;
    	width: 32px;
    	height: 32px;
    	border-radius: 50%;
    	color: #fff;
    	background: #3DBD7D;
    	text-align: center;
    	line-height: 32px;
    	font-size: 14px;
    }
    .btnSkip{
    	width: auto;
    	height: auto;
    	overflow: hidden;
    	margin: 0 auto;
    	margin-left: -30px;
    }
    .btnSkip button{
    	float: left;
    	margin-left: 30px;
    }
</style>
@endsection

@section('NOTEBOOK')
<div class="admin-container exer-room pageType" data-type="4">
	<div class="canvasModule">
		<canvas id="canvas" width="400" height="400"></canvas>
	</div>
	<div class="sumTimeConsuming">总耗时：33分20秒</div>
	<div class="listBtnSkip">
		<span>答题卡：</span>
		<ul>
			<li>1</li>
			<li>2</li>
			<li>3</li>
			<li class="bj-f00">4</li>
			<li>5</li>
		</ul>
	</div>
	<div class="btnSkip">
		<button class="btn">放弃答题</button>
		<button class="btn">错题解析</button>
		<button class="btn">继续辅导</button>
	</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script src="{{asset('js/index.js')}}" charset="utf-8"></script>
<script src="{{asset('js/toCanvas.js')}}" charset="utf-8"></script>
<script>
	toCanvas('canvas',5,19.1227);
</script>
@endsection