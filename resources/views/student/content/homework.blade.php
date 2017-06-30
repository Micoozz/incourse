 <div class="col-xs-12 col-sm-12" id="centery">
                    <div class="row center1">
                        <div class="col-md-2 col-xs-4"></div>
                        <div class="col-md-8 col-xs-4" id="col">{{ $data['course_first'][0]['title'] }}</div>
                        <div class="col-md-2 col-xs-4"></div>
                    </div>
                    <div class="order row form-group">
                        <span style="position: relative;top:4px">排序：</span>
                        <form action="" class="homework-select-form">
                            <label for="radio_1" class="pointer">
                                <input type="radio" id="radio_1" class="radio questionSelect" name="homework-select"/><span class="pointer select-wrapper"></span><span>发布日期</span>
                            </label>
                            <label for="radio_2" class="pointer">
                                <input type="radio" id="radio_2" class="radio questionSelect" name="homework-select"/><span class="pointer select-wrapper"></span><span>截止日期</span>
                            </label>
                        </form>
                    </div>
                    <div class="homework-list-box">
                    @foreach($data as $work)
                        <div class="homework-list row">
                            <a href="/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/{{ $work->id }}/1" class="homework-type-link not-open pointer">
                                <img src="/images/homework/engage/single.png" class="homework-type-select-img"/>
                                <span class="homework-order">{{ $work->title }}</span>
                            </a>
                            <table class="homework-list-content col-lg-8 col-md-8 col-xs-8" cellpadding="0"
                                   cellspacing="0">
                                <tr>
                                    <td>
                                        <div class="homework-list-circle-single">
	                                    <span class="circle-value1">
	                                    {{ date('m月d日 h:i',$work->pub_time) }}
	                                    </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="homework-list-circle-single">
	                                    <span class="circle-value2">
	                                    {{ date('m月d日 h:i',$work->deadline) }}
	                                    </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="homework-list-circle-single">
	                                    <span class="circle-value3">
	                                       1/30h
	                                    </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="homework-list-circle-single">
	                                    <span class="circle-value4">
	                                        <img src="/images/homework/subject/grade.png"/>
	                                    </span>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="homework-list-circle-single">
	                                    <span class="circle-value5">
	                                   {{ $work->status == 1 ? '开启' : $work->status == 2 ? '关闭' : '未开启'  }}
	                                    </span>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>发布时间</td>
                                    <td>截止时间</td>
                                    <td>耗时</td>
                                    <td>得分</td>
                                    <td>状态</td>
                                </tr>
                            </table>
                        </div>
                    @endforeach
                    {{ $data->links() }} 
                    </div>
                </div>
