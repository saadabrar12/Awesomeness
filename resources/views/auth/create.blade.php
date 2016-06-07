@extends('layouts.master1')

@section('title','Sign Up')

@section('Login_display')
	<form role="form" class="form-inline" action="Main.php" method="POST">
		<div class="form-group">
							 
			<label for="Member_id">
					User Name					
			</label>		
			<input type="username" name="username" class="form-control" id="exampleInputEmail1">
		</div>
		<div class="form-group">				
			<label for="InputPassword">
					Password
			</label>				
			<input type="password" name="password" class="form-control" id="exampleInputPassword1">
		</div>
		<button type="submit" name="submitLogin" class="btn btn-default">
					Submit
		</button>
						
		<br> 
			<div class="checkbox">
							 
				<label>
					<input type="checkbox"> Keep me signed in
				</label>
			</div> 
		<br> <center>
		Want to join?<a href="SignUp.html"> Sign up </a> here.
		</center>
	</form>
@stop

@section('Navigation_tabs')
	@if(session()->has('info'))
	{{ session('info'). 'session dumped' }}
	<div id="myModal" class="modal fade" role="dialog">
  		<div class="modal-dialog">

    	<!-- Modal content-->
    	<div class="modal-content">
    	  	<div class="modal-header">
        		<button type="button" class="close" data-dismiss="modal">&times;</button>
        	<h4 class="modal-title">Modal Header</h4>
      	  	</div>
      		<div class="modal-body">
        		<p>Some text in the modal.</p>
      		</div>
      		<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      		</div>
    	</div>

  		</div>
	</div>
	<script type="text/javascript">
	$(document).ready(function () {
    	$('#myModal').modal('show');
	});
</script>
	@endif
				<li class="active">
					<a href="Main.php">Home</a>
				</li>
				<li class="active">
					<a href="#">Register Here!</a>
				</li>
				<li class="active">
					<a href="#">News</a>
				</li>
				<li class="active">
					<a href="#">About us </a>
				</li>
				<li class="active">
					<a href="#">Donate </a>
				</li>
				<li class="dropdown pull-right">
					 <a href="#" data-toggle="dropdown" class="dropdown-toggle">Dropdown<strong class="caret"></strong></a>
					<ul class="dropdown-menu">
						<li>
							<a href="#">Action</a>
						</li>
						<li>
							<a href="#">Another action</a>
						</li>
						<li>
							<a href="#">Something else here</a>
						</li>
						<li class="divider">
						</li>
						<li>
							<a href="#">Separated link</a>
						</li>
					</ul>
				</li>

@stop

@section('Contents')
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
					    <button id="" name="" class="btn btn-info" type="submit">Sign Up</button>
					  </div>
					</div>

					</fieldset>
					</form>

		</div>
		<div class="col-md-1">
		</div>
		
@stop
