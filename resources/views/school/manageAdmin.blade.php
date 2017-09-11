<!--内容-->
<div class="col-xs-12 col-sm-12" id="centery">
    <div class="row center1">
        <div class="col-md-2 col-xs-4"></div>
        <div class="col-md-8 col-xs-4" id="col">管理员档案</div>
        <div class="col-md-2 col-xs-4 p-r addAdminTag right-tag">
            <img class="addEmployee" src="{{ asset('images/school/addEmployee.png') }}" alt="" />
            <span class="create-employee">新建员工</span>
        </div>
    </div>
    <div class="school-container">
        @if($data['count'] == 0)
        <!--没有数据时显示-->
        <div class="ta-c no-content">
            <img src="{{ asset('images/LOGO.png') }}" alt=""/>
            <p>你还没有添加员工噢～</p>
        </div>
        @else
            @if($data['employees'][0] != null)
            <div class="emplooy-list">
                <div class="manageAdmin-wrap clear">
                    <div class="search-box clear p-r">
                        <input id="emSearchy" class="ic-input f-r" type="text" placeholder="请输入搜索内容" />
                        <i class="fa fa-search p-a gray blue-hover fs14"></i>
                    </div>
                    <table class="admin-list border">
                        <thead>
                        <tr>
                            <th>姓名</th>
                            <th>性别</th>
                            <th>账号</th>
                            <th>员工类型</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($data['employees'] as $employee)
                        <tr>
                            <td>{{ $employee->name }}</td>
                            <td>@if($employee['hasOneInfo']->gender == 1) 男 @else 女 @endif</td>
                            <td>{{ $employee->username }}</td>
                            <td>@if($employee['hasOneInfo']->formation == 1) 编织员工 @else 未编制 @endif</td>
                            <td class="ic-blue">
                                <i @if($employee->status == 0)style="color: #ddd" @endif onclick="window.location.href = @if($employee->status == 0) 'javascript:;'@else '/adminArchives/manager-archives/manager-info/{{ $employee->id }} @endif'" class="fa fa-eye"></i>
                                <i onclick="forbid({{ $employee->id }},{{$employee->status}})" class="fa @if($employee->status == 1)fa-ban @else fa-times-circle-o @endif center"></i>
                                <i class="fa fa-trash" data="{{$employee->id}}"></i>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                @if($data['employees'][0] == null)<span>没有搜索到内容</span>@endif
                <div class="f-r">{{ $data['employees']->links() }}</div>
                </div>
                <button class="btn-white search-return" onclick="window.history.back(-1);" >返 回</button>
            </div>
            @else
            <div class="ta-c no-content">
                <img src="{{ asset('images/LOGO.png') }}" alt=""/>
                <p>没有搜索到该员工噢～</p>
            </div>
            @endif
        @endif
        <div class="seeInfo-wrap d-n"></div>
    </div>
</div>


