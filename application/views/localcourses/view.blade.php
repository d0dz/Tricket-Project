@layout('layouts.master')

@section('content')
			<p></br>
			ชื่อวิชา :: {{ $localcourse->title}}</br>
			รหัสวิชา :: {{ $localcourse->code }}</br>
			หน่วยกิต :: {{ $localcourse->credit }}</br>
			คำอธิบายรายวิชา :: {{ $localcourse->description }}</br></br>
			
			</p>
			{{ HTML::link('localcourses', 'back', array('class' => 'btn btn-info')) }}

			{{ HTML::link_to_route('edit_localcourses', 'Edit', array($localcourse->id), array('class' => 'btn btn-info')) }}
			
			{{ Form::open('localcourse/delete', 'DELETE',array('style'=>'display: inline;')) }}
			{{ Form::hidden('id', $localcourse->id) }}
			{{ Form::submit('Delete', array('class'=>'btn btn-info')) }}
			{{ Form::close() }}
@endsection