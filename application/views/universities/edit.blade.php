@layout('layouts.master')

@section('content')
	<h1>Edit {{ $universitie->name }}</h1>

	{{ render('common.universitie_error') }}

	{{ Form::open('universitie/update', 'PUT') }}

	{{ Form::token() }}

	<p>
		{{ Form::label('name', 'ชื่อมหาวิทยาลัย') }}
		{{ Form::text('name', $universitie->name) }}
	</p>

	{{ Form::hidden('id', $universitie->id) }}

	<p>
		{{ Form::submit('Update University', array('class'=> 'btn btn-info')) }}
	</p>

	{{ Form::close() }}
@endsection