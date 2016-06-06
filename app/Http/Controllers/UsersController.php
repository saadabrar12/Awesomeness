<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use Illuminate\Support\Facades\Auth;

use App\Waiting_for_aprroval;

use App\Event_type;

use App\Events;

use App\users;

use App\Participation;

use DB;

use Session;


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
        $Participant = Participation::where([
            ['Volunteer_id', $volunteer_id],
            ['Event_id',$event_id],
            ])->get();
        dd($Participant);
        
        return view('Users.Rate');
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
    public function create()
    {
        return view('Users.create');
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
        //return $request->get('password');
        $temporary_user->Password = \Hash::make($request->get('password'));
        $temporary_user->First_name = $request->get('First_name');
        $temporary_user->Last_name = $request->get('Last_name');
        $temporary_user->Date_of_birth = $request->get('Date_of_birth');
        $temporary_user->Phone_number = $request->get('Phone_number');
        $temporary_user->Email_address = $request->get('Email_address');
        $temporary_user->Campus_name = $request->get('Campus_name'); 
        
        $temporary_user->save();

        return redirect('/Users/create')->with('info', 'it is empty');


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
