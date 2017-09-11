<ul>
	<li onclick='window.location.href= "/todayWork" ' class="first">今日作业<sup>{{ $count }}</sup></li>
	@foreach($courseAll as $course)
   		 <li><a href="/learningCenter/{{ $course->id }}">{{ $course->title }}</a></li>
    @endforeach
</ul>