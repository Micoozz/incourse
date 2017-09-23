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
			}

			.error-answer>ul>.bj-img1{
				background: url('{{ asset('images/wei.png')  }}') no-repeat #168bee;
				background-size: 100% 100%;
			}

			.error-answer>ul>.bj-img2{
				background: url('{{ asset('images/pi.png')  }}') no-repeat #3DBD7D;
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
				margin-right: 10px;
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
			.answer-ka{
				color: #168BEE;
				border-bottom: 1px solid #eee;
				padding: 20px 0 10px 0;
				margin-bottom: 20px;
				text-indent: 20px;
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
							@elseif($func == 'answer_sheet' || $func == 7)
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
			var accuracy = "{{ isset($accuracy) ? $accuracy * 100 : '' }}";
			var deviationScore = "{{ isset($deviationScore) ? $deviationScore * 100 : '' }}";
			//console.log(accuracy)
			$(function() {
				setTimeout(function() {
					/*$('.question-found_class li').removeClass('first');
					$('.question-found_class li:nth-of-type(1) sup').hide();
					$('.question-found_class li:nth-of-type(2)').addClass('first');*/

					//圆形进度条
					var percentum = accuracy; //正确率百分比
					var percentums = percentum * 6.29 //进度条百分比
					if(accuracy.length>3){
						$('.progressbar>li:nth-of-type(2)').css('left','80px')
					}else{
						$('.progressbar>li:nth-of-type(2)').css('left','127px')
					}
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

        //同类行 题型
        /*$('#tutorship').on('click',function(){
        	var data;
        	var tutorship = $(this).attr('data-id');
        	data = {"data":tutorship,"_token":token};
        	console.log(data);
        	$.post("/doHomework",data,function(data){
        			$("html").html(data);
        	});
        });*/
       /* $("#tutorship").on('click',function(){
        	var data = []
        	var tutorship = $(this).attr('data-id');
        	data.push({'name':'tutorship','value':tutorship});
        	data.push({'name':'_token','value':token});
        	data.push({'name':'work_id','value':parameter});
        	$.post('/homotypology',data,function(result){

        	})
        });*/
		</script>
	</body>

</html>