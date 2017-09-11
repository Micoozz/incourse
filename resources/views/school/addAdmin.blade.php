<!--内容-->
<div class="col-xs-12 col-sm-12" id="centery">
	<div class="row center1">
    <div class="col-md-2 col-xs-4"></div>
    <div class="col-md-8 col-xs-4" id="col">管理员档案</div>
    <div class="col-md-2 col-xs-4"></div>
</div>
<style type="text/css">
	.warning-info {
		color: red;
	}
</style>
<div class="school-container">
	<p class="basic-info">基本信息</p>
	    <span id="warning-info" class="warning-info" style="display: none;"></span>
	<form action="" class="info-form" name="infoForm">
		<div class="f-l info-box">
			<div class="clear">
			<div class="f-l username">
					<span>姓名：</span>
					<input name="id" value="{{ isset($data['employee']->id) ? $data['employee']->id : '' }}" type="hidden"/>
					<input class="ic-input" name="name" value="{{ isset($data['employee']->name) ? $data['employee']->name : '' }}" maxlength="12" type="text"/>
				</div>
				<div class="f-l radio-box">
					<span>性别：</span>
					<label class="radio-left active p-r">
						<p class="radio active">
							<i></i>
						</p>
						<input class="d-n" type="radio" name="gender" checked value="1" /> 男
					</label>
					<label class="p-r">
						<p class="radio">
							<i></i>
						</p>
						<input class="d-n" type="radio" name="gender" value="0"/> 女
					</label>
				</div>
			</div>
			<div class="clear">
				<div class="f-l nation">
					<span>民族：</span>
					<input class="ic-input" name="nation" value="{{ isset($data['employee']['hasOneInfo']->nation) ? $data['employee']['hasOneInfo']->nation : '' }}" type="text" maxlength="4" /> 族
				</div>
				<div class="f-l radio-box">
					<span>编制属性：</span>
					<label class="radio-left p-r">
						<p class="radio active">
							<i></i>
						</p>
						<input class="d-n" type="radio" name="formation" value="1" checked/> 编制
					</label>
					<label class="p-r">
						<p class="radio">
							<i></i>
						</p>
						<input class="d-n" type="radio" name="formation" value="0"/> 非编制
					</label>
				</div>
			</div>
			
			<div>
				<span class="f-l">籍贯：</span>
				<div class="select-form clear">
				<div class="province">
					<p class="ic-text">
						<span>{{ isset($data['employee']['hasOneInfo']->province) ?  $data['employee']['hasOneInfo']->province : '选择省份' }}</span>
						<i class="fa fa-angle-down"></i></p>
						<ul class="lists province-ul">
						@foreach($provinces as $province)
							<li data='{{$province->id}}' class="province-li">{{ $province->name }}</li>
						@endforeach
						</ul>
				</div>
				<div class="city" >
					<p class="ic-text">
						<span id="city_id" ref="{{ isset($data['employee']['hasOneInfo']->city) ? $data['employee']['hasOneInfo']->city : '' }}">{{ isset($data['employee']['hasOneInfo']->cityName) ? $data['employee']['hasOneInfo']->cityName : '选择市区' }}</span>
						<i class="fa fa-angle-down"></i></p>
					<ul class="lists">
					</ul>
				</div>
			</div>
			</div>
			<div class="clear">
				<span class="f-l">出生年月：</span>
				<div class="f-l p-r calendar">
					<input id="birthTime" class="ic-input input-l" name="birth_time" value="{{ isset($data['employee']['hasOneInfo']->birth_time) ? date('Y-m-d',$data['employee']['hasOneInfo']->birth_time) : '' }}" type="text" placeholder="选择时间"/>
					<i class="fa fa-calendar p-a gray"></i>
				</div>
			</div>
			<div>
				<span>身份证号：</span>
				<input id="idCode" class="ic-input input-l" value="{{ isset($data['employee']['hasOneInfo']->idcode) ? $data['employee']['hasOneInfo']->idcode : '' }}" name="idCode" type="text"/>
			</div>
		</div>
		<div class="f-r photo p-r of-h">
			<div class="photo-in">
				@if(empty($data['employee']['hasOneInfo']))
				<img class="add-photo" src="{{ isset($data['employee']['hasOneInfo']->bigHead) ? $data['employee']['hasOneInfo']->bigHead : asset('images/school/uploadPhoto.png') }}" />
				@else
				<img class="upload-img" src="{{ isset($data['employee']['hasOneInfo']->bigHead) ? $data['employee']['hasOneInfo']->bigHead : asset('images/school/uploadPhoto.png') }}" />
				@endif
				<p class="gray">添加照片</p>
			</div>
			<input id="uploadHead" name="bigHead" class="file p-a" type="file" />
		</div>
		<div class="btns">
			<button id="addAdminBtn" class="ic-btn">{{ isset($data['employee']['hasOneInfo']) ? "修改帐号" : "生成帐号" }}</button>
			<button onclick = "window.history.go(-1);"  class="btn-white">返 回</button>
		</div>
	</form>
</div>
</div>
