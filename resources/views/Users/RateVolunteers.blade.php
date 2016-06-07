@extends('layouts.master1')

@section('title','Volunteering requests')

@section('Contents')

@if(Auth::user()->User_type == 1)
<center>

<legend>
	Volunteers working under 
	{{ Auth::user()->name }}
</legend>

	
	<table cellpadding="5" cellspacing="0" border="1">
		<th> Volunteer Id</th>
		<th> Name </th>
		<th> First Name</th>
		<th> Last name </th>
		<th> Date_of_birth </th>
		<th>  Phone Number</th>
		<th> Email Address </th>
		<th> Event Name</th>
		<th> Event Version </th>
		<th> Action </th>
		
		<tbody>
			@foreach($Participants as $par)
			<tr>
				@foreach($Users as $User)
				@if($User->id == $par->Volunteer_id)
					<td>{{ $User->id }}</td>
					<td> {{ $User->name }}</td>
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

				@foreach($Events as $event)
					@if($event->Event_id == $par->Event_id)
					<td>
						@foreach($Event_type as $event_type)
							@if($event->Event_type_id == $event_type->Event_type_id)
								{{  $event_type->Event_name }}

							@endif
						@endforeach
					</td>
					<td>
						{{ $event->Event_name }}
					</td>
					@endif
				@endforeach

					<td>
					<form action="{{url('/').'/Events/'.$par->Event_id.'/'.$par->Volunteer_id.'/Rate'  }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<button type="submit" name="submitLogin" class="btn btn-default" method="GET" >
							Rate		
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