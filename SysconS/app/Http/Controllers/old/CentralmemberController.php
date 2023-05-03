<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Centralmember;
use App\Models\Member;
use App\Models\Brunch;
use App\Models\Role;
use App\Models\Sobok;
use App\Models\Occasion ;
use App\Models\Designation ;
use App\Models\Workplace;

use App\Models\Duty;
use App\Models\Donation_box;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class CentralmemberController extends Controller{

	public function index(){
		$brunchs=Brunch::all();

		$duty=Duty::all();
		$sok=Sobok::all();
		$occa=Occasion::all();
		$desi=Designation::all();


		$workplace=Workplace::all();
		$member=Member::all();

		// $centralmembers=Centralmember::paginate(10);
		$centralmembers =DB::table('members')
		->join('centralmembers','members.id', '=', 'centralmembers.name')
        ->join('designations','centralmembers.designation', '=', 'designations.id')
		->select('members.m_name','members.m_photo', 'centralmembers.id','centralmembers.occupation', 'centralmembers.torikot_date', 'centralmembers.designation', 'designations.name')
		->get();
		// dd($members);
		return view("pages.erp.centralmember.index_centralmember",["cmembers"=>$centralmembers,"members"=>$member,"brunchs"=>$brunchs,"workplaces"=>$workplace,"dutys"=>$duty,"soboks"=>$sok,"occasions"=>$occa,"dutys"=>$duty,"designations"=>$desi]);
	}
	public function create(){
		$brunchs=Brunch::all();
		$donation_boxs=Donation_box::all();

		return view("pages.erp.centralmember.create_centralmember",["brunchs"=>$brunchs,"donation_boxs"=>$donation_boxs]);
	}
	public function store(Request $request){

		$centralmember=new Centralmember;
		$centralmember->name=$request->txtName;
		$centralmember->phone=$request->txtPhone;
		$centralmember->email=$request->txtEmail;
		$centralmember->date_birth=$request->txtDate_birth;
		$centralmember->father=$request->txtFather;
		$centralmember->mother=$request->txtMother;
		$centralmember->family_member=$request->txtFamily_member;
		$centralmember->blood_group=$request->txtBlood_group;
		$centralmember->gender=$request->txtGender;
		$centralmember->eduction_type=$request->txtEduction_type;
		$centralmember->education_skill=$request->txtEducation_skill;
		$centralmember->occupation=$request->txtOccupation;
		$centralmember->workplace=$request->txtWorkplace;
		$centralmember->country=$request->txtCountry;


		$centralmember->division=$request->txtdivision;
		$centralmember->district=$request->txtdistrict;
		$centralmember->upazila=$request->txtupazila;
        $centralmember->union=$request->txtunion;

		$centralmember->presentadd=$request->txtPresentadd;
		$centralmember->parmanentadd=$request->txtParmanentadd;
		$centralmember->workplace_address=$request->txtWorkplace_address;
		$centralmember->relationship=$request->txtRelationship;
		$centralmember->nid=$request->txtNid;
		$centralmember->cm_photo=$request->txtPhoto;
		$centralmember->torikot_date=$request->txtTorikot_date;
		$centralmember->sobok_type=$request->txtSobok_type;
		$centralmember->brunch_id=$request->cmbBrunchId;
		$centralmember->brunch_name=$request->txtBrunch_name;
		$centralmember->baiyat_date=$request->txtBaiyat_date;
		$centralmember->donation_box_id=$request->cmbDonation_boxId;
		$centralmember->occasion=1;
		$centralmember->duty=1;
		$centralmember->deleted_at=$request->txtDeleted_at;
		$centralmember->designation=$request->txtDesignation;

		$centralmember->save();
		return back()->with('success','Created Successfully.');

	}



	public function show($id){

		$centralmember =DB::table('members')

		->join('centralmembers','members.id', '=', 'centralmembers.name')
        ->join('designations','centralmembers.designation', '=', 'designations.id')
		->where('centralmembers.id','=',$id)
		->select('members.m_name','members.m_photo','centralmembers.*','designations.name')
		->get();
		// dd($centralmember);
		// $centralmember=Centralmember::find($id);
		 return view("pages.erp.centralmember.show_centralmember",["centralmember"=>$centralmember]);
	}


	public function edit($id){
		$centralmember=Centralmember::find($id);
		return response()->json([
			'status'=>200,
			'centralmember'=>$centralmember
		]);
	}





	public function update(Request $request){
//		$centralmember->update($request->all());
		$centralmemberid=$request->input('cmbcmemId');

		$centralmember = Centralmember::find($centralmemberid);
		$centralmember->id=$request->cmbcmemId;
		$centralmember->name=$request->txtName;
		$centralmember->phone=$request->txtPhone;
		$centralmember->email=$request->txtEmail;
		$centralmember->date_birth=$request->txtDate_birth;
		$centralmember->father=$request->txtFather;
		$centralmember->mother=$request->txtMother;
		$centralmember->family_member=$request->txtFamily_member;
		$centralmember->blood_group=$request->txtBlood_group;
		$centralmember->gender=$request->txtGender;
		$centralmember->eduction_type=$request->txtEduction_type;
		$centralmember->education_skill=$request->txtEducation_skill;
		$centralmember->occupation=$request->txtOccupation;
		$centralmember->workplace=$request->txtWorkplace;
		$centralmember->country=$request->txtCountry;

        $centralmember->division=$request->txtdivision;
		$centralmember->district=$request->txtdistrict;
		$centralmember->upazila=$request->txtupazila;
        $centralmember->union=$request->txtunion;

		$centralmember->presentadd=$request->txtPresentadd;
		$centralmember->parmanentadd=$request->txtParmanentadd;
		$centralmember->workplace_address=$request->txtWorkplace_address;
		$centralmember->relationship=$request->txtRelationship;
		$centralmember->nid=$request->txtNid;
		$centralmember->cm_photo=$request->txtPhoto;
		$centralmember->torikot_date=$request->txtTorikot_date;
		$centralmember->sobok_type=$request->txtSobok_type;
		$centralmember->brunch_id=$request->cmbBrunchId;
		$centralmember->brunch_name=$request->txtBrunch_name;
		$centralmember->baiyat_date=$request->txtBaiyat_date;
		$centralmember->donation_box_id=$request->cmbDonation_boxId;
		$centralmember->occasion=1;
		$centralmember->duty=1;
		$centralmember->deleted_at=$request->txtDeleted_at;
		$centralmember->designation=$request->txtDesignation;

		$centralmember->update();
		return redirect()->route("centralmembers.index")->with('success','Updated Successfully.');

	}
	public function destroy(Request $request){

		$centralmemberid=$request->input('d_cmem');
		$centralmember= centralmember::find($centralmemberid);
		$centralmember->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}

	public function get_member_json(){
        $id=$_GET["id"];
        // $px=DB::getTablePrefix();

        $request=DB::select("select * from members where id='$id'");
         return json_encode($request[0]);
     }


	 public function cmember_list(){
		$brunchs=Brunch::all();
		 $role=Role::all();
		 $duty=Duty::all();
		 $sok=Sobok::all();
		 $occa=Occasion::all();
		 $desi=Designation::all();
         $member=Member::all();


		 $workplace=Workplace::all();
		 $cmembers =DB::table('members')
		 ->join('centralmembers','members.id', '=', 'centralmembers.name')
		 ->select('members.m_name','members.m_photo', 'centralmembers.id','centralmembers.occupation','centralmembers.email','centralmembers.phone','centralmembers.torikot_date','centralmembers.sobok_type','centralmembers.baiyat_date','centralmembers.brunch_id','centralmembers.brunch_name')
		 ->get();
		// $cmembers=Centralmember::paginate(10);
		return view("pages.erp.centralmember.c_member_table",["members"=>$member,"cmembers"=>$cmembers,"brunchs"=>$brunchs,"workplaces"=>$workplace,"roles"=>$role,"dutys"=>$duty,"soboks"=>$sok,"occasions"=>$occa,"dutys"=>$duty,"designations"=>$desi]);

    }


        public function fetchCmember(Request $request){




            $data['cmmembers']=DB::table('members')

            ->join('centralmembers','members.id', '=', 'centralmembers.name')
            ->where("cm_category",$request->cm_category)
            ->select('members.m_name','members.m_phone','members.m_photo','centralmembers.id')
            ->get();

            return response()->json($data);

        }


}
