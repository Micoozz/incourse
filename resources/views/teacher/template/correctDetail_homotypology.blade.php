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
					<!-- 单选题  &&  多选题 -->
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
					填空题
					<div class="exer-foot clear">
						<div class="f-l">
							<span class="ic-blue">正确答案：</span>
							@foreach($exercise->answer as $answer)
								<span class="black_answer">{{$loop->index+1}}、{{$answer}}</span>
							@endforeach
						</div>
					</div>
				@elseif($exercise->categroy_id == 4)
					判断题
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
				@endif
			</div>
		</div>
	@endforeach
</div>
<!-- 同类型习题 -->
		<!-- <div class="fff-bg p-f preview-hw-wrap person-hw-mark d-n">
			<div class="preview-hw-head">
				<span class="ic-blue hw-title">同类型习题</span>
				<i class="f-r common-icon ic-close-icon"></i>
			</div>
			<p class="clear">
				<span class="f-r">15/15 题</span>
			</p>
			<div class="exer-list">
				单选题
				<div class="exer-in-list border">
					<div class="exer-head">
						<span class="exer-type-list">单选题</span>
						<div class="f-r ic-blue">
							<input class="checkbox-add" type="checkbox" />
							<span>添加</span>
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
									<i class="fa fa-thumbs-o-up"></i>
								</li>
								<li>
									<i class="fa fa-heart-o"></i>
									<span>665</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				填空题
				<div class="exer-in-list border">
					<div class="exer-head">
						<span class="exer-type-list">填空题</span>
						<div class="f-r ic-blue">
							<input class="checkbox-add" type="checkbox" />
							<span>添加</span>
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
									<i class="fa fa-thumbs-o-up"></i>
								</li>
								<li>
									<i class="fa fa-heart-o"></i>
									<span>665</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
				填空题
				<div class="exer-in-list border">
					<div class="exer-head">
						<span class="exer-type-list">填空题</span>
						<div class="f-r ic-blue">
							<input class="checkbox-add" type="checkbox" />
							<span>添加</span>
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
									<i class="fa fa-thumbs-o-up"></i>
								</li>
								<li>
									<i class="fa fa-heart-o"></i>
									<span>665</span>
								</li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			已添加的作业
			<div class="hw-list">
				<p class="title">7月20日作业</p>
				<ul class="hw-type-list">
					<li>
		                    <span class="type">选择题</span>
		                    <span class="number">（1）</span>
		                </li>
		                <li>
		                    <span class="type">填空题</span>
		                    <span class="number">（2）</span>
		                </li>
				</ul>
				<div class="ta-c">
					<a class="ic-btn" href="personHw.html">生成作业</a>
				</div>
			</div>
		</div> -->