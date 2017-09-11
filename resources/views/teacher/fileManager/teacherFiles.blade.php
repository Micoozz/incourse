<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<link rel="stylesheet" type="text/css" href="../../../css/bootstrap.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/font-awesome.min.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/incourseReset.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/index.css"/>	
		<link rel="stylesheet" type="text/css" href="../../../css/school/step.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/foundClass.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/studentFile.css"/>
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/communal.css"/>
		<link rel="stylesheet" href="../../../css/school/adminSchool.css" />
		<link rel="stylesheet" type="text/css" href="../../../css/admin/fileCss/teacherFiles.css"/>
		<title>InCourse</title>
	</head>
	<body>
				<!-- 顶部导航 -->
<!-- @include('school.template.head') -->
	<div class="navbar record"></div>


<!--创建班级-->
	<div class="found_class"></div>


<div class="content">
	<div id="center">
		<div class="container">
			<div class="row">
				<!--左侧栏-->
				<!-- @include('school.template.left_navbar') -->
				<div class="col-xs-12" id="left"></div>
				
				<!--内容-->
				<div class="col-xs-12 col-sm-12" id="centery">
					<div class="files_nav">
						<span class="col-xs-3 col-sm-3"></span>
						<span class="col-xs-6 col-sm-6">教师档案管理</span>
						<span class="col-xs-3 col-sm-3 add"></span>
					</div>
					<div class="ic-container teacher_container">
						<div class="waitBox">
							<div>
								<img class="logo" src="../../../images/LOGO.png" alt="InCourse_logo" />
							</div>
							<div>正在加载已有档案。。。</div>
						</div>
					</div>
    				
    				<!--假数据内容-->
    				<div class="school-container admin-container">
                    	<div class="manageAdmin-wrap">
                    		<div class="search-box clear p-r">
                     			<span class="admeasure" num=1>已分配</span>
                    			<span class="admeasure on" num=2>未分配</span>                   			
                    		<input class="ic-input f-r" type="text" placeholder="请输入搜索内容" />
                    		<i class="fa fa-search p-a gray"></i>
                    		</div>
                    		<!--未分配-->
                    		<table class="admin-list border admin-list-a">
                    		<thead>
                    			<tr>
                    				<th>姓名</th>
                    				<th>性别</th>
                    				<th>账号</th>
                    				<th>员工类型</th>
                    				<th>现任职务</th>
                    				<th>操作</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    			<tr>
                    				<td>陈小小</td>
                    				<td>女</td>
                    				<td>10027</td>
                    				<td>正式工</td>
                    				<td>教公办</td>
                    				<td class="ic-blue">
										<a href="teacherFileManagement.html" num="0"><i class="fa fa-edit"></i></a>
										<i class="fa fa-ban forbidden"></i>
										<i class="fa fa-trash-o" ></i>
                    				</td>
                    			</tr>
                    			<tr>
                    				<td>陈小小</td>
                    				<td>女</td>
                    				<td>10027</td>
                    				<td>正式工</td>
                    				<td>教公办</td>
                    				<td class="ic-blue">
										<a href="teacherSeeinfo.html" num="1"><i class="fa fa-eye"></i></a>
										<i class="fa fa-ban forbidden"></i>
										<i class="fa fa-trash-o" ></i>
                    				</td>
                    			</tr>
                    		</tbody>
                    	</table>
                    		
                    		<!--已分配-->
                    		<table class="admin-list border none">
                    		<thead>
                    			<tr>
                    				<th>姓名</th>
                    				<th>性别</th>
                    				<th>账号</th>
                    				<th>员工类型</th>
                    				<th>现任职务</th>
                    				<th>操作</th>
                    			</tr>
                    		</thead>
                    		<tbody>
                    			<tr>
                    				<td>陈小小</td>
                    				<td>女</td>
                    				<td>10027</td>
                    				<td>正式工</td>
                    				<td>教公办</td>
                    				<td class="ic-blue">
										<a href="teacherFileManagement.html"><i class="fa fa-edit" title="编辑"></i></a> 
										<i class="fa fa-ban forbidden" title="禁用"></i>
										<i class="fa fa-trash-o" title="删除"></i>
                    				</td>
                    			</tr>
                    		</tbody>
                    	</table>
                    		<div>分页</div>
                    	</div>
                    
                    </div>

				</div>

				<!--右侧栏-->
				<!-- @include('school.template.right_notice') -->
				<div class="col-xs-12 left"></div>

				<!-- 聊天窗口 -->
				<!-- @include('school.template.talk') -->
				<div class="chatRoom"></div>
			</div>
		</div>
	</div>
</div>
	
<!--遮罩层-->
	<div class="shad"></div>
	<!--script-->	
	<script type="text/javascript" src="../../../js/jquery-1.12.4.min.js" ></script>
	<script type="text/javascript" src="../../../js/index.js" ></script>
	<script type="text/javascript" src="../../../js/load1.js" ></script>
	<script type="text/javascript" src="../../../js/admin/admin.js" ></script>
	<script type="text/javascript" src="../../../js/admin/fileJs/teacherFiles.js" ></script>
	<script type="text/javascript" src="../../../js/admin/fileJs/fileSelectiononetwo.js" ></script>
	</body>
</html>


