<div class="admin-container exer-room">
    <div class="p-r exercise-room">
        <!--筛选框-->
        <div class="filter-box border clear select-action-box">
            <div>
                <span class="f-l fs14 filter-box-title">地区：</span>

                <div class="select-form clear">
                    <div>
                        <p class="ic-text">
                            <span class="position-item">全国</span>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul class="lists">
                            <li>浙江省</li>
                            <li>山东省</li>
                        </ul>
                    </div>
                    <div>
                        <p class="ic-text">
                            <span class="position-item">全省</span>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul class="lists">
                            <li>杭州市</li>
                            <li>宁波市</li>
                        </ul>
                    </div>
                    <div>
                        <p class="ic-text">
                            <span class="position-item">全市</span>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul class="lists">
                            <li>杭州一中</li>
                            <li>杭州二中</li>
                        </ul>
                    </div>
                    <div>
                        <p class="ic-text">
                            <span class="position-item">全部老师</span>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul class="lists">
                            <li>张三</li>
                            <li>李四</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <span class="f-l fs14 filter-box-title">条件：</span>

                <div class="select-form clear">
                    <div class="ic-text-lg">
                        <p class="ic-text">
                            <span class="condition-item">全部篇章</span>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul class="lists">
                            <li>第一章</li>
                            <li>第二章</li>
                        </ul>
                    </div>
                    <div class="ic-text-lg">
                        <p class="ic-text">
                            <span class="condition-item">全部小节</span>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul class="lists">
                            <li>第一小节</li>
                            <li>第二小节</li>
                        </ul>
                    </div>
                    <div>
                        <p class="ic-text">
                            <span class="condition-item">全部题型</span>
                            <i class="fa fa-angle-down"></i>
                        </p>
                        <ul class="lists">
                            <li>单选题</li>
                            <li>填空题</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div>
                <span class="f-l fs14 filter-box-title">关键字：</span>

                <div class="select-form clear">
                    <input class="ic-input kw" type="text" placeholder="请输入关键字" />
                </div>
            </div>
            <div class="f-r">
                <button id="search-exer" class="ic-btn">查 找</button>
                <button id="clear" class="btn-white">清 空</button>
            </div>
        </div>

        <!--题目列表-->
        <div class="exer-list">
            <!--单选题-->
            @foreach($data as $exercise)
            <div data-id="{{$exercise->id}}" class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">{{$exercise->cate_title}}</span>

                    <div class="f-r ic-blue">
                        <input class="checkbox-add" type="checkbox" />
                        <span>添加</span>
                    </div>
                </div>
                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">{{$exercise->subject}}</div>
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
                        <ul class="f-r ic-inline collect">
                            <li>
                                <a class="ic-blue lookSameExer">
                                    <i class="fa fa-clone"></i>
                                    <span>同类型习题</span>
                                </a>
                            </li>
                            <li>
                                <a class="ic-blue" href="">
                                    <i class="fa fa-eye"></i>
                                    <span>查看解析</span>
                                </a>
                            </li>
                            <li class="thumbs-up">
                                <i class="fa fa-thumbs-o-up"></i>
                            </li>
                            <li class="collect-icon">
                                <i class="fa fa-heart-o"></i>
                                <span>665</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
            <!--多选题-->
            <div data-id="4" class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">多选题</span>

                    <div class="f-r ic-blue">
                        <label class="add-exer">
                    <input class="checkbox-add" type="checkbox"/>添加
                </label>
                    </div>
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
                </div>
            </div>
            <!--填空题-->
            <div data-id="5" class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">填空题</span>

                    <div class="f-r ic-blue">
                        <label class="add-exer">
                    <input class="checkbox-add" type="checkbox"/>添加
                </label>
                    </div>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">fgfgfgfggflgflgflhg<span class="blank-item">空1</span>hgkhghgkhlgkhlghkglhkg<span class="blank-item">空2</span>hlgkhglhkghglg khglhkghgthg hghrtedwdssdsgd ht jhyj hjhkjk jkjklh
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
                </div>
            </div>
            <!--判断题-->
            <div data-id="6" class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">判断题</span>

                    <div class="f-r ic-blue">
                        <label class="add-exer">
                    <input class="checkbox-add" type="checkbox"/>添加
                </label>
                    </div>
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
                </div>
            </div>
            <!--连线题-->
            <div data-id="7" class="exer-in-list border lian-xian-7">
                <div class="exer-head">
                    <span class="exer-type-list">连线题</span>

                    <div class="f-r ic-blue">
                        <label class="add-exer">
                    <input class="checkbox-add" type="checkbox"/>添加
                </label>
                    </div>
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
                </div>
            </div>
            <!--排序题-->
            <div data-id="8" class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">排序题</span>

                    <div class="f-r ic-blue">
                        <label class="add-exer">
                    <input class="checkbox-add" type="checkbox"/>添加
                </label>
                    </div>
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

                                    <p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, animi aperiam blanditiis cupiditate</p>
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
                </div>
            </div>
            <!--完形填空-->
            <div data-id="9" class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">完形填空</span>

                    <div class="f-r ic-blue">
                        <label class="add-exer">
                    <input class="checkbox-add" type="checkbox"/>添加
                </label>
                    </div>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">fgfgfgfggflgflgflhg<span class="blank-item">空1</span>hgkhghgkhlgkhlghkglhkg<span class="blank-item">空2</span>hlgkhglhkghglg khglhkghgthg hghrtedwdssdsgd ht jhyj hjhkjk jkjklh
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
                </div>
            </div>
            <!--画图题-->
            <div data-id="10" class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">画图题</span>

                    <div class="f-r ic-blue">
                        <label class="add-exer">
                    <input class="checkbox-add" type="checkbox"/>添加
                </label>
                    </div>
                </div>

                <div class="exer-wrap">
                    <div class="clear">
                        <span class="f-l">题目：</span>

                        <div class="f-l question">请画出一个等腰三角形的中线。</div>
                    </div>
                    <div class="clear answer-box">
                        <span class="f-l">答案：</span>

                        <div class="f-l">
                            <img class="exer-list-img" src="../../images/Cj_bg.png" />
                        </div>
                    </div>
                </div>
            </div>
            <!--简答题-->
            <div data-id="11" class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">简答题</span>

                    <div class="f-r ic-blue">
                        <label class="add-exer">
                    <input class="checkbox-add" type="checkbox"/>添加
                </label>
                    </div>
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
                </div>
            </div>
            <!--作文题-->
            <div data-id="12" class="exer-in-list border">
                <div class="exer-head">
                    <span class="exer-type-list">作文题</span>

                    <div class="f-r ic-blue">
                        <label class="add-exer">
                    <input class="checkbox-add" type="checkbox"/>添加
                </label>
                    </div>
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
                </div>
            </div>
        </div>

        <!--底部 + 分页-->
        <div class="exer-list-foot clear">
            <span class="ic-blue">共搜索出187道题</span>
            <ul class="f-r">
                <li>分页</li>
            </ul>
        </div>

        <!--添加作业 页面引导-->
        <div class="p-a guide d-n">
            <img src="../../images/exer.png" alt="" />

            <div class="p-a"></div>
        </div>

        <!--已添加的作业-->
        <div class="hw-list">
            <p class="title">7月20日作业</p>
            <ul data-all="" class="hw-type-list">
                <!--
        <li>
            <span class="type">选择题</span>
            <span class="number">（1）</span>
        </li>
        <li>
            <span class="type">填空题</span>
            <span class="number">（2）</span>
        </li>
        -->
            </ul>
            <div class="ta-c">
                <a id="create-hw" class="ic-btn">生成作业</a>
                <span id="preview" class="ic-blue c-d preview">预览</span>
            </div>
        </div>
    </div>
</div>