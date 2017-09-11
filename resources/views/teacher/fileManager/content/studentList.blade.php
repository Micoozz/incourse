
     @if(!empty($data['classAll']))
     <div class="col-xs-12 col-sm-12" id="centery">
           <!--假数据内容-->
          <div class="files_nav">
               <span class="col-xs-3 col-sm-3"></span>
               <span class="col-xs-6 col-sm-6">学生档案管理</span>
               <span class="col-xs-3 col-sm-3 add"><a href="/fileManager/{{ $mod }}/student-add/{{ $parameter }}"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;添加学生</a></span>
          </div>
          @if(!empty($data['studentAll']->toArray()['data']))
          <div class="school-container admin-container">
               <div class="manageAdmin-wrap">
                    <div class="search-box clear p-r">
                    <input id="stuSearch" @if($parameter == null) grade="{{ $grade->id }}" @else grade="{{ $parameter }}" @endif class="ic-input f-r" type="text" placeholder="请输入搜索内容" value="" />
                    <i class="fa fa-search p-a gray"></i>
                    </div>
                    <table class="admin-list border">
                    <thead>
                         <tr>
                              <th>学号</th>
                              <th>姓名</th>
                              <th>性别</th>
                              <th>账号</th>
                              <th>操作</th>
                         </tr>
                    </thead>
                    <tbody>
                    @foreach($data['studentAll'] as $student)
                         <tr>
                              <td>还不知道</td>
                              <td>{{ $student->name }}</td>
                              <td>@if($student->hasOnestu_Info->gender == 1) 男 @else 女 @endif</td>
                              <td>{{ $student->username }}</td>
                              <td class="ic-blue">
                                   <a href="/fileManager/{{ $mod }}/student-update/{{ $student->class_id }}/{{ $student->id }}"><i class="fa fa-eye"></i></a>
                                   <i class="fa fa-trash" onclick="window.location.href='/delStudent/{{ $student->id }}'" ></i>
                              </td>
                         </tr>
                    @endforeach
                    </tbody>
               </table>
                    <div>{{ $data['studentAll']->links() }}</div>
               </div>       
          </div>
          @else
          <div class="ic-container">
               <div class="waitBox apeak">
                    <div>
                         <img class="logo" src="{{ asset('images/LOGO.png') }}" alt="InCourse_logo" />
                    </div>
                    <div>你还没有添加学生噢~</div>
               </div>
          </div>
          @endif              
     </div>
     @else
     <div class="col-xs-12 col-sm-12" id="centery">
          <div class="ic-container">
               <div class="waitBox">
                    <div>
                         <img class="logo" src="{{ asset('images/LOGO.png') }}" alt="InCourse_logo" />
                    </div>
                    <div>请点击创建班级噢~</div>
               </div>
          </div>
     </div>
     @endif