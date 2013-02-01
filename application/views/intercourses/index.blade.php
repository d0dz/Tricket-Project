@layout ('layouts.master')

@section('content')
	<h1></h1>
	<table class="table table-hover">
		<caption><h3>รายวิชาภายนอกวิทยาลัยบัญฑิตเอเซีย</h3>
			{{ HTML::link('intercourses/new', 'เพิ่มรายวิชาภายนอก', array('class' => 'btn btn-info')) }}
		</caption>
		<thead>
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>
			<th>Description</th>
			<th>University</th>
			<th>Edit</th>
		</tr>
		</thead>
	<tbody>
		@foreach ($intercourses->results as $intercourse)
		<tr>
			<td>{{ HTML::link_to_route('intercourse', $intercourse->code, array($intercourse->id)) }}</td>
			<td>{{ $intercourse->title }}</td>
			<td>{{ $intercourse->credit }}</td>
			<td>{{ $intercourse->description }}</td>
			<td>{{ $intercourse->name }}</td>
			<td>{{ HTML::link_to_route('edit_intercourses', 'Edit', array($intercourse->id), array('class' => 'btn btn-info')) }}</td>
		</tr>
		@endforeach
	</tbody>
	</table>
	{{$intercourses->links()}}
@endsection