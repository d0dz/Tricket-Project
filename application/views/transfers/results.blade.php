@layout('layouts.master')

@section('content')
</br>

<div class="row">
	<div class="span12">
		<div class="row">
			<div class="span7">
				{{ Form::text('keyword', '', array('id'=>'search-keyword', 'class'=>'input-xxlarge','placeholder'=>'ใส่รหัสวิชาหรือชื่อวิชาที่จะเทียบโอน')) }}
			</div>
			<div class="span1">
				{{ Form::submit('Search',array('id'=>'search-button','class'=>'btn')) }}
			</div>
		</div>
		<div id="results">

		</div>
	</div>
</div>	

@endsection