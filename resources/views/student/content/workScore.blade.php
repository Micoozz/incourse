<div class="col-xs-12 col-sm-12" id='{{ isset($mod) ? "centery" : "" }}' >
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">作业报告</span>
		<span class="col-xs-3 col-sm-3 add"></span>
	</div>
	<div class="ic-container accout">
		<div class="atitle" style='{{ isset($mod) ? "" : "position:relative; left:150px;" }}'>
			<p><span>作业标题：</span><span>{{ $data['work']->title }}作业</span></p>
			<p><span>截止时间：</span><span>{{ date('m月d日 H:i',$data['work']->deadline) }}</span></p>
			<p><span>常规作业：</span><span id="total">{{ $data['work']->content }}</span></p>
			<p><span>习题练习：</span><span>共{{ $data['count'] }}小题</span></p>
			<p><span>交卷时间：</span><span>{{ date('m月d日 H:i',$data['sub_time']) }}</span></p>
		</div>
		<div class="progresse">@include("student.template.progressBar")</div>
		<div class="consuming">
			总耗时：{{ $data['exeSecond'] }}
			<div>
				<span>正确：{{ $data['objectiveCount'] + $data['sameCount'] }}题</span>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span>错误：{{ $data['objectiveErrorCount'] + $data['sameErrorScore'] }}题</span>
				<span>未批改：{{ $data['modifyCount'] }}题</span>
			</div>
		</div>
		<div class="error-answer answerCard">
			<p>答题卡：</p>
			<ul>
				@foreach($data['status'] as $key => $status)
					<li exe-id="{{ $status['exe_id'] }}" @if($status['id'] != 6) onclick="window.location.href = '/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/error_reports/{{ $parameter }}/{{ $status['exe_id'] }}/{{ $key+1 }}'" @endif @if($status['id'] == 1) @elseif($status['id'] == 2) class="bj-ff5 bj-ff5-same" @elseif($status['id'] == 3) class="bj-img1 bj-ff5-same"  @elseif($status['id'] == 4) class ="bj-img2 bj-ff5-same"  @elseif($status['id'] == 5) class="bj-img3 bj-ff5-same" @endif >{{ $loop->iteration }}</li>
				@endforeach	
			</ul>
		</div>
		<div class="clear"></div>
		@if(!empty($data['sameExercise']))
		<div class="error-answer sameTypeJob">
			<p>同类型习题：</p>
				<ul>
					@foreach($data['sameExercise'] as $key => $status)
						<li parent-id="{{ $status['parent_id'] }}" onclick="window.location.href = '/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/error_reports/{{ $parameter }}/{{ $status['exe_id'] }}/{{ $key+1 }}'"   @if($status['id'] == 1) class="bj-ff5-same" @elseif($status['id'] == 2) class="bj-ff5 bj-ff5-same" @else class="bj-img1 bj-ff5-same" @endif >{{ $loop->iteration }}</li>
					@endforeach
				</ul>
			</ul>
		</div>
		@endif
		<div class="clear"></div>
		<div class="submits">
			@if(empty($data['sameExercise']))
				<button class="btn-white" onclick="window.location.href = '/learningCenter/{{ $courseFirst[0]['id'] }}'" >返回</button>
				@if(!empty($tutorship))
					<button class="ic-btn" id="work-parsing">错题解析</button>
					<button class="ic-btn error-exercise" error-exercise="{{ $tutorship }}">分数提升</button>
				@endif	
			@else
				<button class="ic-btn" onclick="window.location.href = '/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/exercise_book/{{ $parameter }}'" >返回</button>
				<button class="ic-btn" id="work-parsing">错题解析</button>
			@endif
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
