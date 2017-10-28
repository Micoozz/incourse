<div class="col-xs-12 col-sm-12" id="centery">
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">错题解析</span>
		<span class="col-xs-3 col-sm-3 add"></span>
	</div>
	<div class="ic-container accouts">
		<div class="error-answer">
			<div class="error-answer-title">
				@if(empty($errorExercise))
					<span><a href="/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/answer_sheet/{{ $parameter }}"><i class="fa fa-file-text"></i>&nbsp;&nbsp;答题卡</a></span>
				@else
					<span><a href="/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/answer_sheet/{{ $parameter }}/{{ $errorExercise }}"><i class="fa fa-file-text"></i>&nbsp;&nbsp;答题卡</a></span>
				@endif
				<span class="bj-gray"><span class="blue" style="margin-right: 6px;">{{ $several }}</span>/<span>{{ $data['workCount'] }}</span></span>
			</div>
			<div class="question-types">
				<!--题目类型-->
				<div class="questions">
					<p>
						<span class="blue">（2016 湖南工程）</span>
						<span class="f-r gray">难易程度:
							<span>
								<i class="fa fa-star bj-yellow"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
								<i class="fa fa-star"></i>
							</span>
						</span>
						<div class="clear">题目：{!! $data['exercises'][0]['subject'] !!}</div>
					</p>
					@if($data['exercises'][0]['categroy_id'] == 1)
					<!-- 单选题 -->
					<div class="option options">
						@foreach($data['exercises'][0]['options'] as $key => $option)
						<span class="optionSpan"><i class="fa fa-circle-o" data-id="{{ array_keys($option)[0] }}"></i>&nbsp;&nbsp;<answer>{{ $abcList[$loop->index] }}</answer>:{{ array_values($option)[0] }} </span>
						@endforeach
					</div>
					@elseif($data['exercises'][0]['categroy_id'] == 2)
					<!-- 多选题 -->
					<div class="option  options">
						@foreach($data['exercises'][0]['options'] as $key => $option)
						<span class="optionSpan"><i class="fa fa-circle-o  @if(array_keys($option)[0] == $data['exercises'][0]['answer'][0]['user_answer'][0]) red @else  @endif" data-id="{{ array_keys($option)[0] }}"></i>&nbsp;&nbsp;<answer>{{ $abcList[$loop->index] }}</answer>：{{ array_values($option)[0] }} </span>
						@endforeach
					</div>
					@elseif($data['exercises'][0]['categroy_id'] == 4)
					<!-- 判断题 -->
					<div class="option options">
						<span><img src="{{ asset('images/school/right.png') }}"/>&nbsp;&nbsp;正确</span>
						<span><img src="{{ asset('images/school/wrong.png') }}"/>&nbsp;&nbsp;错误</span>
					</div>
					@elseif($data['exercises'][0]['categroy_id'] == 10 || $data['exercises'][0]['categroy_id'] == 11 || $data['exercises'][0]['categroy_id'] == 3)
					<!-- 填空题、解答题、简答题 -->
					<div class="option"></div>
					@elseif($data['exercises'][0]['categroy_id'] == 6)
					<!-- 排序题 -->
					<div class="option  options">
						@foreach($data['exercises'][0]['options'] as $key => $option)
						<span><span @if($data['exercises'][0]['sameScore'] != 0) class="blue" @else style="color: red" @endif>排序{{ array_keys($option)[0] }}</span>&nbsp;&nbsp;{{ array_values($option)[0] }}</span>
						@endforeach
					</div>
					@elseif($data['exercises'][0]['categroy_id'] == 5)
					<!--连线题-->
					<div class="option">
						<div class="box_hpb">
							<div class="line_hpb">
								<ul class="question_hpb">
									@foreach($data['exercises'][0]['options'][0] as $option)
									    <li style="top:{{ $loop->index * 54 }}px;">{{ array_values($option)[0] }}</li>
									}
									@endforeach
								</ul>
								<div class="container_hpb">
									<canvas class="canvas1" width="322">您的浏览器暂不支持Canvas！</canvas>
									<canvas class="canvas2" width="322">您的浏览器暂不支持Canvas！</canvas>
								</div>
								<ul class="answer_hpb">
									@foreach($data['exercises'][0]['answer'][0]['standard']['answer'] as $answer)
										<li style="top:{{ $loop->index * 54 }}px;">{{ $answer }}</li>
									@endforeach
								</ul>
							</div>
						</div>
					</div>
					@endif
				</div>
				<div class="proper">
					<!--连线题-->
					<br>
					@if($data['exercises'][0]['categroy_id'] == 5)
					<div>
						<p>正确答案是1连3 2连2 3连4 4连1</p>
						<p>回答错误，作答用时{{ $data['exercises'][0]['second'] }}秒。</p>
					</div>
					@endif
					<!--听力题-->
					<div style='display: none;'>
						<p>得分5分，总分10分，回答错误，作答用时1秒。</p>
						<p>本题备作答次数261738次，正确率为68%，易错项为错误。</p>
					</div>
					<!--排序题-->
					@if($data['exercises'][0]['categroy_id'] == 6)
						<div>
							<p>正确答案是 {{ implode(',',$data['exercises'][0]['answer'][0]['standard']['answer']) }}，你的答案是 {{ implode(',',$data['exercises'][0]['answer'][0]['user_answer']['answer']) }}</p>
							<p>@if($data['exercises'][0]['sameScore'] == 0)回答错误，@else 回答正确 @endif作答用时{{ $data['exercises'][0]['second'] }}秒。</p>
						</div>
					@endif
					{{-- dd($data['exercises'][0]['sameScore']) --}}
					<!--单选题-->
					@if($data['exercises'][0]['categroy_id'] == 1)
					<div>
						<p class="standardAnswer">正确答案是 <span class="standardAnswerSpan" data-standardAnswer="{{ json_encode($data['exercises'][0]['answer'][0]['standard'][0]['answer'],JSON_UNESCAPED_UNICODE) }}"></span>，
						你的答案是<span class="errordAnswerSpan" data-errorAnswer="{{ json_encode($data['exercises'][0]['answer'][0]['user_answer'][0]['answer'],JSON_UNESCAPED_UNICODE) }}"></span>。@if($data['exercises'][0]['sameScore'] == 0)回答错误，@else 回答正确 @endif 作答用时{{ $data['exercises'][0]['second'] }}秒。</p>
					<!-- 	<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p> -->
					</div>
					@endif
					<!--多选题-->
					@if($data['exercises'][0]['categroy_id'] == 2)
					<div>
						<p class="standardAnswer">正确答案是 <span class="standardAnswerSpan" data-standardAnswer="{{ json_encode($data['exercises'][0]['answer'][0]['standard'][0]['answer'],JSON_UNESCAPED_UNICODE) }}"></span>，你的答案是 <span class="errordAnswerSpan" data-errorAnswer="{{ json_encode($data['exercises'][0]['answer'][0]['user_answer'][0]['answer'],JSON_UNESCAPED_UNICODE) }}"></span>。@if($data['exercises'][0]['sameScore'] == 0)回答错误，@else 回答正确 @endif 作答用时{{ $data['exercises'][0]['second'] }}秒。</p>
						<!-- <p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p> -->
					</div>
					@endif
					<!--判断题-->
					@if($data['exercises'][0]['categroy_id'] == 4)
					<div>
						<p>正确答案是 @if($data['exercises'][0]['answer'][0]['standard']['answer'][0] == 1)正确@else 错误 @endif，你的答案是 @if($data['exercises'][0]['answer'][0]['user_answer']['answer'][0] == 1) 正确 @else 错误 @endif。@if($data['exercises'][0]['sameScore'] == 0)回答错误，@else 回答正确, @endif作答用时1秒。</p>
					<!-- 	<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p> -->
					</div>
					@endif
					<!--阅读题-->
					<div style='display: none;'>
						<p>回答错误，作答用时秒。</p>
						<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p>
					</div>

					<!--多空题-->
					@if($data['exercises'][0]['categroy_id'] == 3)
					<div>
						<p>正确答案是<span class="exactitude">{{ implode(',',$data['exercises'][0]['answer'][0]['standard']['answer']) }}</span>,你的答案是<span class="red"  exercise-id="{{ $data['exercises'][0]['categroy_id'] }}"><b style="font-weight: normal;">{{ implode(',',$data['exercises'][0]['answer'][0]['user_answer']['answer']) }}</b>
						</p>
						@if($data['exercises'][0]['sameScore'] == 0) 回答错误 @else 回答正确 @endif,作答用时{{ $data['exercises'][0]['second'] }}秒。
					</div>
					@endif

					<!-- 解答题 || 简答题 -->
					@if($data['exercises'][0]['categroy_id'] == 10 ||$data['exercises'][0]['categroy_id'] == 11)
					<div>
						<p>你的答案是<br><span exercise-id=""><b style="font-weight: normal;">{!!$data['exercises'][0]['answer']['answer']!!}</b>
						</p>
						<p>
							@if($data['exercises'][0]['sameScore'] == 0) 回答错误 @else 回答正确 @endif,总分{{ $data['exercises'][0]['totalScore'] }}分,您获得得分{{ $data['exercises'][0]['sameScore'] }}分,作答用时{{ $data['exercises'][0]['second'] }}秒。
						</p>
						<div class="clear">
							<div style="float: left;">批注：</div>
							<ul style="width:500px;float:left;margin: 0 0 0 10px;">
								@if(empty($data['exercises'][0]['postil']))
									<li>无</li>
								@else
									@foreach($data['exercises'][0]['postil'] as $postil)
										<li>{{ $loop->iteration }} . {!! $postil !!}</li>
									@endforeach
								@endif
							</ul>
						</div>
					</div>
					@endif
					<!--画图题题-->
					<div style='display: none;'>
						<p>正确答案是 <img src="{{ asset('images/Cj_bg1.png') }}" style="width: 100%;" /></span>
						</p>
						<!-- <p>得分4分，总分10分</p>
						<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p> -->
					</div>

