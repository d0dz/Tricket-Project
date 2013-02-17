<!DOCTYPE html>
<html>
<head>

	{{ HTML::style('/css/bootstrap.min.css') }}
	
	{{ HTML::script('/js/jquery.min.js') }}
	{{ HTML::script('/js/bootstrap.min.js') }}
	{{ HTML::script('/js/application.js') }}

</head>
<html>
	<div class="container">

			<table class="table table-hover">		
				<thead>	
					<tr>

						<th>Code</th>
						<th>Title</th>
						<th>Credit</th>


						<th>Code</th>
						<th>Title</th>
						<th>Credit</th>



					</tr>
				</thead>
				<tbody>



				@foreach (Auth::user()->user_mapping as $user_mapping)
					<tr>
						<td>{{ $user_mapping->course_mapping->localcourse->code }}</td>
						<td>{{ $user_mapping->course_mapping->localcourse->title }}</td>
						<td>{{ $user_mapping->course_mapping->localcourse->credit }}</td>
			
						<td>{{ $user_mapping->course_mapping->intercourse->code }}</td>
						<td>{{ $user_mapping->course_mapping->intercourse->title }}</td>
						<td>{{ $user_mapping->course_mapping->intercourse->credit }}</td>
					</tr>
				@endforeach
				</tbody>
			</table>
	</div>
</html>
