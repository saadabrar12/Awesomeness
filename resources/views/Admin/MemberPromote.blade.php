@extends('layouts.master1')

@section('title','Member Promote')

@section('Contents')
@if($Editable == true && Auth::user()->Privilege_level == 1)
<center>
	<form class="form-horizontal" action="{{ url('/').'/Admin/'.$Member_id.'/PromotePost'}}" method="POST">
<fieldset>
<input type="hidden" name="_token" value="{{ csrf_token() }}">

<!-- Form Name -->
<legend>
  Promote/Demote {{ $Username }}
</legend>
<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="Members">Promote to</label>
  <div class="col-md-4">
  
    <select id="Rank" name="Rank" class="form-control">
    @foreach($Ranks as $rank)
      <option value="{{ $rank->Rank_id }}">{{ $rank->Rank_name }} </option>
    @endforeach
    </select>
   
  </div>
</div>
<!-- Select Basic -->



<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">            
  <button id="Submit" name="Submit" class="btn btn-info" type="submit">Submit</button>
  </div>
</div>

</fieldset>
</form>
</center>
@else
<center>
  <div class="alert alert-warning">
    <strong>Warning!</strong> You are not authorized to do that!
  </div>
  </center>
@endif
@stop