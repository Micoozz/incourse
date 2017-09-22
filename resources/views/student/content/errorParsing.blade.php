<div class="col-xs-12 col-sm-12" id="centery">
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">错题解析</span>
		<span class="col-xs-3 col-sm-3 add"></span>
	</div>
	<div class="ic-container accouts">
		<div class="error-answer">
			<p class="answer-ka"><i class="fa fa-file-text"></i>&nbsp;&nbsp;答题卡</p>
			<ul>
				@foreach($data as $errorWork)
				<li class="bj-ff5" onclick="window.location.href='/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/4/{{ $parameter }}/{{ $errorWork->exe_id }}/{{ $loop->index +1 }}'" >{{ $loop->index +1 }}</li>
				@endforeach
			</ul>
		</div>
		<div class="clear"></div>
		<div class="submits">
			<button class="btn-white" onclick="window.history.go(-1);" >返回</button>
		</div>
	</div>
</div>