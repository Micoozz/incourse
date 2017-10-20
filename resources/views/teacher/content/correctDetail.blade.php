@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/exercise.css" />
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<style>
	/*未批改样式*/


	.person-correct-will .person-hw-derail .score {
		width: 88px;
	}

	.Correcting-questions>.exer-head input {
		width: 88px;
		height: 25px;
		outline: none;
		padding-left: 10px;
	}

	.Correcting-questions,
	.questions>.issue>span {
		border: 1px solid #eee;
		padding: 10px;
	}
	.Correcting-questions{
		margin-top: 24px;
	}
	.questions {
		margin-top: 20px;
	}

	.questions>.issue>span {
		display: inline-block;
		width: 93%;
		margin-left: 40px;
		position: relative;
		top: -16px;
	}

	.questions>.result>span:first-child {
		width: 100px;
		border-radius: 4px;
		font-size: 12px;
		padding: 5px;
		margin: 0;
	}

	.questions>.result>span:first-child>b {
		border-left: 1px solid #eee;
		padding-left: 15px;
		cursor: pointer;
	}

	.questions>.result>span {
		top: 0;
		margin-top: 10px;
	}

	.questions>.result>span:nth-of-type(2) {
		word-break: break-all;
	}

	.Correct-answer>div {
		margin-left: 40px;
	}

	.result {
		border-bottom: 1px solid #eee;
		padding-bottom: 15px;
		margin-bottom: 15px;
		position: relative;
	}

	.Correct-answer {
		border: none;
	}

	.postil {
		position: relative;
		min-height: 160px;
		text-align: center;
		color: #fff;
		font-size: 1.2em;
		width: 20%;
	}

	.postil>div:last-child {
		min-height: 150px;
		background-color: #fff;
	}

	.postil {
		background-color: #444547;
		padding: 0;
		padding-top: 77px;
	}

	.postil > div:first-child {
		background-color: #fff;
		position: relative;
		top:0;
		line-height: 54px;
		font-size: 16px;
		color: #333;
		padding: 68px 20px 20px;
		border-left: 1px solid #f1f1f1;
	}

	.postil>div:last-child b {
		position: relative;
		top: -4px;
	}

	.postil>div:last-child>div {
		position: relative;
		top: 0;
		width: 100%;
		text-align: left;
		min-height: 100%;
		overflow: auto;
	}

	.postil>div:last-child>div>div>div>img {
		position: relative;
		top: -9px;
	}

	.pitchOn {
		color: red;
	}

	sup {
		z-index: 102;
		background-color: #fff;
	}

	.amend {
		position: relative;
		line-height: 22px;
	}

	.textareaS {
		display: inline-block;
		border: 1px solid #eee;
		width: 140px;
		min-height: 100px;
		overflow: hidden;
		height: auto;
		position: relative;
		top: -2px;
		left: 29px;
	}
	.textareaS div{
		width: 100%;
		min-height: 100px;
		padding: 10px;
		overflow: hidden;
		height: auto;
    	font-size: 14px;
    	line-height: 16px;
	}
	.textareaS div:focus{
		border: none;
		outline: none;
	}
	.postil>div:last-child>div .UploadPictures {
		position: relative;
		font-size: 12px;
		width: 140px;
		border: 1px solid #eee;
		border-bottom: none;
		display: inline-block;
		background: #fff;
	}

	.UploadPictures button{
		width: 80px;
		display: block;
		height: 38px;
		position: relative;
	}
	.UploadPictures .close{
		width: 16px;
		height: 16px;
		position: absolute;
		top: 12px;
		right: 10px;
		text-align: center;
		line-height: 16px;
	}

	.postil>div:last-child>div .UploadPictures input {
		position: absolute;
		width: 100%;
		top: 0;
		left: 0;
		opacity: 0;
		display: block;
		height: 100%;
		cursor: pointer;
	}

	.textareaS>img {
		width: 40px;
		height: 40px;
	}

	.mycanvas {
		position: absolute;
		top: 80px;
		left: 43px;
	}
	.remove{
		cursor: pointer;
	}
	.exerManage{
		position: relative;
	}
	.postil{
		position: absolute;
		top: 0;
		right: -31.4%;
    	width: 31.4%;
		display: none;
	}
	.postil .remark{
		position: absolute;
		top: 0;
		left: 0;
		width: 100%;
		height: 48px;
		line-height: 48px;
		text-align: center;
		background: #F1F1F1;
	}
	.UploadPictures{
		width: 100%;
		height: 40px;
		line-height: 40px;
	}
	.btnFile{
		width: 100%;
		height: 100%;
		cursor: pointer;
		position: absolute;top: 0;left: 0;
	}
	.black_answer{
		margin-right: 20px;
	}
