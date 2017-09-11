<div class="row">
  	<div id="cent_nav" class="col-md-3 col-xs-12">
  		<ul class="col-md-12 col-xs-12">
			  <li>今日作业</li>
        @foreach($courseAll as $course)
        <li @if($course->id == $courseFirst[0]['id']) class="topic" @else class="" @endif) ><a href="/learningCenter/{{ $course->id }}/1">{{ $course->title }}</a></li>
        @endforeach
  		</ul>
  	</div>
  	<div class="col-md-6"></div>
  	<div class="col-md-3"></div>
</div>