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
                {{ date('m月d日',$work->belongsToJob->pub_time) }}作业
            </td>
            <td>{{ $chapter[0]->title }}  {{ $minutia->title }}</td>
            <td>{{ date('m月d日 h:i',$work->belongsToJob->deadline) }}</td>
            <td>
            @if(empty($work->start_time))
                未答题
            @else
                {{ $work->score }}
            @endif
            </td>
<<<<<<< HEAD
            <td>
                @if(empty($work->sub_time))
                    未答题
                @else
                    {{ $work->second }}
                @endif
            </td>
            <td><i @if(empty($work->sub_time)) onclick='window.location.href= "/todayWork/routine_work/{{ $work->id }}" ' 
                @else onclick='window.location.href= "/learningCenter/{{ $work->course_id }}/homework/work_score/{{ $work->id }}" ' @endif class="fa fa-edit"></i>
=======
            <td>未答题</td>
            <td><i @if(empty($work->start_time)) onclick='window.location.href= "/todayWork/2/{{ $work->id }}" ' 
                @else onclick='window.location.href= "/learningCenter/{{ $work->course_id }}/1/3/{{ $work->id }}" ' @endif class="fa fa-edit"></i>
>>>>>>> 85a78bb085a00fd69f84922f2c2f439b6ce62b44
            </td>
        </tr>
        @endforeach
    </table>
</div>
