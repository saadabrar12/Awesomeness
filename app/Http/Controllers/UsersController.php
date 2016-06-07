<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Waiting_for_aprroval;

<<<<<<< HEAD
use Session;

=======
use App\Event_type;

use App\Events;

use App\users;

use App\Volunteers;

use App\Participation;

use DB;

use Session;


>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
<<<<<<< HEAD
=======

    public function showVolunteersUnderMe($id){
        $participation = new Participation;
        //dd($id);
        $VolunteersWorkingUnderMe = DB::table('Participation')
            ->where('Supervisor_id','=',$id)->get();
        //dd($VolunteersWorkingUnderMe);
        return view('Users.RateVolunteers',[
                'Participants'=>$VolunteersWorkingUnderMe,
                'Event_type' => Event_type::all(),
                'Events' => Events::all(),
                'Users'=>users::all()
            ]);
        //return 'something';
    }

    public function Rate($event_id, $volunteer_id){
        $Participant = DB::table('Participation')->where([
                ['Volunteer_id','=',$volunteer_id],
                ['Event_id','=',$event_id],
        ])->get();        //dd($Participant);
        $user_row = users::find($volunteer_id);
        $volunteer_name = $user_row->name;
        //dd($volunteer_name);
        $Event_row = Events::find($event_id);
        $Event_type_row = Event_type::all();

        foreach ($Event_type_row as $event_type ) {
            if($event_type->Event_type_id == $Event_row->Event_type_id){
                $Event_name = $event_type->Event_name;
            }
        }



        //dd($Event_name);
        $Event_Version = $Event_row->Event_name;
        //dd($Event_Version);
        
        //dd($Participant);
        
        return view('Users.Rate',[
            'participant'=>$Participant,
            'Volunteer_id'=>$volunteer_id,
            'Event_id'=>$event_id,
            'volunteer_name'=>$volunteer_name,
            'Event_name'=>$Event_name,
            'Event_Version'=>$Event_Version
        ]);
    }

    public function RatePost($event_id,$volunteer_id,Request $request){
        $Rate = $request->get('Rate');
        DB::table('Participation')
            ->where([
                ['Volunteer_id','=',$volunteer_id],
                ['Event_id','=',$event_id],
            ])
            ->update(['Rating'=>$Rate])
            ;

        $number_of_events = DB::table('Participation')
                            ->where('Volunteer_id',$volunteer_id)->get();

        //$number_of_events = count($number_of_events);

        $Volunteer = Volunteers::find($volunteer_id);
        //$current_rating = $Volunteer->Average_rating;


        $participants = DB::table('Participation')
                        ->where('Volunteer_id','=',$volunteer_id)->get();

        $total_rating = 0;
        $count = 0;
        foreach ($participants as $participant ) {
            $count++;
            $total_rating+=$participant->Rating;
        }

        //dd($total_rating);
        $current_rating= ($total_rating)/($count);
        //$current_rating = $current_rating*($number_of_events-1)+$Rate;

        //$current_rating = $current_rating/$number_of_events;


        DB::table('Volunteer')
            ->where('Volunteer_id',$volunteer_id)
            ->update([
                    'Average_rating'=>$current_rating
                ]);
        
        //dd($number_of_events);
        //dd($Rate);
        return redirect('/');
    }
>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756
    public function getMain(){
        return view('Main');
    }

    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
<<<<<<< HEAD
        return view('Users.create');
=======
        return view('Users.create',['info'=>'Nothing']);
>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $temporary_user = new Waiting_for_aprroval;
        
        $var = $request->get('radios');
        if($var == 1){
            $temporary_user->User_type = 1;
        }
        else if ($var == 0) {
            $temporary_user->User_type = 0;
        }

        $temporary_user->Username = $request->get('Username');
<<<<<<< HEAD
=======
        //Handling Username
        $user_name_check_row = users::all();
        foreach ($user_name_check_row as $user) {
            if($user->name == $temporary_user->Username)
            {
                return view('Users.create',['info'=>'Failed']);
            }
        }


>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756
        //return $request->get('password');
        $temporary_user->Password = \Hash::make($request->get('password'));
        $temporary_user->First_name = $request->get('First_name');
        $temporary_user->Last_name = $request->get('Last_name');
        $temporary_user->Date_of_birth = $request->get('Date_of_birth');
        $temporary_user->Phone_number = $request->get('Phone_number');
        $temporary_user->Email_address = $request->get('Email_address');
        $temporary_user->Campus_name = $request->get('Campus_name'); 

        $temporary_user->save();

<<<<<<< HEAD
        return redirect('/Users/create')->with('info', 'it is empty');
=======
        return view('Users.create',['info'=>'Successful']);
>>>>>>> 57c1c68c6aa9b28b0f513d896fa4db7a15fae756


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function postSignIn(Request $request){
	    //return $request['password'];
        if(Auth::attempt(['name' => $request['username'],'password' => $request['password']])) {
            //return "SUCCESS";
            //$converted_res = (Auth::Guest()) ? 'true' : 'false';
            //return $converted_res;
            //$converted_res = (Auth::user()->name);
            //echo $converted_res;
            return redirect('/');
        }
        else{
		    return 'wrong creds';
	    }
        //echo $request['username'];
        //echo $request['password'];
        //return "Failed";
        return redirect()->back();
    }
}
