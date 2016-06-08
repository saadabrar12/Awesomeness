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



Route::group(['middleware' => ['web']],function(){


//		Route::get('/SignUp',function(){
//			return view('Users.SignUp');
//		});


	Route::get('/',function(){
		return view('Main',['info'=>'Nothing']);
	});

	Route::get('/about',function(){
		return view('About');
	});

	Route::get('/UpcomingEvents',function(){
		return view('UpcomingEvents');
	});
	Route::get('/Events/AllEvents','EventController@showAllEvents');

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
	Route::get('/volunteerRequests','AdminController@showVolunteeringRequests');

	Route::get('/Events/{event_id}/volunteerList','EventController@showEventVolunteers');
		
	Route::get('/Events/{event_id}/{volunteer_id}/Allocation','EventController@Allocation');
	Route::post('/Events/{event_id}/{volunteer_id}/postAllocation','EventController@postAllocation');
	
	Route::post('/Events/{event_id}/{volunteer_id}/disapprove','EventController@disapprove');

	Route::get('/member/{id}/showVolunteersUnderMe','UsersController@showVolunteersUnderMe');
	Route::get('/Events/{event_id}/{volunteer_id}/Rate','UsersController@Rate');
	Route::post('/Events/{event_id}/{volunteer_id}/RatePost','UsersController@RatePost');
	Route::get('/Users/{id}/Profile','UsersController@ShowProfile');
	
	Route::post('/Admin/{id}/approve','AdminController@acceptMembership');

	Route::post('/Admin/{volunteer_id}/approveVolunteer','AdminController@acceptVolunteer');
	Route::get('/Admin/AllMembers','AdminController@viewAllMembers');
	Route::get('/Admin/{Member_id}/MemberPromote','AdminController@PromoteMembers');
	Route::post('/Admin/{Member_id}/PromotePost','AdminController@PromotePost');


	Route::post('/Admin/{id}/disapprove','AdminController@rejectMembership');


	Route::get('Volunteers/ShowOngoingEvents','Volunteer_Controller@ShowOngoingEvents');

	Route::post('Volunteers/{event_id}/{volunteer_id}/register','Volunteer_Controller@Register');
	

	Route::get('test', function(){return view('test');});
	

	
	
});

