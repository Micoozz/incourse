<ul class="nav1 nav" id="nav1">
	@if($func == 'manager-pwd' || $func == 'manager-name')
	<li><a href="javascript:;">学生档案</a></li>
	<li><a href="javascript:;">教师档案</a></li>
	@else
		@if($mod == 'student-file')
			<li><a class="left_nac" href="/fileManager/student-file/student-list">学生档案</a></li>
			<li><a href="/fileManager/teacher-file/authorized-teacher">教师档案</a></li>
		@else
			<li><a href="/fileManager/student-file/student-list">学生档案</a></li>
			<li><a class="left_nac" href="/fileManager/teacher-file/authorized-teacher">教师档案</a></li>
		@endif
	@endif
</ul>