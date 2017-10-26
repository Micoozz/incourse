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
</style>
@section('CSS:OPTIONAL')
@endsection

@section('FOREEXERCISE')
<!--内容主体-->
<div class="do-hw-wrap clear">
    <div class="f-l change-exer"></div>
    <!--中间内容-->
    <div class="f-l do-hw">
        <div class="p-r view">
            <div class="answerQuestion answerModule">
                <ul class="ic-inline exercise-box">
                    <li data-id="{{$data[0]['id']}}" class="exer-in-list dan-xuan-only">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
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
                                        <p class="f-l option">{{$option[key($option)]}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            @elseif($data[0]['categroy_id'] == 3)
                                <!--填空题，多空题-->
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
                        <span class="span_br">正确答案是：<span class="green right_a">{{ $data[0]["categroy_id"] == 3? implode(',',$data[0]['answer']['answer']) : '' }}</span>，您的答案是：<span class="red user_answer"></span>，回答<span class="red isRight"></span>。作答用时<span class="expend_time"></span></span>
                        <span class="span_br">本体<span class="red">得分率</span>：68%，<span class="red">易错项</span>：B</span>
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
                <button class="answer_btn giveUp"><a href="javascript:;" title="">放弃答题</a></button>
            </span>
        </div>
    </div>
    <div class="f-r ta-r change-exer"></div>
</div>
@endsection

@section('JS:OPTIONAL')
<script type="text/javascript">
$(function(){
    var type = '{{$data[0]["categroy_id"]}}';
    var Stime = 0;
    var Mtime = 0;
    var NStime,NMtime = "00";
    var urlId = "{{$data[0]['id']}}";
    var isT = true;
    var Nowt = window.setInterval(function(){
        Stime++;
        if(Stime>=60){
            Stime = 0;
            Mtime++;
            if(Mtime<10){
                NMtime = '0'+Mtime;
            }else{
                NMtime = Mtime;
            }
        }
        if(Stime<10){
            NStime = "0" + Stime;
        }else{
            NStime = Stime;
        }
        if(NMtime>60){
            alert("您已超时");
            window.clearInterval(Nowt);
        }
        $(".time-string").text(NMtime+":"+NStime)
    }, 1000)
    var ENnum = ['A','B','C','D','E','F','G','H','I'];
    var nt = '';
    if(type != 3){
        for(var i = 0;i < $(".ic-radio").length;i++){
            var isThat = $(".ic-radio").eq(i);
            var clar = $(isThat).find("i").attr("data-answer");
            if(clar){
                nt += '，'+$(isThat).find("input").val();
            }
        }
        $(".right_a").text(nt.slice(1, nt.length));
    }
    $("#ensure").on("click",function(){
        window.clearInterval(Nowt);
        var tt = '';
        if(Mtime<=0){
            tt = Stime+'秒'
        }else{
            tt = Mtime+'分'+Stime+'秒'
        }
        $(".expend_time").text(tt)
        var ut = '';
        var student_t;
        if(type == 1 || type == 2){
            //单选题 || 多选题
            var narr = [];
            for(var j = 0;j<$(".ic-radio").length;j++){
                var that = $(".ic-radio").eq(j);
                var cla = $(that).find("i").attr("data-answer");
                var cls = $(that).find("i").attr("data-s");
                if(cla){
                    narr.push($(that).find("input").val());
                    $(that).find("i").addClass(cla + " fa-dot-circle-o");
                }else if(cls){
                    $(that).find("i").addClass(cls + " fa-dot-circle-o");
                }
                if(cls){
                    student_t = $(".ic-radio").eq(j).next("span.f-l").text().slice(0,1)
                    ut += '，' + student_t;
                    if(narr.indexOf(student_t)<0){
                        isT = false;
                    }
                }
            }
        }else if(type == 3){
            //填空题
            for(var j = 0;j<$(".blank-item").length;j++){
                student_t = $(".blank-item").eq(j).text()
                if(student_t == "空" + (j+1)){
                    student_t = '';
                }
                ut += '，'+student_t;
                if(arr.indexOf(student_t)<0){
                    isT = false;
                }
            }
        }
        $(".user_answer").text(ut.slice(1, ut.length));
        if(isT){
            $(".isRight").text("正确").removeClass("red").addClass("green");
            $(".user_answer").removeClass("red").addClass("green");
        }else{
            $(".isRight").text("错误");
        }
        $(this).css({display:"none"});
        $("#go_on").css({display:"block"});
        $(".answerResultModule").animate({height:'300px',opacity:1},500);
    })
    $("body").on("click",".radio-wrap li",function(){
        var that = $(this).find("i");
        answerChecked(that,type)
    })
    function answerChecked(obj,type){
        if(type == 1){
            //单选题
            $(".ic-radio.p-r.f-l i").removeClass("active fa-dot-circle-o").addClass("fa-circle-o");
            $(obj).removeClass("fa-circle-o").addClass("active fa-dot-circle-o");
            $(obj).attr("data-s",'student_answer');
        }else if(type == 2){
            //多选题
            $(obj).toggleClass("active fa-dot-circle-o");
            $(obj).attr("data-s",'student_answer');
        }else if(type == 3){
            //填空题，多空题
        }else if(type == 4){
            //判断题
        }else if(type == 5){
            //排序题
        }
    }
    $(".blank-item").click(function(){
        var index = $(this).index();
        var t = "空"+(1+index);
        if($(this).text() == t){
            $(this).text('');
        }
    })
    $("#go_on").on("click",function(){
        if(isT){
            $.ajax({
                url:'/correctExercise/'+urlId,
                type:'GET',
                success:function(){
                    window.location.reload()
                }
            })
        }else{
            window.location.reload()
        }
    })
})
</script>
@endsection