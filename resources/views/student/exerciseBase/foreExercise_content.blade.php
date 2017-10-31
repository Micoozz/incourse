@extends('student.exerciseBase.foreExercise_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')
<style type="text/css">
    .do-hw .exercise-box>li{
        height: 300px;
    }
    .do-hw{
        height: auto;
        overflow: hidden;
        position: relative;
        width: 998px;
    }
    .do-hw .p-r.view{
        height: auto;
        overflow: hidden;
    }
    .p-r.view .exercise-box{
        height: 300px;
    }
    .answerBtn{
        width: 100%;
        height: 40px;
        position: absolute;
        bottom: 0;
        left: 0;
    }
    .answerBtn span{
        width: 200px;
        display: block;
        height: 28px;
        margin: 6px auto;
    }
    .answer_btn{
        padding: 0 10px;
        display: block;
        height: 100%;
        color: #fff;
        background: #168bee;
        border-radius: 4px;
        border: none;
        cursor: pointer;
        float: left;
        margin-left: 30px;
    }
    #ensure,#go_on{
        margin-left: 0;
    }
    #go_on{
        display: none;
    }
    .answer_btn.giveUp{
        background: none;
        border: 1px solid #d9d9d9;
    }
    .answer_btn.giveUp a{
        color: #333;
    }
    .answer_btn.giveUp a:hover,.answer_btn.giveUp a:focus{
        text-decoration: none;
        outline: none;
    }
    .answerModule{
        width: 100%;
        height: 300px;
        overflow: hidden;
    }
    .answerResult{
        padding-top: 20px;
        height: auto;
        overflow: hidden;
    }
    .answerResultModule{
        padding-top: 20px;
        width: 100%;
        height: 0;
        overflow: hidden;
        opacity: 0;
        border-top: 1px solid #d9d9d9;
        position: relative;
    }
    .answerResultModule p{
        width: 100%;
        height: 100%;
    }
    .answerResultModule p .span_br{
        width: 100%;
        line-height: 30px;
        margin-bottom: 10px;
        display: block;
    }
    ul.radio-wrap .ic-radio>i{
        width: 100%;
        height: 100%;
        opacity: 1;
        color: #aaa;
    }
    ul.radio-wrap .ic-radio>i.active{
        color: #168bee;
        background: none;
    }
    ul.radio-wrap .ic-radio>i.fa-dot-circle-o.right_answer{
        color: #3DBD7D;
    }
    ul.radio-wrap .ic-radio>i.fa-dot-circle-o.active.student_answer{
        color: #FF5B5B;
    }
    .noData{
        width: 100%;
        height: 50px;
        line-height: 50px;
        font-size: 18px;
        color: #168bee;
        margin: 100px auto 0;
        text-align: center;
    }
    .goBackBtn{
        width: 100%;
        height: 28px;
        margin-top: 20px;
        position: relative;
    }
    #goBack{
        position: absolute;
        left: 50%;
        margin-left: -24px;
    }
    .f-l.TOrF_img{
        margin-top: 0;
    }
    .TOrF_img_title{
        margin-left: 10px;
    }
    .TOrF_img.right_Img.active{
        background-position: -22px -86px;
    }
    .TOrF_img.error_Img.active{
        background-position: -70px -86px;
    }
    .right_Img{
        background-position: -20px -50px;
    }
    .error_Img{
        background-position:-68px -50px;
    }
</style>
@section('CSS:OPTIONAL')
@endsection

