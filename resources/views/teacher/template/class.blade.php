<ul>
	<li class="found"><i class="fa fa-plus-circle"></i>&nbsp;&nbsp;创建班级</li>
		@if($func != "manager-pwd" && $func != "manager-name")
			@foreach($data['classAll'] as $grade)
				<li>
					<div>
						{{ $grade["title"] }}&nbsp;&nbsp;&nbsp;&nbsp;<i class="fa fa-angle-down"></i>
					</div>
					<div id="{{ $grade['id'] }}" class="class_s" style="display: none;">
						<div>
						@foreach($grade["class"] as $class)
								<div onclick="window.location.href='/fileManager/{{ $mod }}/{{ $func }}/{{ $class['id'] }}'" class="{{ $loop->index == 0 ? '.box' ：''}}">{{ $class["title"] }}</div>
						@endforeach	
						</div>
						<i class="fa fa-plus-circle"></i>
					</div>
				</li>
			@endforeach
		@endif
</ul>
