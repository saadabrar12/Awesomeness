<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Events;

use App\Event_type;

use App\Waiting_for_joining_Event;

use DB;

class Volunteer_Controller extends Controller
{
    public function showOngoingEvents(){
    	return view('Volunteer.showOngoingEvents',['Ongoing_events'=>DB::table('Events')->where('Ongoing','=',1)->get(),'Event_types'=>Event_type::all()]);
    }

    public function Register($event_id,$volunteer_id){
    	//return $event_id;


        $Participant = DB::table('Participation')->where([
                ['Volunteer_id','=',$volunteer_id],
                ['Event_id','=',$event_id],
        ])->get();

        if(!$Participant){ 
    	   $Event_join = new Waiting_for_joining_Event;
    	   $Event_join->Event_id = $event_id;
    	   $Event_join->Volunteer_id = $volunteer_id;

    	   $Event_join->save();
    	
    	   return view('Volunteer.showOngoingEvents',['info'=>'Register Requested']);
        }
        else{
            return redirect()->route('',['info'=>'Already Registered']);
        }
    }

}
