<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Input;

use Illuminate\Support\Facades\Validator;

use Illuminate\Support\MessageBag;

use App\Http\Controllers\Controller;

use App\Http\Requests;

use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Auth;

//use Illuminate\Validation\ValidationException;

use Illuminate\Foundation\Validation\ValidationException;

use Illuminate\Foundation\Validation\ValidatesRequests;


use App\Waiting_for_aprroval;

use App\Event_type;

use App\Events;

use App\users;

use App\Volunteers;

use App\Participation;

use DB;



class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

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
    public function create(Request $request)
    {
        //$request->session()->put('info', 'nothing');
        return view('Users.create',['info'=>'Nothing']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump($request->session()->all());
         $validator = Validator::make($request->all(), [
        'Username' => 'required|between:5,20',
        //'Password'=> 'required|alpha_dash|min: 6',
        'First_name'=>'required|alpha',
        'Last_name' => 'required|alpha',
        'Date_of_birth' => 'required|date|before: ' . date('2003-1-1') . '|date_format:Y-m-d|after: ' .date('1980-1-1') . '| date_format: Y-m-d',

        'Phone_number' => 'required|numeric|min: 11',
        'Email_address' => 'required|email',
        'Campus_name' => 'required|alpha'
        //. date('Y-m-d') . '|date_format:Y-m-d',
    ]);
         //dd($request->all());

    if ($validator->fails()) {
        return redirect('/Users/create')
            ->withInput()
            ->withErrors($validator);
    }
        
        $temporary_user = new Waiting_for_aprroval;
        
        $var = $request->get('radios');
        if($var == 1){
            $temporary_user->User_type = 1;
        }
        else if ($var == 0) {
            $temporary_user->User_type = 0;
        }

        $temporary_user->Username = $request->get('Username');
        //Handling Username
        $user_name_check_row = users::all();
        foreach ($user_name_check_row as $user) {
            if($user->name == $temporary_user->Username)
            {
                return view('Users.create',['info'=>'Failed']);
            }
        }
        $user_name_check_row = Waiting_for_aprroval::all();

        foreach ($user_name_check_row as $user) {
            if($user->Username == $temporary_user->Username){
                return view('Users.create',['info'=>'Failed']);
            }
        }


        //return $request->get('password');
        $temporary_user->Password = \Hash::make($request->get('password'));
        $temporary_user->First_name = $request->get('First_name');
        $temporary_user->Last_name = $request->get('Last_name');
        $temporary_user->Date_of_birth = $request->get('Date_of_birth');
        $temporary_user->Phone_number = $request->get('Phone_number');
        $temporary_user->Email_address = $request->get('Email_address');
        $temporary_user->Campus_name = $request->get('Campus_name'); 

        $temporary_user->save();

        return view('Users.create',['info'=>'Successful']);

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
//            return "Bhaloi";
		    return redirect()->back()->with('info','LoginFailed');
	    }
        //echo $request['username'];
        //echo $request['password'];
        //return "Failed";
        return redirect()->back();
    }
}
