@extends('student.exerciseBase.wrongNotebook_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" type="text/css" href="{{asset('css/student/errorReports.css')}}" />
<style>
    .error-book-title {
        font-size: 18px;
    }
    .error-book-date {
        margin-left: 15px;
    }
    #wrongTopic {
		width: 90%;
		margin: 35px auto;
		font-size: 14px;
		padding-bottom: 10px;
	}
	.view-resolution {
		position: absolute;
		right: 50px;
		color: #168BEE;
		cursor: pointer;
	}
	#wrongTopic .proper {
		display: none;
		margin-top: 50px;
	}
	#wrongTopic .btn-center{
		position: relative;
		bottom: -30px;
	}
	.exer-list-ul>li {
	    height: 35px;
	    cursor: pointer;
	}
	.f-l.TOrF_img{
        margin-top: 0;
    }
	.TOrF_img_title{
        margin-left: 10px;
    }
	.right_Img {
	    background-position: -20px -50px;
	}
	.error_Img{
        background-position:-68px -50px;
    }
    .TOrF_img.right_Img.active{
        background-position: -22px -86px;
    }
    .TOrF_img.error_Img.active{
        background-position: -70px -86px;
    }
    .subjectiveA{
        width: 100%;
        min-height: 30px;
        height: auto;
        overflow: hidden;
        line-height: 30px;
    }
    .answer_module{
        width: 450px;
        float: left;
        display: block;
    }
    .answer_module span{
        width: 100%;
        height: 100%;
        display: inline-block;
    }
    .pitchOn {
		color: red;
	}

	sup {
		z-index: 102;
		background-color: #fff;
	}
</style>
@endsection

