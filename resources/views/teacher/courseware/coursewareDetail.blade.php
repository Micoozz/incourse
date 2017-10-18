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
						<h5 style="font-weight: bold;">《课件：钢铁是怎样炼成的》</h5>
						<p class="teacher">讲师：xxx &nbsp;&nbsp;&nbsp;2015年02月02日</p>
						<div class="teacher-content">
							<h5>教师课件内容：</h5>
							<div>
								<p>1．初步学会阅读整本书，课内外结合，读完《钢铁是怎样炼成的》，了解故事情节。 </p>
								<p>2．通过略读感知全文主要内容，理清情节和人物关系，扼要分析小说的主题。</p> 
								<p class="ps">3．通过精读评析作品中人物形象的典型意义，对社会和人生有新的领悟。</p>

								<p class="ps">【探究】: 小说中有这样一句话：“钢铁是在烈火和骤冷中炼成的。”意思是坚强的共产主义战士是在同阶级敌人以及各种困难的斗争中起来的。小说的主人公保 尔经历了第一次世界大战、十月革命国内战争和国民经济恢复时期的严峻考验，从一个普通和工人子弟成长为一个坚强的共产主义战士。其中“钢铁”比喻无产阶 级的英雄人物、坚强的共产主义战士，也可泛指平凡而伟大的人物。</p>

								<p class="ps">【探究】: 小说中有这样一句话：“钢铁是在烈火和骤冷中炼成的。”意思是坚强的共产主义战士是在同阶级敌人以及各种困难的斗争中起来的。小说的主人公保 尔经历了第一次世界大战、十月革命国内战争和国民经济恢复时期的严峻考验，从一个普通和工人子弟成长为一个坚强的共产主义战士。其中“钢铁”比喻无产阶 级的英雄人物、坚强的共产主义战士，也可泛指平凡而伟大的人物。</p>

								<p>【思考】： 你知道《钢铁是怎样炼成的》这一题目的含义吗?</p>
							</div>
						</div>
						<div class="accessory">
							<h5>课件附件：</h5>
							<div>
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
							</div>
						</div>
						<div>
							<h5>习题练习:共15小题</h5>
						</div>
						<div class="foot-fastener">
							<a href="/courseWare/answerStart"><button class="ic-btn" style="margin-left: 0;">开始做题</button></a>
							<a href="/courseWare/setQuestions"><button class="ic-btn">自由做题</button></a>
							<a href=""></a><button class="btn-white">返   回</button>
						</div>
					</div>
				</div>
			</div>
@endsection

@section('JS:OPTIONAL')
<!--script-->
<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
@endsection