@extends('student.exerciseBase.wrongNotebook_main')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="{{asset('css/exercise.css')}}"/>
<style>
    .error-book-title {
        font-size: 18px;
    }
    .error-book-date {
        margin-left: 15px;
    }
</style>
@endsection

@section('NOTEBOOK')
<!--习题库-->
<div class="admin-container exer-room pageType" data-type="4">
    <div class="p-r exercise-room">
        <div class="error-book-introduce">
            <p class="error-book-title">
                <b>第一章节 数与代数</b>
            </p>
            <p class="fs14">
                <span>第一小节 数与代数</span>
                <span class="error-book-date">06.27作业</span>
            </p>
        </div>

        <!--题目列表-->
        <div class="exer-list myCollect">
            <!--单选题-->
            <div class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">单选题</span>
                </div>
                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">有三只鸟，打死一只，还剩几只？</div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>

                        <div class="f-l">
                            <ul class="radio-wrap exer-list-ul">
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="p-a"></i>
                                        <input type="radio" name="radio" value="A"/>
                                    </label>
                                    <span class="f-l">A：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                                <li>
                                    <label class="ic-radio active border p-r  f-l">
                                        <i class="p-a"></i>
                                        <input type="radio" name="radio" value="B" checked/>
                                    </label>
                                    <span class="f-l">B：</span>

                                    <p class="f-l option">16只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r  f-l">
                                        <i class="p-a"></i>
                                        <input type="radio" name="radio" value="C"/>
                                    </label>
                                    <span class="f-l">C：</span>

                                    <p class="f-l option">1只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r  f-l">
                                        <i class="p-a"></i>
                                        <input type="radio" name="radio" value="D"/>
                                    </label>
                                    <span class="f-l">D：</span>

                                    <p class="f-l option">2只</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--多选题-->
            <div class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">多选题</span>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">有三只鸟，打死一只，还剩几只？</div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>

                        <div class="f-l">
                            <ul class="radio-wrap exer-list-ul">
                                <li>
                                    <label class="ic-radio border p-r f-l active">
                                        <i class="p-a"></i>
                                        <input type="checkbox" name="checkbox" value="A"
                                               checked/>
                                    </label>
                                    <span class="f-l">A：</span>

                                    <p class="f-l option">8只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r f-l active">
                                        <i class="p-a"></i>
                                        <input type="checkbox" name="checkbox" value="B"
                                               checked/>
                                    </label>
                                    <span class="f-l">B：</span>

                                    <p class="f-l option">16只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="p-a"></i>
                                        <input type="checkbox" name="checkbox" value="C"/>
                                    </label>
                                    <span class="f-l">C：</span>

                                    <p class="f-l option">1只</p>
                                </li>
                                <li>
                                    <label class="ic-radio border p-r f-l">
                                        <i class="p-a"></i>
                                        <input type="checkbox" name="checkbox" value="D"/>
                                    </label>
                                    <span class="f-l">D：</span>

                                    <p class="f-l option">2只</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--填空题-->
            <div class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">填空题</span>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">fgfgfgfggflgflgflhg<span
                                class="blank-item">空1</span>hgkhghgkhlgkhlghkglhkg<span
                                class="blank-item">空2</span>hlgkhglhkghglg khglhkghgthg
                            hghrtedwdssdsgd
                            ht jhyj hjhkjk jkjklh
                        </div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>

                        <div class="f-l">
                            <ul class="exer-list-ul">
                                <li>
                                    <span class="f-l">1.</span>

                                    <p class="f-l option">primed for</p>
                                </li>
                                <li>
                                    <span class="f-l">2.</span>

                                    <p class="f-l option">primed for</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--判断题-->
            <div class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">判断题</span>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">天宇一定是个男孩子?</div>
                    </div>
                    <div class="clear answer-box pd-answ-list">
                        <span class="f-l">答案：</span>

                        <div class="f-l">
                            <ul class="fs14 pan-duan wrongActive">
                                <li>
                                    <i class="uploadExerIcons right"></i>
                                    <span class="gray pan-duan-answ">正确</span>
                                </li>
                                <li>
                                    <i class="uploadExerIcons wrong"></i>
                                    <span class="pan-duan-answ">错误</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--连线题-->
            <!-- <div class="exer-in-list border lian-xian-1">
                <div class="exer-head">
                    <span class="exer-type-list">连线题</span>
                </div>
            
                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>
            
                        <div class="f-l question">请把对应的题目连上线</div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>
            
                        <div class="f-l box_hpb">
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
                        </div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div> -->
            <!--排序题-->
            <div class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">排序题</span>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">请给下列句子排序</div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>

                        <div class="f-l">
                            <ul class="exer-list-ul">
                                <li>
                                    <span class="f-l">排序A：</span>

                                    <p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花 Lorem
                                        ipsum dolor sit amet, consectetur adipisicing elit.
                                        Adipisci, animi aperiam blanditiis cupiditate</p>
                                </li>
                                <li>
                                    <span class="f-l">排序B：</span>

                                    <p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</p>
                                </li>
                                <li>
                                    <span class="f-l">排序C：</span>

                                    <p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</p>
                                </li>
                                <li>
                                    <span class="f-l">排序D：</span>

                                    <p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--完形填空-->
            <div class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">完形填空</span>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">fgfgfgfggflgflgflhg<span
                                class="blank-item">空1</span>hgkhghgkhlgkhlghkglhkg<span
                                class="blank-item">空2</span>hlgkhglhkghglg khglhkghgthg
                            hghrtedwdssdsgd
                            ht jhyj hjhkjk jkjklh
                        </div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>

                        <div class="f-l">
                            <div class="wan-xing-tk-option clear">
                                <span class="f-l id">1.</span>

                                <div class="f-l wan-xing-tk-box dan-xuan-options dan-xuan-only">
                                    <div class="radio-wrap">
                                        <label class="ic-radio border p-r active">
                                            <i class="p-a"></i>
                                            <input type="radio" name="radio" value="A"/>
                                        </label>
                                        <span>A：show up</span>
                                    </div>
                                    <div class="radio-wrap">
                                        <label class="ic-radio border p-r">
                                            <i class="p-a"></i>
                                            <input type="radio" name="radio" value="B"/>
                                        </label>
                                        <span>B：show up</span>
                                    </div>
                                    <div class="radio-wrap">
                                        <label class="ic-radio border p-r">
                                            <i class="p-a"></i>
                                            <input type="radio" name="radio" value="C"/>
                                        </label>
                                        <span>C：set up</span>
                                    </div>
                                    <div class="radio-wrap">
                                        <label class="ic-radio border p-r">
                                            <i class="p-a"></i>
                                            <input type="radio" name="radio" value="D"/>
                                        </label>
                                        <span>D：show up</span>
                                    </div>
                                </div>
                            </div>
                            <div class="wan-xing-tk-option clear">
                                <span class="f-l id">2.</span>

                                <div class="f-l wan-xing-tk-box dan-xuan-options dan-xuan-only">
                                    <div class="radio-wrap">
                                        <label class="ic-radio border p-r">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="A"/>
                                        </label>
                                        <span>A：show up</span>
                                    </div>
                                    <div class="radio-wrap">
                                        <label class="ic-radio border p-r">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="B"/>
                                        </label>
                                        <span>B：show up</span>
                                    </div>
                                    <div class="radio-wrap">
                                        <label class="ic-radio border p-r active">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="C"/>
                                        </label>
                                        <span>C：set up</span>
                                    </div>
                                    <div class="radio-wrap">
                                        <label class="ic-radio border p-r">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="D"/>
                                        </label>
                                        <span>D：show up</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--画图题-->
            <div class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">画图题</span>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">请画出一个等腰三角形的中线。</div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>

                        <div class="f-l">
                            <img class="exer-list-img" src="{{asset('images/Cj_bg.png')}}"/>
                        </div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--简答题-->
            <div class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">简答题</span>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">中秋节的由来。</div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>

                        <div class="f-l question">
                            远古时候天上有十日同时出现，晒得庄稼枯死，民不聊生，一个名叫后羿的英雄，力大无穷，他同情受苦的百姓，拉开神弓，一气射下九个多太阳，并严令最后一个太阳按时起落，为民造福。后羿妻子名叫嫦娥。后羿除传艺狩猎外，终日和妻子在一起。不少志士慕名前来投师学艺，心术不正的蓬蒙也混了进来。
                        </div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
            <!--作文题-->
            <div class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">作文题</span>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">请以“你最出彩”为题写一篇作文。</div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>

                        <div class="f-l question">略</div>
                    </div>
                    <div class="exer-foot clear">
                        <div class="f-l">
                            <span>难易程度：</span>
                        <span>
                            <i class="fa fa-star active"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <button class="btn-white btn-center">返 回</button>
    </div>
</div>
@endsection

@section('JS:OPTIONAL')



@endsection