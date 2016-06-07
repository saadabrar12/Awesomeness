@extends('layouts.master1')

@section('title','Edit Event')

@section('Contents')
	<center>
	<form class="form-horizontal" action="{{url('/').'/Events/'.$Events->Event_id }}" method="POST">
<fieldset>
<input type="hidden" name="_token" value="{{ csrf_token() }}">
<input type="hidden" name="_method" value="PUT">

<!-- Form Name -->
<<<<<<< HEAD
<legend>Create New Event</legend>
=======
<legend>Edit New Event</legend>
>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Event Type">Event Type</label>
  <div class="col-md-4">

<<<<<<< HEAD
  @foreach($Event_type as $event_type)
    <select id="Event_Type" name="Event_Type" class="form-control">
    @if($Events->Event_type_id == $event_type->Event_type_id)
      <option value="{{ $event_type->Event_name }}">{{ $event_type->Event_name }}</option>
    </select>
    @endif
  @endforeach
=======
  
    <select id="Event_Type" name="Event_Type" class="form-control">
  @foreach($Event_type as $event_type)
    @if($Events->Event_type_id == $event_type->Event_type_id)
      <option value="{{ $event_type->Event_name }}">{{ $event_type->Event_name }}</option>
    @endif
    @endforeach
    </select>
    
  
>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Event Version">Event Version</label>  
  <div class="col-md-4">
  <input id="Event_Version" name="Event_Version" type="text" placeholder="Enter the event version" class="form-control input-md" required="" value="{{ $Events->Event_name }}">
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Donation">Donation</label>  
  <div class="col-md-4">
  <input id="Donation" name="Donation" type="text" placeholder="Enter current donation status" class="form-control input-md" required="" value="{{ $Events->Donations }}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Event Starting Date">Event Starting Date</label>  
  <div class="col-md-4">
  <input id="Event_Starting_Date" name="Event_Starting_Date" type="date" placeholder="Enter inaugural date" class="form-control input-md" required="" value="{{ $Events->Event_date }}">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="Venue">Venue</label>  
  <div class="col-md-4">
  <input id="Venue" name="Venue" type="text" placeholder="Enter event venue" class="form-control input-md" required="" value="{{ $Events->Venue }}">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for="Ongoing">Ongoing</label>  
  <div class="col-md-4">
  <input id="Ongoing" name="Ongoing" type="text" placeholder="Enter event venue" class="form-control input-md" required="" value="{{ $Events->Ongoing }}">
    
  </div>
</div>

<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">            
  <input type="submit" name="update">
  </div>
</div>

</fieldset>
</form>
</center>

@stop
