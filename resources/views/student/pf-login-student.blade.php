@extends('extends-main')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/school/step.css" />
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