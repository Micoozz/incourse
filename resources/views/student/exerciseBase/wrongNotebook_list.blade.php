@extends('student.exerciseBase.wrongNotebook_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{asset('css/student/wrongNotebook_list.css')}}">
@endsection

@section('NOTEBOOK')
<div class="admin-container exer-room pageType" data-type="4">
	<ul class="wrongNoteBookSectionLists">
		<li class="wrongNoteBookSectionList">
			<div class="SectionListTitle">
				<div class="sectionTitle-parent">
					<div class="SectionList-title sectionTitle">
						<i class="sectionTitleIcon fa fa-angle-right ic-blue-bg fff"></i>
						<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第一章</a></span></div>
						<span class="title-bar">
							<span><b>70%<i></i></b></span>
						</span>
					</div>
					<div class="SectionList-subTitle sectionTitle">
						<span class="titleTime"><i class="fa fa-clock-o"></i>第一章</span>
						<span class="wrongClick ic-blue"><a class="errorsExercise" data-href="/foreExerciseDoWork" title=""><i class="fa fa-pencil"></i>错题练习</a></span>
					</div>
					<ul class="chapterList">
						<li>
							<b class="chapterIcon ic-blue-bg fff">1</b>
							<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第一章第一节</a></span></div>
							<span class="title-bar">
								<span><b>70%<i></i></b></span>
							</span>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第一章第一节</span>
								<span class="wrongClick ic-blue"><a class="errorsExercise" data-href="/foreExerciseDoWork" title=""><i class="fa fa-pencil"></i>错题练习</a></span>
							</div>
							<span class="dowmLine"></span>
						</li>
						<li>
							<b class="chapterIcon ic-blue-bg fff">2</b>
							<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第一章第二节</a></span></div>
							<span class="title-bar">
								<span><b>70%<i></i></b></span>
							</span>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第一章第二节</span>
								<span class="wrongClick ic-blue"><a class="errorsExercise" data-href="/foreExerciseDoWork" title=""><i class="fa fa-pencil"></i>错题练习</a></span>
							</div>
							<span class="dowmLine"></span>
						</li>
						<li>
							<b class="chapterIcon ic-blue-bg fff">3</b>
							<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第一章第三节</a></span></div>
							<span class="title-bar">
								<span><b>70%<i></i></b></span>
							</span>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第一章第三节</span>
								<span class="wrongClick ic-blue"><a class="errorsExercise" data-href="/foreExerciseDoWork" title=""><i class="fa fa-pencil"></i>错题练习</a></span>
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
						<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第二章</a></span></div>
						<span class="title-bar">
							<span><b>70%<i></i></b></span>
						</span>
					</div>
					<div class="SectionList-subTitle sectionTitle">
						<span class="titleTime"><i class="fa fa-clock-o"></i>第二章</span>
						<span class="wrongClick ic-blue"><a class="errorsExercise" data-href="/foreExerciseDoWork" title=""><i class="fa fa-pencil"></i>错题练习</a></span>
					</div>
					<ul class="chapterList">
						<li>
							<b class="chapterIcon ic-blue-bg fff">1</b>
							<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第二章第一节</a></span></div>
							<span class="title-bar">
								<span><b>70%<i></i></b></span>
							</span>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第二章第一节</span>
								<span class="wrongClick ic-blue"><a class="errorsExercise" data-href="/foreExerciseDoWork" title=""><i class="fa fa-pencil"></i>错题练习</a></span>
							</div>
						</li>
						<li>
							<b class="chapterIcon ic-blue-bg fff">2</b>
							<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第二章第二节</a></span></div>
							<span class="title-bar">
								<span><b>70%<i></i></b></span>
							</span>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第二章第二节</span>
								<span class="wrongClick ic-blue"><a class="errorsExercise" data-href="/foreExerciseDoWork" title=""><i class="fa fa-pencil"></i>错题练习</a></span>
							</div>
						</li>
						<li>
							<b class="chapterIcon ic-blue-bg fff">3</b>
							<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第二章第三节</a></span></div>
							<span class="title-bar">
								<span><b>70%<i></i></b></span>
							</span>
							<div class="chapterTitle">
								<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第二章第三节</span>
								<span class="wrongClick ic-blue"><a class="errorsExercise" data-href="/foreExerciseDoWork" title=""><i class="fa fa-pencil"></i>错题练习</a></span>
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
						<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第三章</a></span></div>
						<span class="title-bar">
							<span><b>70%<i></i></b></span>
						</span>
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
						<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第四章</a></span></div>
						<span class="title-bar">
							<span><b>70%<i></i></b></span>
						</span>
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
						<div class="title-content"><span><a href="/errorsExerciseShowWorkList">第五章</a></span></div>
						<span class="title-bar">
							<span><b>70%<i></i></b></span>
						</span>
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
	//错题练习提示框
	$(".wrongClick").click(function(){
		var url = $(this).find(".errorsExercise").attr("data-href");
		layui.use("layer",function(){
			layer.confirm('确认进入错题练习', {
  				btn: ['答题','取消'] //按钮
			}, function(){
				window.location.href = url;
			}, function(){
				console.log("取消")
			});
		})
	});
	//查看解析跳转
	$(".title-content span").click(function(e){
		e.stopPropagation();
	})
</script>
@endsection