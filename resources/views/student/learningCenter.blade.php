<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/bootstrap.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/font-awesome.min.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/incourseReset.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/index.css') }}" />
        <link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/foundClass.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/studentFile.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/student/questionTypes.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/admin/fileCss/communal.css') }}" />
		<link rel="stylesheet" type="text/css" href="{{ asset('css/student/errorReports.css') }}" />
		<link rel="stylesheet" href="{{ asset('css/exercise.css') }}" />
		<!--圆形进度条-->
		<link rel="stylesheet" type="text/css" href="{{ asset('css/progressBar.css') }}" />
		<title>InCourse</title>
		<style>
		.error-answer ul{
			margin-left: 45px;
		}
			.accout {
				padding-top: 100px;
			}
			.accouts{
				padding-top: 45px;
			}
			.questions .options>span{
				display: block;
				margin-top: 10px
			}
			.atitle>p{
				font-size: 16px;
				margin-bottom: 35px;
			}
			.atitle>button{
				margin-left: 45%;
			}

			.consuming {
				text-align: center;
			}
			
			.consuming>div {
				margin-top: 20px;
			}
			
			.consuming>div>span:last-child {
				margin-left: 30px;
			}
			
			.error-answer {
				margin-top: 40px;
			}
			
			.error-answer>ul>li {
				float: left;
				background: #3DBD7D;
				font-family: PingFangSC-Regular;
				font-size: 14px;
				color: #FFFFFF;
				letter-spacing: 0;
				width: 32px;
				height: 32px;
				margin-right: 32px;
				text-align: center;
				line-height: 32px;
				border-radius: 16px;
				cursor: pointer;
				margin-bottom: 10px;
			}

			.error-answer>ul>.bj-img1{
				background: url('{{ asset('images/wei.png')  }}') no-repeat #168bee;
				background-size: 100% 100%;
			}

			.error-answer>ul>.bj-img2{
				background: url('{{ asset('images/pi.png')  }}') no-repeat #3DBD7D;
				background-size: 100% 100%;
			}
			/*这里需要图片*/
			.error-answer>ul>.bj-img3{
				background: url('{{ asset('images/pi.png')  }}') no-repeat #168bee;
				background-size: 100% 100%;
			}
			
			.error-answer>ul>.bj-ff5 {
				background-color: #FF5B5B;
			}
			
			.submits {
				margin-top: 40px;
				text-align: center;
			}
			
			.submits button {
				margin-right: 30px;
				cursor: pointer;
			}
			
