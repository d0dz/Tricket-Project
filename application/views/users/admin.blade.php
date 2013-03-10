@layout('layouts.master')

@section('content')
	<table class="table table-hover">
		<caption><h3>รายวิชาที่รอการเทียบโอน</h3>
			
		</caption>
		<thead>
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>
			
			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>
			<th>University</th>
			<th>Approve</th>
		</tr>
		</thead>
	<tbody>
		@foreach ($coursemapping as $coures)
		<tr>
			<td>{{$coures->localcourse->code }}</td>
			<td>{{ $coures->localcourse->title }}</td>
			<td>{{ $coures->localcourse->credit }}</td>

			<td>{{ $coures->intercourse->code }}</td>
			<td>{{ $coures->intercourse->intercoursedetail[0]->title }}</td>
			<td>{{ $coures->intercourse->intercoursedetail[0]->credit }}</td>
			<td>{{ $coures->intercourse->universitie->name }}</td>

			
						<td>
				{{ Form::open('coursemapping/approve', 'POST',array('style'=>'display: inline;')) }}
				{{ Form::hidden('id', $coures->id) }}
				{{ Form::submit('Approve', array('class'=>'btn btn-info')) }}
				{{ Form::close() }}
			</td>
		</tr>
		@endforeach
	</tbody>
	</table>
@endsection