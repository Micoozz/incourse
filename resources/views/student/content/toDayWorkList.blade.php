 <div class="ic-container">
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
            <td class="job_today">
                <span style="position:absolute; left:35px;top:18px;" >
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
                <span class="job_title_today">
                {{ $work->title }}
                </span>
            </td>
            @if(time() > $work->deadline)
                <td style="color: red">
                {{ date('m月d日 h:i',$work->deadline) }}
                    <span>(超时)</span>
                </td>
            @else
                <td>
                {{ date('m月d日 h:i',$work->deadline) }}
                </td>
            @endif
            <td>{{ $work->count }}道</td>
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
            <td style="cursor: pointer;color: #168BEE;" @if($work->sub_time == 0) onclick='window.location.href= "/todayWork/routine_work/{{ $work->id }}" ' @else onclick='window.location.href= "/learningCenter/{{ $work->course_id }}/homework/work_score/{{ $work->id }}" ' @endif><i class="fa {{$work->sub_time == 0?'fa-pencil':'fa-eye'}}"></i>{{empty($work->sub_time)?'做题':'查看'}}
            </td>
        </tr>
        @endforeach
    </table>
    {{ $data->links() }}
</div>
