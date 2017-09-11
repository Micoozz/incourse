<!--内容-->
<div class="col-xs-12 col-sm-12" id="centery">
	<div class="row center1">
		<div class="col-md-2 col-xs-4"></div>
		<div class="col-md-8 col-xs-4" id="col">教师档案管理编辑</div>
		<div class="col-md-2 col-xs-4 addAdminTag">
		</div>
	</div>
	<div class="school-container">
		<div class="seeInfo-wrap">
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
						<span>籍贯：</span>{{ $data['employee']['hasOneInfo']->province }}省{{ $data['employee']['hasOneInfo']->cityName }}
						<p class="p-a info-pa">
							<span>账号：</span>{{ $data['employee']->username }}
							<b class="padd" onclick="window.location.href='/resetPasswork/{{ $data['employee']->username }}'">重置密码</b>
						</p>
					</div>
					<div>
						<span>出生年月：</span>{{ $data['employee']['hasOneInfo']->birth_time }}
					</div>
					<div>
						<span>身份证号：</span>{{ $data['employee']['hasOneInfo']->idcode }}
					</div>
					<div class="p-r">
						<span>所在部门：</span>教务部
						<p class="p-a info-pa">
							<span>现任职务：</span>无
						</p>
					</div>	
					<div class="p-r">
						<span>任教班级：</span>一年级一班
						<p class="p-a info-pa">
							<span>班主任：</span>否
						</p>
					</div>	
					<div class="p-r">
						<span>毕业学校：</span>浙江大学
						<p class="p-a info-pa">
							<span>毕业时间：</span>1990-7-1
						</p>
					</div>												
					<div class="p-r">
						<span>政治面貌：</span>无
						<p class="p-a info-pa">
							<span>入党时间：</span>无
						</p>
					</div>											
				</div>
				<div class="f-r photo p-r of-h big-head-box">
					<img src="{{ asset('images/big_head.jpg') }}" />
				</div>
				<div class="clear"></div>
				<div class="teacherSeeinfo">
					<p class="basic-info">工作经历</p>
					<div>
						<span>家庭地址：</span>杭州余杭西溪北苑北区
					</div>
				<table border="0" cellspacing="0" cellpadding="0" class="family_table">
					<tr>
						<th>起止时间</th>
						<th>所在学校/单位</th>
						<th>职务</th>
					</tr>
					<tr class="family_characters">
						<td>2013.07~2014.10</td>
						<td>浙大</td>
						<td>教师</td>
					</tr>
				</table>											
				</div>
				<div class="btns">
					<button class="download ic-btn">下载打印</button>
					<button id="seeInfo" class="ic-btn"><a href="principalFileManagement.html">编 辑</a></button>
					<button class="btn-white"><a href="principalFile.html">返 回</a></button>
				</div>
			</form>

		</div>
	</div>
</div>