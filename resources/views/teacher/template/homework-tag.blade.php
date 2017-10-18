
<ul class="gray-bg ic-inline clear homework-manage-title">
    <li>
        <a href="/addHomework/{{$class_id}}/{{$course_id}}" {{ $title == "添加作业" ? "class=active" : ""}}>布置作业</a>
    </li>
    <li>
        <a href="/correct/{{$class_id}}/{{$course_id}}" {{ $title == "批改作业" ? "class=active" : ""}}>批改作业</a>
    </li>
    <li>
        <a href="/exercise/{{$class_id}}/{{$course_id}}" {{ $title == "习题库" ? "class=active" : ""}}>习题库</a>
    </li>
</ul>