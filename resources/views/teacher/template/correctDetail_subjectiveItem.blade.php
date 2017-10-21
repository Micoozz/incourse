@foreach($data['subjective'] as $exercise)
<div class="Correcting-questions" data-id="{{$exercise->id}}">
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
@foreach($data['subjective'] as $exercise)
<div class="Correcting-questions" data-id="{{$exercise->id}}">
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
<div style="display:none;" class="upLoadHtmlData"></div>
@endforeach