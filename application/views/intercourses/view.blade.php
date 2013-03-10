@layout('layouts.master')

@section('content')

			<p></br>
			ชื่อวิชา :: {{ ($intercourse->intercoursedetail[0]->title)}}</br>
			รหัสวิชา :: {{ ($intercourse->code) }}</br>
			หน่วยกิต :: {{ ($intercourse->intercoursedetail[0]->credit) }}</br>
			คำอธิบายรายวิชา :: {{ ($intercourse->intercoursedetail[0]->description) }}</br>
			มหาวิทยาลัย :: {{ ($intercourse->universitie->name) }}</br>
			</p>


			{{ HTML::link('intercourses', 'back', array('class' => 'btn btn-info')) }}

			{{ HTML::link_to_route('edit_intercourses', 'Edit', array($intercourse->id), array('class' => 'btn btn-info')) }}

			{{ Form::open('intercourse/delete', 'DELETE',array('style'=>'display: inline;')) }}
			{{ Form::hidden('id', $intercourse->id) }}
			{{ Form::submit('Delete', array('class'=>'btn btn-info')) }}
			{{ Form::close() }}


@endsection