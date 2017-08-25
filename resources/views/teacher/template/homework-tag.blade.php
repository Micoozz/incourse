
<ul class="gray-bg ic-inline clear homework-manage-title">
    <li>
        <a {{ empty($func) || $func == 'addHomework' || $func == 'addHomework-personal' ? 'class=active' : '' }} href="/learningCenter/{{$class_id}}/{{$course_id}}/homework/addHomework">布置作业</a>
    </li>
    <li>
        <a href="Pigaizuoye.html">批改作业</a>
    </li>
    <li>
        <a href="/learningCenter/{{$class_id}}/{{$course_id}}/{{$mod}}/exercise" {{$func == "exercise" ? "class=active" : ""}}>习题库</a>
    </li>
</ul>