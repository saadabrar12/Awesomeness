@extends('layouts.master1')

@section('title','Allocate')

@section('Contents')
<center>
	<form class="form-horizontal" action="" method="POST">
<fieldset>
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- Form Name -->
<legend>Allocate Volunteer  </legend>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Members">Members</label>
  <div class="col-md-4">
  @foreach($Members as $member)
    <select id="Members" name="Members" class="form-control">
    @if($member->name)
      <option value="{{ $member->name }}">{{ $member->name }}</option>
    </select>
    @endif
  @endforeach
  </div>
</div>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Department">Department</label>
  <div class="col-md-4">
  @foreach($Department as $dep)
    <select id="Department" name="Department" class="form-control">
      <option value="{{ $dep->Department_name }}">{{ $dep->Department_name }}</option>
    </select>
  @endforeach
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