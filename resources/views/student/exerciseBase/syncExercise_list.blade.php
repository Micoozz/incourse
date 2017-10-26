@extends('student.exerciseBase.wrongNotebook_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{asset('css/student/wrongNotebook_list.css')}}">
<style>
	.sectionAllSubject{
		width: 120px;
	    float: right;
	    height: 30px;
	    line-height: 30px;
	    color: #c9c9c9;
	}
	.allSubject,.thisGrade {
		float: left;
		width: 50%;
		height: 30px;
		display: block;
		line-height: 30px;
	}
</style>
@endsection

@section('NOTEBOOK')
<div class="admin-container exer-room pageType" data-type="2">
	<ul class="wrongNoteBookSectionLists">
		<li class="wrongNoteBookSectionList">
			<div class="SectionListTitle">
				<div class="sectionTitle-parent">
					<div class="SectionList-title sectionTitle">
						<i class="sectionTitleIcon fa fa-angle-right ic-blue-bg fff"></i>
						<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第一章</a></span></div>
						<div class="sectionAllSubject">
							<span class="allSubject">共 <span>15</span>题</span>
							<span class="thisGrade">分数：<span>无</span></span>
						</div>
					</div>
					<div class="SectionList-subTitle sectionTitle">
						<span class="titleTime"><i class="fa fa-clock-o"></i>第一章</span>
						<span class="wrongClick ic-blue"><a class="eoorosExercise" data-href="/errorsExerciseShowWorkList" title=""><i class="fa fa-pencil"></i>开始预习</a></span>
					</div>
					<ul class="chapterList">
						<li>
							<b class="chapterIcon ic-blue-bg fff">1</b>
							<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第一章第一节</a></span></div>
							<div class="sectionAllSubject">
								<span class="allSubject">共 <span>15</span>题</span>
								<span class="thisGrade">分数：<span>无</span></span>
							</div>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第一章第一节</span>
								<span class="wrongClick ic-blue"><a class="eoorosExercise" data-href="/errorsExerciseShowWorkList" title=""><i class="fa fa-pencil"></i>开始预习</a></span>
							</div>
							<span class="dowmLine"></span>
						</li>
						<li>
							<b class="chapterIcon ic-blue-bg fff">2</b>
							<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第一章第二节</a></span></div>
							<div class="sectionAllSubject">
								<span class="allSubject">共 <span>15</span>题</span>
								<span class="thisGrade">分数：<span>无</span></span>
							</div>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第一章第二节</span>
								<span class="wrongClick ic-blue"><a class="eoorosExercise" data-href="/errorsExerciseShowWorkList" title=""><i class="fa fa-pencil"></i>开始预习</a></span>
							</div>
							<span class="dowmLine"></span>
						</li>
						<li>
							<b class="chapterIcon ic-blue-bg fff">3</b>
							<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第一章第三节</a></span></div>
							<div class="sectionAllSubject">
								<span class="allSubject">共 <span>15</span>题</span>
								<span class="thisGrade">分数：<span>无</span></span>
							</div>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第一章第三节</span>
								<span class="wrongClick ic-blue"><a class="eoorosExercise" data-href="/errorsExerciseShowWorkList" title=""><i class="fa fa-pencil"></i>开始预习</a></span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</li>
		<li class="wrongNoteBookSectionList">
			<div class="SectionListTitle">
				<div class="sectionTitle-parent">
					<div class="SectionList-title sectionTitle">
						<i class="sectionTitleIcon fa fa-angle-right ic-blue-bg fff"></i>
						<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第二章</a></span></div>
						<div class="sectionAllSubject">
							<span class="allSubject">共 <span>15</span>题</span>
							<span class="thisGrade">分数：<span>无</span></span>
						</div>
					</div>
					<div class="SectionList-subTitle sectionTitle">
						<span class="titleTime"><i class="fa fa-clock-o"></i>第二章</span>
						<span class="wrongClick ic-blue"><a class="eoorosExercise" data-href="/errorsExerciseShowWorkList" title=""><i class="fa fa-pencil"></i>开始预习</a></span>
					</div>
					<ul class="chapterList">
						<li>
							<b class="chapterIcon ic-blue-bg fff">1</b>
							<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第二章第一节</a></span></div>
							<div class="sectionAllSubject">
								<span class="allSubject">共 <span>15</span>题</span>
								<span class="thisGrade">分数：<span>无</span></span>
							</div>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第二章第一节</span>
								<span class="wrongClick ic-blue"><a class="eoorosExercise" data-href="/errorsExerciseShowWorkList" title=""><i class="fa fa-pencil"></i>开始预习</a></span>
							</div>
						</li>
						<li>
							<b class="chapterIcon ic-blue-bg fff">2</b>
							<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第二章第二节</a></span></div>
							<div class="sectionAllSubject">
								<span class="allSubject">共 <span>15</span>题</span>
								<span class="thisGrade">分数：<span>无</span></span>
							</div>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第二章第二节</span>
								<span class="wrongClick ic-blue"><a class="eoorosExercise" data-href="/errorsExerciseShowWorkList" title=""><i class="fa fa-pencil"></i>开始预习</a></span>
							</div>
						</li>
						<li>
							<b class="chapterIcon ic-blue-bg fff">3</b>
							<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第二章第三节</a></span></div>
							<div class="sectionAllSubject">
								<span class="allSubject">共 <span>15</span>题</span>
								<span class="thisGrade">分数：<span>无</span></span>
							</div>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第二章第三节</span>
								<span class="wrongClick ic-blue"><a class="eoorosExercise" data-href="/errorsExerciseShowWorkList" title=""><i class="fa fa-pencil"></i>开始预习</a></span>
							</div>
						</li>
					</ul>
				</div>
			</div>
		</li>
		<li class="wrongNoteBookSectionList">
			<div class="SectionListTitle">
				<div class="sectionTitle-parent">
					<div class="SectionList-title sectionTitle">
						<i class="sectionTitleIcon fa fa-angle-right ic-blue-bg fff"></i>
						<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第三章</a></span></div>
						<div class="sectionAllSubject">
							<span class="allSubject">共 <span>15</span>题</span>
							<span class="thisGrade">分数：<span>无</span></span>
						</div>
					</div>
					<div class="SectionList-subTitle sectionTitle"><span class="titleTime"><i class="fa fa-clock-o"></i>第三章</span><span class="wrongClick"></span></div>
					<ul class="chapterList">
						<li><b class="chapterIcon ic-blue-bg fff">1</b>001</li>
						<li><b class="chapterIcon ic-blue-bg fff">2</b>002</li>
						<li><b class="chapterIcon ic-blue-bg fff">3</b>003</li>
					</ul>
				</div>
			</div>
		</li>
		<li class="wrongNoteBookSectionList">
			<div class="SectionListTitle">
				<div class="sectionTitle-parent">
					<div class="SectionList-title sectionTitle">
						<i class="sectionTitleIcon fa fa-angle-right ic-blue-bg fff"></i>
						<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第四章</a></span></div>
						<div class="sectionAllSubject">
							<span class="allSubject">共 <span>15</span>题</span>
							<span class="thisGrade">分数：<span>无</span></span>
						</div>
					</div>
					<div class="SectionList-subTitle sectionTitle"><span class="titleTime"><i class="fa fa-clock-o"></i>第四章</span><span class="wrongClick"></span></div>
					<ul class="chapterList">
						<li><b class="chapterIcon ic-blue-bg fff">1</b>001</li>
						<li><b class="chapterIcon ic-blue-bg fff">2</b>002</li>
						<li><b class="chapterIcon ic-blue-bg fff">3</b>003</li>
					</ul>
				</div>
			</div>
		</li>
		<li class="wrongNoteBookSectionList">
			<div class="SectionListTitle">
				<div class="sectionTitle-parent">
					<div class="SectionList-title sectionTitle">
						<i class="sectionTitleIcon fa fa-angle-right ic-blue-bg fff"></i>
						<div class="title-content"><span><a href="/errorsExerciseShowAnalysis">第五章</a></span></div>
						<div class="sectionAllSubject">
							<span class="allSubject">共 <span>15</span>题</span>
							<span class="thisGrade">分数：<span>无</span></span>
						</div>
					</div>
					<div class="SectionList-subTitle sectionTitle"><span class="titleTime"><i class="fa fa-clock-o"></i>第五章</span><span class="wrongClick"></span></div>
					<ul class="chapterList">
						<li><b class="chapterIcon ic-blue-bg fff">1</b>001</li>
						<li><b class="chapterIcon ic-blue-bg fff">2</b>002</li>
						<li><b class="chapterIcon ic-blue-bg fff">3</b>003</li>
					</ul>
				</div>
			</div>
		</li>
	</ul>
</div>

@endsection

@section('JS:OPTIONAL')
<script>
	$(".sectionTitle-parent.active").css({height:($(".sectionTitle-parent .chapterList").height()+80)})
	$(".sectionTitle-parent").on("click",".SectionList-title",function(){
		var thisUl = $(this).parent().find(".chapterList");
		if($(this).parent().hasClass("active")){
			$(this).parent().animate({height:80},300);
			$(this).parent().removeClass('active');
		}else{
			$(this).parent().addClass('active');
			$(this).parent().animate({height:(thisUl.height()+80)},300);
		}
	})
	//开始预习提示框
	$(".wrongClick").click(function(){
		var url = $(this).find(".eoorosExercise").attr("data-href");
		layui.use("layer",function(){
			layer.confirm('确认进入开始预习', {
  				btn: ['答题','取消'] //按钮
			}, function(){
				window.location.href = url;
			}, function(){
				alert(2)
			});
		})
	});
	//查看解析跳转
	$(".title-content span").click(function(e){
		e.stopPropagation();
	})
</script>
@endsection