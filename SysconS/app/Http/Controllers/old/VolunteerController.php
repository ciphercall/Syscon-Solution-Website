<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Volunteer;
use App\Models\Brunch;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Occasion ;
use App\Models\Duty;
use App\Models\Countries ;
use App\Models\Vduty ;


use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class VolunteerController extends Controller{

	public function index(){
		$brunchs=Brunch::all();
		$members=Member::all();
		$duty=Duty::all();
		$occa=Occasion::all();
		$country=Countries::all();


		// $volunteers=Volunteer::paginate(10);

         $volunteers =DB::table('volunteers')
		->join('members','members.id', '=', 'volunteers.member_id')
		->join('vduties','vduties.v_id', '=', 'volunteers.id')
		->select('volunteers.*','members.m_photo','vduties.v_id')
		->paginate(10);


		//  dd($volunteers);

		return view("pages.erp.volunteer.index_volunteer",["countries"=>$country,"volunteers"=>$volunteers,"brunchs"=>$brunchs,"members"=>$members,"occasions"=>$occa,"dutys"=>$duty]);
	}
	public function create(){
		$brunchs=Brunch::all();
		$members=Member::all();

		return view("pages.erp.volunteer.create_volunteer",["brunchs"=>$brunchs,"members"=>$members]);
	}
	public function store(Request $request){

		$volunteer=new Volunteer;
		$volunteer->brunch_id=$request->cmbBrunchId;
		$volunteer->brunch_name=$request->txtBrunch_name;
		$volunteer->member_id=$request->cmbMemberId;
		$volunteer->member_name=$request->txtMember_name;
		$volunteer->phone=$request->txtPhone;
		$volunteer->previous_duty=$request->txtPrevious_duty;
		$volunteer->duty_date=$request->txtDuty_date;
		$volunteer->comment=$request->txtComment;
		$volunteer->phone_code=$request->txtphone_code;
        $volunteer->deleted_at=$request->txtDeleted_at;
        $volunteer->save();


        ///////////////////////////
		$duty=new Vduty;
        $duty->v_id=$volunteer->id;

        $duty->occasion6=$request->txtOccasion6;
		$duty->duty6=$request->txtDuty6;
		$duty->previous_duty6=$request->txtPresent_duty6;
		$duty->place6=$request->txtPlace6;

        $duty->duty1=$request->txtDuty1;
		$duty->duty2=$request->txtDuty2;
		$duty->duty3=$request->txtDuty3;
		$duty->duty4=$request->txtDuty4;
		$duty->duty5=$request->txtDuty5;
		$duty->occasion1=$request->txtOccasion1;
		$duty->occasion2=$request->txtOccasion2;
		$duty->occasion3=$request->txtOccasion3;
		$duty->occasion4=$request->txtOccasion4;
		$duty->occasion5=$request->txtOccasion5;
		$duty->place1=$request->txtPlace1;
		$duty->place2=$request->txtPlace2;
		$duty->place3=$request->txtPlace3;
		$duty->place4=$request->txtPlace4;
		$duty->place5=$request->txtPlace5;
		$duty->previous_duty1=$request->txtPrevious_duty1;
		$duty->previous_duty2=$request->txtPrevious_duty2;
		$duty->previous_duty3=$request->txtPrevious_duty3;
		$duty->previous_duty4=$request->txtPrevious_duty4;
		$duty->previous_duty5=$request->txtPrevious_duty5;

        // ///////

		$duty->save();


		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$svolunteer=Volunteer::find($id);
        // $centralmember =DB::table('members')

		// ->join('centralmembers','members.id', '=', 'centralmembers.name')
		// ->where('centralmembers.id','=',$id)
		// ->select('members.m_name','members.m_photo','centralmembers.*')
		// ->get();
		// dd($centralmember);
		return response()->json([
			'status'=>200,
			'svolunteer'=>$svolunteer
		]);
	}
	public function edit($id){
		$volunteer=Volunteer::find($id);
		return response()->json([
			'status'=>200,
			'volunteer'=>$volunteer
		]);
	}



	public function update(Request $request){

		$volunteerid=$request->input('cmbvolId');

		$volunteer = Volunteer::find($volunteerid);
		$volunteer->id=$request->cmbvolId;

		$volunteer->brunch_id=$request->cmbBrunchId;
		$volunteer->brunch_name=$request->txtBrunch_name;
		$volunteer->member_id=$request->cmbMemberId;
		$volunteer->member_name=$request->txtMember_name;
		$volunteer->phone=$request->txtPhone;
		$volunteer->occasion=$request->txtOccasion;
		$volunteer->duty=$request->txtDuty;
		$volunteer->present_duty=$request->txtPresent_duty;
		$volunteer->previous_duty=$request->txtPrevious_duty;
		$volunteer->duty_date=$request->txtDuty_date;
		$volunteer->place=$request->txtPlace;
		$volunteer->phone_code=$request->txtphone_code;

		$volunteer->comment=$request->txtComment;
		$volunteer->deleted_at=$request->txtDeleted_at;


        ///////////////////////////
        $volunteer->duty1=$request->txtDuty1;
		$volunteer->duty2=$request->txtDuty2;
		$volunteer->duty3=$request->txtDuty3;
		$volunteer->duty4=$request->txtDuty4;
		$volunteer->duty5=$request->txtDuty5;
		$volunteer->occasion1=$request->txtOccasion1;
		$volunteer->occasion2=$request->txtOccasion2;
		$volunteer->occasion3=$request->txtOccasion3;
		$volunteer->occasion4=$request->txtOccasion4;
		$volunteer->occasion5=$request->txtOccasion5;
		$volunteer->place1=$request->txtPlace1;
		$volunteer->place2=$request->txtPlace2;
		$volunteer->place3=$request->txtPlace3;
		$volunteer->place4=$request->txtPlace4;
		$volunteer->place5=$request->txtPlace5;
		$volunteer->previous_duty1=$request->txtPrevious_duty1;
		$volunteer->previous_duty2=$request->txtPrevious_duty2;
		$volunteer->previous_duty3=$request->txtPrevious_duty3;
		$volunteer->previous_duty4=$request->txtPrevious_duty4;
		$volunteer->previous_duty5=$request->txtPrevious_duty5;

        // ///////


		$volunteer->update();
		return redirect()->route("volunteers.index")->with('success','Updated Successfully.');

	}




	public function destroy(Request $request){

		$volunteerid=$request->input('d_vol');
		$volunteer= Volunteer::find($volunteerid);
		$volunteer->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
////////////////////////////
// public function destroy($id)
// {
//     DB::table("sale_reqs")->where("id", $id)->delete();
//     DB::table("sale_details")->where("order_id", $id)->delete();
//     return redirect()->route('orders.index')
//     ->with('success','Order Deleted successfully');
// }


    ///////////////////////////////

	public function get_volunteer_json(){
        $id=$_GET["id"];
        // $px=DB::getTablePrefix();

        $request=DB::select("select * from brunches where id='$id'");
		// dd($request);
          return json_encode($request[0]);
     }



    //  public function get_vduty_json(){
    //     $id=$_GET["id"];
    //     // $px=DB::getTablePrefix();

    //     $request=DB::select("select * from volunteers where id='$id'");
    //      return json_encode($request[0]);
    //  }
    public function get_vduty_json(){
        $vduty=Vduty::all();

        return response()->json([
			'status'=>200,
			'vduty'=>$vduty
		]);
     }


    public function fetchVduty(Request $request){




        $data['vduty']=DB::table('members')

        ->join('volunteers','members.id', '=', 'volunteers.member_id')
        ->join('vduties','volunteers.id', '=', 'vduties.v_id')

        // ->where("v_id",$request->v_id)
        ->where("member_id",$request->member_id)

        ->select('members.id','members.m_name','members.m_phone','volunteers.id','vduties.*')
        ->get();

        return response()->json($data);

    }


}
