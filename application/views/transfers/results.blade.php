@layout('layouts.master')

@section('content')


	{{ Form::text('keyword', '', array('id'=>'search-keyword')) }}
	{{ Form::submit('Search',array('id'=>'search-button')) }}


	<div id="results">

	</div>

@endsection