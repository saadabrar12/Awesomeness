@extends('layouts.master1')

@section('title','Volunteer Home')

@section('Contents')
	<div class="row">
		<div class="col-md-1">
			
		</div>
		<div class="col-md-5">
		<center>
			<a href=""><h3>
				Register for ongoing events.
			</h3>
			</a>
			<img alt="Bootstrap Image Preview" src="{{asset('img/CUS656Create.jpg') }}" height="240" width="300" />
		</center>
		</div>
		
		<div class="col-md-5">
			<center>
			<h3>
			<a href="">
				See volunteering history.
			</a>
			</h3><img alt="Bootstrap Image Preview" src="{{ asset('img/Updates.jpg') }}" height="240" width="240" />
			</center>
		</div>
		<div class="col-md-1">
			
		</div>
	</div>
@stop