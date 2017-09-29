
<div class="col-xs-12 col-sm-12" id='{{ isset($mod) ? "centery" : "" }}' >
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">作业报告</span>
		<span class="col-xs-3 col-sm-3 add"></span>
	</div>
	<div class="ic-container accout">
		<div class="progresse">@include("student.template.progressBar")</div>
		<div class="consuming">
			总耗时：{{ date('i分s秒',$entire) }}
		</div>
		<div class="error-answer">
			<p>答题卡：</p>
			<ul>
				@foreach($data as $key => $status)
				<li onclick="window.location.href = '/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/error_reports/{{ $parameter }}/{{ $status['exe_id'] }}/{{ $key+1 }}'" @if($status['id'] == 1) @elseif($status['id'] == 2)  class="bj-ff5"  @else class="bj-img1" @endif >{{ $several[$key] }}</li>
				@endforeach
			</ul>
		</div>
		<div class="clear"></div>
		<div class="submits" error-exercise="{{ $sameSkip }}">
			<button class=".btn-white" onclick="window.location.href = '/learningCenter/{{ $courseFirst[0]['id'] }}/homework/work_score/{{ $parameter }}'" >提交</button>
			@if(!$sameErrorScore == 0)
				<button class="ic-btn" onclick="window.location.href='/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/error_reports/{{ $parameter }}/errorExercise'">错题解析</button>
			@endif
		</div>
	</div>
</div>