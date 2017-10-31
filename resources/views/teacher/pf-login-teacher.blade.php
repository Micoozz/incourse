@extends('extends-main')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/school/step.css" />
<style>
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
	.myForm table .account .p-r {
		width: 115px;
	}
	.class-box,
	.achieve {
		width: 480px;
		height: 238px;
		background-color: #fff;
		border-radius: 4px;
		position: absolute;
		top: 50%;
		left: 50%;
		margin: -115px 0 0 -240px;
		z-index: 1000;
		display: none;
	}
	.class-box>div {
		height: 30%;
		text-align: left;
	}
	.class-box>div:first-child {
		width: 29px;
		overflow: hidden;
		height: 15%;
		float: right;
		margin-right: 10px;
		position: relative;
	}
	.class-box>div:first-child>img {
		margin-left: -107px;
		margin-top: 5px;
		cursor: pointer;
	}
	.class-box>div:nth-of-type(2) {
		margin-left: 60px;
		margin-top: 45px;
		background: url("/images/232029369033102916.png") no-repeat;
		background-size: 22px;
		text-indent: 35px;
	}
	.class-box>div:nth-of-type(3) {
		border-top: 1px solid #D9D9D9;
		margin-left: 40px;
		width: 75%;
		padding-top: 20px;
		margin-top: 30px;
	}
	.class-box>div:nth-of-type(3)>div:last-child {
		font-size: 12px;
		color: #ccc;
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
	.myForm table .account td select,
	.myForm table .account td input {
		outline: none;
		width: 100%;
		height: 28px;
		border: 1px solid #D9D9D9;
		border-radius: 4px;
	}
	/*键盘*/
	.keyset>div>div>span {
		display: inline-block;
		text-align: center;
		font-size: 1em;
		line-height: 2.5em;
		min-width: 1em;
		padding: 0 1em;
		margin: 0 0.1em 0.4em 0.1em;
		border: 1px solid #aaa;
		border-radius: 5px;
		cursor: pointer;
	}
	.keyset>div>div>span:hover {
		outline: none;
		background-color: #fff;
		border-color: #168bee;
		color: #168bee;
		box-shadow: 0 0 4px #168bee;
	}
	.myForm table .account .keyset {
		width: 535px;
		background-color: #fff;
		display: none;
		margin-top: 20px;
	}
	.myForm table .add td {
		text-align: left!important;
		text-indent: 35px;
	}
	.myForm table .add td i{
		cursor: pointer;
	}
	.input-box input {
		width: 90px!important;
	}
	.myForm table .account .remove {
		width: 27px;
		overflow: hidden;
		margin-left: 43px;
		cursor: pointer;
		height: 28px;
	}
	.myForm table .account:first-child .remove {
		display: none;
	}
	.myForm .remove img {
		margin-left: -65px;
		margin-top: -48px;
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
										<td class="p-r input-box">
											<input type="" name="create-class" id="" value="" readonly="readonly" /><i class="fa fa-keyboard-o" style="position: absolute;margin: 8px -20px"></i>&nbsp;班
										</td>
										<td class="p-r">
											<select name="select-class">
												<option value="">选择班级</option>
												@foreach($class_list as $id => $title)
												<option value="{{$id}}">{{$title}}</option>
												@endforeach
											</select>
										</td>
										<td class="p-r">
											<select name="select-course">
												<option value="">选择科目</option>
												@foreach($course_list as $id => $title)
												<option value="{{$id}}">{{$title}}</option>
												@endforeach
											</select>
										</td>
										<td class="remove">
											<img src="/images/uploadExerIcons.png" />
										</td>
										<td class="keyset">
											<!--键盘-->
											<div>
												<div>

												</div>
												<div>

												</div>
											</div>
										</td>
									</tr>
									<tr class="add">
										<td class="blue">
											<i class="fa fa-plus-circle">&nbsp;&nbsp;继续添加</i>
										</td>
									</tr>
									<tr class="submit">
										<td><button class="ic-btn" type="button">完&nbsp;&nbsp;&nbsp;成</button></td>
									</tr>
									<tr>
										<td>
											<div class="class-box">
												<div><img src="/images/common_icon.png" /></div>
												<div>
													<h5 style="line-height: 21px;">已有教师选择该科目</h5>
													<p>如需调整，请直接联系某某某教师。</p>
												</div>
												<div>
													<p>联系不到教师？</p>
													<div>若联系不到该教师，请联系公司客服电话：74598756776</div>
												</div>
											</div>
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
<script src="/js/load1.js" charset="utf-8"></script>
<script src="/js/school/step.js" charset="utf-8"></script>
<script>
	$(function() {
		setTimeout(function() {
			$('.terrace .step-change>li:first-child,.terrace .step-change>li:nth-of-type(2)>b').hide();
			$('.ic-modal,.head_nav').hide();
			$('.myForm .submit').click(function() {
				data = $(".terrace-form").serializeArray();
				data.push({"name":"grade_id","value":{{$grade_id}}},{"name":"_token","value":token});
				$.post('/teacherBindClass',data,function(data){
					data = JSON.parse(data);
					if(data.code == 201){
						$('.ic-modal,.class-box').show()
					}else if(data.code == 202){

					}else{
						window.location.href = '/teachingCenter';
					}
				})
				// $('.ic-modal,.class-box').show()
			});
			$('.ic-modal,.class-box>div:first-child').click(function() {
				$('.ic-modal,.class-box').hide()
			})
		}, 10)

		//继续添加
		$('body').on('click', '.myForm table .add', function() {
			$(this).before('<tr class="account">' + $(this).prev().html() + '</tr>');
			$('.keyset').hide();
		});
		$('body').on('click', '.myForm table .account .remove', function() {
			$(this).parents('tr').remove();
		})
	});

	//键盘
	var pd = true
	$('body').on('click', '.input-box i,.input-box input', function() {
		if(pd) {
			$(this).parents('tr').find('.keyset').show();
			pd = false
		} else {
			$(this).parents('tr').find('.keyset').hide();
			pd = true
		}

	});
	var input = [1, 2, 3, 4, 5, 6, 7, 8, 9, 0];
	var keyset = ['A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', '<span style="padding:0 10px">Delete</span>'];
	$(function() {
		for(var i = 0; i < input.length; i++) {
			$('.keyset>div>div:first-child').append('<span>' + input[i] + '</span>');
		};
		for(var i = 0; i < keyset.length; i++) {
			$('.keyset>div>div:last-child').append('<span>' + keyset[i] + '</span>');
		}
		var arry = [];
		$('body').on('click', '.keyset>div>div>span', function() {

			if($(this).parents('tr').find('.input-box>input').val() == '' || $(this).parents('tr').find('.input-box>input').val().length == 1) {
				arry = $(this).parents('tr').find('.input-box>input').val().split('')
			}
			if($(this).parents('tr').find('.input-box>input').val().length < 2) {
				arry.push($(this).text());
			}
			if($(this).text() != 'Delete') {
				console.log(arry)
				$(this).parents('tr').find('.input-box>input').val(arry.join(''))
			} else {
				$(this).parents('tr').find('.input-box>input').val($(this).parents('tr').find('.input-box>input').val().substring(0, $(this).parents('tr').find('.input-box>input').val().length - 1))
			}
		});
	})
</script>
@endsection