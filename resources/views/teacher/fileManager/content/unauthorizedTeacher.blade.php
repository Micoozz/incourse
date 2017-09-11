     <!--内容-->
     <div class="col-xs-12 col-sm-12" id="centery">
          <div class="files_nav">
               <span class="col-xs-3 col-sm-3"></span>
               <span class="col-xs-6 col-sm-6">教师档案管理</span>
               <span class="col-xs-3 col-sm-3 add"></span>
          </div>
        <!--   <div class="ic-container teacher_container">
               <div class="waitBox">
                    <div>
                         <img class="logo" src="{{ asset('images/LOGO.png') }}" alt="InCourse_logo" />
                    </div>
                    <div>正在加载已有档案。。。</div>
               </div>
          </div> -->
     
     <!--假数据内容-->
     <div class="school-container admin-container">
          <div class="manageAdmin-wrap">
               <div class="search-box clear p-r">
                    <span class="admeasure " num=1 onclick="window.location.href='/fileManager/teacher-file/authorized-teacher/{{ $parameter }}'">已分配</span>
                    <span class="admeasure on" num=2 onclick="window.location.href='/fileManager/teacher-file/unauthorized-teacher/{{ $parameter }}'">未分配</span>                                 
               <input class="ic-input f-r" id="stuSearch" @if($parameter == null) grade="{{ $grade->id }}" @else grade="{{ $parameter }}" @endif type="text" placeholder="请输入搜索内容" />
               <i class="fa fa-search p-a gray"></i>
               </div>             
               <!--已分配-->
          <table class="admin-list border  admin-on">
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
                    @foreach($data['unallot'] as $employee)
                    <tr>
                         <td>{{ $employee->name }}</td>
                         <td>@if($employee->hasOneInfo['gender'] ==1 ) 男 @else 女 @endif</td>
                         <td>{{ $employee->username }}</td>
                         <td>@if($employee->hasOneInfo['formation'] ==1 ) 编织 @else 未编制 @endif</td>
                         <td>教公办</td>
                         @if($employee->status == 1)
                         <td class="ic-blue">
                              <a href="/fileManager/teacher-file/teacher-add/{{ $employee->id }}" num="0">
                                   <i class="fa fa-edit"></i>
                              </a>

                              <i onclick="window.location.href='/employeeStatus/{{ $employee->id }}'" class="fa fa-ban forbidden" title="启动"></i>
                              <i class="fa fa-trash-o" ></i>
                         </td>
                         @else
                         <td class="ic-blue">
                              <a href="/fileManager/teacher-file/teacher-updata/{{ $employee->id }}" num="0">
                              <i class="fa fa-eye gray"></i> 
                              </a>
                              <i onclick="window.location.href='/employeeStatus/{{ $employee->id }}'" class="fa fa-times-circle-o" title="禁用"></i>
                              <i class="fa fa-trash-o" ></i>
                         </td>
                         @endif
                    </tr>
                    @endforeach
               </tbody>
               <!-- <div>分页</div>  -->
          </table>   
          </div>
     </div>
</div>