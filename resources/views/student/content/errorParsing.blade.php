<div class="col-xs-12 col-sm-12" id="centery">
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">错题解析</span>
		<span class="col-xs-3 col-sm-3 add"></span>
	</div>
	<div class="ic-container accout">
		<div class="error-answer">
			<p class="answer-ka"><i class="fa fa-file-text"></i>&nbsp;&nbsp;答题卡</p>
			@if(!empty($data['error_work']))
			<p>答题卡</p>
			<ul class="answerSheets">
				@foreach($data['error_work'] as $errorWork)
				<li exe-id="{{  $errorWork->exe_id }}" class="bj-ff5" onclick="window.location.href='/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/error_reports/{{ $parameter }}/{{ $errorWork->exe_id }}/{{ $loop->index +1 }}'" >{{ $loop->index +1 }}</li>
				@endforeach
			</ul>
			@endif

			@if(!empty($data['error_same']))
			<div class="clear" ></div>
			<p style="margin-top: 20px">同类型习题</p>
			<ul class="homotypology">
				@foreach($data['error_same'] as $errorWork)
				<li parent-id="{{ $errorWork->parent_id }}" class="bj-ff5" onclick="window.location.href='/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/error_reports/{{ $parameter }}/{{ $errorWork->exe_id }}/{{ $loop->index +1 }}'" >{{ $loop->index +1 }}</li>
				@endforeach
			</ul>
			@endif
		</div>
		<div class="clear"></div>
		<div class="submits">
			<button class="btn-white" onclick="window.history.go(-1);" >返回</button>
		</div>
	</div>
</div>