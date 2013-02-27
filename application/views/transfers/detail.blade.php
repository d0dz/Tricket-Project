@layout('layouts.master')

@section('content')
<p></br>
	
			ชื่อวิชา :: {{ $intercourse->title}}</br>
			รหัสวิชา :: {{ $intercourse->code }}</br>
			หน่วยกิต :: {{ $intercourse->credit }}</br>
			คำอธิบายรายวิชา :: {{ $intercourse->description }}</br>
			มหาวิทยาลัย :: {{ $intercourse->universitie->name }}</br>
			
			</p>
		
		{{ HTML::link('transfers_search', 'back', array('class' => 'btn btn-info')) }}
		</br>
<h1>รายวิชาที่สามารถเทียบโอนได้</h1>
</br>
<table class="table table-hover">

		<caption>
			
			
		</caption>
		
		<thead>
		<tr>
			<th>Code</th>
			<th>Title</th>
			<th>Credit</th>
			<th>Description</th>
			<th>Add</th>
		
		</tr>
		</thead>
	<tbody>
		@foreach ($intercourse->coursemapping as $course_mapping)


	
		<tr>
			<td>{{ $course_mapping->localcourse->code }}</td>
			<td>{{ $course_mapping->localcourse->title }}</td>
			<td>{{ $course_mapping->localcourse->credit }}</td>
			<td>{{ $course_mapping->localcourse->description }}</td>
			<td>{{ HTML::link_to_route('add_transferlist', 'Add', array($course_mapping->id), array('class' => 'btn btn-info')) }} 
			
		</tr>
		@endforeach
	</tbody>
	</table>
@endsection