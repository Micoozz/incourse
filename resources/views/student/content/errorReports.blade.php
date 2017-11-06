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
					<br>
					@if($data['exercises'][0]['categroy_id'] == 5)
					<!--连线题-->
					@elseif($data['exercises'][0]['categroy_id'] == 6)
					<!--排序题-->
					<div>
						<p>正确答案是 <span class="bj-green">{{ implode(',',$data['exercises'][0]['answer'][0]['standard']['answer']) }}</span>，你的答案是 <span class="{{$data['exercises'][0]['sameScore'] == 0?'red':'bj-green'}}">{{ implode(',',$data['exercises'][0]['answer'][0]['user_answer']['answer']) }}</span></p>
						<p>@if($data['exercises'][0]['sameScore'] == 0)回答<span class="red">错误</span> @else 回答<span class="bj-green">正确</span> @endif作答用时{{ $data['exercises'][0]['second'] }}秒。</p>
					</div>
					@elseif($data['exercises'][0]['categroy_id'] == 1)
					<!--单选题-->
					<div>
						<p class="standardAnswer">正确答案是 <span class="standardAnswerSpan bj-green" data-standardAnswer="{{ json_encode($data['exercises'][0]['answer'][0]['standard'][0]['answer'],JSON_UNESCAPED_UNICODE) }}"></span>，
						你的答案是<span class="errordAnswerSpan {{$data['exercises'][0]['sameScore'] == 0?'red':'bj-green'}}" data-errorAnswer="{{ json_encode($data['exercises'][0]['answer'][0]['user_answer'][0]['answer'],JSON_UNESCAPED_UNICODE) }}"></span>。<br>@if($data['exercises'][0]['sameScore'] == 0)回答<span class="red">错误</span> @else 回答<span class="bj-green">正确</span> @endif 作答用时{{ $data['exercises'][0]['second'] }}秒。</p>
					<!-- 	<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p> -->
					</div>
					@elseif($data['exercises'][0]['categroy_id'] == 2)
					<!--多选题-->
					<div>
						<p class="standardAnswer">正确答案是 <span class="standardAnswerSpan bj-green" data-standardAnswer="{{ json_encode($data['exercises'][0]['answer'][0]['standard'][0]['answer'],JSON_UNESCAPED_UNICODE) }}"></span>，你的答案是 <span class="errordAnswerSpan {{$data['exercises'][0]['sameScore'] == 0?'red':'bj-green'}}" data-errorAnswer="{{ json_encode($data['exercises'][0]['answer'][0]['user_answer'][0]['answer'],JSON_UNESCAPED_UNICODE) }}"></span>。<br>@if($data['exercises'][0]['sameScore'] == 0)回答<span class="red">错误</span> @else 回答<span class="bj-green">正确</span> @endif 作答用时{{ $data['exercises'][0]['second'] }}秒。</p>
						<!-- <p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p> -->
					</div>
					@elseif($data['exercises'][0]['categroy_id'] == 4)
					<!--判断题-->
					<div>
						<p>正确答案是 <span class="bj-green">@if($data['exercises'][0]['answer'][0]['standard']['answer'][0] == 1)正确@else 错误 @endif</span>，你的答案是 <span class="{{$data['exercises'][0]['sameScore'] == 0?'red':'bj-green'}}">@if($data['exercises'][0]['answer'][0]['user_answer']['answer'][0] == 1) 正确 @else 错误 @endif。</span><br>@if($data['exercises'][0]['sameScore'] == 0)回答<span class="red">错误</span> @else 回答<span class="bj-green">正确</span>, @endif作答用时1秒。</p>
					<!-- 	<p>本题 <span class="red">正确率</span>:68% <span class="red">易错项</span>:B</p> -->
					</div>
					@elseif($data['exercises'][0]['categroy_id'] == 3)
					<!--多空题-->
					<div>
						<p>正确答案是<span class="exactitude bj-green">{{ implode(',',$data['exercises'][0]['answer'][0]['standard']['answer']) }}</span>,你的答案是<span class="{{$data['exercises'][0]['sameScore'] == 0?'red':'bj-green'}}"  exercise-id="{{ $data['exercises'][0]['categroy_id'] }}"><b style="font-weight: normal;">{{ implode(',',$data['exercises'][0]['answer'][0]['user_answer']['answer']) }}</b>
						</p>
						{{ dump($data['exercises'][0]['sameScore']) }} {{dd($data['exercises'][0]['score'])}}
						@if($data['exercises'][0]['sameScore'] != $data['exercises'][0]['score']) 回答<span class="red">错误</span> @else 回答<span class="bj-green">正确</span> @endif,作答用时{{ $data['exercises'][0]['second'] }}秒。
					</div>
					@elseif($data['exercises'][0]['categroy_id'] == 10 ||$data['exercises'][0]['categroy_id'] == 11)
					<!-- 解答题 || 简答题 -->
					<div>
						<p>你的答案是<br><span exercise-id=""><b style="font-weight: normal;">{!!$data['exercises'][0]['answer']['answer'][0]!!}</b>
						</p>
						<p>
							@if($data['exercises'][0]['sameScore'] != $data['exercises'][0]['score']) 回答<span class="red">错误</span> @else 回答<span class="bj-green">正确</span> @endif,总分{{ $data['exercises'][0]['score'] }}分,您获得得分{{ $data['exercises'][0]['sameScore'] }}分,作答用时{{ $data['exercises'][0]['second'] }}秒。
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
					<button class="btn-white return" onclick="window.history.go(-1);">返回</button>
				</div>
			</div>
		</div>
	</div>
</div>