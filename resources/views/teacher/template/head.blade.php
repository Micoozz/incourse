<div>
	<div class="indexLogo">
		<img src="{{ asset('images/LOGO.png') }}"/>
		<img src="{{ asset('images/Hpb_schoolLogo.png') }}" class="schoolLogo"/>
		<b>湖南工程学院</b>
	</div>
	<div class="f-r p-r personCenter">
		<img class="big-head" src="{{ asset('images/01.png') }}" alt="头像" />
		<span>@if($func == 'manager-pwd' || $func == 'manager-name') 用户 @else {{ $user->name }} @endif 您好</span>
		<i class="fa fa-angle-down"></i>
		<ul class="p-a d-n">
			<li><a href="">个人信息</a></li>
			<li><a href="/logout">退出</a></li>
		</ul>
	</div>
	<ul class="nav head_nav">
		<li class="schoolMain">
			<a href="/media">学校首页</a>
			<div>
				<a href="javascript:;">@与我相关</a>
			</div>
		</li>
		<li><a href="/fileManager/student-file/student-list" class="ic-blue">档案管理</a></li>
	</ul>
</div>
