<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Committee;
use App\Models\Brunch;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class CommitteeController extends Controller{

	public function index(){
		$brunchs=Brunch::all();

		$committees=Committee::paginate(10);
		return view("pages.erp.committee.index_committee",["brunchs"=>$brunchs,"committees"=>$committees]);
	}
	public function create(){
		$branchs=Branch::all();

		return view("pages.erp.committee.create_committee",["branchs"=>$branchs]);
	}
	public function store(Request $request){
//		Committee::create($request->all());
		$committee=new Committee;
		$committee->branch_id=$request->cmbBranchId;
		$committee->branch_name=$request->txtBranch_name;
		$committee->appro_date=$request->txtAppro_date;
		$committee->duration=$request->txtDuration;
		$committee->status=$request->txtStatus;
		$committee->comment=$request->txtComment;

		$committee->renewal_date=$request->txtRenewal_date;
		$committee->deleted_at=$request->txtDeleted_at;

		$committee->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$scommittee=Committee::find($id);
		return response()->json([
			'status'=>200,
			'scommittee'=>$scommittee
		]);
	}

	public function edit($id){
		$committee=Committee::find($id);
		return response()->json([
			'status'=>200,
			'committee'=>$committee
		]);
	}


	public function update(Request $request){

        $committeeid=$request->input('cmbcommId');

		$committee = Committee::find($committeeid);
		$committee->id=$request->cmbcommId;
		$committee->branch_id=$request->cmbBranchId;
		$committee->branch_name=$request->txtBranch_name;
		$committee->appro_date=$request->txtAppro_date;
		$committee->duration=$request->txtDuration;
		$committee->renewal_date=$request->txtRenewal_date;
		$committee->deleted_at=$request->txtDeleted_at;
        $committee->status=$request->txtStatus;
		$committee->comment=$request->txtComment;

		$committee->update();
		return redirect()->route("committees.index")->with('success','Updated Successfully.');

	}
    public function destroy(Request $request){

		$committeeid=$request->input('d_comm');
		$committee= Committee::find($committeeid);
		$committee->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
}
