 <div class="ic-container">
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
            <td>
                <span style="position:relative; left:-20px;" >
                <img
                @if($work->course_id == 1)
                    src="{{ asset('images/language.png') }}"
                @elseif($work->course_id == 2)
                    src="{{ asset('images/mathematics.png') }}"
                @elseif($work->course_id == 6)
                    src="{{ asset('images/science.png') }}"
                @elseif($work->course_id == 5) 
                    src="{{ asset('images/english.png') }}"   
                @endif />
                </span>
                <img 
                @if($work->job_type == 1) 
                    src="{{ asset('images/user.png') }}" 
                @else 
                    src="{{ asset('images/users.png') }}" 
                @endif />&nbsp;&nbsp; 
                {{ $work->title }}作业
            </td>
            <td>{{ $chapter[0]->title }}  {{ $minutia->title }}</td>
             <td style="color: red">
                {{ date('m月d日 h:i',$work->belongsToJob->deadline) }}
                @if(time() > $work->sub_time)
                    <span>(超时)</span>
                @endif
                </td>
            <td>
            @if($work->status == 0)
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
            <td><i @if($work->sub_time == 0) onclick='window.location.href= "/todayWork/routine_work/{{ $work->id }}" ' 
                @else onclick='window.location.href= "/learningCenter/{{ $work->course_id }}/homework/work_score/{{ $work->id }}" ' @endif class="fa fa-edit"></i>
            </td>
        </tr>
        @endforeach
    </table>
</div>
