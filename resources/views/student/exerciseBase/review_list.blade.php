@extends('student.exerciseBase.wrongNotebook_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{asset('css/student/wrongNotebook_list.css')}}">
@endsection

@section('NOTEBOOK')
<div class="admin-container exer-room pageType" >
	@if(empty($data))
	<div>没有数据</div>
	@else
		<ul class="wrongNoteBookSectionLists">
			@foreach($data as $chapter)
			<li class="wrongNoteBookSectionList" data-id="{{$chapter['id']}}">
				<div class="SectionListTitle" style="{{ count($data) <=1?'border-bottom:none;':'' }}">
					<div class="sectionTitle-parent">
						<div class="SectionList-title sectionTitle">
							<i class="sectionTitleIcon fa fa-angle-right ic-blue-bg fff"></i>
							<div class="title-content"><span>
								<a href="/chapterErrorExercise/{{ $type_id }}/{{ $courseFirst[0]['id'] }}/{{ $chapter['id'] }}/1">{{ $chapter['title'] }} @if($type_id != 3)<small class="finishWorks">(已做题&nbsp;{{ $chapter['count'] }}&nbsp;题)</small>@endif</a>
							</span></div>
							@if($type_id == 3)
							<span class="title-bar">
								<span style="width:{{($chapter['exeCount']/$chapter['count']*100) == 0?'5':$chapter['exeCount']/$chapter['count']*100}}%"><b>{{$chapter['exeCount']/$chapter['count']*100}}%<i></i></b></span>
							</span>
							@else
							<div class="sectionAllSubject">
								<span class="allSubject">共<span>{{ $chapter['count'] }}</span>题</span>
								<span class="thisGrade">分数：<span>无</span></span>
							</div>
							@endif
						</div>
						<div class="SectionList-subTitle sectionTitle">
							<span class="titleTime"><i class="fa fa-clock-o"></i>第一章</span>
							<span class="wrongClick ic-blue">
								<a class="eoorosExercise" data-href="/practice/{{$courseFirst[0]['id']}}/{{$chapter['id']}}/{{$type_id}}/1" title=""><i class="fa fa-pencil"></i><span>@if($type_id != 3)开始做题 @else错题练习 @endif</span></a>
							</span>
						</div>
						<ul class="chapterList">
							@foreach($chapter['minutia'] as $key=>$minutia)
							<li data-son-id="{{$minutia['id']}}">
								<b class="chapterIcon ic-blue-bg fff">{{$loop->iteration}}</b>
								<div class="title-content"><span><a href="/chapterErrorExercise/{{ $type_id }}/{{ $courseFirst[0]['id'] }}/{{ $minutia['id'] }}">{{ $minutia['title'] }} @if($type_id != 3)<small class="finishWorks">(已做题&nbsp;{{ $minutia['count'] }}&nbsp;题)</small>@endif</a></span></div>
								@if($type_id == 3)
								<span class="title-bar">
									<span style="width:{{($minutia['exeCount']/$chapter['count']*100) == 0?'5':$minutia['exeCount']/$minutia['count']*100}}%"><b>{{$minutia['exeCount']/$minutia['count']*100}}%<i></i></b></span>
								</span>
								@else
								<div class="sectionAllSubject">
									<span class="allSubject">共 <span>{{ $minutia['count'] }}</span>题</span>
									<span class="thisGrade">分数：<span>无</span></span>
								</div>
								@endif
								<div class="chapterTitle">
									<span class="chapterTitleTime titleTime"><i class="fa fa-clock-o"></i>第一章第一节</span>
									<span class="wrongClick ic-blue">
										<a class="eoorosExercise" data-href="/practice/{{ $courseFirst[0]['id'] }}/{{ $minutia['id'] }}/{{ $type_id }}" title=""><i class="fa fa-pencil"></i><span>@if($type_id != 3)开始做题 @else错题练习 @endif</span></a>
									</span>
								</div>
								<span class="dowmLine" style="{{  $loop->iteration==count($chapter['minutia'])?'display:none;':'' }}"></span>
							</li>
							@endforeach
						</ul>
					</div>
				</div>
			</li>
			@endforeach
		</ul>
	@endif
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