@section('NOTEBOOK')
<div id="wrongTopic" class="pageType">
	<!--题目类型-->
	@foreach($data as $analysis)
		<div class="questions" data-id="{{$analysis['id']}}">
			<p>
				<span class="blue">（2016 湖南工程）</span>
				<span class="f-r gray">难易程度:
						<span>
							<i class="fa fa-star bj-yellow"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
							<i class="fa fa-star"></i>
						</span>
				</span>
				<div class="clear">
					题目：{!!$analysis['subject']!!}
				</div>

			</p>
			@if($analysis['categroy_id'] == 1 || $analysis['categroy_id'] == 2)
			<!--单选题-->
			<div class="optionse optionse-option">
				@foreach($analysis['options'] as $option)
				<span data-option="{{key($option)}}" data-EN="{{ $abcList[$loop->index] }}"><i class="fa fa-circle-o" data-class="{{ in_array(key($option),$analysis['answer']) ? 'bj-green':(in_array(key($option),$analysis['wrokAnswer'])?'red':'')}}"></i>&nbsp;&nbsp;{{ $abcList[$loop->index] }}：{{$option[key($option)]}}</span>
				@endforeach
			</div>
			@elseif($analysis['categroy_id'] == 3)
			@elseif($analysis['categroy_id'] == 4)
			<!--判断题-->
			<div class="optionse">
				<ul class="exer-list-ul">
                    <li>
                        <span data-answer-num="1" class="f-l TOrF_img right_Img"></span>
                        <span class="TOrF_img_title">正确</span>
                    </li>
                    <li>
                        <span data-answer-num="0" class="f-l TOrF_img error_Img"></span>
                        <span class="TOrF_img_title">错误</span>
                    </li>
                </ul>
			</div>
			@elseif($analysis['categroy_id'] == 5)
			<!--连线题-->
			<div class="optionse"></div>
			@elseif($analysis['categroy_id'] == 6)
			<!--排序题-->
			<div class="optionse">
				@foreach($data[0]['options'] as $option)
				<span class="sortOption" data-sort-option-key="{{key($option)}}"><span>排序{{$abcList[$loop->index]}}</span>：{{$option[key($option)]}}</span>
				@endforeach
			</div>
			@elseif($analysis['categroy_id'] == 7 || $analysis['categroy_id'] == 8)
			<div class="optionse"></div>
			@elseif($analysis['categroy_id'] == 10 || $analysis['categroy_id'] == 11)
			<div class="optionse"></div>
			@endif
		</div>
	@endforeach
	<div class="view-resolution">查看答案 <i class="fa fa-angle-down"></i></div>
	<div class="proper">
		<div>
			<p>
				@if(
					$analysis['categroy_id'] == 1 ||
					$analysis['categroy_id'] == 2 ||
					$analysis['categroy_id'] == 3 ||
					$analysis['categroy_id'] == 6)
					<!--单选题 多选题 填空题 多空题 排序题-->
					正确答案是 <span class="bj-green right_A" data-a="{{json_encode($analysis['answer'],JSON_UNESCAPED_UNICODE)}}">
						@if($analysis['categroy_id'] == 3)
							{{ implode(',',$analysis['answer']) }}
						@endif
					</span>.@if($analysis['categroy_id'] == 6)<br>@endif你的答案是 <span class="student_A" data-s="{{ json_encode($analysis['wrokAnswer'],JSON_UNESCAPED_UNICODE)}}">
						@if($analysis['categroy_id'] == 3)
							{{ implode(',',$analysis['wrokAnswer']) }}
						@endif
					</span>。@if($analysis['categroy_id'] == 6)<br>@endif回答 <span class="answerRight"></span>，作答用时 <span>{{$data[0]['second']}}</span> 秒。
				@elseif($analysis['categroy_id'] == 4)
					<!--判断题-->
					正确答案是 <span class="bj-green right_A" data-p-a="{{$analysis['answer'][0]}}">{{$analysis['answer'][0] == 1?'正确':'错误'}}</span>，你的答案是 <span class="student_A {{ in_array($analysis['wrokAnswer'][0],$analysis['answer'])?'bj-green':'red' }}">{{$analysis['wrokAnswer'][0] == 1?'正确':'错误'}}</span>。回答 <span class="answerRight {{ in_array($analysis['wrokAnswer'][0],$analysis['answer'])?'bj-green':'red' }}">{{ in_array($analysis['wrokAnswer'][0],$analysis['answer'])?'正确':'错误' }}</span>，作答用时 <span>{{$data[0]['second']}}</span> 秒。
				@elseif($analysis['categroy_id'] == 11 || $analysis['categroy_id'] == 10)
					<!-- 主管题 -->
					你的答案是 <span class="student_A">{!!$data[0]['wrokAnswer'][0]!!}</span>。作答用时 <span>{{$data[0]['second']}}</span> 秒。
					<p class="subjectiveA">
						<span class="f-l">批改：</span>
						<span class="answer_module">
							@foreach($data[0]['postil'] as $postil)
							<span>{{$loop->index+1}}、{{$data[0]['postil'][0]}}</span>
							@endforeach
						</span>
					</p>
				@endif
			</p>
			<!-- <p>本题被作答次数261738次 本题正确率:68% 易错项:B</p> -->
		</div>

		<div class="proper_div">
			<p>解析：</p>
			<span>无</span>
			<!-- <span>A项目，成分残缺，“展开”后面缺宾语。应改为“开展了特色鲜明、丰富多彩的活动来传播壮乡文化。”选项有语病病</span>
			<span>B项目，成分累赘，“津津乐道”指很有兴趣地说个不停，喝“谈论”词语重复。应改为“人们谈论着今年年初广西姑娘石房里撞倒老人后积极救治的事迹”。选项有语病。</span>
			<span>C项目，概念误用，“文具”不是提神药物。应改为“一些爱心送考车为考生准备了考试所需要的风油精等提神药品”。选项有语病。</span>
			<span>D项目，选项没有语病。</span>
			<br />
			<span>本题要求选择没有语病的一项。</span>
			<br />
			<span>综上所述，本题答案为D项。</span> -->
		</div>
		<!-- <p>来源：2017年湖南工程学院初中毕业升学考试：第三章病句解析与修改，第四题。</p> -->
	</div>
	<button class="btn-white btn-center" onclick="window.history.go(-1)">返 回</button>
