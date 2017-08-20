
<div class="person_hw_box">
    <!--个人作业-->
    <div class="person-hw">
        <div>
            <div class="clear one-line">
                <span>作业标题：</span>

                <div class="f-l">
                    <input class="ic-input hw-title-input" type="text" placeholder="请填写作业标题">
                </div>
            </div>
            <div class="clear one-line select-action-box">
                <span>所属章节：</span>

                <div class="f-l">
                    <div class="select-wrap">
                        <div class="select-form clear">
                            <div class="ic-text-lg">
                                <p class="ic-text">
                                    <span class="chapter">选择章篇</span>
                                    <i class="fa fa-angle-down"></i>
                                </p>
                                <ul class="lists unit-ul">
                                    @foreach($data['unit_list'] as $id => $title)
                                    <li class="unit-li" data="{{$id}}">{{$title}}</li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="ic-text-lg">
                                <p class="ic-text">
                                    <span class="trifle">选择小节</span>
                                    <i class="fa fa-angle-down"></i>
                                </p>
                                <ul class="lists section-ul">
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="clear one-line">
                <span>截止时间：</span>

                <div class="f-l">
                    <div class="calendar p-r">
                        <input id="expiration-time" class="ic-input" name="expiration-time" type="text" placeholder="截止时间">
                        <i class="fa fa-calendar p-a gray"></i>
                    </div>
                </div>
            </div>
            <div class="clear one-line">
                <span>常规作业：</span>

                <div class="f-l">
                    <textarea class="hw-content border" name=""></textarea>
                </div>
            </div>
            <div class="clear one-line">
                <span>习题练习：</span>

                <div class="f-l p-r no-exer">
                    <a class="addExerBtn ic-blue c-d personHw-addExer" href="exerRoom.html">
                        <i class="uploadExerIcons"></i>
                        <span>添加习题</span>
                    </a>

                    <!--"添加习题" 页面引导-->
                    <div class="p-a guide" style="display: none;">
                        <img src="../../images/add_exer.jpg" alt="">

                        <div class="p-a"><div class="p-a part">
<i class="fa fa-exclamation-circle f-l ic-blue p-r"></i>

<p class="f-l msg">快去进行 <b>添加习题</b> 吧～</p>
<button class="ic-btn p-a">我知道了</button>
</div>
</div>
                    </div>
                </div>

                <!--有习题的模板-->
                <div class="has-exer d-n">
                    <table class="d-b of-h border person-exer-list">
                        <thead class="d-b">
                        <tr>
                            <th>
                                <input id="all-checked" type="checkbox">
                                <span>序号</span>
                            </th>
                            <th>题型</th>
                            <th>题目</th>
                            <th>15/15 题</th>
                        </tr>
                        </thead>
                        <tbody class="d-b">
                        <tr class="spread">
                            <td>
                                <input type="checkbox" checked="">
                                <span>1</span>
                            </td>
                            <td>填空题</td>
                            <td>有三只鸟，打死一只，还剩几只？</td>
                            <td>
                                <i class=" fa is-spread fa-angle-up"></i>
                            </td>
                        </tr>
                        <tr>
                            <td class="slide-down-exer" colspan="4">
                                <ul class="radio-wrap exer-list-ul">
                                    <li>
                                        <label class="ic-radio border p-r f-l">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="A">
                                        </label>
                                        <span class="f-l">A：</span>

                                        <p class="f-l option">8只</p>
                                    </li>
                                    <li>
                                        <label class="ic-radio active border p-r  f-l">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="B" checked="">
                                        </label>
                                        <span class="f-l">B：</span>

                                        <p class="f-l option">16只</p>
                                    </li>
                                    <li>
                                        <label class="ic-radio border p-r  f-l">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="C">
                                        </label>
                                        <span class="f-l">C：</span>

                                        <p class="f-l option">1只</p>
                                    </li>
                                    <li>
                                        <label class="ic-radio border p-r  f-l">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="D">
                                        </label>
                                        <span class="f-l">D：</span>

                                        <p class="f-l option">2只</p>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <input type="checkbox">
                                <span>2</span>
                            </td>
                            <td>填空题</td>
                            <td>有三只鸟，打死一只，还剩几只？</td>
                            <td>
                                <i class="fa is-spread fa-angle-down"></i>
                            </td>
                        </tr>
                        <tr class="d-n">
                            <td class="slide-down-exer" colspan="4">
                                <ul class="radio-wrap exer-list-ul">
                                    <li>
                                        <label class="ic-radio border p-r f-l">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="A">
                                        </label>
                                        <span class="f-l">A：</span>

                                        <p class="f-l option">8只</p>
                                    </li>
                                    <li>
                                        <label class="ic-radio active border p-r  f-l">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="B" checked="">
                                        </label>
                                        <span class="f-l">B：</span>

                                        <p class="f-l option">16只</p>
                                    </li>
                                    <li>
                                        <label class="ic-radio border p-r  f-l">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="C">
                                        </label>
                                        <span class="f-l">C：</span>

                                        <p class="f-l option">1只</p>
                                    </li>
                                    <li>
                                        <label class="ic-radio border p-r  f-l">
                                            <i class="ic-blue-bg p-a"></i>
                                            <input type="radio" name="radio" value="D">
                                        </label>
                                        <span class="f-l">D：</span>

                                        <p class="f-l option">2只</p>
                                    </li>
                                </ul>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                    <div class="ta-c border tfoot">
                        <button class="f-l addExerBtn ic-blue c-d blue-hover">
                            <i class="p-r fa fa-trash-o"></i>
                            <span id="delete-personHw">删除</span>
                        </button>
                        <a class="addExerBtn ic-blue c-d personHw-addExer">
                            <i class="uploadExerIcons"></i>
                            <span>添加习题</span>
                        </a>

                        <a class="addExerBtn disabled-add c-d d-n">
                            <i class="uploadExerIcons"></i>
                            <span>添加习题</span>
                        </a>

                        <div class="f-r">分页</div>
                    </div>
                </div>
            </div>
        </div>

        <!--发布、保存、取消-->
        <div class="btns">
            <button class="ic-btn public">
                <i class="fa fa-paper-plane-o"></i>
                <span>发 布</span>
            </button>
            <button id="save-person-hw" class="ic-btn">保 存</button>
            <button id="cancel-person-hw" class="btn-white">取 消</button>
        </div>

        <!--离开页面的确认弹出框-->
        <div class="delete-modal d-n">
            <div class="clear">
                <i class="fa fa-exclamation-circle f-l"></i>

                <div class="f-l ic-text">
                    <p class="msg">确认要离开当前页面吗？</p>

                    <p class="words">您输入的内容将不会被保存。您确定要离开当前页面吗？</p>
                </div>
            </div>
            <div class="btns">
                <div class="f-r">
                    <button class="btn-white">取 消</button>
                    <button class="ic-btn">确 定</button>
                </div>
            </div>
        </div>
    </div>
</div>