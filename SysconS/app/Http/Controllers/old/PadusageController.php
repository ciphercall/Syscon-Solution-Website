<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Padusage;
use App\Models\Brunch;
use App\Models\Mcategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class PadusageController extends Controller{

	public function index(){
		$padusages=Padusage::paginate(10);
		$brunchs=Brunch::all();
		$r_categorys=Mcategory::all();

		return view("pages.erp.padusage.index_padusage",["padusages"=>$padusages,"brunchs"=>$brunchs,"m_categorys"=>$r_categorys]);
	}
	public function create(){
		$brunchs=Brunch::all();

		return view("pages.erp.padusage.create_padusage",["brunchs"=>$brunchs]);
	}
	public function store(Request $request){
		$padusage=new Padusage;
		$padusage->brunch_id=$request->cmbBrunchId;
		$padusage->brunch_name=$request->txtBrunch_name;
		$padusage->date=$request->txtDate;
		$padusage->m_category=$request->txtMcategory;

		$padusage->padused_des=$request->txtPadused_des;
		$padusage->padused_page=$request->txtPadused_page;
		$padusage->stock=$request->txtStock;

		$padusage->comment=$request->txtComment;
		$padusage->deleted_at=$request->txtDeleted_at;

		$padusage->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$spadusage=Padusage::find($id);
		return response()->json([
			'status'=>200,
			'spadusage'=>$spadusage
		]);
	}
	public function edit($id){
		$padusage=Padusage::find($id);
		return response()->json([
			'status'=>200,
			'padusage'=>$padusage
		]);
	}


	public function update(Request $request){
		$padusageid=$request->input('cmbpadurId');

		$padusage = Padusage::find($padusageid);
		$padusage->id=$request->cmbpadurId;
		$padusage->brunch_id=$request->cmbBrunchId;
		$padusage->brunch_name=$request->txtBrunch_name;
		$padusage->date=$request->txtDate;
		$padusage->m_category=$request->txtMcategory;

		$padusage->padused_des=$request->txtPadused_des;
		$padusage->padused_page=$request->txtPadused_page;
		$padusage->stock=$request->txtStock;
		$padusage->comment=$request->txtComment;
		$padusage->deleted_at=$request->txtDeleted_at;

		$padusage->update();
		return redirect()->route("padusages.index")->with('success','Updated Successfully.');

	}
	public function destroy(Request $request){

		$padusageid=$request->input('d_padur');
		$padusage= Padusage::find($padusageid);
		$padusage->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
}
