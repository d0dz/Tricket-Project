@layout ('layouts.master')

@section('content')
	
	<table class="table table-hover">

		<caption>
			<h3>รายวิชาภายในวิทยาลัยบัญฑิตเอเซีย</h3>
			{{ HTML::link('localcourses/new', 'เพิ่มรายวิชาภายในวิทยาลัยบัญฑิตเอเซีย', array('class' => 'btn btn-info')) }}
			
		</caption>
		
		<thead>
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>
			<th>Description</th>
		</tr>
		</thead>
	<tbody>
		@foreach ($localcourses->results as $localcourse)
		<tr>
			<td>{{ HTML::link_to_route('localcourse', $localcourse->code, array($localcourse->id)) }}</td>
			<td>{{ $localcourse->title }}</td>
			<td>{{ $localcourse->credit }}</td>
			<td>{{ $localcourse->description }}</td>
		</tr>
		@endforeach
	</tbody>
	</table>
	{{$localcourses->links()}}
@endsection