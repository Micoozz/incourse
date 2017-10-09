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
                <input type="hidden" id="work_id" value="{{ isset($work_id)? $work_id : '' }}">
                <input type="hidden" id="course_id" error-increase="{{ isset($increase) ? $increase : '' }}" value="{{ isset($course)? $course : '' }}">
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
                            <span>{{ $exercise['subject'] }}</span>
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
                    <!--简答题-->
                    @if($exercise['categroy_id'] == 10 || $exercise['categroy_id'] == 11)
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
                    <!--听力题-->
<!--                     <li data-id="9" class="exer-in-list ting-li dan-xuan-only">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type">听力题</span>
                                ）</span>
                            <span>听下面1段对话，过后卷的相应位置。听完每段对话后，你都有10秒钟的时间来回答有关小题和阅读下一小题。每段对话仅读一遍。</span>
                            <audio class="d-b" controls="controls">
                                <source src="../../music.mp3" type="audio/mp3"/>
                                <embed height="100" width="100" src="song.mp3" />
                            </audio>
                        </div>
                        <hr/>
                        <div class="answer-box">
                            <单选题>
                            <div data-id="101" class="one-hw">
                                <div class="clear hw-question">
                                    <span>
                                        <span class="ic-blue">（<span class="do-hw-type">单选题</span>）</span>
                                        1.下列各句中，标点符号使用正确的一项是（）
                                    </span>
                                </div>
                                <div>
                                    <ul class="radio-wrap exer-list-ul dan-xuan-options">
                                        <li>
                                            <label class="ic-radio border p-r f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="A"/>
                                            </label>
                                            <span class="f-l">A：</span>

                                            <p class="f-l option">8只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio border p-r  f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="B"/>
                                            </label>
                                            <span class="f-l">B：</span>

                                            <p class="f-l option">16只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio border p-r  f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="C"/>
                                            </label>
                                            <span class="f-l">C：</span>

                                            <p class="f-l option">1只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio border p-r  f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="D"/>
                                            </label>
                                            <span class="f-l">D：</span>

                                            <p class="f-l option">2只</p>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <填空题>
                            <div data-id="102" class="one-hw">
                                <div class="clear hw-question">
                        <span>
                            <span class="ic-blue">（<span class="do-hw-type">填空题</span>）</span>
                            2.fgfgfgfggflgflgflhg<span class="blank-item" contenteditable="true">空1</span>hgkhghgkhlgkhlghkglhkg<span
                                class="blank-item" contenteditable="true">空2</span>hlgkhglhkghglg khglhkghgthg hghrtedwdssdsgd
                            ht jhyj hjhkjk jkjklh.
                        </span>
                                </div>
                            </div>
                            <作文题>
                            <div data-id="103" class="one-hw">
                                <div class="clear hw-question">
                                    <span>
                                        <span class="ic-blue">（<span class="do-hw-type">作文题</span>）</span>
                                        3.听录音写作文
                                    </span>
                                </div>
                                <div class="answer-box addFileBox">
                                    <p>请在纸上作答，拍照上传，以便老师查看</p>
                                    <button class="p-r of-h ic-blue addFileTool">
                                        <i class="tool"></i>
                                        <span>添加附件</span>
                                        <input class="addFile addFileCommon" type="file" />
                                    </button>
                                    <div class="imgs clear"></div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <!--阅读题-->
 <!--                    <li data-id="10" class="exer-in-list">
                        <div class="clear hw-question">
                            <i class="student_icons query"></i>
                            <span class="ic-blue">（2016 华东师大）（
                                <span class="do-hw-type">阅读题</span>
                                ）</span>
                            <span>阅读《三峡》和《观潮》，回答下列各小题</span>
                            <div>①四十年前，南方农村甚至小城，如果吃上一顿饺子，一定是最深刻的记忆之一。那时需要从买面粉、猪肉等原料开始，而这些都不易办到。好不容易材料齐了，头一关是和面，干了不行，稀了也不行。然后要将和好的面切成一个个小面团，再擀成饺子皮。这个难度同样不小，饺子皮要薄且圆，但太薄则易烂，太厚又煮不熟。

                                ②可以想见，这是一个浩大工程，全家分工，每个人都要撸起袖子加油干，还得提前几天就做准备。然而，全家总动员忙上大半天，做出来的饺子很可能并不好吃。

                                ③若干年后，终于有饺子皮卖了，包饺子瞬间简化了大半。渐渐地，城镇有人包饺子卖了，人们花几元钱就可以吃一顿。但不方便存放，必须现买现吃，且味道平平。

                                ④速冻饺子的出现则是一场革命。各种口味、各种品牌，高中低档，琳琅满目。平时买几袋冻在冰箱里，需要的时候，往锅里倒上水，烧开后放入饺子，几分钟捞起来就行，没有任何技术含量，时间成本、体力成本都可忽略不计。不想做饭的时候，许多人就煮饺子吃。

                                ⑤到底发生了什么，将饺子这一不可承受的浩大工程变成了懒人的首选？

                                ⑥这无论如何都是个奇迹！它不是来自伟大君王的高瞻远瞩、英雄人物的丰功伟业，也没有谁像家长那样去安排调度，统一指挥，而是源于普通人之间的合作。没错，源于平凡如你我的人之间通力合作。

                                ⑦在家庭范围内，合作的过程显而易见。有人擀皮，有人剁馅，包的包，煮的煮。然而，这种合作的范围极其有限，凭借的是管事人的安排、组织和协调。合作范围有限，意味着知识和技能有限，所能动用的资源也有限，因此，花费大量人力物力，成果却不如人意。后来，合作的范围不断扩大，从家庭到社区（小区门口包饺子卖），进而到全国（速冻水饺）。而且，速冻水饺的生产、运输和销售过程，必然会用到其他国家的技术、设备或人才。小小的饺子，可以说是全世界合作的产物。

                                ⑧合作范围的扩大产生了惊人的效果。现在，我们能够利用十倍百倍的人手，百倍千倍的知识技能，在全世界范围内调动资源，效率千倍万倍地增加，产量和质量极大提高 。人们利用素不相识甚至远在天边的人的成果，参与其中的每一个人都弄不懂完整的过程，只须做好经手的那一点工作。没有人能弄明白整个过程，但一切井井有条，各就各位，简单高效，仿佛有一只“看不见的手”在操控。

                                ⑨这就是扩展秩序及其显著成效。而且，由于合作范围扩大、合作方式更多样，我们更加独立了。任何商品，这家店没有，还有另一家；这个牌子没有，还有别的牌子。市场上买得到的任何东西都是如此，价格或许有涨跌，但供给不是问题。

                                ⑩饺子从古传到今，被封为民族特色美食，但为什么以前没有大规模生产？实际上，这并不涉及多么高精尖的技术难题，而只是因为出现了促进扩展秩序的制度环境。</div>
                            <div class="of-h border question-img">
                                <img src="../../images/Cj_bg.png" alt=""/>
                            </div>
                        </div>
                        <hr/>
                        <div class="answer-box">
                            <简答题>
                            <div data-id="104" class="one-hw">
                                <div class="clear hw-question">
                                    <span>
                                        <span class="ic-blue">（<span class="do-hw-type">简答题</span>）</span>
                                        1.请写一下你对主人公的理解
                                    </span>
                                </div>
                                <div class="answer-box addFileBox">
                                    <p>请在纸上作答，拍照上传，以便老师查看</p>
                                    <button class="p-r of-h ic-blue addFileTool">
                                        <i class="tool"></i>
                                        <span>添加附件</span>
                                        <input class="addFile addFileCommon" type="file" />
                                    </button>
                                    <div class="imgs clear"></div>
                                </div>
                            </div>
                        </div>
                    </li> -->
                    <!--计算题-->
                    @if($exercise['categroy_id'] == 9)
                        <li data-id="{{ $exercise['id'] }}" class="exer-in-list">
                            <div class="clear hw-question">
                                <i class="student_icons query"></i>
                                <span class="ic-blue">（2016 华东师大）（
                                    <span class="do-hw-type">计算题</span>
                                    ）</span>
                                <span>{!! $exercise['subject'] !!}</span>
                                <div class="of-h border question-img">
                                    <img src="{{ asset('images/Cj_bg.png') }}" alt=""/>
                                </div>
                            </div>
                            <hr/>
                            <div class="answer-box">
                                <简答题>
                                <div class="one-hw">
                                    <div class="clear hw-question">
                                        <span>1.请写一下你对主人公的理解</span>
                                    </div>
                                    <div class="answer-box addFileBox">
                                        <p>请在纸上作答，拍照上传，以便老师查看</p>
                                        <button class="p-r of-h ic-blue addFileTool">
                                            <i class="tool"></i>
                                            <span>添加附件</span>
                                            <input class="addFile addFileCommon" type="file" />
                                        </button>
                                        <div class="imgs clear"></div>
                                    </div>
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
    var accuracy = "{{ isset($accuracy) ? $accuracy * 100 : '' }}";
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