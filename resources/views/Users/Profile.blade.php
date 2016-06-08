@extends('layouts.master1')

@section('title','Main Page')

@section('Contents')
<center>
	<legend> Profile Information </legend>
</center>
	<div class="row">
		<div class="col-md-12">
			<h3>
				<center>
				@if($User->User_type == 0)
					Volunteer 
				@else 
					Member
				@endif
				 {{ $User->name }}</center>			
			</h3>
			<center>
			<em>
				@if($User->User_type == 0)
					Average Rating
					{{ $Rating }}
				@endif
			</em>
			</center>
			<dl class="dl-horizontal">
				<dt>
					First Name
				</dt>
				<dd>
					{{ $User->First_name }}
				</dd>
				<dt>
					Last Name
				</dt>
				<dd>
					{{ $User->Last_name }}
				</dd>
				<dt>
					Id
				</dt>
				<dd>
					{{ $User->id }}
				</dd>
				<dt>
					Email
				</dt>
				<dd>
					{{ $User->email }}
				</dd>
				<dt>
					Date of Birth
				</dt>
				<dd>
					{{ $User->Date_of_birth }}
				</dd>
				<dt>
					Phone Number
				</dt>
				<dd>
					{{ $User->Phone_number }}
				</dd>
				@if($User->User_type == 0)
				<center>
				<ul>
					<h4> History of Participation </h4>
					@foreach($Par as $par)
					@foreach($Events as $event)
						@if($event->Event_id == $par->Event_id)
						
						<li>
						@foreach($Event_type as $event_type)
							@if($event->Event_type_id == $event_type->Event_type_id)
								{{  $event_type->Event_name }}
								{{  $event->Event_name }}
							@endif
						@endforeach
						</li>
					
						@endif
					@endforeach
					@endforeach
				</ul>
				</center>
				@endif
			</dl>
		</div>
	</div>
</div>
@stop