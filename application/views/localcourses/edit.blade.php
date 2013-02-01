@layout('layouts.master')

@section('content')
	<h1>Edit {{ $localcourse->title }}</h1>

	{{ render('common.localcourse_error') }}

	{{ Form::open('localcourse/update', 'PUT') }}

	{{ Form::token() }}

	<p>
		{{ Form::label('code', 'รหัสวิชา') }}
		{{ Form::text('code', $localcourse->code ) }}
	</p>

	<p>
		{{ Form::label('title', 'ชื่อวิชา') }}
		{{ Form::text('title', $localcourse->title) }}
	</p>

	<p>
		{{ Form::label('credit', 'หน่วยกิต') }}
		{{ Form::text('credit', $localcourse->credit) }}
	</p>

	<p>
		{{ Form::label('description', 'รายละเอียด') }}
		{{ Form::textarea('description', $localcourse->description) }}
	</p>

	{{ Form::hidden('id', $localcourse->id) }}
	
	<p>{{ Form::submit('Update Localcourse', array('class' => 'btn btn-info')) }}</p>

	{{ Form::close() }}
@endsection