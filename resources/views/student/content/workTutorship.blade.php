
<div class="col-xs-12 col-sm-12" id='{{ isset($mod) ? "centery" : "" }}' >
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">作业报告</span>
		<span class="col-xs-3 col-sm-3 add"></span>
	</div>
	<div class="ic-container accout">
		<div class="progresse"><canvas id="canvas" width="400px" height="400px"></canvas></div>
		<div class="consuming">
			总耗时：{{ $entire }}
		</div>
		<div class="error-answer">
			<p>答题卡：</p>
			<ul>
				@foreach($data as $key => $status)
				<li exe-id="{{ $status['exe_id'] }}" onclick="window.location.href = '/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/error_reports/{{ $parameter }}/{{ $status['exe_id'] }}/{{ $key+1 }}'" @if($status['id'] == 1) class="bj-ff5-same" @elseif($status['id'] == 2)  class="bj-ff5 bj-ff5-same"  @else class="bj-img1 bj-ff5-same" @endif >{{ $several[$key] }}</li>
				@endforeach
			</ul>
		</div>
		<div class="clear"></div>
		<div class="submits" error-exercise="{{ $sameSkip }}">
			<button class="btn-white" id="clearSkip">提交</button>
			@if(!$sameErrorScore == 0)
				<button class="ic-btn" id="same-parsing">错题解析</button>
			@endif
		</div>
	</div>
</div>