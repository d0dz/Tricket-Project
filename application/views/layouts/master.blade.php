<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
	{{ HTML::style('/css/bootstrap.min.css') }}
	
	{{ HTML::script('/js/jquery.min.js') }}
	{{ HTML::script('/js/bootstrap.min.js') }}
	{{ HTML::script('/js/application.js') }}

</head>
<body>
	<div class="wrap">

		<div class="navbar navbar-static-top">
			<div class="navbar-inner">
				<div class="container">
				<ul class="nav">
					<li class="active">{{ HTML::link_to_route('home', 'Home') }}</li>
					@if (!Auth::check())
					<li>{{ HTML::link_to_route('register', 'Register') }}</li>
					<li>{{ HTML::link_to_route('login', 'Login') }}</li>
					@else
						@if (Auth::user()->role_id == 2)
							<li>{{ HTML::link_to_route('localcourses', 'Localcourses') }}</li>
							<li>{{ HTML::link_to_route('intercourses', 'Intercourses') }}</li>
							<li>{{ HTML::link_to_route('universities', 'University') }}</li>
							{{ Form::open('search', 'POST', array('class'=>'navbar-form pull-right')) }}
							{{ Form::token() }}
							{{ Form::text('keyword', '', array('id'=>'keyword')) }}
							{{ Form::submit('Search') }}
							{{ Form::close() }}
						@endif
						<li>{{ HTML::link_to_route('logout', 'Logout ('.Auth::user()->username.')') }}</li>
					@endif
				</ul>



				</div>
			</div>
		</div>

		<div class="container">
			<div class="content">

				@if(Session::has('message'))
					<div class="alert alert-error">{{ Session::get('message') }}
					</div>
				@endif
				@yield('content')
			</div>
		</div>
	</div><!-- end wrap-->
</body>
</html>