<div>
	<div class="indexLogo">
		<img src="{{ asset('images/LOGO (2).png') }}"/>
		<!-- <img src="{{ asset('images/Hpb_schoolLogo.png') }}" class="schoolLogo"/>
		<b>湖南工程学院</b> -->
	</div>
	<div class="f-r p-r personCenter">
		<img class="big-head" src="{{ asset('images/01.png') }}" alt="头像" />
		<span>@if($func == 'student-pwd' || $func == 'student-name') 用户 @else {{ $user->name }} @endif 你好</span>
		<i class="fa fa-angle-down"></i>
		<ul class="p-a d-n">
			<li><a href="">个人信息</a></li>
			<li><a href="">学习生活记录</a></li>
			<li><a href="">成就徽章</a></li>
			<li><a href="/logout">退出</a></li>
		</ul>
	</div>
	<ul class="nav head_nav">
		<li class="schoolMain">
			<a href="javascript:;">学校首页</a>
			<div>
				<a href="javascript:;">@与我相关</a>
			</div>
		</li>
		<li><a @if($func == 'student-pwd' || $func == 'student-name') href="javascript:;" @else href="/learningCenter"  @endif class="ic-blue">学习中心</a></li>
		<li><a href="javascript:;">班级空间</a></li>
		<li><a href="javascript:;">课程表</a></li>
		<li><a href="javascript:;">分析中心</a></li>
	</ul>
</div>
