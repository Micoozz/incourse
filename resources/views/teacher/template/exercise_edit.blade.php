<ul class="f-r ic-inline collect">
    <li>
        @if($action != "my-conllection")
        <a href="javascript:;" class="ic-blue collect operation_job sameExercise"><i class="fa fa-copy"></i><span>同类型习题</span></a>
        <a href="javascript:;" class="ic-blue collect operation_job viewAnalysis"><i class="fa fa-eye"></i><span>查看解析</span></a>
        @endif
        @if($action == "my-upload")
        <a href="/uploadExercise/{{$class_id}}/{{$course_id}}/{{$exercise->id}}" class="ic-blue collect operation_job"><i class="fa fa-pencil"></i><span>编辑</span></a>
        <a href="javascript:;" class="ic-blue collect operation_job delExercise"><i class="fa fa-trash"></i><span>删除</span></a>
        @else
        <a class="{{ empty($action) ? 'gray' : 'red'}} collect">
            <i class="fa {{ empty($action) ? 'fa-heart-o' : 'fa-heart'}}"></i>
            <span>665</span>
        </a>
        @endif
    </li>
</ul>