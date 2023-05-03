<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Complexpromise;
use App\Models\Brunch;
use App\Models\Mcategory;
use App\Models\Designation ;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ComplexpromiseController extends Controller{

	public function index(){
		$brunchs=Brunch::all();
		$m_categorys=Mcategory::all();
        $desi=Designation::all();


		$complexpromises=Complexpromise::paginate(10);
		return view("pages.erp.complexpromise.index_complexpromise",["complexpromises"=>$complexpromises,"brunchs"=>$brunchs,"m_categorys"=>$m_categorys,"desis"=>$desi]);
	}
	public function create(){
		$brunchs=Brunch::all();

		return view("pages.erp.complexpromise.create_complexpromise",["brunchs"=>$brunchs]);
	}
	public function store(Request $request){
//		Complexpromise::create($request->all());
		$complexpromise=new Complexpromise;
		$complexpromise->brunch_id=$request->cmbBrunchId;
		$complexpromise->brunch_name=$request->txtBrunch_name;
		$complexpromise->date=$request->txtDate;
		$complexpromise->m_category=$request->txtm_category;

		$complexpromise->cp_name=$request->txtCp_name;
		$complexpromise->deg=$request->txtDeg;
		$complexpromise->promise=$request->txtPromise;
		$complexpromise->paid=$request->txtPaid;
		$complexpromise->comment=$request->txtComment;
		$complexpromise->deleted_at=$request->txtDeleted_at;

		$complexpromise->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$scomplexpromise=Complexpromise::find($id);
		return response()->json([
			'status'=>200,
			'scomplexpromise'=>$scomplexpromise
		]);
	}
	public function edit($id){
		$complexpromise=Complexpromise::find($id);
		return response()->json([
			'status'=>200,
			'complexpromise'=>$complexpromise
		]);
	}

	public function update(Request $request,Complexpromise $complexpromise){
//		$complexpromise->update($request->all());
$complexpromiseid=$request->input('cmbcompId');

		$complexpromise = Complexpromise::find($complexpromiseid);
		$complexpromise->id=$request->cmbcompId;
		$complexpromise->brunch_id=$request->cmbBrunchId;
		$complexpromise->brunch_name=$request->txtBrunch_name;
		$complexpromise->date=$request->txtDate;
		$complexpromise->m_category=$request->txtm_category;

		$complexpromise->cp_name=$request->txtCp_name;
		$complexpromise->deg=$request->txtDeg;
		$complexpromise->promise=$request->txtPromise;
		$complexpromise->paid=$request->txtPaid;
		$complexpromise->comment=$request->txtComment;
		$complexpromise->deleted_at=$request->txtDeleted_at;

		$complexpromise->update();
		return redirect()->route("complexpromises.index")->with('success','Updated Successfully.');

	}



	public function destroy(Request $request){

		$complexpromiseid=$request->input('d_complexpromise');
		$complexpromise= Complexpromise::find($complexpromiseid);
		$complexpromise->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
}
