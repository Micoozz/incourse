<div class="exer-list">
	@foreach($data['done_correct'] as $exercise)
		<div class="exer-in-list border" data-id="{{$exercise->id}}">
			<div class="exer-head">
				<span class="exer-type-list">{!!$exercise->cate_title!!}</span>
			</div>
			<div class="exer-wrap">
				<div class="clear">
					<span class="f-l">题目：</span>
					@if($exercise->categroy_id != 3)
					<div class="f-l question">{!!$exercise->subject!!}</div>
					@else
					<div class="f-l question black_question" data-black="{{$exercise->subject}}" data-student-answer="{{$exercise->student_answer}}"></div>
					@endif
				</div>
				@if($exercise->categroy_id == 1 || $exercise->categroy_id == 2)
					<!--单选题  &&  多选题-->
					<div class="clear answer-box checked_work">
						<span class="f-l">答案：</span>
						<div class="f-l">
							<ul class="radio-wrap exer-list-ul">
								@foreach($exercise->options as $option)
								<li>
									<label class="ic-radio border p-r f-l {{in_array(key($option),$exercise->answer) ? 'radio-right' : (in_array(key($option),$exercise->student_answer) ? 'radio-wrong' : '')}}">
                                        <i class="p-a"></i>
                                        <input class="checked_work_input" type="radio" name="radio" value=""/>
                                	</label>
									<span class="f-l answer_sign"></span>
									<p class="f-l option">{{$option[key($option)]}}</p>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
					<div class="exer-foot clear checked_work_answer">
						<div class="f-l">
							<span class="ic-blue">正确答案：</span>
							@foreach($exercise->answer as $answer)
								<span class="black_answer">{{$answer}}</span>
							@endforeach
						</div>
					</div>
				@elseif($exercise->categroy_id == 3)
					<!--填空题-->
					<div class="clear answer-box checked_work"></div>
					<div class="exer-foot clear">
						<div class="f-l">
							<span class="ic-blue">正确答案：</span>
							@foreach($exercise->answer as $answer)
								<span class="black_answer">{{$loop->index+1}}、{{$answer}}</span>
							@endforeach
						</div>
					</div>
				@elseif($exercise->categroy_id == 4)
					<!--判断题-->
					<div class="clear answer-box">
						<span class="f-l">答案：</span>
						<div class="f-l">
							<ul class="fs14 pan-duan {{$exercise->student_answer[0] == 1? 'rightActive':($exercise->student_answer[0] == 0? 'wrongActive':'')}}">
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
					<div class="exer-foot clear answer-box">
						<div class="f-l p-r">
							<span class="ic-blue" style="display: inline-block;position: relative;top: -6px;">正确答案：</span>
							<ul style="display: inline-block;" class="fs14 pan-duan {{$exercise->answer[0] == 1? 'rightActive':($exercise->answer[0] == 0? 'wrongActive':'')}}">
								<li>
									<i class="uploadExerIcons {{$exercise->answer[0] == 1? 'right':'wrong'}}"></i>
									<span class="gray pan-duan-answ">{{$exercise->answer[0] == 1? '正确':'错误'}}</span>
								</li>
							</ul>
						</div>
					</div>
				@elseif($exercise->categroy_id == 6)
					<!--排序题-->
					<div class="clear answer-box sort-work">
						<span class="f-l">答案：</span>
						<div class="f-l">
							<ul class="exer-list-ul">
								@foreach($exercise->options as $option)
								<li data-key="{{key($option)}}">
									<span class="f-l answer_sign">排序{{$abcList[$loop->index]}}</span>
									<p class="f-l option">：{{$option[key($option)]}}</p>
								</li>
								@endforeach
							</ul>
						</div>
					</div>
				@elseif($exercise->categroy_id == 10 || $exercise->categroy_id == 11)
					<!--主观题-->
					<div class="clear answer-box checked_work"></div>
					<div class="exer-foot clear">
						<div class="f-l subjectiveA">
							<span class="ic-blue">学生答案：</span>
							@foreach($exercise->student_answer as $answer)
								<span class="black_answer">{!!$answer!!}</span>
							@endforeach
						</div>
						<div class="f-l subjectiveA">
							<span class="ic-blue f-l">批注：</span>
							<span class="answer_module">
								@foreach($exercise->correct as $postil)
									<span class="black_answer f-l">{{$loop->index+1}}、{!!$postil!!}</span>
								@endforeach
							</span>
						</div>
					</div>
				@endif
			</div>
		</div>
	@endforeach
</div>
<script type="text/javascript">
	var categroy_id = "{{$exercise->categroy_id}}";
</script>