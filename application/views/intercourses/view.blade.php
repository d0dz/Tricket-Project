@layout('layouts.master')

@section('content')
			<p></br>
			ชื่อวิชา :: {{ $intercourse->title}}</br>
			รหัสวิชา :: {{ $intercourse->code }}</br>
			หน่วยกิต :: {{ $intercourse->credit }}</br>
			คำอธิบายรายวิชา :: {{ $intercourse->description }}
			มหาวิทยาลัย :: {{ $intercourse->name }}</br></br>
			<small>อัพเดทวันที่ {{ $intercourse->updated_at}}</small>
			</p>

@endsection