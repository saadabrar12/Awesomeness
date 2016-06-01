<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Waiting_for_aprroval;

use App\users;

use App\Members;

use App\Volunteers;

use App\Campus;

use App\Events;

use App\Event_type;

use App\Waiting_for_joining_Event;

use App\Participation;

use DB;

class AdminController extends Controller
{
    public function showMembershipRequests()
    {
    	return view('Admin.MembershipRequests',['Req'=>Waiting_for_aprroval::all()]);
    }

    public function acceptMembership($id){
    	//return "Good";
    	$request = Waiting_for_aprroval::find($id);

    	$count_all_users = users::all();
    	$count_user = count($count_all_users);

    	$user = new users;
    	$member = new Members;
    	$volunteer = new Volunteers;
    	$campus = new Campus;

    	$user->id = $count_user+1;
    	$user->name = $request->Username;
    	$user->First_name = $request->First_name;
    	$user->Last_name = $request->Last_name;
    	$user->Date_of_birth = $request->Date_of_birth;
    	$user->Phone_number = $request->Phone_number;
    	$user->email = $request->Email_address;

    	$cam_name = $request->Campus_name;

    	$campus_row = DB::table('Campus')->where('Campus_name','=',$cam_name)->get();

    	if($campus_row){
    		//return 'good'
    		foreach ($campus_row as $row) {
    			$new_camp_id = $row->Campus_id;
    		}
    		$user->Campus_id = $new_camp_id; 
    	}
    	else{
    		$campus->Campus_name = $cam_name;
    		$campus->save();

    		$campus_row = DB::table('Campus')->where('Campus_name','=',$cam_name)->get();

    		//dd($campus_row);
    		foreach ($campus_row as $row) {
 			   $new_camp_id= $row->Campus_id;
			}
    		$user->Campus_id = $new_camp_id;
    	}
    	$user->password =($request->Password);
    	//Member
    	$user->User_type = $request->User_type;


    	$user->save();

    	if($request->User_type) {
    		$member->Member_id = $count_user+1;
    		$member->Rank_id = 2;
    		$member->Monthly_subscription_fees = 100;
    		$member->Department_id =1;
    		$member->save();
    	}
    	else{
            $volunteer->Volunteer_id = $count_user+1;
            $volunteer->Average_rating = 0;
            $volunteer->save();
    	}

    	$request->delete();

    	return redirect('memberrequests');
    }

    public function rejectMembership($id){
    	//return "Bad";
    	$request = Waiting_for_aprroval::find($id);
    	$request->delete();
    	return redirect('memberrequests');
    }

    public function showVolunteeringRequests(){
        return view('Admin.VolunteerRequests',['Req'=>Waiting_for_joining_Event::all(),'Events'=>Events::all(),'Event_types'=>Event_type::all(),'Users'=>users::all()]);
    }
    public function acceptVolunteer($volunteer_id){
        $Requests = DB::table('Waiting_for_joining_event')->where('Volunteer_id','=',$volunteer_id)->get();
        $participation = new Participation;
        
     //   foreach ($campus_row as $row) {
      //      $new_camp_id= $row->Campus_id;
        //}

        foreach ($Requests as $request) {
                      
                            
            $participation->Volunteer_id = $request->Volunteer_id;
            $participation->Event_id = $request->Event_id; 
            $participation->Department_id = 1;
            $participation->Rating = 0;
    

            $participation->save();
            //$Requests->delete();
            
            return redirect('volunteerRequests');
        }
    }
}
