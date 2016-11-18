<ul id="ulink">
				<li><a href="{{ route('forum',['id'=>$faculty->faculty_id]) }}">Forum</a></li>
				<li><a href="{{ route('courses',['id'=>$faculty->faculty_id]) }}">Courses</a></li>
				<li><a>{{ $faculty->name }}</a></li>
			</ul><br><br>