</style>
@endsection

@section('CONTENT')
@include('teacher.template.title')
<div>
@include('teacher.template.homework-tag')
	<div class="school-container admin-container">
		<!--内容-->
		<div>
			<div class="p-r admin-container">
				<div class="person-hw-mark-head clear">
					<a class="page_Mark ic-blue c-d p-r blue-hover lookSameExer">查看学生同类型练习题</a>
					<div class="f-r">
						<span class="page_Mark isMark doMark active">客观题</span>
						<span class="page_Mark isMark notMark">主观题</span>
					</div>
				</div>
				<!--客观题-->
				<div class="person-correct-did">
					<ul class="ic-inline clear person-hw-derail">
						<li>作业章节：第一章第一小节</li>
						<li>学号：20071027</li>
						<li>姓名：曹操</li>
						<li class="ta-r">
							<span>客观题分值：</span>
							<span>10</span>
						</li>
					</ul>
					<!--题目列表，都是客观题-->
					<div class="exer-list">
						@foreach($data['objective'] as $exercise)
							<div class="exer-in-list border" data-id="$exercise->id">
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
				</div>
				<!--主观题-->
				<div class="person-correct-will d-n" data-id="$exercise->id">
					<ul class="ic-inline clear person-hw-derail">
						<li>作业章节：第一章第一小节</li>
						<li>学号：20071027</li>
						<li>姓名：曹操</li>
						<li class="ta-r">
							<span>该题分值：</span>
							<span>10</span>
						</li>
					</ul>
					@foreach($data['subjective'] as $exercise)
					<div class="Correcting-questions">
						<div class="exer-head">
							<span class="exer-type-list">{{$exercise->cate_title}}</span>
							<span class="f-r">
								<span>得分：</span>
							<input class="border score" type="text" placeholder="请输入分数">
							</span>
						</div>
						<div class="questions">
							<div class="issue">
								题目：
								<span>{{$exercise->subject}}</span>
							</div>
							<div class="result issue">
								答案：
								<span>
									工具栏
									<b class="implement"><img src="/images/1.jpg" alt=""></b>
								</span>
								<span>
									<div class="amend" contenteditable="false">{!!$exercise->student_answer!!}</div>
								</span>
							</div>
							<div class="Correct-answer result issue">
								<div class="blue">正确答案</div>
								<span>{!!$exercise->answer[0]!!}</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
				<div class="btns">
					<button id="next-stu" class="ic-btn btn-hover-bg">下一人</button>
					<button class="btn-white gray-hover-bg ic-return">返 回</button>
				</div>
			</div>
		</div>

		<!--遮罩层-->
		<!-- <div class="ic-modal d-n"></div> -->

		<!-- 同类型习题 -->
		<div class="fff-bg p-f preview-hw-wrap person-hw-mark d-n">
			<div class="preview-hw-head">
				<span class="ic-blue hw-title">同类型习题</span>
				<i class="f-r common-icon ic-close-icon"></i>
			</div>
			<p class="clear">
				<span class="f-r">15/15 题</span>
			</p>
			<div class="exer-list">
				<!-- 单选题 -->
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
				<!-- 填空题 -->
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
				<!-- 填空题 -->
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
		</div>
	</div>
	<div class="postil col-xs-12">
		<div>
			<span class="remark">
				批注
			</span>
			<div class="postil_parent"></div>
		</div>
	</div>
</div>

@endsection

