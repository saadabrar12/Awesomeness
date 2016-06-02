@extends('layouts.master1')

@section('title','Volunteering requests')

@section('Contents')

@if(Auth::user()->User_type == 1)
<center>

<legend>
@foreach($Event_types as $Event_type)
	@if($Events->Event_type_id == $Event_type->Event_type_id)
		{{ $Event_type->Event_name }}
	@endif
@endforeach
</legend>

	
	<table cellpadding="5" cellspacing="0" border="1">
		<th> Volunteer Id</th>
		<th> Name </th>
		<th> First Name</th>
		<th> Last name </th>
		<th> Date_of_birth </th>
		<th>  Phone Number</th>
		<th> Email Address </th>
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

				
					<td>
					<form action="{{ url('/').'/Events/'.$Events->Event_id.'/'.$req->Volunteer_id.'/Allocation' }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" name="submitLogin" class="btn btn-default" method="GET" >
							Allocate Departments and Supervisor
						</button>
					</form>
					<form action=""  method="POST">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" name="submitLogin" class="btn btn-default" method="POST">
	    					Sack 
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