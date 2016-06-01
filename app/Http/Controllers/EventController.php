<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Event_type;

use App\Events;

use DB;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_event_type_name($Event_type_name){
        $Event_id_array = DB::table('Event_type')->where('Event_name','=',$Event_type_name)->get();

//        dd($Event_id_array);
        
        foreach ($Event_id_array as $Event_type_id) {
            //dd($Event_type_id);
            return $event->Event_type_id = $Event_type_id->Event_type_id;
        }
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
        return view('Events.CreateEvent',['Event_type'=>Event_type::all()]);
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

        $event->save();
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
