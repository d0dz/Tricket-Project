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

		
		<div class="control-group">
				{{ Form::label('username', 'รหัสนักศึกษา') }}
			<div class="controls">
				{{ Form::text('username', Input::old('username')) }}
			</div>
		</div>
		
		<div class="control-group">
				{{ Form::label('password', 'พาสเวิร์ด') }}
			<div class="controls">
				{{ Form::password('password') }}
			</div>
		</div>
		
		<div class="control-group">
				{{ Form::label('password_confirmation', 'ยืนยันพาสเวิร์ด') }}
			<div class="controls">
				{{ Form::password('password_confirmation') }}
			</div>
		</div>


		<div class="control-group">
				{{ Form::label('name', 'ชื่อ - สกุล') }}
			<div class="controls">
				{{ Form::text('name', Input::old('name')) }}
			</div>
		</div>

		<div class="control-group">
				{{ Form::label('course', 'หลักสูตร') }}
			<div class="controls">
				{{ Form::text('course', Input::old('course')) }}
			</div>
		</div>

		<div class="control-group">
				{{ Form::label('faculty', 'คณะ') }}
			<div class="controls">
				{{ Form::text('faculty', Input::old('faculty')) }}
			</div>
		</div>

		<div class="control-group">
				{{ Form::label('major', 'สาขาวิชา') }}
			<div class="controls">
				{{ Form::text('major', Input::old('major')) }}
			</div>
		</div>

		<div class="control-group">
				{{ Form::label('year', 'ปีการศึกษา') }}
			<div class="controls">
				{{ Form::text('year', Input::old('year')) }}
			</div>
		</div>

		<div class="control-group">
				{{ Form::label('oldcourse', 'หลักสูตรจากสถาบันเดิม') }}
			<div class="controls">
				{{ Form::text('oldcourse', Input::old('oldcourse')) }}
			</div>
		</div>
		<P>
			{{ Form::label('university_id', 'มาจากสถาบันเดิม') }}
			{{ Form::select('university_id', $universities) }}
			
		</p>

		<div class="control-group">
				{{ Form::label('oldmajor', 'สขาวิชาจากสถาบันเดิม') }}
			<div class="controls">
				{{ Form::text('oldmajor', Input::old('oldmajor')) }}
			</div>
		</div>

		

				
		<div class="controls">
			{{ Form::submit('ยืนยัน', array('class' => 'btn btn-info')) }}
		</div>


		{{ Form::close() }}
		@endsection