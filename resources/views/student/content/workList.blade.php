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
				<th>章节</th>
				<th>截止时间&nbsp;&nbsp;<i class="fa fa-unsorted"></i></th>
				<th>得分</th>
				<th>耗时</th>
				<th>操作</th>
			</tr>
			@foreach($data as $work)
            <tr>
                <td><img @if($work->job_type == 1) src="{{ asset('images/user.png') }}" @else src="{{ asset('images/users.png') }}" @endif />&nbsp;&nbsp; {{ $work->title }}作业</td>
                <td>{{ $chapter[0]->title }}  {{ $minutia->title }}</td>
                <td>{{ date('m月d日 h:i',$work->belongsToJob->deadline) }}</td>
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
	</div>
</div>