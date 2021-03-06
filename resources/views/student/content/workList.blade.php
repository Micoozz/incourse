<div class="col-xs-12 col-sm-12" id="centery">
	<div class="files_nav">
		<span class="col-xs-3 col-sm-3"></span>
		<span class="col-xs-6 col-sm-6">{{	$courseFirst[0]['title'] }}</span>
		<span class="col-xs-3 col-sm-3 add"></span>
	</div>
	<div class="ic-container accout">
		<!--假数据-->
		<table border="" cellspacing="" cellpadding="" class="title">
			<tr>
				<th>作业名称</th>
				<th>截止时间&nbsp;&nbsp;<i class="fa fa-unsorted"></i></th>
                <th>习题练习</th>
				<th>得分</th>
				<th>耗时</th>
				<th>操作</th>
			</tr>
			@foreach($data as $work)
            <tr>
                <td><img @if($work->job_type == 1) src="{{ asset('images/user.png') }}" @else src="{{ asset('images/users.png') }}" @endif />&nbsp;&nbsp; {{ $work->title }}</td>
                @if(time() > $work->deadline)
                    <td style="color: red">
                    {{ date('m月d日 H:i',$work->deadline) }}
                        <span>(超时)</span>
                    </td>
                @else
                    <td>
                    {{ date('m月d日 H:i',$work->deadline) }}
                    </td>
                @endif
                @if($work->job_type == 1)
                    <td>{{ $work->count }}道</td>
                @else
                    <td>-</td>
                @endif
                <td>
                @if($work->sub_time == 0)
                    未答题
                @else
                    {{ $work->score }}
                @endif
                </td>
                <td>
                @if($work->sub_time == 0)
                	未答题
                @else
                	{{ $work->second }}
                @endif
                </td>

                <td style="cursor: pointer;color: #168BEE;" @if($work->sub_time == 0) onclick='window.location.href= "/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/routine_work/{{ $work->id }}" ' @else onclick='window.location.href= "/learningCenter/{{ $courseFirst[0]['id'] }}/{{ $mod }}/work_score/{{ $work->id }}" ' @endif><i class="fa {{$work->sub_time == 0?'fa-pencil':'fa-eye'}}"></i>{{$work->sub_time == 0?'做题':'查看'}}</td>
            </tr>
            @endforeach
		</table>
        {{ $data->links() }}
	</div>
</div>