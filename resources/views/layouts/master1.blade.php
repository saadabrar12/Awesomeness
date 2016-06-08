<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Youth's Voice @yield('title') </title>

    <meta name="description" content="">
    <meta name="author" content="">

    <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/cosmo/bootsrap.css') }}">

    <link rel="stylesheet" type="text/css" href="{{asset('css/TableCSSCode.css') }}">
  
  </head>
  <body>
       <div class="container-fluid">
        <div class="row">
            <div class="col-md-1">
            </div>
            <div class="col-md-10">
                <div class="row">
                 <div class="col-md-3">
                    <div class="row">
                        <div class="col-md-4">
                            <input type="Image" src="{{asset('img/logo.png')}}">
                        </div>
                        <div class="col-md-8">
                            <p>  <h2><font color="green">Youth's</font> <br> <font color="blue">Voice</font></h2> </p>
                        </div>
                    </div>
                </div>

                <div class="col-mid-9">
                    
                  @if (Auth::Guest())            
                    <form role="form" class="form-inline" action="{{ route('signin') }}" method="post">
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
                      Want to join?<a href="{{ url('/Users/create') }}"> Sign up </a> here.
                      </center>
                      <input type="hidden" name="_token" value="{{ Session::token() }}"> </input>
                    </form>
                    @else
                          @if(Auth::user()->User_type==1)
                          <div>
                              Member
                          </div>
                          @else
                          <div>
                            volunteer
                          </div>
                          @endif

                          <div>
                          <ul class="nav nav-tabs">
                                      <li class="dropdown pull-right">
                                      <a href="#" data-toggle="dropdown" class="dropdown-toggle" style="font-size: 20px" ><b>{{ Auth::user()->name }} <strong class="caret"></strong> </b>
                                             </a>

                                             <ul class="dropdown-menu" role="menu">
                                                  <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                                                  <li>
                                                  <a href="#">Action</a>
                                                  </li>
                                             </ul>
                                          </li>
                                    </ul>
                            </div>
                       @endif
                    </div>
                </div>
            </div>
            <div class="col-md-1">
            </div>
        </div>

        <div class="row">
              <div class="col-md-1">
              </div> 
              <div class="col-md-10">
                 <ul class="nav nav-tabs">
      @if(Auth::Guest())
                <li class="active">
                  <a href="{{ url('/') }}">Home</a>
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
          @else
              @if(Auth::user()->User_type==1) 
                <li class="active">
                  <a href="{{ url('/') }}">Home</a>
                </li>
                <li class="active">

                  <a href="">Upcoming Events</a>
                </li>
                <li class="active">
                  <a href="#">News</a>
                </li>
                <li class="active">
                  <a href="{{ url('/member/'.Auth::user()->id.'/showVolunteersUnderMe') }}">Volunteers Under Me</a>
                </li>
                <li class="dropdown pull-right">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">Activities<strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="{{ url('/memberrequests') }}">Account Requests</a>
                      </li>
                      <li>
                        <a href="{{ url('/volunteerRequests') }}">Volunteer Requests</a>
                      </li>
                      <li>
                        <a href="{{ url('/Events') }}">Events</a>
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

                  @else
                     <li class="active">
                        <a href="{{ url('/') }}">Home</a>
                     </li>
                     <li class="active">
                        <a href="{{ url('/').'/Volunteers/ShowOngoingEvents' }}">Upcoming Events</a>
                     </li>
                     <li class="active">
                        <a href="#">News</a>
                      </li>
                     <li class="active">
                        <a href="#">About us</a>
                     </li>
                     <li class="dropdown pull-right">
                        <a href="#" data-toggle="dropdown" class="dropdown-toggle">Activities<strong class="caret"></strong></a>
                    <ul class="dropdown-menu">
                      <li>
                        <a href="{{ url('/memberrequests') }}">Membership Requests</a>
                      </li>
                        <a href="#">Something else here</a>
                      </li>
                      <li class="divider">
                      </li>
                      <li>
                        <a href="#">Separated link</a>
                      </li>
                    </ul>
                  </li>


                  @endif
        @endif
                 </ul>
              </div>
              <div class="col-md-1">
              </div>
        </div>
        <div class="row">
            @yield('Contents')
        </div>
        <div class="row">
            @yield('Extra_info')
        </div>
    </div>

   
    
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">  
</body>
</html>