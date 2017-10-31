@extends('extends-main')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/school/step.css" />
<style type="text/css">
	.addInfo .terrace-form {
		margin-top: 0;
	}
	.myForm table .sexuality>td {
		width: 140px;
	}
	.myForm table .email-box>td {
		text-align: left;
		width: 64px;
		display: inline-block;
		height: 45px;
	}
	.class-box,
	.achieve {
		width: 638px;
		height: 238px;
		background-color: #fff;
		border-radius: 4px;
		position: absolute;
		top: 50%;
		left: 50%;
		margin: -115px 0 0 -300px;
		z-index: 1000;
		display: none;
	}
	.achieve {
		width: auto;
		height: auto;
		padding: 10px;
		background: url("/images/school/right.png") no-repeat;
		background-position: 10px 10px;
		background-size: 15px;
		text-indent: 21px;
		top: 60%;
		left: 80%;
		background-color: #fff;
	}
	.class-box button {
		position: absolute;
		bottom: 0;
		right: 5%;
	}
	.myForm .submit {
		position: absolute;
		left: 45%;
	}
	.myForm table .account td {
		width: 65px;
		text-align: left;
		display: inline-block;
		line-height: 30px;
	}
	.myForm table .account {
		margin-top: 20px;
		display: block;
	}
	.myForm table .account td select {
		outline: none;
		width: 141px;
		height: 28px;
		border: 1px solid #D9D9D9;
		border-radius: 4px;
	}
</style>
@endsection

@section('CLIENT')
	<div class="content">
		<div id="center">
			<div class="container p-r">
				<div class="row">
					<!--左侧栏-->
					<div class="col-xs-12 p-r" id="left"></div>

					<!--内容-->
					<div class="col-xs-12 col-sm-12 addInfo" id="centery">
						<div class="ic-container">
							<div class="step-change-box terrace"></div>

							<form class="myForm terrace-form">
								<table>
									<tr class="account">
										<td>所在班级：</td>
										<td class="p-r">
											<select name="select-class">
												<option value="">选择班级</option>
												@foreach($class_list as $id => $title)
												<option value="{{$id}}">{{$title}}</option>
												@endforeach
											</select>
										</td>
									</tr>
									<tr class="submit">
										<td><button class="ic-btn" type="button">完&nbsp;&nbsp;&nbsp;成</button></td>
									</tr>
									<tr>
										<td>
											<div class="achieve">完善信息成功，请耐心等待页面跳转</div>
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="ic-modal"></div>
@endsection

@section('JS:OPTIONAL')

<script src="/js/school/step.js" charset="utf-8"></script>
<script>
	$(function() {
		setTimeout(function() {
			$('.terrace .step-change>li:first-child,.terrace .step-change>li:nth-of-type(2)>b').hide();
			$('.ic-modal,.head_nav').hide();
			$('.myForm .submit').click(function() {
				data = $(".terrace-form").serializeArray();
				data.push({"name":"_token","value":token});
				$.post('/studentSelectClass',data,function(data){
					data = JSON.parse(data);
					if(data.code == 201){
						return;
					}else if(data.code == 202){

					}else{
						window.location.href = '/learningCenter';
					}
				})
				// $('.ic-modal,.achieve').show()
				// return false
			});
			$('.ic-modal').click(function() {
				$('.ic-modal,.achieve').hide()
			})
		}, 10)
	})
</script>
@endsection