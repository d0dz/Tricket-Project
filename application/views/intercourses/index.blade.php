@layout ('layouts.master')

@section('content')
	<h1></h1>

	<table class="table table-hover">
		<caption><h3>รายวิชาภายนอกวิทยาลัยบัญฑิตเอซีย</h3>
			{{ HTML::link('intercourses/new', 'เพิ่มรายวิชาภายนอก', array('class' => 'btn btn-info')) }}
		</caption>
		<thead>
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>
			<th>Description</th>
			<th>University</th>
		</tr>
		</thead>
	<tbody>
		@foreach ($intercourses->results as $intercourse)
		<tr>
			<td>{{ $intercourse->code }}</td>
			<td>{{ $intercourse->title }}</td>
			<td>{{ $intercourse->credit }}</td>
			<td>{{ $intercourse->description }}</td>
			<td>{{ $intercourse->name }}</td>
		</tr>
		@endforeach
	</tbody>
	</table>
@endsection