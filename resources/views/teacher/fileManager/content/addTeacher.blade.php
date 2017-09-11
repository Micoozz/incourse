<!--内容-->
<div class="col-xs-12 col-sm-12" id="centery">
	<div class="row center1">
		<div class="col-md-2 col-xs-4"></div>
		<div class="col-md-8 col-xs-4" id="col">教师档案管理编辑</div>
		<div class="col-md-2 col-xs-4"></div>
	</div>
	<div class="school-container">
		<p class="basic-info">基本信息</p>
		<form action="" class="info-form" name="infoForm">
			<div class="f-l info-box seeInfoBox">
				<div class="p-r">
					<span>姓名：{{ $data['employee']->name }}</span>
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
				</div>
				<div class="p-r">
					<span>出生年月：</span>{{ $data['employee']['hasOneInfo']->birth_time }}
				</div>
				<div>
					<span>身份证号：</span>{{ $data['employee']['hasOneInfo']->idcode }}
				</div>
				<div class="p-r">
					<span>现任职务：</span>
					<input class="ic-input branch" name="duty" type="text" num=1 />
				</div>
				<div class="p-r">
					<span class="f-l">任教班级：</span>
						<div class="select-form clear">
							<input type="hidden" name="id" value="{{ $parameter }}">
							<input class="ic-input branch2" name="taughtClass" type="text" num=2 />
						</div>
					<div class="p-a info-pa info-pas radio-box">
						<span>班主任：</span>
						<label class="man p-r ">
					<p class="radio active">
						<i></i>
					</p>
					<input class="d-n" type="radio" name="Headmaster" value="1" checked/> 是
				</label>
						<label class="p-r">
					<p class="radio">
						<i></i>
					</p>
					<input class="d-n" type="radio" name="Headmaster" value="0"/> 否
				</label>
					</div>
				</div>
				<div>
					<span class="f-l">任教课程：</span>
					<div class="select-form clear">
						<input class="ic-input branch3" name="taughtCourse" type="text" num=3 />
					</div>
				</div>
				<div class="p-r">
					<span>毕业校园：</span>
					<input class="ic-input" name="graduation" type="text" />
					<p class="p-a info-pa info-pas">
						<span>毕业时间：</span>
						<input class="ic-input input-l" name="birthTime" type="text" placeholder="选择时间" num="6"/>
						<i class="fa fa-calendar p-a gray facalenseses"></i>
					</p>										
				</div>	
				<div class="p-r">
					<span class="f-l">政治面貌：</span>
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
					<p class="p-a info-pa info-pas">
						<span>入党时间：</span>
						<input class="ic-input input-l" name="politics_time" type="text" placeholder="选择时间" />
						<i class="fa fa-calendar p-a gray facalensesese"></i>
					</p>		
				</div>
			</div>
			<div class="f-r photo p-r of-h big-head-box">
				<img src="../../../images/big_head.jpg" />
			</div>
			<div class="clears"></div>
			<div class="family">
				<p class="basic-info">工作经历</p>
				<div class="clears"></div>
				<table border="0" cellspacing="0" cellpadding="0" class="family_table">
					<tr>
						<th>起止时间</th>
						<th>所在学校/单位</th>
						<th>职务</th>
						<th>操作</th>
					</tr>
					<tr class="family_characters">
						<td><input type="" name="" id="" value="" /></td>
						<td><input type="" name="" id="" value="" /></td>
						<td><input type="" name="" id="" value="" /></td>
						<td><i class="fa fa-file" title="保存"></i> <i class="fa fa-times" title="删除"></i></td>
					</tr>
				</table>
				<div class="add_table"><i class="fa fa-plus-circle"></i>添加</div>
			</div>
			<div class="btns">
				<button id="addTeacherBtn" class="ic-btn keep">保存</button>
				<button class="btn-white"><a href="JavaScript:history.back(-1)">返 回</a></button>
			</div>
		</form>
	</div>
</div>
<div class="section">
	<div class="ic-blue">所在部门</div>
	<div class="section-nav">
	<div></div>
	<div class="clear"></div>
	<div>其他<input type="text" /></div>
	</div>
	<div class="section-button">
		<button class="ic-btn">确定</button>
		<button class="btn-white">返回</button>
	</div>
</div>
<div class="ic-modal"></div>