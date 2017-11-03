	<ul class="nav1 nav" id="nav1">
		@if($func == 'student-pwd' || $func == 'student-name')
			<li><a href="javascript:;">作业本</a></li>
		@else
			<li><a href="/learningCenter">作业本</a></li>
		@endif
		<li><a href="#">资料库</a></li>
		<li><a href="javascript:;">习题册</a></li><!-- /freePractice/{{ $courseFirst[0]['id'] }}/1 -->
		<li><a href="javascript:;">预约老师</a></li>
		<li><a href="javascript:;">课程大纲</a></li>
	</ul>