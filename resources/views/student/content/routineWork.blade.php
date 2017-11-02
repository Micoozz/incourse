<div class="col-xs-12 col-sm-12" id='{{ isset($mod) ? "centery" : "" }}' >
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">第一章：字音解析</span>
		<span class="col-xs-3 col-sm-3 add"></span>
	</div>
	<div class="ic-container accout">
		<div class="atitle" style='{{ isset($mod) ? "" : "position:relative; left:150px;" }}'>
			<p><span>作业标题：</span><span>{{ $data['work']->title }}</span></p>
			<p><span>截止时间：</span><span>{{ date('m月d日 h:i',$data['work']->deadline) }}</span></p>
			<p><span>常规作业：</span><span>{!! $data['work']->content !!}</span></p>
			<p><span>习题练习：</span><span>共{{ $data['count'] }}小题</span></p>
			<button class="ic-btn" onclick="window.location.href='/doHomework/{{ $parameter }}'" style='{{ isset($mod) ? "" : "position:relative; left:-150px;" }}'>开始做题</button>
		</div>
	</div>
</div>
<script>
	var skip = sessionStorage.getItem("skip");
	sessionStorage.clear();
	if(skip){
		sessionStorage.setItem("skip",skip);
	}
</script>