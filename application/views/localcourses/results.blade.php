@layout('layouts.master')

@section('content')
	<h1>Search Results</h1>



	@if(!$localcourses && !$intercourses)
		<p>ไม่พบการค้นหา</p>
	@else
		<h3>วิชาภายใน</h3>
		<ul>
			@foreach($localcourses as $localcourse)
				<li>
					{{ HTML::link_to_route('localcourse', $localcourse->title, $localcourse->id) }}
				</li>
			@endforeach
		</ul>

		<h3>วิชาภายนอก</h3>
		<ul>
			@foreach($intercourses as $intercourse)
				<li>
					{{ HTML::link_to_route('intercourse', $intercourse->title, $intercourse->id) }}
				</li>
			@endforeach
		</ul>
	@endif

	
		
@endsection