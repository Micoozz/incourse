<!--内容-->
<div class="col-xs-12 col-sm-12" id="centery">
	<div class="row center1">
		<div class="col-md-2 col-xs-4"></div>
		<div class="col-md-8 col-xs-4" id="col">权限管理</div>
		<div class="col-md-2 col-xs-4"></div>
	</div>
	<div class="setLimit-container">
		<div class="limit-box clear p-r">
			<!--左边列表-->
			<div class="f-l list-box border">
				<p class="limit-admin-tag">权限管理员</p>
				<div class="wrap">
					<ul class="lists">
					@foreach($data['Section'] as $section)
					<li>
						<div class="ic-collapse c-d">
							<span class="icon">
								<i class="fa fa-angle-right"></i>
							</span>
							<span ref="{{ $section->id }}" class="drop-box">{{ $section->title }}</span>
						</div>
						<ul class="d-n">
							@foreach($data['employeeRole'] as $employeeRole)
								@if($employeeRole->section_id == $section->id)
									<li draggable="true" class="canDrag" data-id="{{ $employeeRole->id }}" ><span>{{ $employeeRole->name }}</span></li>
								@endif
							@endforeach
						</ul>
					</li>
					@endforeach
				</ul>
				</div>
			</div>
			<!--右边列表-->
			<div class="f-r list-box border">
				<p class="employee-tag">员工管理</p>
				<div class="wrap p-r">
					<div class="p-r search-box">
						<input id="roleEmployee" class="ic-input" type="text" placeholder="请输入老师姓名"/>
						<i class="fa fa-search p-a roleEmployee"></i>
					</div>
					@foreach($data['groups'] as $i => $group)	
						@if($group['parent_id'] == 0)		

						<ul class="lists employee-list">
							<li class="{{$i == 0 ? 'fixed' : ''}} group-parent-li">
								<img class="f-r collapse-icon" src="{{ asset('images/school/more.png') }}" alt="" />
								<div class="ic-collapse c-d">
									<span class="icon">
										<i class="fa fa-angle-right"></i>
									</span>
									<span group="{{ $group['id'] }}" class="teamName drop-box group-parent">{{ $group['title'] }}</span>
								</div>
								<ul class="d-n">
									@foreach($data['employees'] as $employee)
										@if($employee['group_id'] == $group['id'])
											<li draggable="true" class="canDrag" data-id="{{ $employee['id'] }}">
												<span>{{ $employee['name'] }}</span>
											</li>
										@endif
									@endforeach
									@foreach($data['groups'] as $value)
										@if($value['parent_id'] == $group['id'])
										<img class="f-r collapse-icon" src="{{ asset('images/school/more.png') }}" alt="" />
										<div class="ic-collapse c-d">
											<span class="icon">
												<i class="fa fa-angle-right"></i>
											</span>
											<span group="{{ $value['id'] }}" disabled="true" class="teamName drop-box group-children">{{ $value['title'] }}</span>
										</div>
										<ul class="d-n">
											@foreach($data['employees'] as $employee)
												@if($employee['group_id'] == $value['id'])
												<li draggable="true" class="canDrag" data-id="{{$employee['id']}}">
													<span>{{ $employee['name'] }}</span>
												</li>
												@endif
											@endforeach
										</ul>
										@endif
									@endforeach
								</ul>
							</li>
						</ul>
						@endif	
					@endforeach
					
					
					
					<ul class="p-f more-choose border d-n">
						<li id="add">添加组</li>
						<li id="rename">重命名组</li>
						<li id="delete">删除组</li>
						<li id="addChild">添加子项</li>
					</ul>
				</div>
			</div>
			<!--拖拽引导-->
			@if(empty($data['guidance']))
			<div class="dragIntroModal p-a">
				<img src="{{ asset('images/school/demoImg.png') }}" alt="" />
			</div>
			<!--引导提示-->
			<div class="p-a part">
				<i class="fa fa-angle-up p-a"></i>
				<i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>
				<p class="f-l">点击人员姓名，拖拽至左边区域，设置管理权限噢～</p>
				<button id="iknow2" class="ic-btn p-a">我知道了</button>
			</div>
			@endif
		</div>
		
		<!--删除组弹出提示框-->
		<div class="delete-modal d-n">
			<div class="clear">
				<i class="fa fa-exclamation-circle f-l"></i>
				<div class="f-l ic-text">
					<p class="msg">确认要删除这个分组吗？</p>
					<p class="words">选定的分组将被删除，组内联系人将会移至最上方的系统默认分组。您确定要删除该分组吗？</p>
				</div>
			</div>
			<div class="btns">
				<div class="f-r">
					<button class="btn-white">取 消</buttton>
					<button class="ic-btn">确 定</button>
				</div>
			</div>
		</div>
	</div>
</div>
				