@section('FOREEXERCISE')
<!--内容主体-->
<div class="do-hw-wrap clear">
    <div class="f-l change-exer"></div>
    <!--中间内容-->
    <div class="f-l do-hw">
        @if(empty($data))
            <div class="noData">该章节的错题都已经答对。</div>
            <div class="goBackBtn">
                <button class="answer_btn" id="goBack" onclick="window.history.go(-1)">返回</button>
            </div>
        @else
        <div class="p-r view">
            <div class="answerQuestion answerModule">
                <ul class="ic-inline exercise-box">
                    <li data-id="{{$data[0]['id']}}" class="exer-in-list dan-xuan-only" data-score="{{ $data[0]['score'] }}">
                        <div class="clear hw-question">
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type">{{$data[0]['categroy_title']}}</span>
                                ）</span>
                            <span>{!!$data[0]['subject']!!}</span>
                        </div>
                        <div>
                            @if($data[0]['categroy_id'] == 1 || $data[0]['categroy_id'] == 2)
                                <!--单选题-->
                                <ul class="radio-wrap exer-list-ul dan-xuan-options">
                                    @foreach($data[0]['options'] as $option)
                                    <li>
                                        <span class="ic-radio p-r f-l">
                                            <i class="p-a fa fa-circle-o" data-answer="{{ in_array(key($option),$data[0]['answer']['answer'])?'right_answer':'' }}" data-s=""></i>
                                            <input type="radio" name="radio1" value="{{$abcList[$loop->index]}}"/>
                                        </span>
                                        <span class="f-l">{{$abcList[$loop->index]}}：</span>
                                        <p class="f-l option" data-key="{{ key($option) }}">{{$option[key($option)]}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            @elseif($data[0]['categroy_id'] == 3)
                                <!--填空题，多空题-->
                            @elseif($data[0]['categroy_id'] == 4)
                                <!-- 判断题 -->
                                <ul class="exer-list-ul">
                                    <li>
                                        <span data-answer-num="1" class="f-l TOrF_img right_Img"></span>
                                        <span class="TOrF_img_title">正确</span>
                                    </li>
                                    <li>
                                        <span data-answer-num="0" class="f-l TOrF_img error_Img"></span>
                                        <span class="TOrF_img_title">错误</span>
                                    </li>
                                </ul>
                            @elseif($data[0]['categroy_id'] == 6)
                                <!-- 排序题 -->
                                <ul class="exer-list-ul" id="simpleList">
                                    @foreach($data[0]['options'] as $option)
                                    <li data-key='{{key($option)}}'><span class="sortTitle">排序{{$abcList[$loop->index]}}</span><span>：</span><span class="TOrF_img_title">{{$option[key($option)]}}</span></li>
                                    @endforeach
                                </ul>
                            @endif
                        </div>
                    </li>
                    <!--连线题-->
                    <!-- <li data-id="7" class="exer-in-list lian-xian-7">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type">连线题</span>
                                ）</span>
                            <span>请把对应的题目连上线</span>
                        </div>
                        <div class="answer-box">
                            <div class="box_hpb">
                                <div class="line_hpb">
                                    <ul class="question_hpb">
                                        <li style="top:0;">湖广会馆放到奋斗奋斗方法</li>
                                        <li style="top:54px;">大妈</li>
                                        <li style="top:108px;">大嫂</li>
                                    </ul>
                                    <div class="container_hpb">
                                        <canvas class="canvas1" width="322">您的浏览器暂不支持Canvas！</canvas>
                                        <canvas class="canvas2" width="322">您的浏览器暂不支持Canvas！</canvas>
                                    </div>
                                    <ul class="answer_hpb">
                                        <li style="top:0;">哥哥</li>
                                        <li style="top:54px;">大姨</li>
                                        <li style="top:108px;">大妈</li>
                                    </ul>
                                </div>
                                <button class="ic-blue f-r return_hpb">撤销 <img src="{{asset('images/revoke.png')}}" alt=""/></button>
                            </div>
                        </div>
                    </li> -->
                </ul>
            </div>
            <div class="answerResult answerModule">
                <div class="answerResultModule">
                    <p>
                        <span class="span_br">正确答案是：<span class="green right_a" data-r="{{ json_encode($data[0]['answer']['answer'],JSON_UNESCAPED_UNICODE) }}">{{ $data[0]["categroy_id"] == 3? implode(',',$data[0]['answer']['answer']) : '' }}</span>，您的答案是：<span class="red user_answer"></span>，回答<span class="red isRight"></span>。作答用时<span class="expend_time"></span></span>
                        <!-- <span class="span_br">本体<span class="red">得分率</span>：68%，<span class="red">易错项</span>：B</span> -->
                        <span class="span_br">解析：无</span>
                        <span class="span_br">来源：2017年湖南工程学院初中毕业升学考试：第三章语病解析与修改，第四题。</span>
                    </p>
                </div>
            </div>
        </div>
        <div class="answerBtn">
            <span>
                <button class="answer_btn" id="ensure">确定</button>
                <button class="answer_btn" id="go_on">继续答题</button>
                <button class="answer_btn giveUp"><a href="#" onclick="window.history.go(-1)" title="">放弃答题</a></button>
            </span>
        </div>
        @endif
    </div>
    <div class="f-r ta-r change-exer"></div>
</div>
@endsection

@section('JS:OPTIONAL')
<script src="/js/Sortable.min.js"></script>
<script type="text/javascript">
    var type = '{{isset($data[0]["categroy_id"]) ? $data[0]["categroy_id"] : ""}}';
    var urlId = "{{isset($data[0]['id']) ? $data[0]['id'] : ''}}";
    var token = "{{ csrf_token()}}";
    var typeId = "{{ $type_id }}";
</script>
<script src="/js/student/foreExercise_content.js"></script>
@endsection