@section('JS:OPTIONAL')
<script src="/js/exercise.js" charset="utf-8"></script>
<script>
	$(function() {
		var ENnum = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N'];
		$(".checked_work").each(function(i){
			for(var j = 0;j<$(this).find(".checked_work_input").length;j++){
				$(this).find(".checked_work_input").eq(j).val(ENnum[j]);
				$(this).find(".answer_sign").eq(j).text(ENnum[j]+'：');
			}
		})
		$(".checked_work_answer").each(function(i){
			for(var j = 0;j<$(this).find(".black_answer").length;j++){
				var t = $(this).find(".black_answer").eq(j).text();
				$(this).find(".black_answer").eq(j).text(ENnum[(t-1)]);
			}
		})
		$(".black_question").each(function(){
			var html = $(this).attr("data-black");
			$(this).html(html);
			var h = JSON.parse($(this).attr("data-student-answer"));
			for(var i = 0;i < h.length;i++){
				$(".blank-item").eq(i).text(h[i]);
			}
		})
		$(".postil>div:last-child>div").css({height:($(".postil > div:first-child").height()-88)})
		//已批改和未批改切换
		var switchs = true
		$('#col').css({
			'position': 'relative',
			'left': '90px',
		})

		$('body').on('click', '.page_Mark', function() {
			$('.page_Mark').removeClass('active')
			$(this).addClass('active');
			if($(this).text() == "客观题"){
				$(".person-correct-did,.lookSameExer,.left").css("display","block");
				$('.person-correct-will,.postil').css("display","none");
			}else if($(this).text() == "主观题"){
				$(".person-correct-did,.left,.lookSameExer").css("display","none");
				$('.person-correct-will,.postil').css("display","block");
				$('.postil').height($('#centery').height() - 78)
				$('.postil>div:last-child').height($('.postil').height() - 87)
			}else{

			}

			if($('.f-r .active').text() == '主观题') {
				console.log('a')
				$('#col').css({
					'position': 'relative',
					'left': '90px',
				})
			} else {
				$('#col').css({
					'position': 'relative',
					'left': '0px',
				})
			}
		});

		//老师批语

		var num = 0; //第几个
		$('.amend').each(function(i) {
			$(this).attr('num', i + 1)
			$('.postil>div:last-child>div').append('<div></div>')
		});
		$('body').on('mousedown', '.amend', function() {
			nums = $(this).attr('num');
		})

		$('body').on('click', '.implement>img', function() {
			num++
			$('.amend').attr('contenteditable', 'true');
			var selObj = window.getSelection().toString();
			if(selObj == '') {
				$('.amend').attr('contenteditable', 'false');
				return;
			}
			document.execCommand("insertHTML", "false", '<b class="pitchOn sort' + num + '">' + selObj + '<sup>' + num + '</sup><b class="scores"></b>');
			$('.amend').attr('contenteditable', 'false');

			$('.pitchOn').find('sup').each(function(i) {
				$(this).text(i + 1);
			});
			$('.amend').each(function(i) {
				$(this).attr('nums', $(this).find('b').length / 2)
			});
			var center = '<div style="color:#333;margin-bottom:20px">\
							<b>' + num + '：</b>\
							<div class="UploadPictures">\
								<button><span class="btnFile"><i class="fa fa-chain"></i>&nbsp;添加附件</span><input type="file" /></button>\
								<i class="fa fa-times close remove" num="' + num + '"></i>\
							</div>\
							<div class="textareaS"><div contenteditable="true"></div></div></div>'
			if(parseInt($('.amend:nth-of-type(' + nums + ')').attr('nums')) > 1) {
				//判断长度是否等于0
				var zeo;
				if($('.sort' + num + '').prevAll().length == 0) {
					zeo = 1
				} else {
					zeo = $('.sort' + num + '').prevAll().length
				}
				if(num > parseInt($('.sort' + num + '').prev().find('sup').text())) {
					$('.postil>div:last-child>div>div:nth-of-type(' + nums + ')>div:nth-of-type(' + zeo + ')').after(center)
				} else {
					$('.postil>div:last-child>div>div:nth-of-type(' + nums + ')>div:nth-of-type(' + zeo + ')').before(center)
				}
			} else {
				$('.postil>div:last-child>div>div:nth-of-type(' + nums + ')').append(center)
			}
			$('.postil>div:last-child>div>div>div>b').each(function(i) {
				$(this).text(i + 1 + '：');
			})

			$('.postil>div:last-child>div').css('overflow-y', 'auto')
		});

		//删除批语
		var canvass = true;
		var arry=[]
		$('body').on('click', '.remove', function() {

			//删除画布批注
				if(document.getElementById('mycanvas')!=null){
				var canvas = document.getElementById('mycanvas');
				var ctx = canvas.getContext('2d');

				ctx.clearRect($(this).attr('movex')-5,$(this).attr('movey')-15,$(this).attr('linex')+5,20);

			}
			$('.sort' + $(this).attr('num') + '').find('sup').remove();
			$('.sort' + $(this).attr('num') + '').before('<span>' + $('.sort' + $(this).attr('num') + '').text() + '</span>');
			$('.sort' + $(this).attr('num') + '').remove();
			var objet={
				movex:$(this).attr('movex'),
				movey:$(this).attr('movey')-2,
				linex:$(this).attr('linex')
			}
			arry.push(objet)
			$(this).parent().parent().remove();
			if(canvass) {
				$('.postil>div:last-child>div>div>div>b').each(function(i) {
					$(this).text(i + 1 + '：');
				});
				$('.pitchOn').find('sup').each(function(i) {
					$(this).text(i + 1);
				});
			}
		});
		//老师批语上传的图片
		$('body').on('change', '.UploadPictures input', function() {
			var th = $(this).parent().nextAll('.textareaS')
			console.log(th)
			input = $(this)[0];
			if(!input['value'].match(/.jpg|.gif|.png|.bmp/i)) { //判断上传文件格式
				return alert("上传的图片格式不正确，请重新选择");
			}
			var reader = new FileReader();
			reader.readAsDataURL(this.files[0]);
			reader.onload = function(e) {
				th.append('<img src="' + this.result + '" />')
			};
		});

		//canvas批改
		if(document.getElementById('mycanvas')!=null){
		var canvas = document.getElementById('mycanvas');
		var ctx = canvas.getContext('2d');
		var obj = {
			x: 0, //X坐标
			y: 0, //Y坐标
			move: 0, //跟随鼠标坐标判断
			numbers: 0, //第几个批注
			remove: 0, //判断是否清除
			line:0//最后坐标
		};

		canvas.onmousedown = function(event) {
			if(obj.remove == 0) {
				ctx.beginPath();
				ctx.moveTo(event.pageX - $('#mycanvas').offset().left, event.pageY - $('#mycanvas').offset().top);
				obj.move = 1;
				obj.y = event.pageY - $('#mycanvas').offset().top;
				obj.x = event.pageX - $('#mycanvas').offset().left;
			}
		}
		canvas.onmousemove = function(event) {
			if(obj.move == 1 && obj.line != obj.x) {
				ctx.lineTo(event.pageX - $('#mycanvas').offset().left, obj.y);
				ctx.strokeStyle = "red"; //线条的颜色
				ctx.stroke();
				ctx.closePath();
			}
		};
		canvas.onmouseup = function(event) {
			if(obj.remove == 0) {
				obj.line=event.pageX-$('#mycanvas').offset().left;
				if(event.pageX-$('#mycanvas').offset().left != obj.x) {
					obj.numbers++;
					var lineX=event.pageX - $('#mycanvas').offset().left;
					var center = '<div style="color:#333;margin-bottom:20px">\
							<b>' + obj.numbers + '：</b>\
							<div class="UploadPictures">\
								<button><span class="btnFile"><i class="fa fa-chain"></i>&nbsp;添加附件</span><input type="file" /></button><i class="fa fa-times close" num="' + num + '"  moveX="'+obj.x+'" moveY="'+obj.y+'" lineX="'+lineX+'" ></i>\
							</div>\
							<div contenteditable="true" class="textareaS"><div></div></div></div>'
					ctx.lineTo(event.pageX - $('#mycanvas').offset().left, obj.y);
					ctx.strokeStyle = "red";
					ctx.stroke();
					ctx.closePath();
					ctx.fillStyle = 'red';
					ctx.font = "12px bold";
					ctx.fillText(obj.numbers, event.pageX - $('#mycanvas').offset().left, obj.y+5);
					$('.postil>div:last-child>div>div:nth-of-type(1)').append(center);
					obj.move = 0;
					$('.postil>div:last-child>div').css('overflow-y', 'auto');
					canvass=false;
				}
			}
		}
		}
	})
</script>
@endsection