@layout('layouts.master')

@section('content')
			<p></br>
			ชื่อวิชา :: {{ $localcourse->title}}</br>
			รหัสวิชา :: {{ $localcourse->code }}</br>
			หน่วยกิต :: {{ $localcourse->credit }}</br>
			คำอธิบายรายวิชา :: {{ $localcourse->description }}</br></br>
			<small>อัพเดทวันที่ {{ $localcourse->updated_at}}</small>
			</p>
			{{ HTML::link('localcourses', 'back', array('class' => 'btn btn-info')) }}
@endsection