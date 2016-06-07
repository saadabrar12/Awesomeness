@extends('layouts.master1')

@section('title','Ongoing Events')

@section('Contents')
	<center>
	<legend>Events List</legend>
	<table class="table-hover" cellpadding="5" cellspacing="0" border="1">
		<th> Event Id</th>
		<th> Event Name </th>
		<th> Event Version </th>
		<th>  Donations </th>
		<th>  Venue </th>
		<th> Action </th>
		
		<tbody>
			@foreach($Ongoing_events as $Event)
			<tr>

				<td>
					<center>
						{{ $Event->Event_id }}
					</center>
				</td>
				<td>
					<center> 
					@foreach($Event_types as $Event_type)
						@if($Event->Event_type_id == $Event_type->Event_type_id)
							{{ $Event_type->Event_name }}
						@endif
					@endforeach
					</center>
				</td>
				<td> 
					<center>
						{{ $Event->Event_name }}
					</center>
				</td>
				<td>
					<center>
						{{ $Event->Donations }}
					</center>
				</td>
				<td>
					<center>
						{{ $Event->Venue}}
					</center>
				</td>
				
				<td>
				<form action="{{ url('/').'/Volunteers/'.$Event->Event_id.'/'.Auth::user()->id.'/register'}}" method="POST">
					<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<button type="submit" name="submitLogin" class="btn btn-default" >
						Register
					</button>
				</form>
				
				</td>
			</tr>
			@endforeach
		</tbody>

	</table>
</center>

@stop