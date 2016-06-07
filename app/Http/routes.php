<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
use Illuminate\Support\Facades\Input;


<<<<<<< HEAD
=======

>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756
Route::group(['middleware' => ['web']],function(){


//		Route::get('/SignUp',function(){
//			return view('Users.SignUp');
//		});


	Route::get('/',function(){
		return view('Main');
	});
<<<<<<< HEAD

	Route::get('/Events/AllEvents','EventController@showAllEvents');	

	
=======
	Route::get('/Events/AllEvents','EventController@showAllEvents');
>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756

	Route::resource('Users','UsersController');
	Route::resource('Events','EventController');
	
	Route::post('/signin', [
		'uses' => 'UsersController@postSignIn',
		'as' => 'signin'
	]);
	Route::get('logout', function(){
			Auth::logout();
			return redirect('/');
	});

	Route::get('/memberrequests','AdminController@showMembershipRequests');
<<<<<<< HEAD
	
	Route::post('/Admin/{id}/approve','AdminController@acceptMembership');
	
	Route::post('/Admin/{id}/disapprove','AdminController@rejectMembership');

	

	Route::get('test', function(){return view('test');});
=======
	Route::get('/volunteerRequests','AdminController@showVolunteeringRequests');

	Route::get('/Events/{event_id}/volunteerList','EventController@showEventVolunteers');
		
	Route::get('/Events/{event_id}/{volunteer_id}/Allocation','EventController@Allocation');
	Route::post('/Events/{event_id}/{volunteer_id}/postAllocation','EventController@postAllocation');
	
	Route::post('/Events/{event_id}/{volunteer_id}/disapprove','EventController@disapprove');

	Route::get('/member/{id}/showVolunteersUnderMe','UsersController@showVolunteersUnderMe');
	Route::get('/Events/{event_id}/{volunteer_id}/Rate','UsersController@Rate');
	Route::post('/Events/{event_id}/{volunteer_id}/RatePost','UsersController@RatePost');
	
	Route::post('/Admin/{id}/approve','AdminController@acceptMembership');

	Route::post('/Admin/{volunteer_id}/approveVolunteer','AdminController@acceptVolunteer');
	
	Route::post('/Admin/{id}/disapprove','AdminController@rejectMembership');

	Route::get('Volunteers/ShowOngoingEvents','Volunteer_Controller@ShowOngoingEvents');

	Route::post('Volunteers/{event_id}/{volunteer_id}/register','Volunteer_Controller@Register');
	

	//Route::get('test', function(){return view('test');});
>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756
	

	
	
});

