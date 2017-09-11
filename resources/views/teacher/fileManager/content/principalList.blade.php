<!--内容-->
<div class="col-xs-12 col-sm-12" id="centery">
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">校长档案管理</span>
		<span class="col-xs-3 col-sm-3 add"><a href="principalFileManagement.html"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;添加校长</a></span>
	</div>
	<div class="ic-container">
		<div class="waitBox">
			<div>
				<img class="logo" src="{{ asset('images/LOGO.png') }}" alt="InCourse_logo" />
			</div>
			<div>你还没有添加校长噢~</div>
		</div>
	</div>
	
	<!--假数据内容-->
	<div class="school-container admin-container">
    	<div class="manageAdmin-wrap">
    		<div class="search-box clear p-r">
     			<span class="admeasure on">已分配</span>
    			<span class="admeasure">未分配</span>                   			
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
    				<th>现任职务</th>
    				<th>操作</th>
    			</tr>
    		</thead>
    		<tbody>
    			<tr>
    				<td>陈小小</td>
    				<td>女</td>
    				<td>10027</td>
    				<td>教公办</td>
    				<td class="ic-blue">
						<a href="principaSeeinfo.html" num="1"><i class="fa fa-eye"></i></a>
						<i class="fa fa-ban forbidden"></i>
						<i class="fa fa-trash-o" ></i>
    				</td>
    			</tr>
    		</tbody>
    	</table>
		<div>分页</div>
    	</div>  
    </div>								
</div>