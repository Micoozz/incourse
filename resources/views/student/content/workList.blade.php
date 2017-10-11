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
                <td>{{ $work->count }}道</td>
                <td>
                @if(empty($work->sub_time))
                    未答题
                @else
                    {{ $work->score }}
                @endif
                </td>
                <td>
                @if(empty($work->sub_time) )
                	未答题
                @else
                	{{ $work->second }}
                @endif
                </td>
                <td><i @if(empty($work->sub_time)) onclick='window.location.href= "/learningCenter/{{ $work->course_id }}/{{ $mod }}/routine_work/{{ $work->id }}" ' 
    	  		@else onclick='window.location.href= "/learningCenter/{{ $work->course_id }}/{{ $mod }}/work_score/{{ $work->id }}" ' @endif class="fa fa-edit"></i></td>
            </tr>
            @endforeach
		</table>
        {{ $data->links() }}
	</div>
</div>