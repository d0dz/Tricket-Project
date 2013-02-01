<!DOCTYPE html>
<html>
<head>
	<title>{{ $title }}</title>
	{{ HTML::style('/css/bootstrap.min.css') }}
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
						@endif
						<li>{{ HTML::link_to_route('logout', 'Logout ('.Auth::user()->username.')') }}</li>
					@endif
				</ul>

				<form class="navbar-form pull-left">
					<input type="text" class="span2">
					<button type="submit" class="btn">Search</button>
				</form>
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