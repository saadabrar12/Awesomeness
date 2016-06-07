<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Http\Requests;

use App\Event_type;

use App\Events;

use App\Participation;

use DB;

use App\users;

use App\Department;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function showEventVolunteers($event_id){
        $Event_id1 = Events::find($event_id)->Event_id; 
        $participants = DB::table('Participation')->where('Event_id','=',$Event_id1)->get();

        //dd($participants);
        return view('Events.showEventVolunteers',['Events'=>Events::find($event_id),'Event_types'=>Event_type::all(),'Users'=>users::all(),'Req'=>$participants]);
    }
    
    public function Allocation($event_id,$volunteer_id){
        //return 1;
        //dd($volunteer_id);
        $participants = DB::table('Participation')->where([
                ['Volunteer_id','=',$volunteer_id],
                ['Event_id','=',$event_id],
        ])->get();
        
        //dd($participants);
        $member = DB::table('users')->where('User_type','=','1')->get();
        
        return view('Events.Allocation',['participant'=>$participants,'Department'=>Department::all(),'Members'=>$member,'Users'=>users::all(),'Event'=>$event_id,'Volunteer'=>$volunteer_id]);
    }

    public function postAllocation($event_id, $volunteer_id,Request $request){
        $member_id= $request->get('Members');
        $Department_name = $request->get('Department');

        //dd($member_name);
        //$Member_name = DB::table('users')

        $Dept_name = DB::table('Department')->where('Department_name','=',$Department_name)->get();
        //dd($Dept_name);
        
        foreach ($Dept_name as $dept_row) {
            DB::table('Participation')
                ->where('Volunteer_id',$volunteer_id)
                ->update(['Department_id' => $dept_row->Department_id,'Supervisor_id'=>$member_id]);
        
            return redirect('/Events/AllEvents');
        }

    }

    public function disapprove($event_id, $volunteer_id){
        $deletedRows = Participation::where([
            ['Volunteer_id', $volunteer_id],
            ['Event_id',$event_id],
            ])->delete();
        
            return redirect('/Events/AllEvents');
    }


    public function index()
    {
        return view('Events.EventHome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Events.CreateEvent',['Event_type'=>Event_type::all(),'info'=>'Nothing']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $event = new Events;

        $Event_type_name = $request->get('Event_Type');
        //return $Event_type_name;

        $Event_id_array = DB::table('Event_type')->where('Event_name','=',$Event_type_name)->get();

//        dd($Event_id_array);
        
        foreach ($Event_id_array as $Event_type_id) {
            //dd($Event_type_id);
            $event->Event_type_id = $Event_type_id->Event_type_id;
        }
        //dd($request->get('Event_Starting_Date'));
        $event->Event_date = $request->get('Event_Starting_Date');
        $event->Donations = $request->get('Donation');
        $event->Event_name = $request->get('Event_Version');
        


        //error checking
        $Events = Events::all();
        foreach ($Events as $Event){
            if($event->Event_type_id == $Event->Event_type_id && $event->Event_name == $Event->Event_name){
                //return "GOOD";
                //Session::put('info','EventExists');
                return view('Events.CreateEvent',['info'=>'EventExists','Event_type'=>Event_type::all()]);
            }
        }



        $event->Ongoing = 1;
        $event->Venue = $request->get('Venue');

        $event->save();
        return redirect('/Events/create')->with('info','Created');
    }

    public function showAllEvents(){
        //return "bhalo";

        return view('Events.AllEvents',['Events'=>Events::all(),'Event_types'=>Event_type::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //return "Showte ase";
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //return "good!!";
        return view('Events.EditEvent',['Events'=>Events::find($id),'Event_type'=>Event_type::all()]);
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
        //return "good";
        $event = new Events;

        $Event_type_name = $request->get('Event_Type');
        //return $Event_type_name;

        $Event_id_array = DB::table('Event_type')->where('Event_name','=',$Event_type_name)->get();

//        dd($Event_id_array);
        
        foreach ($Event_id_array as $Event_type_id) {
            //dd($Event_type_id);
            $event->Event_type_id = $Event_type_id->Event_type_id;
        }
        //dd($request->get('Event_Starting_Date'));
        $event->Event_date = $request->get('Event_Starting_Date');
        $event->Donations = $request->get('Donation');
        $event->Event_name = $request->get('Event_Version');
        $event->Ongoing = $request->get('Ongoing');
        $event->Venue = $request->get('Venue');

        DB::table('Events')
            ->where('Event_id',$id)
            ->update([
                'Event_type_id' => $event->Event_type_id,
                'Event_date'=>$event->Event_date,
                'Donations'=>$event->Donations,
                'Event_name'=>$event->Event_name,
                'Ongoing'=>$event->Ongoing,
                'Venue'=>$event->Venue
            ]);

        //$event->save();
        return redirect('/Events/AllEvents')->with('info','Updated');   
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
}
