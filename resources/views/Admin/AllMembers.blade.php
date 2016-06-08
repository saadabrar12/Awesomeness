@extends('layouts.master1')

@section('title','All Members')

@section('Contents')
	
@if(Auth::user()->Privilege_level == 1)
<center>
	<legend>Member List</legend>
	<table cellpadding="5" cellspacing="0" border="1">
		<th> Member Id</th>
		<th> Name </th>
		<th> First Name</th>
		<th> Last name </th>
		<th> Date of Birth </th>
		<th> Phone Number </th>
		<th> Email Address </th>
		<th> Action </th>
		
		<tbody>
			@foreach($Members as $Member)
			@foreach($users as $user)
			@if($user->id == $Member->Member_id)
			<tr>
				<td>{{ $user->id }}</td>
				<td> {{ $user->name }}</td>
				<td> {{  $user->First_name }}</td>
				<td>
					{{ $user->Last_name }}
				</td>
				<td>
					{{ $user->Date_of_birth }}
				</td>
				<td>
					{{ $user->Phone_number }}
				</td>
				<td>
					{{ $user->email }}
				</td>
				<td>
				<form action="{{ url('/').'/Admin/'.$user->id.'/MemberPromote' }}" method="GET">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" name="submitLogin" class="btn btn-default" method="GET" >
						Promote
					</button>
				</form>
				</td>
			</tr>
			@endif
			@endforeach
			@endforeach
		</tbody>
@else
	<center>
	<div class="alert alert-warning">
 		<strong>Warning!</strong>	You do not have permission to view this page 
	</div>
	</center>

@endif
	</table>
</center>
@stop