</div>
@endsection

@section('JS:OPTIONAL')
<script src="{{asset('js/index.js')}}" charset="utf-8"></script>
<script>
	$(function() {
		var trues = 1;
		var type = "{{$analysis['categroy_id']}}";
		var answerArr = JSON.parse($(".right_A").attr("data-a")?$(".right_A").attr("data-a"):'[]');
		var studentAnswerArr = JSON.parse($(".student_A").attr("data-s")?$(".student_A").attr("data-s"):'[]');
		var newAnswer = '',newSA = '';
		var isError = false;
		if(type == 1||type == 2){
			var arr = [];
			$(".optionse-option span").each(function(i,item){
				var op = $(item).attr("data-option")
				arr.push(op);
				if(answerArr.indexOf(parseInt(op)) >= 0){
					var EN = $(item).attr("data-EN");
					newAnswer += ',' + EN;
				}
				if(studentAnswerArr.indexOf(op) >= 0){
					var EN = $(item).attr("data-EN");
					newSA += ',' + EN;
				}
			})
			$(".right_A").text(newAnswer.slice(1,newAnswer.length));
			$(".student_A").text(newSA.slice(1,newSA.length))
			for(var j = 0; j < studentAnswerArr.length;j++){
				if(answerArr.indexOf(parseInt(studentAnswerArr[j]))<0){
					isError = true;
				}
			}
		}else if(type == 6){
			var arr = [];
			for(var i = 0;i < answerArr.length; i++){
				$(".sortOption").each(function(j,item){
					var sortO = parseInt($(item).attr("data-sort-option-key"));
					if(sortO == answerArr[i]){
						newAnswer += ','+$(item).find("span").text();
					}
				})
				if(answerArr[i] != studentAnswerArr[i]){
					isError = true;
				}
			}
			for(var i = 0;i < studentAnswerArr.length; i++){
				$(".sortOption").each(function(j,item){
					var sortO = $(item).attr("data-sort-option-key");
					if(sortO == studentAnswerArr[i]){
						newSA += ','+$(item).find("span").text();
					}
				})
			}
			$(".right_A").text(newAnswer.slice(1,newAnswer.length));
			$(".student_A").text(newSA.slice(1,newSA.length))
		}
		if(type == 1||type == 2 || type == 3 || type == 6){
			if(isError){
				$(".answerRight").text("错误").addClass('red');
				$(".student_A").removeClass("bj-green").addClass("red");
			}else{
				$(".answerRight").text("正确").addClass('bj-green');
				$(".student_A").removeClass("red").addClass("bj-green");
			}
		}
		$('.view-resolution').click(function() {
			if(trues == 1) {
				$(this).find('i').attr('class','fa fa-angle-up')
				$('#wrongTopic .proper').show();
				trues = 0
			} else {
				$(this).find('i').attr('class','fa fa-angle-down')
				$('#wrongTopic .proper').hide()
				trues = 1
			}
			if(type == 1 || type == 2){
				$(".optionse").find(".fa").each(function(){
					var cl = $(this).attr("data-class");
					if(cl != ""){
						$(this).removeClass("fa-circle-o").addClass("fa-dot-circle-o "+cl);
					}
				})
			}else if(type == 3){
				$(".questions").find(".blank-item").each(function(i){
					$(this).text(studentAnswerArr[i])
				})
			}else if(type == 4){
				var an = $(".right_A").attr("data-p-a");
				if(an == 1){
					$(".right_Img").addClass("active");
				}else if(an == 0){
					$(".error_Img").addClass("active");
				}
			}
		})

	})
</script>
@endsection