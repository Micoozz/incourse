@extends('teacher.courseware_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<meta charset="UTF-8">
<link rel="stylesheet" href="{{ asset('css/exercise.css') }}" />
<link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}" />
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
</div>

@endsection

@section('JS:OPTIONAL')
<script src="/js/layui/layui.js"></script>
<script>
	$(function() {
		$(".bind").on("click",function(){
			var data = [];
			var studentId = $(this).attr('data-id')
			$.get("http://127.0.0.1:60003/startreadcardid")
			layui.use('layer',function(){
				layer.open({
				  type: 1,
				  skin: 'layui-layer-rim',
				  area: ['420px', '240px'],
				  content: '<p>学生名：对对对</p><p>卡片id<input id="cardId" disabled><button class="btn" id="getCard">任意点击卡片后再点击获取</button></p><button class="btn" id="submitCardId">确认绑定</button>'
				});
				$("#getCard").on("click",function(){
					$.ajax({
					    url: "http://127.0.0.1:60003/getcardid",
					    type: "GET",
					    dataType: 'json',
					    success: function(result){
					        console.log(result);
							var data = result
							if (data.cardids.length !== 1){
								alert('请点击答题器任意按键，并点击获取')
							} else {
								$('#cardId').val(data.cardids[0])
							}
					    }
					});

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
					    success: function(result){
					    	console.log(result)
					    }
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