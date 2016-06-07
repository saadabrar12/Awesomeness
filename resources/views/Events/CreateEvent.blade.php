@extends('layouts.master1')

@section('title','Create New Event')

@section('Contents')


@if($info == 'EventExists')
    <center>
    <div class="alert alert-warning">
     <strong>Warning!</strong> Event Already Exists!!! 
    </div>
    </center>
@endif


<center>
	<form class="form-horizontal" action="{{ url('/').'/Events' }}" method="POST">
<fieldset>
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- Form Name -->
<legend>Create New Event</legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Event Type">Event Type</label>
  <div class="col-md-4">
    <select id="Event_Type" name="Event_Type" class="form-control">
    @foreach($Event_type as $event_type)
      <option value="{{ $event_type->Event_name }}">{{ $event_type->Event_name }}</option>
    @endforeach
    </select>
  
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Event Version">Event Version</label>  
  <div class="col-md-4">
  <input id="Event_Version" name="Event_Version" type="text" placeholder="Enter the event version" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Donation">Donation</label>  
  <div class="col-md-4">
  <input id="Donation" name="Donation" type="text" placeholder="Enter current donation status" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Event Starting Date">Event Starting Date</label>  
  <div class="col-md-4">
  <input id="Event_Starting_Date" name="Event_Starting_Date" type="date" placeholder="Enter inaugural date" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Venue">Venue</label>  
  <div class="col-md-4">
  <input id="Venue" name="Venue" type="text" placeholder="Enter event venue" class="form-control input-md" required="">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">            
  <button id="Submit" name="Submit" class="btn btn-info" type="submit">Submit</button>
  </div>
</div>

</fieldset>
</form>
</center>

@stop