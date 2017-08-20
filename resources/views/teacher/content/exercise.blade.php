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
    @if(1)
    <div>
        <div class="ta-c no-content">
            <img src="/images/LOGO.png" alt="" />
            <p>请先上传习题噢～</p>
        </div>
    </div>
    @else

    @endif

    <!--筛选框-->
    <div class="filter-box border clear">
        <div>
            <span class="f-l fs14 filter-box-title">班级：</span>

            <div class="select-form clear">
                <div>
                    <p class="ic-text">
                        <span>全部年级</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        <li>一年级</li>
                        <li>二年级</li>
                        <li>三年级</li>
                    </ul>
                </div>
                <div>
                    <p class="ic-text">
                        <span>全部班级</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        <li>1班</li>
                        <li>2班</li>
                        <li>3班</li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <span class="f-l fs14 filter-box-title">章节：</span>

            <div class="select-form clear">
                <div>
                    <p class="ic-text">
                        <span>全部科目</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        <li>语文</li>
                        <li>数学</li>
                        <li>英语</li>
                    </ul>
                </div>
                <div>
                    <p class="ic-text">
                        <span>全部篇章</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        <li>第一章</li>
                        <li>第二章</li>
                        <li>第三章</li>
                    </ul>
                </div>
                <div>
                    <p class="ic-text">
                        <span>全部小节</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        <li>第1节</li>
                        <li>第2节</li>
                        <li>第3节</li>
                    </ul>
                </div>
                <div>
                    <p class="ic-text">
                        <span>全部题型</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        <li>单选题</li>
                        <li>多选题</li>
                        <li>填空题</li>
                    </ul>
                </div>
            </div>
        </div>
        <div>
            <span class="f-l fs14 filter-box-title">教师：</span>

            <div class="select-form clear">
                <div>
                    <p class="ic-text">
                        <span>全部教师</span>
                        <i class="fa fa-angle-down"></i>
                    </p>
                    <ul class="lists">
                        <li>张三</li>
                        <li>李四</li>
                        <li>王五</li>
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
        <div class="exer-in-list border">
            <span class="exer-type-list">{{$exercise->cate_title}}</span>

            <div class="exer-wrap">
                <div class="clear">
                    <span class="f-l">题目：</span>

                    <div class="f-l question">{!!$exercise->categroy_id == 3 || $exercise->categroy_id == 9 ? preg_replace('/&空\d+&/','<span class="blank-item">空</span>',$exercise['subject']) : $exercise->subject!!}</div>
                </div>
                <div class="clear answer-box">
                    <span class="f-l">答案：</span>
                    @if($exercise->categroy_id == 2 || $exercise->categroy_id == 4)  
                    <div class="f-l">
                        <ul class="radio-wrap exer-list-ul">
                            @foreach($exercise->options as $key => $option)
                            <li>
                                <label class="ic-radio border p-r f-l">
                                    <i class="ic-blue-bg p-a"></i>
                                    <input type="radio" name="radio" value="{{$key}}"/>
                                </label>
                                <span class="f-l">{{array_keys($option)[0]}}：</span>

                                <p class="f-l option">{{$option[array_keys($option)[0]]}}</p>
                            </li>
                            @endforeach
                            <!-- <li>
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
                            </li> -->
                        </ul>
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
                            <a class="ic-blue" href="">
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
        <!-- <div class="row work">
            <div class="row mar_tb mar_t" num="{{$exercise->id}}">
                <div class="homework-content">
                    <p class="question-head">
                        <span class="order"></span>
                        <h4>{{$exercise->cate_title}}</h4>
                    </p> 
                    @if($exercise->categroy_id == 1)
                    {{$exercise->subject}}
                    @elseif($exercise->categroy_id == 2 || $exercise->categroy_id == 4)  
                    {{$exercise->subject}}
                    <form action="" class="selectt{{$exercise->id}}">
                        @foreach($exercise->options as $option)
                        <div class="radio">
                            <label>
                                <input type="radio" name="questionSelect" class="questionSelect" disabled="disabled" value="A"/>
                                <span class="select-wrapper"></span>{{array_keys($option)[0]}}，
                                <span class="question-content"> {{$option[array_keys($option)[0]]}}</span>
                            </label>
                        </div>
                        @endforeach
                    </form>
                    @elseif($exercise->categroy_id == 3 || $exercise->categroy_id == 9) 
                    {!!  preg_replace('/&空\d+&/','<span class="question-blank">空</span>',$exercise['subject'])  !!}
                    @elseif($exercise->categroy_id == 5) 
                    {{$exercise->subject}}
                    @elseif($exercise->categroy_id == 6) 
                    {{$exercise->subject}}
                    @elseif($exercise->categroy_id == 7) 
                    {{$exercise->subject}}
                    @elseif($exercise->categroy_id == 8)  
                    {{$exercise->subject}}                         
                    @endif
                    <div class="line"></div>                                    
                    <div class="question-foot">                                        
                        <span class="blue">正确答案：</span>
                        <span class="answerOrder{{$exercise->id}}">{{implode(',',$exercise->answer)}}</span>
                        <span class="col-line"></span>                                          
                        <span title="难度(1)" class="colLine">        
                            <a><img src="/images/Cj_17mm.png" class="yellow"></a>         
                            <a><img src="/images/Cj_18mm.png"></a>          
                            <a><img src="/images/Cj_18mm.png"></a>           
                            <a><img src="/images/Cj_18mm.png"></a>            
                            <a><img src="/images/Cj_18mm.png"></a>                              
                        </span>                                        
                        <div class="pj">                                            
                            <div title="难度(1)">                                                
                                <img src="/images/Cj_17mm.png" class="yellow" num=1>                                                
                                <img src="/images/Cj_18mm.png" num=2>                                                
                                <img src="/images/Cj_18mm.png" num=3>                                               
                                <img src="/images/Cj_18mm.png" num=4>                                                
                                <img src="/images/Cj_18mm.png" num=5>                                            
                            </div>                                           
                            <div>                                               
                                <span class="mui4" title="差" mui=1></span>                                               
                                <span class="mui4" title="较差" mui=2></span>                                                
                                <span class="mui4" title="一般" mui=3></span>                                                
                                <span class="mui4" title="好" mui=4></span>                                                
                                <span title="很好" mui=5></span>                                           
                            </div>     
                            <b>评分</b>
                        </div>
                        <div style="float: right;" class="hidee">
                            <span class="tj"><input type="checkbox" name="" id=""  value="{{$exercise->id}}"/>添加</span>  
                            <a href="javascript:;" class="bo">收藏</a>
                            <span class="collection_num">0</span>                                      
                        </div>                                    
                    </div>                               
                </div>                            
            </div>
        </div> -->
        @endforeach
    </div>
    <div class="row">
        <div class="col-lg-8 col-md-9 col-sm-9 col-xs-9 ">
            <ul class="pagination fy">
            {{$data->links()}}
            </ul>
        </div>
        <!--<div class="jump">-->
        <!--<div>-->
        <!--向第<input type="text">页-->
        <!--</div>-->
        <!--<ul class="pagination">-->
        <!--<li><a href="#">跳转</a></li>-->
        <!--</ul>-->
        <!--</div>-->
    </div>
</div>