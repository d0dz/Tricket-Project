@layout('layouts.master')

@section('content')
	<h3>Add New University</h3>

	@if($errors->has())
		

		<div class="alert alert-error">
			<p>คุณกรอกข้อมูลไม่ครบ</p>
			{{ $errors->first('name', '<li>:message</li>') }}
		</div>
	@endif

	{{ Form::open('universities/create', 'POST') }}

	{{ Form::token() }}

	<p>
		{{ Form::label('name', 'ชื่อมหาวิทยาลัย') }}
		{{ Form::text('name', Input::old('name'))}}
	
	
	<p>{{ Form::submit('ตกลง', array('class' => 'btn btn-info')) }}</p>

	{{ Form::close() }}
@endsection