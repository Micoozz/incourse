
<ul class="gray-bg ic-inline clear homework-manage-title">
    <li>
        <a href="/addHomework/{{$class_id}}/{{$course_id}}" {{ $port != "exercise" && $port != "correct" ? "class=active" : ""}}>布置作业</a>
    </li>
    <li>
        <a href="Pigaizuoye.html">批改作业</a>
    </li>
    <li>
        <a href="/exercise/{{$class_id}}/{{$course_id}}" {{ $port == "exercise" ? "class=active" : ""}}>习题库</a>
    </li>
</ul>