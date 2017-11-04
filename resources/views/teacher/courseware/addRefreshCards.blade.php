@extends('teacher.courseware_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<meta charset="UTF-8">
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
	<table class="table">
		<thead>
			<tr>
				<th>学生</th>
				<th>cardID</th>
				<th>操作</th>
			</tr>
		</thead>
		<tbody>
		@foreach($students as $student)
			<tr>
				<td>{{ $student->name }}</td>
				<td>{{ $student->scantron_id　? $student->scantron_id : '--' }}</td>
				<td><button class="btn-width border bind" data-id="{{ $student->id }}">绑定</button><button class="btn-width border">删除</button></td>
			</tr>
		@endforeach
		</tbody>
	</table>
	<!-- <label><span>学生：</span><input type="text" name="" id="addStudentId"  placeholder="" value=""></label> -->
</div>

@endsection

@section('JS:OPTIONAL')
<script src="/js/layui/layui.js"></script>
<script>
	$(function() {
		$(".bind").on("click",function(){
			var data = [];
			var studentId = $(this).attr('data-id')
			$.ajax({
			    url: "http://127.0.0.1:60003/startreadcardid",
			    type: "GET",
			    dataType: 'JSONP',
			    success: function(result){
			        data = result;
			    }
			});
			layui.use('layer',function(){
				layer.open({
				  type: 1,
				  skin: 'layui-layer-rim', //加上边框
				  area: ['420px', '240px'], //宽高
				  content: '<p>学生名：对对对</p><p>卡片id<input id="cardId" disabled><button class="btn" id="getCard">任意点击卡片后再点击获取</button></p><button class="btn" id="submitCardId">确认绑定</button>'
				});
				$("#getCard").on("click",function(){
					// $.ajax({
					//     url: "http://127.0.0.1:60003/getcardid",
					//     type: "GET",
					//     dataType: 'JSONP',
					//     success: function(result){
					//         console.log(result);
					//     }
					// });
					var fakeData = {"cardids":["2870130888"],"dev_state":0}
					var data = fakeData
					if (data.cardids.length === 0){
						alert('请点击答题器任意按键，并点击获取')
					} else {
						$('#cardId').val(data.cardids[0])
					}

				})
				$('#submitCardId').click(function () {
					var cardId = $('#cardId').val()
					if (!cardId) {
						alert('请点击答题器任意按键，并点击获取')
						return
					}
					$.ajax({
					    url: "http://127.0.0.1:60003/stopreadcardid",
					    type: "GET",
					    dataType: 'JSONP',
					    success: function(result){}
					});
					$.ajax({
					    url: "/courseWare/addRefreshCards/bindCardId/" + studentId + "/" + cardId,
					    type: "POST",
					    data: {
					    	_token: token
					    },
					    success: function(result){
					        console.log(result);
					        $.ajax({
							    url: "http://127.0.0.1:60003/refreshcards",
							    type: "GET",
							    dataType: 'JSONP',
							    success: function(result){}
							});
					        layer.closeAll();
					    }
					});
				})
			})
		})
	})
</script>
@endsection