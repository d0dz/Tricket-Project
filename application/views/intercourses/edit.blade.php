@layout('layouts.master')

@section('content')

	<h1>Edit {{ $intercourse->title }}</h1>

	{{ render('common.intercourse_error') }}

	{{ Form::open('intercourse/update', 'PUT') }}

	{{ Form::token() }}

	<P>
		{{ Form::label('university_id', 'เลือกมหาวิทยาลัย') }}
		{{ Form::select('university_id', $universities, $intercourse->university_id) }}
	</p>

	<p>
		{{ Form::label('code', 'รหัสวิชา') }}
		{{ Form::text('code', $intercourse->code ) }}
	</p>

	<p>
		{{ Form::label('title', 'ชื่อวิชา') }}
		{{ Form::text('title', $intercourse->title) }}
	</p>

	<p>
		{{ Form::label('credit', 'หน่วยกิต') }}
		{{ Form::text('credit', $intercourse->credit) }}
	</p>

	<p>
		{{ Form::label('description', 'รายละเอียด') }}
		{{ Form::textarea('description', $intercourse->description) }}
	</p>

	{{ Form::hidden('id', $intercourse->id) }}
	
	<p>{{ Form::submit('Update Intercourse', array('class' => 'btn btn-info')) }}</p>

	{{ Form::close() }}



@endsection