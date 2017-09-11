<!--内容-->
<div class="col-xs-12 col-sm-12" id="centery">
	<div class="row center1">
		<div class="col-md-2 col-xs-4"></div>
		<div class="col-md-8 col-xs-4" id="col">学生档案管理</div>
		<div class="col-md-2 col-xs-4"></div>
	</div>
	<div class="school-container">
		<p class="basic-info">基本信息</p>
		<form action="#" class="info-form" name="infoForm" method="post">
			<div class="f-l info-box">
				<div class="clear">
					<div class="f-l username">
						<span>姓名：</span>
						<input name="id" value="{{ isset($data['stuInfo']->id) ? $data['stuInfo']->id : '' }}" type="hidden"/>
						<input class="ic-input" name="name" type="text" value="{{ isset($data['stuInfo']->name) ? $data['stuInfo']->name : '' }}" />
					</div>
					<div class="f-l radio-box">
						<span>性别：</span>
						<label class="man p-r">
					<p class="radio active" >
						<i></i>
					</p>
					<input class="d-n" type="radio" name="gender" checked value="1"/> 男
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
						<input class="ic-input" name="nation" type="text" value="{{ isset($data['stuInfo']->hasOnestu_Info->nation) ? $data['stuInfo']->hasOnestu_Info->nation : '' }}" /> 族
					</div>
					<div class="f-l radio-box">
						<span>编制属性：</span>
						<label class="man p-r">
					<p class="radio active">
						<i></i>
					</p>
					<input class="d-n" type="radio" name="formation" checked value="1"/> 编制
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
								<span>{{ isset($data['stuInfo']['hasOnestu_Info']->province) ? $data['stuInfo']['hasOnestu_Info']->province : '选择省份' }}</span>
								<i class="fa fa-angle-down"></i></p>
							<ul class="lists province-ul" >
								@foreach($provinces as $province)
									<li ref="{{ $province->id }}" data='{{$province->id}}' class="province-li">{{ $province->name }}省</li>
								@endforeach
							</ul>
						</div>
						<div class="city">
							<p class="ic-text">
								<span id="city_id" ref="{{ isset($data['stuInfo']['hasOnestu_Info']->city) ? $data['stuInfo']['hasOnestu_Info']->city : '市区' }}">{{ isset($data['stuInfo']['hasOnestu_Info']->cityName) ? $data['stuInfo']['hasOnestu_Info']->cityName : '市区' }}</span>
								<i class="fa fa-angle-down"></i></p>
							<ul class="lists">
							</ul>
						</div>
					</div>
				</div>
				<div class="clear">
					<span class="f-l">出生年月：</span>
					<div class="f-l p-r">
						<input class="ic-input input-l" name="birthTime" type="text" placeholder="选择时间" num="1" value="{{ isset($data['stuInfo']['hasOnestu_Info']->birth_time) ? $data['stuInfo']['hasOnestu_Info']->birth_time : '' }}" />
						<i class="fa fa-calendar p-a gray facalen"></i>
					</div>
				</div>
				<div>
					<span>身份证号：</span>
					<input class="ic-input input-l" name="idcade" type="text" value="{{ isset($data['stuInfo']['hasOnestu_Info']->idcade) ? $data['stuInfo']['hasOnestu_Info']->idcade : '' }}" />
				</div>
			</div>
			<div class="f-r photo p-r of-h">
				<div class="photo-in">
					@if(empty($data['stuInfo']['hasOnestu_Info']))
					<img class="add-photo" src="{{ isset($data['stuInfo']['hasOnestu_Info']->bigHead) ? $data['stuInfo']['hasOnestu_Info']->bigHead : asset('images/school/uploadPhoto.png') }}" />
					@else
					<img class="upload-img" src="{{ isset($data['stuInfo']['hasOnestu_Info']->bigHead) ? $data['stuInfo']['hasOnestu_Info']->bigHead : asset('images/school/uploadPhoto.png') }}" />
					@endif
					<p class="gray">添加照片</p>
				</div>
				<input id="uploadHead" name="bigHead" class="file p-a" type="file" />
			</div>
			<div class="clears"></div>
	<div class="information">
				<div>
					<span class="f-l">政治面貌：</span>
					<!--<input class="ic-input" name="birthPlace" type="text"/>-->
					<div class="select-form">
						<div class="province">
							<p class="ic-text">
								<span>无</span>
								<i class="fa fa-angle-down"></i></p>
							<ul class="lists">
								<li>少先队员</li>
								<li>共青团员</li>
								<li>预备党员</li>
								<li>正式党员</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="clear">
					<span class="f-l">时间：</span>
					<div class="f-l p-r">
						<input class="ic-input input-l" name="politics_time" type="text" placeholder="选择时间" num='2' value="{{ isset($data['stuInfo']['hasOnestu_Info']->politics_time) ? $data['stuInfo']['hasOnestu_Info']->politics_time : '' }}" />
						<i class="fa fa-calendar p-a gray facalens"></i>
					</div>
				</div>
				<div>
					<span>现班主任：</span>
					<input class="ic-input" name="headTeacher" type="text" value="{{ isset($data['stuInfo']['hasOnestu_Info']->headTeacher) ? $data['stuInfo']['hasOnestu_Info']->headTeacher : '' }}" />
				</div>	
				<div>
					<span>联系方式：</span>
					<input class="ic-input" name="phone" type="text" value="{{ isset($data['stuInfo']['hasOnestu_Info']->phone) ? $data['stuInfo']['hasOnestu_Info']->phone : '' }}" onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v(); " max="11" />
				</div>	
				<input type="hidden" name="class_id" @if($parameter == "") value="{{ $grade->id }}" @else value="{{ $parameter }}"  @endif/>
			</div>
			<div class="clears"></div>
			<div class="family">
				<p class="basic-info">家庭情况</p>		
				<div class="f-l">
					<span>家庭地址：</span>
					<input class="ic-input" name="family_address" type="text" value="{{ isset($data['stuFamily']['hasManystu_Family'][0]->family_address) ? $data['stuFamily']['hasManystu_Family'][0]->family_address : '' }}" />
				</div>	
				<div class="clears"></div>
				<table border="0" cellspacing="0" cellpadding="0" class="family_table">
					<tr>
						<th>家庭成员</th>
						<th>与本人关系</th>
						<th>工作单位</th>
						<th>联系方式</th>
						<th>操作</th>
					</tr>
					@if(empty($data['stuFamily']['hasManystu_Family']))
						<tr class="family_characters">
							<td><input type="" name="family_member[]" id="" value="" /></td>
							<td><input type="" name="family_relation[]" id="" value="" /></td>
							<td><input type="" name="work_unit[]" id="" value="" /></td>
							<td><input type="" name="family_phone[]" id="" value=""  onkeyup="(this.v=function(){this.value=this.value.replace(/[^0-9-]+/,'');}).call(this)" onblur="this.v();"/></td>
							<td><i class="fa fa-file" title="保存"></i> <i class="fa fa-times" title="删除"></i></td>
						</tr>

					@else
						@foreach($data['stuFamily']['hasManystu_Family'] as $family)
						<tr class="family_characters">
							<td><input type="" name="family_member[]" id="" value="{{ $family->family_member }}" /></td>
							<td><input type="" name="family_relation[]" id="" value="{{ $family->family_relation }}" /></td>
							<td><input type="" name="work_unit[]" id="" value="{{ $family->work_unit }}" /></td>
							<td><input type="" name="family_phone[]" id="" value="{{ $family->family_phone }}" /></td>
							<td><i class="fa fa-file" title="保存"></i> <i class="fa fa-times" title="删除"></i></td>
						</tr>
						@endforeach
					@endif
				</table>
				<div class="add_table"><i class="fa fa-plus-circle"></i>添加</div>
			</div>
			<div class="btns">
				<button id="addStudentBtn" class="ic-btn keep">生成账号</button>
				<button class="btn-white" onclick = "window.history.go(-1);">返回</button>
			</div>
		</form>
	</div>
</div>