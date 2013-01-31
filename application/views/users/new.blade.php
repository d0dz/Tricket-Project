@layout('layouts.master')

@section('content')
	<h1>Register</h1>

	@if($errors->has())
		<div class="alert alert-error">
			<h3>สมัครสมาชิกไม่ผ่าน</h3>
			{{ $errors->first('username', '<li>:message</li>')}}
			{{ $errors->first('password', '<li>:message</li>')}}
			{{ $errors->first('password_confirmation', '<li>:message</li>')}}
		</div>
	@endif

			{{ Form::open('register', 'POST') }}

		{{ Form::token() }}

		<form class="form-horizontal">
		<div class="control-group">
				{{ Form::label('username', 'Username') }}
			<div class="controls">
				{{ Form::text('username', Input::old('username')) }}
			</div>
		</div>
		
		<div class="control-group">
				{{ Form::label('password', 'Password') }}
			<div class="controls">
				{{ Form::password('password') }}
			</div>
		</div>
		
		<div class="control-group">
				{{ Form::label('password_confirmation', 'Confirm Password') }}
			<div class="controls">
				{{ Form::password('password_confirmation') }}
			</div>
		</div>
		
		<div class="controls">
			{{ Form::submit('ยืนยัน', array('class' => 'btn btn-info')) }}
		</div>

		{{ Form::close() }}
		</from>
@endsection