<div id="homework" class="row">
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 old-p">
        <a href="#" data-toggle="modal" data-target="#myModal" class="modaladd" data-step="1" data-intro="点击此处添加学生作业">+&nbsp;添加作业</a>
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 center_title" style="font-size: 18px">
        一年一班作业（语文）
    </div>
    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 ">
        <div id="document">
            <a href="" data-step="2" data-intro="点击此处批改学生已完成的作业">
                <img src="/images/create.png" alt="">作业批改
            </a>
        </div>
    </div>
</div>
<div class="container-fluid" id="container">
    <div class="go_success">发布成功！</div>
    <div class="go_filed">撤销成功！</div>
    <div class="row new-creat" id="exl">
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">作业章节</div>
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">类型</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">发布时间</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">截止时间</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">状态</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">操作</div>
    </div>
    @foreach($data as $job)
    <div class="row new-creat"> 
        <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3">
            <span>{{$job->id}}</span>
            <a href="groupWorkViewjob">{{$job->title}}</a>
        </div> 
        <div class="col-lg-1 col-md-1 col-sm-1 col-xs-1 frb">{{$job->job_type == 1 ? '个人' : '小组'}}</div> 
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">{{date('m月d日 ',$job->pub_time)}}</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">{{date('m月d日',$job->deadline)}}</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 gray Noc">已发布</div>
        <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2">
            <a href="#" class="blue Nocfix" num='+jobs[i].id+'>撤销</a>
        </div>
    </div>
    @endforeach
</div>
<ul class="pagination fy">
{{$data->links()}}
</ul>