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
    	margin: 0 auto 15px;
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
    	padding: 0 30px;
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
    	margin: 15px 0;
    }
    .listBtnSkip ul li{
    	float: left;
    	width: 32px;
    	height: 32px;
    	border-radius: 50%;
    	background: #3DBD7D;
    	text-align: center;
    	line-height: 32px;
    	font-size: 14px;
    	margin-right: 30px;
    }
    .listBtnSkip ul li a{
    	color: #fff;
    }
    .listBtnSkip ul li.bj-ff5{
    	background: #f76156;
    }
    .btnSkip{
    	width: 300px;
    	height: auto;
    	overflow: hidden;
    	margin: 20px auto;
    }
    .btnSkip button{
    	float: left;
    	height: 28px;
    	line-height: 22px;
    	margin-left: 30px;
    	display: inline-block;
 		padding: 3px 10px;
 		border-radius: 4px;
 		border: 1px solid #d9d9d9;
 		font-size: 12px;
 		overflow: hidden;
    }
    .btnSkip button.fff:hover{
    	color: #fff;
    }
    .btnSkip button:focus{
    	outline: none;
    	box-shadow: none;
    }
    .btnSkip button.fff:focus{
    	color: #fff;
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
			<li><a href="" title="">1</a></li>
			<li><a href="" title="">2</a></li>
			<li><a href="" title="">3</a></li>
			<li class="bj-ff5"><a href="" title="">4</a></li>
			<li><a href="" title="">5</a></li>
		</ul>
	</div>
	<div class="btnSkip">
		<button class="btn">放弃答题</button>
		<button class="btn ic-blue-bg fff">错题解析</button>
		<button class="btn ic-blue-bg fff">继续辅导</button>
	</div>
</div>
@endsection

@section('JS:OPTIONAL')
<script src="{{asset('js/index.js')}}" charset="utf-8"></script>
<script src="{{asset('js/toCanvas.js')}}" charset="utf-8"></script>
<script>
	toCanvas('canvas',5,30);
</script>
@endsection