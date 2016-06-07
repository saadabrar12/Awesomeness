@extends('layouts.master1')

@section('title','Allocate')

@section('Contents')
<center>
	<form class="form-horizontal" action="{{url('/Events').'/'.$Event.'/'.$Volunteer.'/postAllocation' }}" method="POST">
<fieldset>
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- Form Name -->
<legend>
Volunteer Name: 
@foreach($participant as $par)
	@foreach($Users as $user)
		@if($user->id == $par->Volunteer_id)
			{{  $user->name  }}
		@endif
	@endforeach
@endforeach
</legend>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Members">Members</label>
  <div class="col-md-4">
  
    <select id="Members" name="Members" class="form-control">
    @foreach($Members as $member)
    @if($member->name)
      <option value="{{ $member->id }}">{{ $member->name }} </option>
     @endif
  @endforeach
    </select>
   
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Department">Department</label>
  <div class="col-md-4">
  
    <select id="Department" name="Department" class="form-control">
    @foreach($Department as $dep)
      <option value="{{ $dep->Department_name }}">{{ $dep->Department_name }}</option>
    @endforeach
    </select>
  
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