@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" type="text/css" href="/css/exercise.css">
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
    <div class="person_hw_box">
        <!--个人作业-->
        <div class="person-hw">
            <div>
                <div class="clear one-line">
                    <span>作业标题：</span>

                    <div class="f-l">
                        <input class="ic-input hw-title-input" type="text"
                               placeholder="作业标题"/>
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
                                        @foreach($unit_list as $id => $title)
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
                            <input id="expiration-time" class="ic-input" name="expiration-time"
                                   type="text" placeholder="截止时间"/>
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
                    <span>添加习题：</span>

                    <!--有习题的模板-->
                    <!-- <div class="has-exer">
                        <table class="d-b of-h border person-exer-list">
                            <thead class="d-b">
                            <tr>
                                <th>
                                    <input id="all-checked" type="checkbox"/>
                                    <span>序号</span>
                                </th>
                                <th>题型</th>
                                <th>题目</th>
                                <th>2/15 题</th>
                            </tr>
                            </thead>
                            <tbody class="d-b">
                            <tr data-id="1" class="spread">
                                <td>
                                    <input type="checkbox" checked/>
                                    <span>1</span>
                                </td>
                                <td class="personHw-type">填空题</td>
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
                                                <input type="radio" name="radio" value="A"/>
                                            </label>
                                            <span class="f-l">A：</span>

                                            <p class="f-l option">8只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio active border p-r  f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="B" checked/>
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
                                </td>
                            </tr>
                            <tr data-id="2">
                                <td>
                                    <input type="checkbox"/>
                                    <span>2</span>
                                </td>
                                <td class="personHw-type">填空题</td>
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
                                                <input type="radio" name="radio" value="A"/>
                                            </label>
                                            <span class="f-l">A：</span>

                                            <p class="f-l option">8只</p>
                                        </li>
                                        <li>
                                            <label class="ic-radio active border p-r  f-l">
                                                <i class="ic-blue-bg p-a"></i>
                                                <input type="radio" name="radio" value="B" checked/>
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
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="ta-c border tfoot">
                            <button class="f-l addExerBtn ic-blue c-d blue-hover">
                                <i class="p-r fa fa-trash-o"></i>
                                <span id="delete-personHw">删除</span>
                            </button>
                            <div class="f-r">分页</div>
                        </div>
                    </div> -->

                    <!--没习题的模板-->
                    <div class="f-l p-r no-exer">
                        <a id="personHw-uploadExer" class="ic-blueB-btn">上传习题</a>
                        <a class="ic-blueB-btn personHw-addExer">题库选题</a>

                        <!--"添加习题" 页面引导-->
                        <!-- <div class="p-a guide">
                            <img src="../../images/add_exer.jpg" alt=""/>

                            <div class="p-a"></div>
                        </div> -->
                    </div>
                </div>
            </div>

            <!--发布、保存、取消-->
            <div class="btns">
                <button id="public" class="ic-btn public">
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
                        <button id="cancelCreateHw" class="ic-btn">确 定</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

@section('JS:OPTIONAL')

@endsection