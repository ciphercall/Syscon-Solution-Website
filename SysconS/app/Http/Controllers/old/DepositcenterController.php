<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Depositcenter;
use App\Models\Brunch;
use App\Models\Mcategory;
use App\Models\Depositecategorie;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DepositcenterController extends Controller{

	public function index(){
		$brunchs=Brunch::all();
		$r_categorys=Mcategory::all();
		$dpc=Depositecategorie::all();


		$depositcenters=Depositcenter::paginate(10);
		return view("pages.erp.depositcenter.index_depositcenter",["depositcenters"=>$depositcenters,"brunchs"=>$brunchs,"dpcs"=>$dpc,"m_categorys"=>$r_categorys]);
	}


	public function create(){
		$brunchs=Brunch::all();

		return view("pages.erp.depositcenter.create_depositcenter",["brunchs"=>$brunchs]);
	}


	public function store(Request $request){

		$depositcenter=new Depositcenter;
		$depositcenter->brunch_id=$request->cmbBrunchId;
		$depositcenter->brunch_name=$request->txtBrunch_name;
		$depositcenter->collection_date=$request->txtCollection_date;
		$depositcenter->m_category=$request->txtM_category;

		$depositcenter->member_name=$request->txtMember_name;
		$depositcenter->phone=$request->txtPhone;
		$depositcenter->received_amount=$request->txtReceived_amount;
		$depositcenter->purpose_catagory=$request->txtPurpose_catagory;



		$depositcenter->r_m_category=$request->txtR_m_category;

		$depositcenter->receiver_name=$request->txtReceiver_name;
		$depositcenter->money_receipt_no=$request->txtMoney_receipt_no;
		$depositcenter->acknowledgment_receipt=$request->txtAcknowledgment_receipt;
		$depositcenter->comment=$request->txtComment;
		$depositcenter->deleted_at=$request->txtDeleted_at;

		$depositcenter->save();
		return back()->with('success','Created Successfully.');

	}

	public function show($id){
		$sdepositcenter=Depositcenter::find($id);
		return response()->json([
			'status'=>200,
			'sdepositcenter'=>$sdepositcenter
		]);
	}


    public function edit($id){
		$depositcenter=Depositcenter::find($id);
		return response()->json([
			'status'=>200,
			'depositcenter'=>$depositcenter
		]);
	}



	public function update(Request $request){
		$depositcenterid=$request->input('cmbdepId');

		$depositcenter = Depositcenter::find($depositcenterid);
		$depositcenter->id=$request->cmbdepId;
		$depositcenter->brunch_id=$request->cmbBrunchId;
		$depositcenter->brunch_name=$request->txtBrunch_name;
		$depositcenter->collection_date=$request->txtCollection_date;
		$depositcenter->m_category=$request->txtM_category;

		$depositcenter->member_name=$request->txtMember_name;
		$depositcenter->phone=$request->txtPhone;
		$depositcenter->received_amount=$request->txtReceived_amount;
		$depositcenter->purpose_catagory=$request->txtPurpose_catagory;

		$depositcenter->r_m_category=$request->txtR_m_category;

		$depositcenter->receiver_name=$request->txtReceiver_name;
		$depositcenter->money_receipt_no=$request->txtMoney_receipt_no;
		$depositcenter->acknowledgment_receipt=$request->txtAcknowledgment_receipt;
		$depositcenter->comment=$request->txtComment;
		$depositcenter->deleted_at=$request->txtDeleted_at;

		$depositcenter->update();
		return redirect()->route("depositcenters.index")->with('success','Updated Successfully.');

	}


	public function destroy(Request $request){

		$depositcenterid=$request->input('d_dep');
		$depositcenter= Depositcenter::find($depositcenterid);
		$depositcenter->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
}
