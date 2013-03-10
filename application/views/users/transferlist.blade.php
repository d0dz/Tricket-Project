@layout('layouts.master')

@section('content')
	<h1>รายวิชาที่จะเทียบโอน</h1>


<table class="table table-hover">		
		<thead>	
		<tr>

			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>


			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>

			<th>Delete</th>

		</tr>
		</thead>
	<tbody>

		

		@foreach ($usermapping as $mapping)

			<tr>	
				<td>{{ $mapping->course_mapping->intercourse->code }}</td>
				<td>{{ $mapping->course_mapping->intercourse->intercoursedetail[0]->title }}</td>
				<td>{{ $mapping->course_mapping->intercourse->intercoursedetail[0]->credit }}</td>
	
				<td>{{ $mapping->course_mapping->localcourse->code }}</td>
				<td>{{ $mapping->course_mapping->localcourse->title }}</td>
				<td>{{ $mapping->course_mapping->localcourse->credit }}</td>

				<td>
				{{ Form::open('transferlist/delete', 'DELETE',array('style'=>'display: inline;')) }}
				{{ Form::hidden('id', $mapping->id) }}
				{{ Form::submit('Delete', array('class'=>'btn btn-info')) }}
				{{ Form::close() }}
				</td>
				
			</tr>

			
		
		@endforeach
	</tbody>
	</table>

	{{ HTML::link_to_route('gen_transfer_doc', 'Print',null, array('class' => 'btn btn-info')) }}


	
@endsection