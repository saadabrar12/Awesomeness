@extends('layouts.master1')

@section('title','Main Page')


@section('Contents')
	<div id="myCarousel" class="carousel slide" data-ride="carousel" >
  <!-- Indicators -->
  		<ol class="carousel-indicators">
    		<li data-target="#myCarousel" data-slide-to="0" class="active"></li>
    		<li data-target="#myCarousel" data-slide-to="1"></li>
    		<li data-target="#myCarousel" data-slide-to="2"></li>
    
  		</ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
     <center> <img src="{{asset('img/Donate.jpg')}}" > </center>
    </div>

    <div class="item">
      <center><img src="{{ asset('img/Event.jpg') }}" > </center>
    </div>

    <div class="item">
      <img src="{{ asset('img/Volunteer.jpg') }}" >
    </div>

    
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
	</div>
@stop

@section('Extra_info')
	<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="thumbnail">
						<img alt="Bootstrap Thumbnail First" src="{{ asset('img/PCP.jpg') }}">
						<div class="caption">
							<h3>
								<center> Project Chauna Piyaju </center>
							</h3>
							<p>
								
							</p>
							<p>
								<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="thumbnail">
						<img alt="Bootstrap Thumbnail First" src="{{ asset('img/RFA.jpg') }}">
						<div class="caption">
							<h3>
								Thumbnail label
							</h3>
							<p>
								
							</p>
							<p>
								<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
							</p>
						</div>
					</div>
				</div>	
			</div>
		</div>
		<div class="col-md-4">
			<div class="row">
				<div class="col-md-12">
					<div class="thumbnail">
						<img alt="Bootstrap Thumbnail First" <img src="{{asset('img/FAW.jpg')}}" >
						<div class="caption">
							<h3>
							<center> Fight Against Winter </center>
							</h3>
							<p>
								
							</p>
							<p>
								<a class="btn btn-primary" href="#">Action</a> <a class="btn" href="#">Action</a>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
@stop
