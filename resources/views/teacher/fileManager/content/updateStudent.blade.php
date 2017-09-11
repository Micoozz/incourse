<div class="col-xs-12 col-sm-12" id="centery">
	<div class="row center1">
		<div class="col-md-2 col-xs-4"></div>
		<div class="col-md-8 col-xs-4" id="col">学生档案管理</div>
		<div class="col-md-2 col-xs-4 addAdminTag">
		</div>
	</div>
	<div class="school-container">
		<div class="seeInfo-wrap">
			<p class="basic-info">基本信息</p>
			<form action="" class="info-form" name="infoForm">
				<div class="f-l info-box seeInfoBox">
					<div class="p-r">
						<span>姓名：</span>{{ $data['stuInfo']->name }}
						<p class="p-a info-pa">
							<span>性别：</span>@if($data['stuInfo']->hasOnestu_Info->gender == 1) 男@ else 女@endif
						</p>
					</div>
					<div>
						<span>民族：</span>{{ $data['stuInfo']->hasOnestu_Info->nation }}族
					</p>		
					</div>
					<div class="p-r">
						<span>籍贯：</span>{{ $data['stuInfo']['hasOnestu_Info']->province }}省{{ $data['stuInfo']['hasOnestu_Info']->name }}市
					<p class="p-a info-pa">
						<span>账号：{{ $data['stuInfo']->username }}</span>
						<a class="ic-blue c-p" onclick="window.location.href='/resetPasswork/{{ $data['stuInfo']->id }}'" >重置密码</a>
					</p>
					</div>
					<div>
						<span>出生年月：</span>{{ $data['stuInfo']->hasOnestu_Info->birth_time }}
					</div>
					<div>
						<span>身份证号：</span>{{ $data['stuInfo']->hasOnestu_Info->idcade }}
					</div>
					<div class="p-r">
						<span>所在班级：</span>{{ $data['grade']->title }}{{ $data['classes'][0]->title }}
					</div>	
					<div class="p-r">
						<span>政治面貌：</span>无
						<p class="p-a info-pa">
							<span>时间：</span>{{  $data['stuInfo']->hasOnestu_Info->politics_time }}
						</p>
					</div>	
					<div class="p-r">
						<span>现任班主任：</span>{{ $data['stuInfo']->hasOnestu_Info->headTeacher }}
						<p class="p-a info-pa">
							<span>联系方式：</span>{{ $data['stuInfo']->hasOnestu_Info->phone }}
						</p>
					</div>											
				</div>
				<div class="f-r photo p-r of-h big-head-box">
					<img src="{{ $data['stuInfo']->hasOnestu_Info->bigHead}}" />
				</div>
				<div class="clear"></div>
				<div>
					<p class="basic-info">家庭情况</p>
					<div>
						<span>家庭地址：</span>
					</div>
				<table border="0" cellspacing="0" cellpadding="0" class="family_table">
					<tr>
						<th>家庭成员</th>
						<th>与本人关系</th>
						<th>工作单位</th>
						<th>联系方式</th>
					</tr>
					@foreach($data['stuInfo']['hasManystu_Family'] as $family)
						<tr class="family_characters">
							<td>{{ $family->family_member }}</td>
							<td>{{ $family->family_relation }}</td>
							<td>{{ $family->work_unit }}</td>
							<td>{{ $family->family_phone }}</td>
						</tr>
					@endforeach
				</table>											
				</div>
				<div class="btns">
					<button class="download ic-btn">下载打印</button>
					<button id="seeInfo" class="ic-btn"><a href="/fileManager/{{ $mod }}/student-add/{{ $parameter }}/{{ $data['stuInfo']->id}}">编 辑</a></button>
					<button class="btn-white" onclick="window.history.go(-1);">返 回</button>
				</div>
			</form>

		</div>
	</div>
</div>