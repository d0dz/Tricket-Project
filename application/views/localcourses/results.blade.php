@layout('layouts.master')

@section('content')
	<h1>Search Results</h1>



	@if(!$localcourses && !$intercourses)
		<p>ไม่พบการค้นหา</p>
	@else
		<h3>วิชาภายใน</h3>
		<table class="table table-hover">

		<caption>
			<h3>รายวิชาภายในวิทยาลัยบัญฑิตเอเซีย</h3>
		</caption>
		
		<thead>
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>
			<th>Description</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		</thead>
	<tbody>
		@foreach ($localcourses as $localcourse)
		<tr>
			<td>{{ HTML::link_to_route('localcourse', $localcourse->code, array($localcourse->id)) }}</td>
			<td>{{ $localcourse->title }}</td>
			<td>{{ $localcourse->credit }}</td>
			<td>{{ $localcourse->description }}</td>
			<td>{{ HTML::link_to_route('edit_localcourses', 'Edit', array($localcourse->id), array('class' => 'btn btn-info')) }}</td>
			<td>
				{{ Form::open('localcourse/delete', 'DELETE',array('style'=>'display: inline;')) }}
				{{ Form::hidden('id', $localcourse->id) }}
				{{ Form::submit('Delete', array('class'=>'btn btn-info')) }}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>


		<h3>วิชาภายนอก</h3>
		<table class="table table-hover">
		<caption><h3>รายวิชาภายนอกวิทยาลัยบัญฑิตเอเซีย</h3>
		</caption>
		<thead>
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>
			<th>Description</th>
			<th>University</th>
			<th>Edit</th>
			<th>Delete</th>
		</tr>
		</thead>
	<tbody>
		@foreach ($intercourses as $intercourse)
		<tr>
			<td>{{ HTML::link_to_route('intercourse', $intercourse->code, array($intercourse->id)) }}</td>
			<td>{{ $intercourse->title }}</td>
			<td>{{ $intercourse->credit }}</td>
			<td>{{ $intercourse->description }}</td>
			<td>{{ $intercourse->name }}</td>
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

	@endif

	
		
@endsection