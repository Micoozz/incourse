<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title></title>
<style type="text/css">
	label{
		width: 240px;
		display: block;
		float: left;
	}
	select{
		width:200px;
		display: inline-block;
	}
	input{
		width:200px;
		display: inline-block;
		box-sizing: border-box;
	}
</style>
</head>
<body>
		<label>
			<select class="c-sel" name="c-sel">
				@foreach($course as $key => $value)
				<option class="c-opt" value="{{$key}}">{{$value}}</option>
				@endforeach
			</select>
			<a href="javascript:void(0)" class="ct-btn" onclick="javascript:create('c',$(this))">新增</a>
		</label>
		<label>
			<select class="sel" name="v-sel">
				<option value="">选择教材</option>
				@foreach($version as $key => $value)
				<option class="opt" value="{{$key}}">{{$value}}</option>
				@endforeach
			</select>
			<a href="javascript:void(0)" class="ct-btn" onclick="javascript:create('v',$(this))">新增</a>
		</label>
		<label>
			<select class="sel" name="g-sel">
				<option value="">选择年级</option>
			</select>
			<a href="javascript:void(0)" class="ct-btn" onclick="javascript:create('g',$(this))">新增</a>
		</label>
		<label>
			<select class="sel" name="u-sel">
				<option value="">选择单元</option>
			</select>
			<a href="javascript:void(0)" class="ct-btn" onclick="javascript:create('u',$(this))">新增</a>
		</label>
		<label>
			<select class="sel" name="s-sel">
				<option value="">选择小节</option>
			</select>
			<a href="javascript:void(0)" class="ct-btn" onclick="javascript:create('s',$(this))">新增</a>
		</label>
		<div><button style="margin-left: 20%;" onclick="submit()" type="button">提交</button></div>
</body>
<script src="/js/jquery-1.12.4.min.js" charset="utf-8"></script>
<script type="text/javascript">
	$(".sel").on('change',function(){
		var t = $(this);
		t.parent().nextAll().children(".sel").children('.opt').remove();
		$.get('/getChapter/' + $(".c-sel").val() + "/" + t.val(),function(data){
			data = JSON.parse(data);
			for(var i in data){
				t.parent().next().children(".sel").append("<option class='opt' value='" + i + "'>" + data[i] + "</option>");
			}
		})
	})
	function create(input_name,btn){
		btn.parent().append("<input type='text' name=" + input_name + ">");
	}
	function submit(){

		$.post('/createChapter',{'sel':$("select").serializeArray(),'input':$('input').serializeArray(),'_token':"{{csrf_token()}}"},function(data){
			window.location.reload();
		})
	}
</script>
</html>