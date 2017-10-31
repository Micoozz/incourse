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
							<span class="ic-blue f-l">学生答案：</span>
							<span class="answer_module">
								@foreach($exercise->student_answer as $answer)
									<span class="black_answer f-l">批注{{$loop->index+1}}、{!!$answer!!}</span>
								@endforeach
								@foreach($exercise->student_answer as $answer)
									<span class="black_answer f-l">批注{{$loop->index+1}}、{!!$answer!!}</span>
								@endforeach
							</span>
						</div>
					</div>
				@endif
			</div>
		</div>
	@endforeach
	<!--连线题-->
		<!-- <div class="exer-in-list border">
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
							<canvas id="canvas1" width="322">您的浏览器暂不支持Canvas！</canvas>
							<canvas id="canvas2" width="322">您的浏览器暂不支持Canvas！</canvas>
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
				<div class="f-l p-r">
					<span class="ic-blue">正确答案：</span>
					<span>1连2，2连1，3连3</span>
				</div>
			</div>
		</div>
		</div> -->
		<!--排序题-->
		<!-- <div class="exer-in-list border">
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
							<span class="f-l ic-blue">排序A：</span>
							<p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花 Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci, animi aperiam blanditiis cupiditate</p>
						</li>
						<li>
							<span class="f-l ic-blue">排序B：</span>
							<p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</p>
						</li>
						<li>
							<span class="f-l red">排序C：</span>
							<p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</p>
						</li>
						<li>
							<span class="f-l red">排序D：</span>
							<p class="f-l option">当阳光洒在身上时，它更坚定了心中的信念--要开出：一朵鲜艳的花</p>
						</li>
					</ul>
				</div>
			</div>
			<div class="exer-foot clear">
				<div class="f-l p-r">
					<span class="ic-blue">正确答案：</span>
					<span>DABC</span>
				</div>
			</div>
		</div>
		</div> -->
		<!--完形填空-->
		<!-- <div class="exer-in-list border">
		<div class="exer-head">
			<span class="exer-type-list">完形填空</span>
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
								<label class="ic-radio border p-r radio-right">
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
				<div class="f-l p-r">
					<span class="ic-blue">正确答案：</span>
					<span>1.A&nbsp;&nbsp;&nbsp;2.B</span>
				</div>
			</div>
		</div>
		</div> -->
</div>