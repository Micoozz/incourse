<ul class="nav1 nav" id="nav1">
	@if($func == 'manager-pwd' || $func == 'manager-address')
	<li><a href="javascript:;">管理员档案</a></li>
	<li><a href="javascript:;">权限设置</a></li>
	@else
		@if($mod == 'manager-archives')
			<li><a class="box"  href="/adminArchives/manager-archives/manager-list">管理员档案</a></li>
			<li><a href="/adminArchives/permissions/permissions-page">权限设置</a></li>
		@else
			<li><a href="/adminArchives/manager-archives/manager-list">管理员档案</a></li>
			<li><a class="box" href="/adminArchives/permissions/permissions-page">权限设置</a></li>
		@endif
	@endif
</ul>