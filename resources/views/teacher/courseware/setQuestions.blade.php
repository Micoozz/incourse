@extends('teacher.courseware_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{ asset('css/exercise.css') }}" />
<link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}" />
<style>
	.view .result>div:first-child span {
		cursor: pointer;
	}
	
	.view .result>div:first-child>div>span:nth-of-type(1) {
		display: inline-block;
		width: 25px;
		height: 15px;
		overflow: hidden;
	}
	
	.view .result>div:first-child div {
		padding-left: 10px;
	}
	
	.view .result>div:first-child div .ipho {
		display: block;
		position: relative;
		margin-top: 15px;
		padding-left: 10px;
		line-height: 26px;
	}
	
	.view .result>div:first-child div .ipho:first-child {
		margin-top: 0;
	}
	
	.view .result>div:first-child div .ipho input {
		position: absolute;
		top: 0;
		width: 80%;
		height: 100%;
	}
	
	.view .result>div:first-child>div>span:nth-of-type(1) img {
		position: relative;
		top: -29px;
		left: -15px;
	}
	
	.view .result>div {
		margin-bottom: 20px;
		display: flex;
	}
	
	.view .result>div input,
	.ipho .input {
		border: 0;
		width: 90%;
		outline: none;
		position: relative;
		top: 2px;
	}
	
	.view .result>div:last-child span,
	.ipho {
		width: 132px;
		height: 28px;
		background: #FFFFFF;
		border: 1px solid #333;
		border-radius: 4px;
	}
	
	.view .result>div:last-child .blues,.blues{
		border: 1px solid #168bee;
		box-shadow: 0 0 3px #168bee;
	}
	.borders{
	    margin: 0 auto;
	    border-bottom: 1px solid #d9d9d9;
	    margin-top: 50px;
	    width: 90%;
	}
</style>
@endsection
@section('COURSEWARE_CONTENT')
<div class="row">
		<!--内容主体-->
		<div id="centery" style="width:100%;">
			<div class="clear">
				<!--中间内容-->
				<div class="f-l do-hw">
					<div class="of-h p-r view">
						<div class="result">
							<div>答案：&nbsp;&nbsp;&nbsp;
								<div>
									<div></div>
									<span><img src="/images/uploadExerIcons.png"/></span>
									<span class="ic-blue">添加选项</span>
								</div>
							</div>
							<div>倒计时：&nbsp;&nbsp;
								<span>
		    				<input type="" name="" value="" id="input_number" onpaste="inputOnafterpaste(this)"/>s
		    			</span>
							</div>
						</div>
						<div class="ta-c">
							<a href="/courseWare/answerStartFreedom"><button class="ic-btn">出  题</button></a>
						</div>
					</div>
				</div>
			</div>
		</div>
</div>

@endsection

@section('JS:OPTIONAL')
<script>
	$(function() {
		var strings = 64
		$('.view .result>div:first-child .ic-blue').click(function() {
			$('.view .result>div:first-child>div:first-child>div').append('<span class="ipho">' + String.fromCharCode(++strings) + ':<input type="" name="" id="" value="" /></span>').css('margin-bottom', '20px')
		});
		$('body').on('focus','.view .result>div input, .ipho .input',function(){
			$(this).parent().addClass('blues')
		});
		$('body').on('blur','.view .result>div input, .ipho .input',function(){
			$(this).parent().removeClass('blues')
		});

		$("#input_number").keyup(function(){
			inputOnkeyup(this)
		})
		function inputOnkeyup(obj){
			if($(obj).val().length==1){
				$(obj).val($(obj).val().replace(/[^1-9]/g,''))
			}else{
				$(obj).val($(obj).val().replace(/\D/g,''))
			}
		}
		function inputOnafterpaste(obj){
			if($(obj).val().length==1){
				$(obj).val($(obj).val().replace(/[^1-9]/g,''))
			}else{
				$(obj).val($(obj).val().replace(/\D/g,''))
			}
		}
	})
</script>
@endsection