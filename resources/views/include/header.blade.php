<div class="navbar">
    <div>
        <div class="indexLogo">
            <img src="/images/logo (2).png"/>
            <!-- <img src="/images/Hpb_schoolLogo.png" class="schoolLogo"/>
            <b>湖南工程学院</b> -->
        </div>
        <div class="f-r p-r personCenter">
            <img class="big-head" src="/images/01.png" alt="头像" />
            <span>孙天宇 你好</span>
            <i class="fa fa-angle-down"></i>
            <ul class="p-a d-n">
                <li><a href="/logout">退出</a></li>
            </ul>
        </div>
        @if(empty($grade_id))
        <ul class="nav head_nav">
            <li class="schoolMain">
                <a href="/media">学校首页</a>
                <div>
                    <a href="javascript:;">@与我相关</a>
                </div>
            </li>
            <li><a href="/teachingCenter" class="blue">学习中心</a></li>
            <li><a href="javascript:;">班级中心</a></li>
        </ul>
        @endif
    </div>
</div>