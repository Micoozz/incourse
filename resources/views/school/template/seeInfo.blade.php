<div class="col-xs-12 col-sm-12" id="centery">
	<div class="row center1">
		<div class="col-md-2 col-xs-4"></div>
		<div class="col-md-8 col-xs-4" id="col">管理员档案</div>
	</div>
	<div class="school-container">
		<p class="basic-info">基本信息</p>
		<form action="" class="info-form" name="infoForm">
			<div class="f-l info-box seeInfoBox">
				<div class="p-r">
					<span>姓名：</span>{{ $data['employee']->name }}
					<p class="p-a info-pa">
						<span>性别：</span>@if($data['employee']['hasOneInfo']->gender == 1) 男 @else 女 @endif
					</p>
				</div>
				<div class="p-r">
					<span>民族：</span>{{ $data['employee']['hasOneInfo']->nation }}族
					<p class="p-a info-pa">
						<span>编制属性：</span>@if($data['employee']['hasOneInfo']->formation == 1) 编织 @else 未编制 @endif
					</p>
				</div>
				<div class="p-r">
				<span>籍贯：</span>{{ $data['employee']['hasOneInfo']->province }}省{{ $data['employee']['hasOneInfo']->city }}
					<p class="p-a info-pa">
						<span>账号：{{ $data['employee']->username }}</span>
						<a class="ic-blue c-p" onclick="window.location.href='/resetPassEmployee/{{ $data['employee']->id }}'" >重置密码</a>
					</p>
				</div>
				<div>
					<span>出生年月：</span>{{ date('Y-m-d',$data['employee']['hasOneInfo']->birth_time) }}
				</div>
				<div>
					<span>身份证号：</span>{{ $data['employee']['hasOneInfo']->idcode }}
				</div>
			</div>
			<div class="f-r photo p-r of-h big-head-box">
				<img src="{{ $data['employee']['hasOneInfo']->bigHead }}" />
			</div>
			<div class="btns">
				<a href="/adminArchives/manager-archives/add-employee/{{ $data['employee']->id }}/" id="seeInfo" class="ic-btn">编 辑</a>
				<button onclick="window.history.go(-1);" class="btn-white">返 回</button>
			</div>
		</form>
	</div>
</div>