@extends('teacher.extends-teacher')
@section('DESCTIPTION','这是页面描述描述')
@section('KEYWORDS','这是关键词关键词')

@section('CSS:OPTIONAL')
<link rel="stylesheet" href="/css/exercise.css" />
<link rel="stylesheet" href="/css/teacher/homeworkManage.css" />
<link rel="stylesheet" href="/css/teacher/correctDetail.css" />
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
					<a class="page_Mark ic-blue c-d p-r blue-hover lookSameExer" data-page="3">查看学生同类型练习题</a>
					<div class="f-r">
						<span class="page_Mark isMark doMark active" data-page="1">客观题</span>
						<span class="page_Mark isMark notMark" data-page="2">主观题</span>
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
					@include('teacher.template.correctDetail_objectiveItem')
				</div>
				<!-- 同类型习题 -->
				<div class="person-correct-same">
					<ul class="ic-inline clear person-hw-derail">
						<li>作业章节：第一章第一小节</li>
						<li>学号：20071027</li>
						<li>姓名：曹操</li>
						<li class="ta-r">
							<span>同类型习题分值：</span>
							<span>10</span>
						</li>
					</ul>
					<!-- 题目列表，都是客观题 -->
					@include('teacher.template.correctDetail_homotypology')
				</div>
				<!--主观题-->
				<div class="person-correct-will d-n">
					<ul class="ic-inline clear person-hw-derail">
						<li>作业章节：第一章第一小节</li>
						<li>学号：20071027</li>
						<li>姓名：曹操</li>
						<li class="ta-r">
							<span>该题分值：</span>
							<span>10</span>
						</li>
					</ul>
					@include('teacher.template.correctDetail_subjectiveItem')
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
<script src="/js/teacher/correctDetail.js" charset="utf-8"></script>
@endsection