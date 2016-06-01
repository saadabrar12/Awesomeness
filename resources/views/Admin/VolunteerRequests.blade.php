@extends('layouts.master1')

@section('title','Volunteering requests')

@section('Contents')

@if(Auth::user()->User_type == 1)
<center>
	<legend>Pending Membership Requests</legend>
	<table cellpadding="5" cellspacing="0" border="1">
		<th> Requested Volunteer Id</th>
		<th> Name </th>
		<th> First Name</th>
		<th>  Last name </th>
		<th>  Date_of_birth </th>
		<th>  Phone Number</th>
		<th> Email Address </th>
		<th> Event Id </th>
		<th> Event Name </th>
		<th> Version </th>
		<th> Action </th>
		
		<tbody>
			@foreach($Req as $req)
			<tr>
				@foreach($Users as $User)
				@if($User->id == $req->Volunteer_id)
					<td>{{ $User->id }}</td>
					<td> {{ $User->Username }}</td>
					<td> {{  $User->First_name }}</td>
					<td>
						{{ $User->Last_name }}
					</td>
					<td>
						{{ $User->Date_of_birth }}
					</td>
					<td>
						{{ $User->Phone_number }}
					</td>
					<td>
						{{ $User->email }}
					</td>
				@endif
				@endforeach

				@foreach($Events as $Event)
				@if($Event->Event_id == $req->Event_id)
					<td>
						{{ $Event->Event_id }}
					</td>
					<td>
						@foreach($Event_types as $Event_type)
						@if($Event->Event_type_id == $Event_type->Event_type_id)
							{{ $Event_type->Event_name }}
						@endif
						@endforeach
					</td>
					<td>
						{{ $Event->Event_name }}
					</td>
				@endif
				@endforeach
					<td>
					<form action="{{ url('/').'/Admin/'.$req->Volunteer_id.'/approveVolunteer' }}" method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" name="submitLogin" class="btn btn-default" method="POST" >
							Approve
						</button>
					</form>
					<form action=""  method="POST">
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