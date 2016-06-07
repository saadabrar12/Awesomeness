@extends('layouts.master1')

@section('title','Membership requests')

@section('Contents')

@if(Auth::user()->User_type == 1)
<center>
	<legend>Pending Requests</legend>
	<table cellpadding="5" cellspacing="0" border="1">
		<th> Requested User Id</th>
		<th> Name </th>
		<th> First Name</th>
		<th> Last name </th>
		<th> Date of Birth </th>
		<th> User Type </th>
		<th> Phone Number </th>
		<th> Email Address </th>
		<th> Campus Name </th>
		<th> Action </th>
		
		<tbody>
			@foreach($Req as $req)
			<tr>
				<td>{{ $req->Request_id }}</td>
				<td> {{ $req->Username }}</td>
				<td> {{  $req->First_name }}</td>
				<td>
					{{ $req->Last_name }}
				</td>
				<td>
					{{ $req->Date_of_birth }}
				</td>
				<td>
					@if($req->User_type == 1)
						Member
					@else
						Volunteer
					@endif
				</td>
				<td>
					{{ $req->Phone_number }}
				</td>
				<td>
					{{ $req->Email_address }}
				</td>
				<td>
					{{ $req->Campus_name }}
				</td>
				<td>
				<form action="{{ url('/').'/Admin/'.$req->Request_id.'/approve' }}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" name="submitLogin" class="btn btn-default" method="POST" >
						Approve
					</button>
				</form>
				<form action="{{ url('/').'/Admin/'.$req->Request_id.'/disapprove' }}"  method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" name="submitLogin" class="btn btn-default" method="POST">
    					Disapprove 
    				</button>
				</form>
				</td>
			</tr>
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