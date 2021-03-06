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
			
			<th>Delete</th>
		</tr>
		</thead>
	<tbody>

				@foreach ($intercourses as $intercourse)
		<tr>
			<td>{{ $intercourse->intercourse->code }}</td>
			<td>{{ $intercourse->title }}</td>
			<td>{{ $intercourse->credit }}</td>
			<td>{{ $intercourse->description }}</td>
			<td>{{ $intercourse->intercourse->universitie->name }}</td>
			<td>{{ HTML::link_to_route('edit_intercourses', 'Edit', array($intercourse->id), array('class' => 'btn btn-info')) }}</td>
			<td>
				{{ Form::open('intercourse/delete', 'DELETE',array('style'=>'display: inline;')) }}
				{{ Form::hidden('id', $intercourse->id) }}
				{{ Form::submit('Delete', array('class'=>'btn btn-info')) }}
				{{ Form::close() }}
		
			</td>
		</tr>
				@endforeach
	</tbody>
	</table>
	
@endsection