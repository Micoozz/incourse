
<div class="col-xs-12 col-sm-12" id='{{ isset($mod) ? "centery" : "" }}' >
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">作业报告</span>
		<span class="col-xs-3 col-sm-3 add"></span>
	</div>
	<div class="ic-container accout">
		<div class="atitle" style='{{ isset($mod) ? "" : "position:relative; left:150px;" }}'>
			<p><span>作业标题：</span><span>{{ date('m月d日',$data['work']->pub_time) }}作业</span></p>
			<p><span>所属章节：</span><span>{{ $chapter[0]->title }}  {{ $minutia->title }}</span></p>
			<p><span>截止时间：</span><span>{{ date('m月d日 h:i',$data['work']->deadline) }}</span></p>
			<p><span>常规作业：</span><span id="total">{{ $data['work']->content }}</span></p>
			<p><span>习题练习：</span><span>共{{ $data['count'] }}小题</span></p>
			<p><span>交卷时间：</span><span>{{ date('m月d日 h:i',$data['sub_time']) }}</span></p>
		</div>

		<div class="progresse">@include("student.template.progressBar")</div>
		<div class="consuming">
			总耗时：{{ date('i分s秒',$data['exeSecond']) }}<!-- //33分20秒 -->
			<div>
				<span>正确：{{ $data['objectiveCount'] }}题</span>	
				&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
				<span>错误：{{ $data['objectiveErrorCount'] }}题</span>
				<span>未批改：{{ $data['modifyCount'] }}题</span>
			</div>
		</div>
<<<<<<< HEAD
		<div class="error-answer answerCard">
			<p>答题卡：</p>
			<ul>
				@foreach($data['status'] as $key => $status)
					<li exe-id="{{ $status['exe_id'] }}" @if($status['id'] == 1) @elseif($status['id'] == 2) onclick="window.location.href = '/learningCenter/{{ $data['course_id'] }}/{{ $mod }}/error_reports/{{ $parameter }}/{{ $status['exe_id'] }}/{{ $key+1 }}'" class="bj-ff5" @else class="bj-img1" @endif >{{ $loop->iteration }}</li>
=======

		<div class="error-answer">
			<p>答题卡：</p>
			<ul>
				@foreach($data['status'] as $key => $status)
					<li @if($status['id'] == 1) @elseif($status['id'] == 2) onclick="window.location.href = '/learningCenter/{{ $data['work']->course_id }}/{{ $mod }}/4/{{ $parameter }}/{{ $status['exe_id'] }}/{{ $key+1 }}'" class="bj-ff5" @else class="bj-img1" @endif >{{ $loop->iteration }}</li>
>>>>>>> 85a78bb085a00fd69f84922f2c2f439b6ce62b44
				@endforeach	
			</ul>
		</div>
		<div class="clear"></div>
<<<<<<< HEAD
		@if(!empty($data['sameExercise']))
		<div class="error-answer sameTypeJob">
			<p>同类型习题：</p>
			<ul>
				@foreach($data['sameExercise'] as $key => $status)
					<li parent-id="{{ $status['parent_id'] }}" @if($status['id'] == 1) @elseif($status['id'] == 2) onclick="window.location.href = '/learningCenter/{{ $data['course_id'] }}/{{ $mod }}/error_reports/{{ $parameter }}/{{ $status['exe_id'] }}/{{ $key+1 }}'" class="bj-ff5" @else class="bj-img1" @endif >{{ $loop->iteration }}</li>
				@endforeach
			</ul>
		</div>
		@endif
		<div class="clear"></div>
		<div class="submits">
			@if(empty($data['sameExercise']))
				<button class="btn-white" onclick="window.location.href = '/learningCenter/{{ $courseFirst[0]['id'] }}'" >返回</button>
				<button class="ic-btn" onclick="window.location.href = '/learningCenter/{{ $data['course_id'] }}/{{ $mod }}/error_reports/{{ $parameter }}'" >错题解析</button>
				<button class="ic-btn error-exercise" error-exercise="{{ $tutorship }}">分数提升</button>		
			@else
				<button class="ic-btn" onclick="window.location.href = '/learningCenter/{{ $data['course_id'] }}/{{ $mod }}/exercise_book/{{ $parameter }}'" >返回</button>
				<button class="ic-btn" onclick="window.location.href='/learningCenter/{{ $data['course_id'] }}/{{ $mod }}/error_reports/{{ $parameter }}'">错题解析</button>
			@endif
=======
		<div class="submits">
			<button class="ic-btn" onclick="window.location.href = '/learningCenter/{{ $data['work']->course_id }}/{{ $mod }}/4/{{ $parameter }}'" >错题解析</button>
			<button class="ic-btn" onclick="window.location.href='/homotypology/{{ $tutorship }}'">继续辅导</button>
>>>>>>> 85a78bb085a00fd69f84922f2c2f439b6ce62b44
		</div>

	</div>
</div>