/*			.atitle {
				border-bottom: 1px solid #eee;
			}*/
			
			.option .box_hpb {
				height: 144px;
			}
			
			.appear {
				margin-top: 20px;
				display: none;
			}
			.answer-ka {
			    color: #168BEE;
			    border-bottom: 1px solid #eee;
			    padding: 7px 0;
			    margin-bottom: 20px;
			    font-size: 14px;
			}
		</style>
	</head>

	<body>
		<!-- 顶部导航 -->
		<div class="question navbar">@include('student.template.pupilHead')</div>

		<!--创建班级-->
		<div class="found_class question-found_class">@include('student.template.workChoice')</div>

		<div class="content">
			<div id="center">
				<div class="container">
					<div class="row">
						<!--左侧栏-->
						<div class="col-xs-12 pupilleft" id="left">@include('student.template.pupilLeft')</div>
						<!--内容-->
						@if($mod == 'homework')
							@if($func == 'exercise_book')
								@include('student.content.workList')
							@elseif($func == 'routine_work')
								@include('student.content.routineWork')	
							@elseif($func == 'work_score')
								@include('student.content.workScore')
							@elseif($func == 'error_reports')
								@include('student.content.errorReports')
							@elseif($func == 'answer_sheet')
								@include('student.content.errorParsing')	
							@elseif($func == 'work_tutorship')
								@include('student.content.workTutorship')			
							@endif
						@endif	
						<!--右侧栏-->
						<div class="col-xs-12 left">@include('student.template.right_notice')</div>
						<!-- 聊天窗口 -->
						<div class="chatRoom"></div>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="{{ asset('js/jquery-1.12.4.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/student/fileSelectionone.js') }}"></script>
		<script type="text/javascript" src="{{ asset('js/exercise.js') }}" charset="utf-8"></script>
		<script>
			var token = "{{csrf_token()}}";
			var func = "{{ isset($func) ? $func : ''}}";
			var accuracy = "{{ isset($accuracy) ? $accuracy * 100 : '' }}";
			var parameter = "{{ isset($parameter) ? $parameter : '' }}";
			var courseFirst = "{{ isset($courseFirst) ? $courseFirst[0]['id'] : '' }}";
			$(function() {
				setTimeout(function() {
					//圆形进度条
					var percentum = accuracy; //正确率百分比
					var percentums = percentum * 6.29 //进度条百分比
					$(function() {
						$('.progressbar>li').find('svg:last-child').find('path').attr('stroke-dashoffset', percentums)
						$('.progressbar>li:last-child>b:last-child').text(percentum + '%')
					})
				}, 10)

				//举报
				$('body').click(function() {
					$('.report').removeClass('red')
					$('.reprot-a').hide()
				})
				$('body').on('click', '.report', function() {
					$(this).addClass('red')
					$('.reprot-a').show()
					return false
				});
				$('.bad-information li').click(function() {
					if($(this).find('i').attr('class') != 'fa fa-dot-circle-o blue') {
						$(this).find('i').attr('class', 'fa fa-dot-circle-o blue')
					} else {
						$(this).find('i').attr('class', 'fa fa-circle-o')
					}

				})
				$('.bad-information li:last-child').prev().click(function() {
					if($(this).find('i').attr('class') == 'fa fa-circle-o') {
						$(this).next().hide()
					} else {
						$(this).next().show()
					}
				});
				$('.reprot-a>span:last-child').click(function() {
					$('.bad-information').show()
					$('.shad').height(window.innerHeight).show()
				});
				$('.shad,.bad-information button').click(function() {
					$('.bad-information,.shad').hide();
				});

				//举报提交
				$('.bad-information button').click(function() {

				})

				//上传文件
				$('#file').change(function() {
					input = $(this)[0];
					if(!input['value'].match(/.jpg|.gif|.png|.bmp/i)) { //判断上传文件格式
						return alert("上传的图片格式不正确，请重新选择");
					}
					var reader = new FileReader();
					reader.readAsDataURL(this.files[0]);
					reader.onload = function(e) {
						$('.imgse').append('<img src="' + this.result + '" style="width:70px";height:70px/>')
					};
				});

				//评论
				$('.comment>input').focus(function() {
					$('.appear').show();
				});

				$('.comment>input').blur(function() {
					$('.appear').hide();
				});

				//提交评论
				$('.appear').click(function() {

				})
			})
			var user_answer = "{{ isset($data['exercises'][0]['answer'][0]['user_answer']['answer']) ? implode(',',$data['exercises'][0]['answer'][0]['user_answer']['answer']) : '' }}";
			var exercise_id = "{{ isset($data['exercises'][0]['id']) ? $data['exercises'][0]['id'] : '' }}";
	        var exercise_length = $('.question_hpb').children('li').length;
	        var answer = [{
            "left": 1,
            "right": 2
        	},
            {
                "left": 2,
                "right": 1
            },
            {
                "left": 3,
                "right": 4
            },
            {
                "left": 4,
                "right": 3
            },
        ];
        //错题解析key转ABC
        var standardAnswerArr = [],errorAnswerArr = [];
        var standardArr=eval("("+$(".standardAnswer").find(".standardAnswerSpan").attr("data-standardAnswer")+")");
        var errorArr = eval("("+$(".standardAnswer").find(".errordAnswerSpan").attr("data-errorAnswer")+")")
        $(".optionSpan").each(function(i,id){
	        for(var k = 0;k<errorArr.length;k++){
	        	if($(id).find("i.fa").attr("data-id") == errorArr[k]){
	        		$(id).find("i.fa").addClass("color_error").removeClass("fa-circle-o").addClass("fa-dot-circle-o");
	        		errorAnswerArr.push($(id).find("answer").text())
	        	}
	        }
	        $(".standardAnswer").find(".errordAnswerSpan").text(errorAnswerArr);
        	for(var j=0;j<standardArr.length;j++){
        		if(parseInt($(id).find("i.fa").attr("data-id")) == standardArr[j]){
        			$(id).find("i.fa").removeClass("color_error fa-circle-o").addClass("color_right fa-dot-circle-o");
	        		standardAnswerArr.push($(id).find("answer").text())
	        	}
        	}
	        $(".standardAnswer").find(".standardAnswerSpan").text(standardAnswerArr);
        })

        //分数提升
    	var redSpan='';
		$(".answerCard ul .bj-ff5").each(function(i){
			redSpan += "&" + $(this).text();
		})
		var newSpan = redSpan.substr(1,redSpan.length-1);
        $(".error-exercise").on("click",function(){
        	var tutorship = $(this).attr('error-exercise');
        	window.location.href = "/homotypology/" + tutorship + "/" + parameter + "/" +  accuracy + "/" + newSpan;
        })
        function sameSort(a,b,c,d){
        	$(a).each(function(i,answer){
				$(b).each(function(j,sameType){
					if($(answer).attr(c)==$(sameType).attr(d)){
						$(sameType).text($(answer).text());
					} 
				})
			})
        }
		sameSort(".answerCard ul .bj-ff5",".sameTypeJob ul .bj-ff5","exe-id","parent-id");
		sameSort(".answerSheets .bj-ff5",".homotypology .bj-ff5","exe-id","parent-id");
		$('.answerCard ul li,.error-answer ul li').click(function(){
			if($(this).attr('class')=='bj-ff5'){
					localStorage.arry=$(this).text()
			}
		});

		$('.submits button:nth-of-type(2)').click(function(){
				var array=[];
		$('.answerCard ul li,.error-answer ul li').each(function(){
			if($(this).attr('class')=='bj-ff5'){
					array.push($(this).text())
			}else{
				$(this).css('cursor','auto')
			}
		})
			localStorage.arry=array[0]				
		})
		if(localStorage.arry!=undefined){
			$('.bj-gray .blue').text(localStorage.arry)	
		}
				$('.answerCard ul li,.error-answer ul li').each(function(){
					if($(this).attr('class')!='bj-ff5'){
						$(this).css('cursor','auto')
					}
		})

				if($('.proper>div:nth-of-type(3) .red').attr('exercise-id')=='3'){

			for(var i=0;i<$('.proper>div:nth-of-type(3) .red b').text().split(',').length;i++){
				$('.proper>div:nth-of-type(3) .red').append('<span>'+$('.proper>div:nth-of-type(3) .red b').text().split(',')[i]+',</span>');	
			}
			$('.proper>div:nth-of-type(3) .red b').remove();

			for(var i=0;i<$('.proper>div:nth-of-type(3) .red span').length;i++){
					if($('.proper>div:nth-of-type(3) .red span').eq(i).text().replace(/\s|,/g,'')==$('.proper>div:nth-of-type(3) .exactitude').text().split(',')[i].replace(/\s|,/g,'')){
						$('.proper>div:nth-of-type(3) .red span').eq(i).css('color','#168bee')
					}
			}
			
			$('.questions .question-option .blank-item').each(function(i){
				$(this).text($('.proper>div:nth-of-type(3) .red').text().split(',')[i])
				if($(this).text().replace(/\s/g,'')!=$('.proper>div:nth-of-type(3) .exactitude').text().split(',')[i].replace(/\s/g,'')){
					console.log($('.proper>div:nth-of-type(3) .exactitude').text().split(',')[i])
					$(this).css('color','red')
				}
			});
			console.log('a')
			$('.proper>div:nth-of-type(3) .red span:last-child').text($('.proper>div:nth-of-type(3) .red span:last-child').text().substr(0,$('.proper>div:nth-of-type(3) .red span:last-child').text().length-1));
		}

		//显示所有的	
		//跳转到同类型习题页面
		var sessionStorageJson=JSON.parse(window.sessionStorage.getItem("skip"));
		console.log(sessionStorageJson);
		if (func == "work_tutorship") {
			var sameSkip = $(".submits").attr("error-exercise");
			if(!sessionStorageJson){
				var json = {
					'score':accuracy,
					'sameSkip':sameSkip
				}
				sessionStorage.setItem("skip",JSON.stringify(json))
			}
		}
		
		$("#sameSkip").on("click",function(){
			if(sessionStorageJson == null){
				window.location.href = '/learningCenter/' + courseFirst + '/homework/' + '/work_score/' + parameter;
			}else{
				window.location.href='/learningCenter/' + courseFirst + '/homework/work_tutorship/' + parameter + '/' + sessionStorageJson.score + '/' + sessionStorageJson.sameSkip;
			}	
		});
		
		</script>
	</body>

</html>