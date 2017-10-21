@extends('student.exerciseBase.foreExercise_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
@endsection

@section('FOREEXERCISE')
<!--内容主体-->
<div class="do-hw-wrap clear">
    <div class="f-l change-exer">
        <button id="fa-angle-left" class="fa fa-angle-left d-n"></button>
    </div>
    <!--中间内容-->
    <div class="f-l do-hw">
        <div class="of-h p-r view">
            <ul class="ic-inline p-a exercise-box">
                <!--完形填空-->
                <li data-id="12" class="exer-in-list dan-xuan-only">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">完形填空</span>
                            ）</span>
                        <span>fgfgfgfggflgflgflhg<span class="blank-item" contenteditable="true">空1</span>hgkhghgkhlgkhlghkglhkg<span
                            class="blank-item" contenteditable="true">空2</span>hlgkhglhkghglg khglhkghgthg hghrtedwdssdsgd
                        ht jhyj hjhkjk jkjklh.
                    </span>
                    </div>
                    <div class="wan-xing-tk-only">
                        <div class="wan-xing-tk-option clear">
                            <span class="f-l id">1.</span>
                            <ul class="f-l radio-wrap exer-in-list ic-inline dan-xuan-options">
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="radio" name="radio1_1" value="A"/>
                                    </label>
                                    <span class="f-l">A：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="radio" name="radio1_1" value="B"/>
                                    </label>
                                    <span class="f-l">B：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="radio" name="radio1_1" value="C"/>
                                    </label>
                                    <span class="f-l">C：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="radio" name="radio1_1" value="D"/>
                                    </label>
                                    <span class="f-l">D：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                            </ul>
                        </div>
                        <div class="wan-xing-tk-option clear">
                            <span class="f-l id">2.</span>
                            <ul class="f-l radio-wrap exer-in-list ic-inline dan-xuan-options">
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="radio" name="radio1_2" value="A"/>
                                    </label>
                                    <span class="f-l">A：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="radio" name="radio1_2" value="B"/>
                                    </label>
                                    <span class="f-l">B：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="radio" name="radio1_2" value="C"/>
                                    </label>
                                    <span class="f-l">C：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="ic-blue-bg p-a"></i>
                                        <input type="radio" name="radio1_2" value="D"/>
                                    </label>
                                    <span class="f-l">D：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </li>
                <!--单选题-->
                <li data-id="1" class="exer-in-list dan-xuan-only">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">单选题</span>
                            ）</span>
                        <span>下列各句中，标点符号使用正确的一项是（）</span>
                    </div>
                    <div>
                        <ul class="radio-wrap exer-list-ul dan-xuan-options">
                            <li>
                                <label class="ic-radio border p-r f-l">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="radio" name="radio1" value="A"/>
                                </label>
                                <span class="f-l">A：</span>

                                <p class="f-l option">8只</p>
                            </li>
                            <li>
                                <label class="ic-radio border p-r  f-l">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="radio" name="radio1" value="B"/>
                                </label>
                                <span class="f-l">B：</span>

                                <p class="f-l option">16只</p>
                            </li>
                            <li>
                                <label class="ic-radio border p-r  f-l">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="radio" name="radio1" value="C"/>
                                </label>
                                <span class="f-l">C：</span>

                                <p class="f-l option">1只</p>
                            </li>
                            <li>
                                <label class="ic-radio border p-r  f-l">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="radio" name="radio1" value="D"/>
                                </label>
                                <span class="f-l">D：</span>

                                <p class="f-l option">2只</p>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--多选题-->
                <li data-id="2" class="exer-in-list duo-xuan-only">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">多选题</span>
                            ）</span>
                        <span>下列各句中，标点符号使用正确的一项是（）</span>
                    </div>
                    <div>
                        <ul class="radio-wrap exer-list-ul">
                            <li>
                                <label class="ic-radio border p-r f-l">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="checkbox" name="checkbox" value="A"/>
                                </label>
                                <span class="f-l">A：</span>

                                <p class="f-l option">8只</p>
                            </li>
                            <li>
                                <label class="ic-radio border p-r f-l">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="checkbox" name="checkbox" value="B"/>
                                </label>
                                <span class="f-l">B：</span>

                                <p class="f-l option">16只</p>
                            </li>
                            <li>
                                <label class="ic-radio border p-r f-l">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="checkbox" name="checkbox" value="C"/>
                                </label>
                                <span class="f-l">C：</span>

                                <p class="f-l option">1只</p>
                            </li>
                            <li>
                                <label class="ic-radio border p-r f-l">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="checkbox" name="checkbox" value="D"/>
                                </label>
                                <span class="f-l">D：</span>

                                <p class="f-l option">2只</p>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--填空题，多空题-->
                <li data-id="3" class="exer-in-list">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">填空题</span>
                            ）</span>
                    <span>fgfgfgfggflgflgflhg<span class="blank-item" contenteditable="true">空1</span>hgkhghgkhlgkhlghkglhkg<span
                            class="blank-item" contenteditable="true">空2</span>hlgkhglhkghglg khglhkghgthg hghrtedwdssdsgd
                        ht jhyj hjhkjk jkjklh.
                    </span>
                    </div>
                </li>
                <!--判断题-->
                <li data-id="4" class="exer-in-list">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">判断题</span>
                            ）</span>
                        <span>鲁滨孙是英国作家笛福写的小说《鲁滨孙漂流记》中的主人公。他具有勇敢、坚强、面对困难不屈不挠的精神。（）</span>
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
                <!--排序题-->
                <li data-id="5" class="exer-in-list">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">排序题</span>
                            ）</span>
                        <span>请给下列排序</span>
                    </div>
                    <div class="answer-box">
                        <ul class="exer-list-ul sortable">
                            <li class="ui-state-default">
                                <span class="f-l" data-order="3">排序A：</span>
                                <p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, animi aperiam blanditiis cupiditate</p>
                            </li>
                            <li class="ui-state-default">
                                <span class="f-l" data-order="1">排序B：</span>
                                <p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</p>
                            </li>
                            <li class="ui-state-default">
                                <span class="f-l" data-order="4">排序C：</span>
                                <p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</p>
                            </li>
                            <li class="ui-state-default">
                                <span class="f-l" data-order="2">排序D：</span>
                                <p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</p>
                            </li>
                        </ul>
                    </div>
                </li>
                <!--画图题,作文题-->
                <li data-id="6" class="exer-in-list">
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
                </li>
                <!--连线题-->
                <li data-id="7" class="exer-in-list lian-xian-7">
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
                </li>
                <!--简答题-->
                <li data-id="8" class="exer-in-list">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">简答题</span>
                            ）</span>
                    <span>结合下面句子中加点的文字，品析作者时怎么样表现“邂逅”的美丽的。一个个或月光流泻、或雨打芭蕉的夜晚，我倚在床上，追随者林清玄先生的步伐，锦绣山河、风土人情、异国风光、人情冷暖、小人物的生存和命运......这一切充实、温暖和美丽着我的心灵。</span>
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
                <!--听力题-->
                <li data-id="9" class="exer-in-list ting-li dan-xuan-only">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">听力题</span>
                            ）</span>
                        <span>听下面1段对话，过后卷的相应位置。听完每段对话后，你都有10秒钟的时间来回答有关小题和阅读下一小题。每段对话仅读一遍。</span>
                        <audio class="d-b" controls="controls">
                            <source src="" type="audio/mp3"/>
                            <embed height="100" width="100" src="song.mp3" />
                        </audio>
                    </div>
                    <hr/>
                    <div class="answer-box">
                        <!--单选题-->
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
                        <!--填空题-->
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
                        <!--作文题-->
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
                </li>
                <!--阅读题-->
                <li data-id="10" class="exer-in-list">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">阅读题</span>
                            ）</span>
                        <span>阅读《三峡》和《观潮》，回答下列各小题</span>
                        <div>
                            ①四十年前，南方农村甚至小城，如果吃上一顿饺子，一定是最深刻的记忆之一。那时需要从买面粉、猪肉等原料开始，而这些都不易办到。好不容易材料齐了，头一关是和面，干了不行，稀了也不行。然后要将和好的面切成一个个小面团，再擀成饺子皮。这个难度同样不小，饺子皮要薄且圆，但太薄则易烂，太厚又煮不熟。

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
                            <img src="{{asset('images/Cj_bg.png')}}" alt=""/>
                        </div>
                    </div>
                    <hr/>
                    <div class="answer-box">
                        <!--简答题-->
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
                </li>
                <!--计算题-->
                <li data-id="11" class="exer-in-list">
                    <div class="clear hw-question">
                        <i class="student_icons query"></i>
                        <span class="ic-blue">（2016 华东师大）（
                            <span class="do-hw-type">计算题</span>
                            ）</span>
                        <span>计算下面各小题</span>
                        <div class="of-h border question-img">
                            <img src="../../images/Cj_bg.png" alt=""/>
                        </div>
                    </div>
                    <hr/>
                    <div class="answer-box">
                        <!--简答题-->
                        <div data-id="105" class="one-hw">
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
                </li>
                <!--答题卡-->
                <li class="answer-sheet ta-c">
                    <p class=" hw-order ta-c">
                        <span>1</span>
                        <span>2</span>
                        <span>3</span>
                        <span>4</span>
                        <span>5</span>
                        <span>6</span>
                        <span>7</span>
                        <span>8</span>
                        <span>9</span>
                        <span>10</span>
                        <span>11</span>
                        <span>12</span>
                    </p>
                    <button class="ic-btn answer-sheet-submit">交卷并查看结果</button>
                </li>
            </ul>

        </div>



        <!--题目序号-->
        <p class="ta-c hw-order hw-order-index">
            <span>1</span>
            <span>2</span>
            <span>3</span>
            <span>4</span>
            <span>5</span>
            <span>6</span>
            <span>7</span>
            <span>8</span>
            <span>9</span>
            <span>10</span>
            <span>11</span>
            <span>12</span>
        </p>
    </div>
    <div class="f-r ta-r change-exer">
        <button id="fa-angle-right" class="fa fa-angle-right"></button>
    </div>
</div>
@endsection

@section('JS:OPTIONAL')
@endsection