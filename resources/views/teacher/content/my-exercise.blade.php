<div class="admin-container">
    <div class="my-exer-room-head">
        <a class="icon-text-btn uploadExer-btn" href="/learningCenter/{{$class_id}}/{{$course_id}}/{{$mod}}/addExercise">
            <i class="uploadExerIcons"></i>
            <span>上传习题</span>
        </a>
        <div class="f-r">
            <span class="isMark notMark">我收藏的</span>
            <span class="isMark doMark active">我上传的</span>
        </div>
    </div>
    @if(empty($data))
    <div>
        <div class="ta-c no-content">
            <img src="/images/LOGO.png" alt="" />
            <p>请先上传习题噢～</p>
        </div>
    </div>
    @else
    {{--dd($data)--}}
    <!--筛选框-->
     <div class="filter-box border clear">
        <div>
            <span class="f-l fs14 filter-box-title">年级：</span>

            <div class="select-form clear">
                <div>
                    <p class="ic-text">
                        <span>全部年级</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        @foreach($select_data["select_grade"] as $id => $title)
                        <li>{{$title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <span class="f-l fs14 filter-box-title">章节：</span>

            <div class="select-form clear">
                <div>
                    <p class="ic-text">
                        <span>全部篇章</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        @foreach($select_data["select_unit"] as $id => $title)
                        <li>{{$title}}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <p class="ic-text">
                        <span>全部小节</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        @foreach($select_data["select_section"] as $id => $title)
                        <li>{{$title}}</li>
                        @endforeach
                    </ul>
                </div>
                <div>
                    <p class="ic-text">
                        <span>全部题型</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        @foreach($select_data["select_categroy"] as $id => $title)
                        <li>{{$title}}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <span class="f-l fs14 filter-box-title">关键字：</span>

            <div class="select-form clear">
                <input class="ic-input kw" type="text" placeholder="请输入关键字"/>
            </div>
        </div>
        <div class="f-r">
            <button class="ic-btn">查 找</button>
            <button class="btn-white">清 空</button>
        </div>
    </div>
    <div class="exer-list">
        @foreach($data as $exercise)
        <div data-id="{{$exercise->id}}" class="exer-in-list border {{$exercise->categroy_id == 5 ? "lian-xian-".$exercise->id : ""}}">
            <span class="exer-type-list">{{$exercise->cate_title}}</span>

            <div class="exer-wrap">
                <div class="clear">
                    <span class="f-l">题目：</span>

                    <div class="f-l question">{!!$exercise->subject!!}</div>
                </div>
                <div class="clear answer-box">
                    <span class="f-l">答案：</span>
                    @if($exercise->categroy_id == 1 || $exercise->categroy_id == 2)  
                    <div class="f-l">
                        <ul class="radio-wrap exer-list-ul">
                            @foreach($exercise->options as $option)
                            <li>
                                <label class="ic-radio border p-r f-l {{in_array(key($option),$exercise->answer) ? "active" : ""}}">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="radio" name="radio" value="{{key($option)}}" {{in_array(key($option),$exercise->answer) ? "checked" : ""}}/>
                                </label>
                                <span class="f-l">@if($loop->index == 0) A @elseif($loop->index == 1) B @elseif($loop->index == 2) C @elseif($loop->index == 3) D @endif:</span>

                                <p class="f-l option">{{$option[key($option)]}}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @elseif($exercise->categroy_id == 3)
                    <div class="f-l">
                        <ul class="exer-list-ul">
                            @foreach($exercise->answer as $key => $answer)
                            <li>
                                <span class="f-l">{{$key+1}}.</span>

                                <p class="f-l option">{{$answer}}</p>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                    @elseif($exercise->categroy_id == 4)

                    @elseif($exercise->categroy_id == 5)
                    <div class="f-l box_hpb">
                        <div class="line_hpb">
                            <ul class="question_hpb">
                                @foreach($exercise->options[0] as $option)
                                <li style="top:{{$loop->index * 54}}px;" >{{$option[key($option)]}}</li>
                                @endforeach
                            </ul>
                            <div class="container_hpb">
                                <canvas class="canvas1" width="322">您的浏览器暂不支持Canvas！</canvas>
                                <canvas class="canvas2" width="322">您的浏览器暂不支持Canvas！</canvas>
                            </div>
                            <ul class="answer_hpb">
                                @foreach($exercise->options[1] as $key => $option)
                                <li style="top:{{$loop->index * 54}}px;" >{{$option[key($option)]}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="exer-foot clear">
                    <ul class="f-r ic-inline">
                        <li>
                            <a class="ic-blue" href="">
                                <i class="fa fa-eye"></i>
                                <span>查看解析</span>
                            </a>
                        </li>
                        <li>
                            <a class="ic-blue" href="/learningCenter/{{$class_id}}/{{$course_id}}/{{$mod}}/addExercise/{{$exercise->id}}">
                                <i class="fa fa-edit"></i>
                                <span>编辑</span>
                            </a>
                        </li>
                        <li>
                            <a class="ic-blue exer-list-delete">
                                <i class="fa fa-trash-o"></i>
                                <span>删除</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 ">
            <ul class="pagination fy">
            {{$data->links()}}
            </ul>
        </div>
    </div>
    @endif
</div>