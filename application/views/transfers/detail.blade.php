@layout('layouts.master')

@section('content')
<p></br>
			ชื่อวิชา :: {{ $intercourse->title}}</br>
			รหัสวิชา :: {{ $intercourse->code }}</br>
			หน่วยกิต :: {{ $intercourse->credit }}</br>
			คำอธิบายรายวิชา :: {{ $intercourse->description }}</br>
			มหาวิทยาลัย :: {{ $intercourse->universitie->name }}</br>
			<small>อัพเดทวันที่ {{ $intercourse->updated_at}}</small>
			</p>
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
		
		</tr>
		</thead>
	<tbody>
		@foreach ($intercourse->transferable_courses as $localcourse)
				<tr>
			<td>{{ $localcourse->code }}</td>
			<td>{{ $localcourse->title }}</td>
			<td>{{ $localcourse->credit }}</td>
			<td>{{ $localcourse->description }}</td>
			
			
		</tr>
			@endforeach
	</tbody>
	</table>

			



@endsection