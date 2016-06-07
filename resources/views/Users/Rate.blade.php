@extends('layouts.master1')

@section('title','Rate Volunteer')

@section('Contents')

@if(Auth::user()->User_type == 1)
	<center>
	<form class="form-horizontal" action="{{ url('/').'/Events/'.$Event_id.'/'.$Volunteer_id.'/RatePost' }} " method="POST">
<fieldset>
<input type="hidden" name="_token" value="{{ csrf_token() }}">


<!-- Form Name -->
<legend>Rate {{ $volunteer_name }} for {{ 	$Event_name }} {{ $Event_Version }} 
</legend>


<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Rate">Rate</label>  
  <div class="col-md-4">
  <input id="Rate" name="Rate" type="text" placeholder="Put any value from 1 to 10" class="form-control input-md" required="" value="">    
  </div>
</div>

<div class="form-group">
	<label class="col-md-4 control-label" for=""></label>				  
	<div class="col-md-4">
		<button id="" name="button" class="btn btn-info" type="submit">
			Submit
		</button>
	</div>
</div>

</fieldset>
</form>
</center>
@endif
@stop


