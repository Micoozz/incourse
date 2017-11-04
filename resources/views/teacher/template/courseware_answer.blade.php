<div>
	<span class="f-l">选项：</span>
	<ul class="radio-wrap exer-list-ul dan-xuan-options">
	@foreach($data->exercise->options as $option)
		<li>
			<span class="f-l">{{$abcList[$loop->index]}}：</span>
			<p class="f-l option">{{$option[key($option)]}}</p>
		</li>
	@endforeach
	</ul>
</div>