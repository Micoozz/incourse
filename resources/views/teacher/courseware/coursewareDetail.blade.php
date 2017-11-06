@extends('teacher.theAnswer_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/studentFile.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/communal.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/eduAdmin/notificationManager.css') }}" />
<style>
	.teacher{
		border-bottom: 1px solid #bcbcbc;
		margin:20px 0;
		padding-bottom: 20px;
	}
	.teacher-content h5{
		margin-bottom:20px;
	}
	.teacher-content>div p{
		margin-bottom:5px;
	}
	.teacher-content>div .ps{
		margin-bottom: 25px;
	}
	.accessory{
		margin-top: 40px;
		margin-bottom: 30px;
	}
	.accessory>div{
		display: flex;
	}
	.accessory>div>div{
		width: 25%;
		display: flex;
	}
	.accessory>div>div>span:first-child{
		margin-right: 20px;
	}
	.accessory>div>div>span:last-child span{
		cursor: pointer;
	}
	.accessory>div>div>span:last-child span  i{
		margin-right: 4px;
	}
	.foot-fastener{
		width: 30%;
		margin:20px auto;
	}
	.foot-fastener button{
		margin-left: 30px;
	}
</style>
@endsection
@section('THEANSWER')
			<!--内容-->
			<div class="col-xs-12 col-sm-12" id="centery" style="width: 100%;">
				<div class="ic-container">
					<div>
						<h5 style="font-weight: bold;">{{$courseware->title}}</h5>
						<p class="teacher">作者：{{$courseware->auth_name}} &nbsp;&nbsp;&nbsp;{{date('Y年m月d日 h时i分s秒',$courseware->create_time)}}</p>
						<div class="teacher-content">
							<h5>教师课件内容：</h5>
							<div>{!!$courseware->content!!}</div>
						</div>
						<div class="accessory">
							<h5>课件附件：</h5>
							<div>
								@if(empty($courseware->file))
									<div>暂无附件</div>
								@else
									@foreach($courseware->file as $file)
									<div>
										<span>
											<img src="/images/Cj_iconfont-jiaoyu.png"/>
										</span>
										<span>
											<p>《课件:钢铁是怎样炼成的》</p>
											<div>
												<span class="ic-blue"><i class="fa fa-download"></i>下载</span>&nbsp;&nbsp;&nbsp;
												<span class="ic-blue"><i class="fa fa-eye"></i>查看</span>&nbsp;&nbsp;&nbsp;
												<span>10.3MB</span>
											</div>
										</span>
									</div>
									@endforeach
								@endif
							</div>
						</div>
						<div>
							<h5>习题练习:共{{count($courseware->exercise_id)}}小题</h5>
						</div>
						<div class="foot-fastener">
							<a href="/courseWare/answerStart/{{$class_id}}/{{$course_id}}/{{$courseware->id}}/{{key($courseware->exercise_id[0])}}"><button class="ic-btn" style="margin-left: 0;">开始做题</button></a>
							<a href="/courseWare/setQuestions/{{$class_id}}/{{$course_id}}/{{$courseware->id}}"><button class="ic-btn">自由做题</button></a>
							<a href="/courseWare/main/{{$class_id}}/{{$course_id}}"><button class="btn-white">返 回</button></a>
						</div>
					</div>
				</div>
			</div>
@endsection

@section('JS:OPTIONAL')
<!--script-->
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
@endsection