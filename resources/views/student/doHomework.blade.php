<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>InCourse</title>
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/font-awesome.min.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/incourseReset.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/exercise.css') }}"/>
    <link rel="stylesheet" href="{{ asset('css/student/doHomework.css') }}"/>
</head>
<body onbeforeunload="return  checkLeave()">
<div class="fff-bg do-homework-wrap">
    <div class="black-bg hw-title">第一章：字音的解析</div>
    <div class="hw-time-box">
        <div class="p-r">
            <div class="p-r hw-time-inner">
                <span class="ic-blue p-a answer-sheet-icon d-n">
                    <i class="fa fa-file-text-o"></i>
                    <span>答题卡</span>
                </span>
                <i class="fa fa-clock-o"></i>
                <span>计时器</span>
                <ul class="p-r hw-time">
                    <li>
                        <i class="fa fa-angle-up"></i>
                    </li>
                    <li class="time-string">00:00</li>
                    <li>
                        <i class="fa fa-angle-down"></i>
                    </li>
                </ul>
            </div>
            <p class="p-a exer-num">
                <span class="ic-blue big-num">1</span>
                <span class="gray">/{{ count($data) }}</span>
            </p>
        </div>
    </div>

    <!--内容主体-->
    <div class="do-hw-wrap clear">
        <div class="f-l change-exer">
            <button id="fa-angle-left" class="fa fa-angle-left d-n"></button>
        </div>
        <!--中间内容-->
        <div class="f-l do-hw">
            <div class="of-h p-r view">
                <input type="hidden" id="work_id" value="{{ isset($work_id) ? $work_id : '' }}">
                <input type="hidden" id="course_id" error-increase="{{ isset($increase) ? $increase : '' }}" value="{{ isset($course) ? $course : '' }}">
                <ul class="ic-inline p-a exercise-box">
                 @foreach($data as $key => $exercise)
                    <!--单选题-->
                   @if($exercise['categroy_id'] == 1)
                    <li data-id="{{ $exercise['id'] }}"  class="exer-in-list dan-xuan-only">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type" parent-id="{{ isset($exercise['parent_id'])? $exercise['parent_id'] : ''}}">{{ $exercise['categroy_title'] }}</span>
                                ）</span>
                            <span>{!! $exercise['subject'] !!}</span>
                        </div>
                        <div>
                            <ul class="radio-wrap exer-list-ul dan-xuan-options">
                                @foreach($exercise['options'] as $option)
                                <li data-option="{{ array_keys($option)[0] }}">
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="radio" name="radio" value="{{ array_keys($option)[0] }}"/>
                                    </label>
                                    <div class="radio-cen" display="inline-block">
                                        <span class="f-l">{{ $abcList[$loop->index] }}：</span>
                                        <p class="f-l option">{{ $option[array_keys($option)[0]] }}</p>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @endif
                    <!--多选题-->
                    @if($exercise['categroy_id'] == 2)
                    <li data-id="{{ $exercise['id'] }}" class="exer-in-list duo-xuan-only">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type" parent-id="{{ isset($exercise['parent_id'])? $exercise['parent_id'] : ''}}">{{ $exercise['categroy_title'] }}</span>
                                ）</span>
                            <span>{!! $exercise['subject'] !!}</span>
                        </div>
                        <div>
                            <ul class="radio-wrap exer-list-ul">
                                @foreach($exercise['options'] as $option)
                                <li data-option="{{ array_keys($option)[0] }}">
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="checkbox" name="checkbox" value="{{ array_keys($option)[0] }}"/>
                                    </label>
                                    <div class="radio-cen" display="inline-block">
                                        <span class="f-l">{{ $abcList[$loop->index] }}：</span>
                                        <p class="f-l option">{{ $option[array_keys($option)[0]] }}</p>
                                    </div>
                                    
                                </li>
                                @endforeach
                            </ul>
                        </div>
                    </li>
                    @endif
                    <!--填空题，多空题-->
                    @if($exercise['categroy_id'] == 3)
                    <li data-id="{{ $exercise['id'] }}"  class="exer-in-list">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type" parent-id="{{ isset($exercise['parent_id'])? $exercise['parent_id'] : ''}}">{{ $exercise['categroy_title'] }}</span>
                                ）</span>
                        <span>
                            {!! $exercise['subject'] !!}
                        </span>
                        </div>
                    </li>
                    @endif
                    <!--判断题-->
                    @if($exercise['categroy_id'] == 4)
                    <li data-id="{{ $exercise['id'] }}"  class="exer-in-list">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type" parent-id="{{ isset($exercise['parent_id'])? $exercise['parent_id'] : ''}}">{{ $exercise['categroy_title'] }}</span>
                                ）</span>
                            <span>{!! $exercise['subject'] !!}</span>
                        </div>
                        <div class="answer-box">
                            <ul class="pan-duan no-active">
                                <li>
                                    <i class="uploadExerIcons right"></i>
                                    <span class="pan-duan-answ">正确</span>
                                </li>
                                <li>
                                    <i class="uploadExerIcons wrong"></i>
                                    <span class="pan-duan-answ">错误</span>
                                </li>
                            </ul>
                        </div>
                    </li>
                    @endif
                    <!--排序题-->
                    @if($exercise['categroy_id'] == 6)
                    <li data-id="{{ $exercise['id'] }}" class="exer-in-list">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type" parent-id="{{ isset($exercise['parent_id'])? $exercise['parent_id'] : ''}}">{{ $exercise['categroy_title'] }}</span>
                                ）</span>
                            <span>{!! $exercise['subject'] !!}</span>
                        </div>
                        <div class="answer-box">
                            <ul class="exer-list-ul sortable">
                            @foreach($exercise['options'] as $option)
                                <li class="ui-state-default" data-option="{{ array_keys($option)[0] }}">
                                    <span class="f-l" data-id="{{ array_keys($option)[0] }}" exercise-id="{{ array_keys($option)[0] }}">排序{{ $loop->iteration }}：</span>
                                    <p class="f-l option">{{ array_values($option)[0] }}</p>
                                </li>
                            @endforeach    
                            </ul>
                        </div>
                    </li>
                    @endif
                    <!--画图题,作文题-->
                    <!-- <li data-id="{{ $key+1 }}" class="exer-in-list">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type">画图题</span>
                                ）</span>
                            <span>一个运动场的形状是：中间是个长方形，长是40米，宽20米；两头是以宽为直径的各一个半圆形。请你有1：1000的比例尺画出这个运动场。请你先计算出长宽所需数据，后在下面画图。</span>
                        </div>
                        <hr/>
                        <div class="answer-box addFileBox">
                            <p>请在纸上作答，拍照上传，以便老师查看</p>
                            <button class="p-r of-h ic-blue addFileTool">
                                <i class="tool"></i>
                                <span>添加附件</span>
                                <input class="addFile addFileCommon" type="file" />
                            </button>
                            <div class="imgs clear"></div>
                        </div>
                    </li> -->
                    <!--连线题-->
                    @if($exercise['categroy_id'] == 5)
                    <li data-id="{{ $exercise['id'] }}" id="matching" class="exer-in-list lian-xian-{{ $exercise['id'] }}">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type" parent-id="{{ isset($exercise['parent_id'])? $exercise['parent_id'] : ''}}">{{ $exercise['categroy_title'] }}</span>
                                ）</span>
                            <span>{!! $exercise['subject'] !!}</span>
                        </div>
                        <div class="answer-box">
                            <div class="box_hpb">
                                <div class="line_hpb">
                                    <ul class="question_hpb">
                                        @foreach($exercise['options'][0] as $option)
                                            <li style="top:{{ $loop->index * 54 }}px;">{{ array_values($option)[0] }}</li>
                                        @endforeach
                                    </ul>
                                    <div class="container_hpb">
                                        <canvas class="canvas1" width="322">您的浏览器暂不支持Canvas！</canvas>
                                        <canvas class="canvas2" width="322">您的浏览器暂不支持Canvas！</canvas>
                                    </div>
                                    <ul class="answer_hpb">
                                        @foreach($exercise['options'][1] as $option)
                                        <li style="top:{{ $loop->index * 54 }}px;">{{ array_values($option)[0] }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                                <button class="ic-blue f-r return_hpb">回退</button>
                            </div>
                        </div>
                    </li>
                    @endif
                    <!--简答题 解答题-->
                    @if($exercise['categroy_id'] == 10 || $exercise['categroy_id'] == 11 || $exercise['categroy_id'] == 9)
                    <li data-id="{{ $exercise['id'] }}" class="exer-in-list">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type" >{{ $exercise['categroy_title'] }}</span>
                                ）</span>
                        <span>{!! $exercise['subject'] !!}</span>
                        </div>
                        <hr/>
                        <div class="answer-box">
                            <div class="ic-editor border">
                                <div class="tools clear">
                                    <div class="f-l p-r of-h addFileTool">
                                        <i class="tool"></i>
                                        <span>添加附件</span>
                                        <input class="addFile" type="file" />
                                    </div>
                                </div>
                                <div class="editor-content" contenteditable="true"></div>
                            </div>
                        </div>
                    </li>
                    @endif
                    
                    <!--答题卡-->
                    @endforeach
                    <li class="answer-sheet ta-c">
                        <p class=" hw-order ta-c">
                        @for($i=1; $i<= count($data); $i++)
                            <span>{{ $i }}</span>
                        @endfor
                        </p>
                        <button class="ic-btn answer-sheet-submit">交卷并查看结果</button>
                    </li>
                </ul>
               
            </div>

            <!--题目序号-->
            <p class="ta-c hw-order hw-order-index">
                @for($i=1; $i<= count($data); $i++)
                    <span>{{ $i }}</span>
                @endfor
            </p>
        </div>
        <div class="f-r ta-r change-exer">
            <button id="fa-angle-right" class="fa fa-angle-right"></button>
        </div>
    </div>

    <div class="big-img-box d-n">
        <p>
            <i class="fa fa-times-circle-o f-r p-r"></i>
        </p>
        <img src="" alt=""/>
    </div>
</div>

<!--遮罩层-->
<div class="ic-modal d-n"></div>

<!--确认弹出框-->
<div class="delete-modal d-n">
    <div class="clear">
        <i class="fa fa-exclamation-circle f-l"></i>
        <div class="f-l ic-text">
            <p class="msg">确认交卷？</p>
            <p class="words">本套练习还有题目未作答</p>
        </div>
    </div>
    <div class="btns">
        <div class="f-r">
            <button class="btn-white">取 消</button>
            <button id="handPaper" class="ic-btn">交 卷</button>
        </div>
    </div>
</div>

<script src="{{ asset('js/jquery-1.12.4.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/jquery-ui-sortable.min.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/incourseReset.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/exercise.js') }}" charset="utf-8"></script>
<script src="{{ asset('js/student/doHomework.js') }}" charset="utf-8"></script>
<script type="text/javascript">
    var token = "{{csrf_token()}}";
    var accuracy = "{{ isset($accuracy) ? $accuracy : '' }}";
    var matching =  $('#matching').attr('data-id');
    var ligature = $('.question_hpb').children('li').length;
    var courseId = "{{$course}}";
    $(function(){
        var a = ''
        var c = ''
        $('.blank-item').focus(function() {
            if($(this).attr('num')!='1'){
                a = $(this).text()
                $(this).text(' ')
            }
        })
        $('.blank-item').blur(function() {
            c = $(this).text()
            if(c !== ' ') {
                $(this).text(c)
                $(this).attr('num',1)
            } else {
                $(this).text(a)
            }

        })
    })

    function checkLeave(){
        return "11";
    }
</script>
</body>
</html>