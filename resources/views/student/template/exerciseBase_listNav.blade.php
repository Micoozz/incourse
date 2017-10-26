<ul class="gray-bg ic-inline clear homework-manage-title">
    <li><a href="/freePractice/{{ $courseFirst[0]['id'] }}/1" class="{{ $type_id==1?'active':'' }}">复习</a></li>
    <li><a href="/freePractice/{{ $courseFirst[0]['id'] }}/2" class="{{ $type_id==2?'active':'' }}">同步练习</a></li>
    <li><a href="/foreExercise/{{ $courseFirst[0]['id'] }}/4" class="{{ $type_id==4?'active':'' }}">预习</a></li>
    <li><a href="/freePractice/{{ $courseFirst[0]['id'] }}/3" class="{{ $type_id==3?'active':'' }}">错题本</a></li>
    <li><a href="/freePractice/{{ $courseFirst[0]['id'] }}/5" class="{{ $type_id==5?'active':'' }}">收藏</a></li>
</ul>