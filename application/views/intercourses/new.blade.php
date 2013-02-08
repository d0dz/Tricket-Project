@layout('layouts.master')

@section('content')
	<h3>Add New Intercourses</h3>

	@if($errors->has())
		

		<div class="alert alert-error">
			<p>คุณกรอกข้อมูลไม่ครบ</p>
			{{ $errors->first('title', '<li>:message</li>') }}
			{{ $errors->first('code', '<li>:message</li>') }}
			{{ $errors->first('credit', '<li>:message</li>') }}
			{{ $errors->first('description', '<li>:message</li>') }}
		</div>
	@endif
	<div class="row">
	  <div class="span6">
	  	{{ Form::open('intercourses/create', 'POST', array('id'=>'new-intercourse')) }}

		{{ Form::token() }}

		<P>
			{{ Form::label('university_id', 'เลือกมหาวิทยาลัย') }}
			{{ Form::select('university_id', $universities) }}
			
		</p>

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
	  </div>

	  <div class="span6">
	  <div id="course-selection">

	  </div>
	  	<!-- Button to trigger modal -->
	<a href="#myModal" role="button" class="btn" data-toggle="modal">Manage Course</a>
	 
	<!-- Modal -->
	<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  <div class="modal-header">
	    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    <h3 id="myModalLabel">Modal header</h3>
	  </div>
	  <div class="modal-body">
	   	<div>
	   		{{ Form::input('text','','', array('id'=>'local-search-text')) }}
		   	{{ Form::submit('ค้นหา', array('class'=>'btn','id'=>'local-search-btn'))}}
	   	</div>
	   	<div id="local-search-results">

	   	</div>
	  </div>
	  <div class="modal-footer">
	    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
	  </div>
	</div>

	  </div>
	
		

	</div>

	



@endsection