<!-- 					<div class="proper_div">
						<p>解析：</p>
						<span>A项目，成分残缺，“展开”后面缺宾语。应改为“开展了特色鲜明、丰富多彩的活动来传播壮乡文化。”选项有语病病</span>
						<span>B项目，成分累赘，“津津乐道”指很有兴趣地说个不停，喝“谈论”词语重复。应改为“人们谈论着今年年初广西姑娘石房里撞倒老人后积极救治的事迹”。选项有语病。</span>
						<span>C项目，概念误用，“文具”不是提神药物。应改为“一些爱心送考车为考生准备了考试所需要的风油精等提神药品”。选项有语病。</span>
						<span>D项目，选项没有语病。</span>
						<span>本题要求选择没有语病的一项。</span>
						<span>综上所述，本题答案为D项。</span>
					</div>
					<p>来源：2017年湖南工程学院初中毕业升学考试：第三章病句解析与修改，第四题。</p> -->
<!-- 					<div class="video_analyze">
						教师解析:
						<div>
							<p class="teachername">
								<img src="{{ asset('images/01.png') }}" />
								<span>
									李国平
									<span class="gray school">湖南工程学院</span>
								</span>
								<span class="f-r gray">2017-09-01</span>
							</p>
							<video style="width: 100%;" controls>
								<source src="浪客剑心：传说的完结篇_bd.mp4" type="video/mp4"></source>
								<source src="浪客剑心：传说的完结篇_bd.ogv" type="video/ogg"></source>
								<source src="浪客剑心：传说的完结篇_bd.webm" type="video/webm"></source>
								<object width="" height="" type="application/x-shockwave-flash" data="浪客剑心：传说的完结篇_bd.swf">
									<param name="movie" value="浪客剑心：传说的完结篇_bd.swf" />
									<param name="flashvars" value="autostart=true&amp;file=浪客剑心：传说的完结篇_bd.swf" />
								</object> 当前浏览器不支持 video直接播放，点击这里下载视频：
								<a href="浪客剑心：传说的完结篇_bd.webm">下载视频</a>
							</video>
							<div class="">
								<span class="gray">浏览23次</span>
								<span class="f-r"><i class="fa fa-thumbs-o-up"></i>&nbsp;<span>5</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-warning report"></i></span>
								<div class="reprot-a">
									<span>报错</span>
									<span>举报</span>
								</div>
								<div class="comment">
									<input type="" name="text" id="" value="" placeholder="请输入评论" />
									<i class="fa fa-camera"></i>
									<input type="file" name="" id="file" value="" />
								</div>
								<button class="ic-btn f-r appear">发表</button>
								<上传图片>
								<div class="imgse">

								</div>
							</div>
						</div>
					</div> -->
						<button class="btn-white return" onclick="window.history.go(-1);">返回</button>
				</div>
			</div>
		</div>
	</div>
</div>