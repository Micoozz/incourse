<ul>
	@if($func != "routine_work")
		<li onclick='window.location.href= "/todayWork" '>今日作业</li>
	@endif
	@foreach($courseAll as $course)
   		 <li @if($course->id == $courseFirst[0]['id']) class="first" @else class="" @endif)><a href="/learningCenter/{{ $course->id }}">{{ $course->title }}</a></li>
    @endforeach
</ul>