@layout('layouts.master')

@section('content')
	<h3>Add New Localcourses</h3>

	@if($errors->has())
		

		<div class="alert alert-error">
			<p>คุณกรอกข้อมูลไม่ครบ</p>
			{{ $errors->first('title', '<li>:message</li>') }}
			{{ $errors->first('code', '<li>:message</li>') }}
			{{ $errors->first('credit', '<li>:message</li>') }}
			{{ $errors->first('description', '<li>:message</li>') }}
		</div>
	@endif

	{{ Form::open('localcourses/create', 'POST') }}

	{{ Form::token() }}

	<p>
		{{ Form::label('code', 'รหัสวิชา') }}
		{{ Form::text('code', Input::old('code'))}}
	</p>

	<p>
		{{ Form::label('title', 'ชื่อวิชา') }}
		{{ Form::text('title', Input::old('title'))}}
	</p>

	<p>
		{{ Form::label('credit', 'หน่วยกิต') }}
		{{ Form::text('credit', Input::old('credit'))}}
	</p>

	<p>
		{{ Form::label('description', 'รายละเอียด') }}
		{{ Form::textarea('description', Input::old('description'))}}
	</p>
	
	<p>{{ Form::submit('ตกลง', array('class' => 'btn btn-info')) }}</p>

	{{ Form::close() }}
@endsection