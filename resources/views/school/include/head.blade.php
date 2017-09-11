<div>
	<div class="indexLogo">
		<img src="{{ asset('images/LOGO.png') }}"/>
		<img src="{{ asset('images/Hpb_schoolLogo.png') }}" class="schoolLogo"/>
		<b>湖南工程学院</b>
	</div>
	<div class="f-r p-r personCenter">
		<img class="big-head" src="{{ asset('images/01.png') }}" alt="头像" />
		<span>@if($func == 'manager-pwd' || $func == 'manager-address')用户 您好 @else {{ $user->title }} 您好 @endif</span>
		<ul class="p-a d-n">
			<li><a href="@if($func == 'manager-pwd' || $func == 'manager-address')javascript:;@else  @endif">个人信息</a></li>
			<li><a href="@if($func == 'manager-pwd' || $func == 'manager-address')javascript:;@else /logout @endif">退出</a></li>
		</ul>
	</div>
	<ul class="nav head_nav">
		<li class="schoolMain">
			<a href="javascript:;">学校首页</a>
			<div>
				<a href="javascript:;">@与我相关</a>
			</div>
		</li>
		<li><a href="@if($func == 'manager-pwd' || $func == 'manager-address')javascript:;@else /adminArchives/manager-archives/manager-list @endif" class="ic-blue">权限管理</a></li>
	</ul>
</div>