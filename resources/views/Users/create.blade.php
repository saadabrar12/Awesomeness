@extends('layouts.master1')
<script type="text/javascript">
function openModal() {
    $('#myModal').modal('show');
}
</script>
@section('title','Sign Up')

@section('Contents')
	@if($info == 'Failed')
		<center>
		<div class="alert alert-warning">
 		 <strong>Warning!</strong> User name Already Exists. Try signing up with a new one.
		</div>
		</center>
	@endif
		<div class="col-md-1">
		</div>
		<div class="col-md-10">
			<form class="form-horizontal" action="{{ url('/').'/Users' }}" method="POST">
				<input type="hidden" name="_token" value="{{ csrf_token() }}">
					<fieldset>

					<!-- Form Name -->
					<center><legend>Sign Up Form</legend></center>

					<!-- Multiple Radios (inline) -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="radios">Be a part of the revolution. Join as: </label>
					  <div class="col-md-4"> 
					    <label class="radio-inline" for="radios-0">
					      <input type="radio" name="radios" id="radios-0" value="1" checked="checked">
					      Member
					    </label> 
					    <label class="radio-inline" for="radios-1">
					      <input type="radio" name="radios" id="radios-1" value="2">
					      Volunteer
					    </label>
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="Username">Username</label>  
					  <div class="col-md-4">
					  <input id="Username" name="Username" type="text" placeholder="Enter your preferred username" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<!-- Password input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="password">Password</label>
					  <div class="col-md-4">
					    <input id="password" name="password" type="password" placeholder="Enter your password" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="First_name">First Name</label>  
					  <div class="col-md-4">
					  <input id="First_name" name="First_name" type="text" placeholder="Enter your first name" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="Last_name">Last Name</label>  
					  <div class="col-md-4">
					  <input id="Last_name" name="Last_name" type="text" placeholder="Enter your last name" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="Date_of_birth">Date of Birth</label>  
					  <div class="col-md-4">
					  <input id="Date_of_birth" name="Date_of_birth" type="date" placeholder="dd/mm/yyyy" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="Phone_number">Phone Number</label>  
					  <div class="col-md-4">
					  <input id="Phone_number" name="Phone_number" type="text" placeholder="Enter your phone number" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="Email_Adress">Email Address</label>  
					  <div class="col-md-4">
					  <input id="Email_Adress" name="Email_address" type="text" placeholder="Enter your Email Address" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<!-- Text input-->
					<div class="form-group">
					  <label class="col-md-4 control-label" for="">Campus/Institution Name</label>  
					  <div class="col-md-4">
					  <input id="Campus_name" name="Campus_name" type="text" placeholder="Enter your campus name" class="form-control input-md" required="">
					    
					  </div>
					</div>

					<!-- Button -->
					<div class="form-group">
					  <label class="col-md-4 control-label" for=""></label>
					  <div class="col-md-4">
					    <button id="" name="button" class="btn btn-info" type="submit">Sign Up</button>
					  </div>
					</div>

					</fieldset>
					</form>

		</div>
		<div class="col-md-1">
		</div>
		<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Invalid Username</h4>
      </div>
      <div class="modal-body">
        <p>Username must be unique</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
		
@stop
