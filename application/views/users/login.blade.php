@layout('layouts.master')

@section('content')
	<h1>Login</h1>

	{{ Form::open('login', 'POST') }}

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
	
		<div class="controls">
			{{ Form::submit('login', array('class' => 'btn btn-info')) }}
		</div>
		{{ Form::close() }}
	</from>
@endsection