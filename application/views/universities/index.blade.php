@layout ('layouts.master')

@section('content')
	<h1></h1>

	<table class="table table-hover">
		<caption><h3>รายชื่อมหาวิทยาลัย</h3>
			{{ HTML::link('universities/new', 'เพิ่มมหาวิทยาลัย', array('class' => 'btn btn-info')) }}
		</caption>
		<thead>
		<tr>
			<th>Id</th>
			<th>Description</th>
		</tr>
		</thead>
	<tbody>
		@foreach ($universities as $universitie)
		<tr>
			<td>{{ $universitie->id }}</td>
			<td>{{ $universitie->name }}</td>
		</tr>
		@endforeach
	</tbody>
	</table>
@endsection