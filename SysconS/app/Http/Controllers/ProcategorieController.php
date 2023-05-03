<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Procategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProcategorieController extends Controller{

	public function index(){
		$procategories=Procategorie::paginate(10);
		return view("pages.erp.procategorie.index_procategorie",["procategories"=>$procategories]);
	}
	public function create(){

		return view("pages.erp.procategorie.create_procategorie",[]);
	}
	public function store(Request $request){
		$procategorie=new Procategorie;
		$procategorie->p_name=$request->txtP_name;
		$procategorie->p_url=$request->txtP_url;
		$procategorie->comment=$request->txtComment;
		$procategorie->deleted_at=$request->txtDeleted_at;

		$procategorie->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$procategorie=Procategorie::find($id);
		return view("pages.erp.procategorie.show_procategorie",["procategorie"=>$procategorie]);
	}
	public function edit(Procategorie $procategorie){

		return view("pages.erp.procategorie.edit_procategorie",["procategorie"=>$procategorie,]);
	}
	public function update(Request $request,Procategorie $procategorie){
//		$procategorie->update($request->all());
		$procategorie->p_name=$request->txtP_name;
		$procategorie->p_url=$request->txtP_url;
		$procategorie->comment=$request->txtComment;
		$procategorie->deleted_at=$request->txtDeleted_at;

		$procategorie->update();
		return redirect()->route("procategories.index")->with('success','Updated Successfully.');

	}
	public function destroy(Procategorie $procategorie){
		$procategorie->delete();
		return redirect()->route("procategories.index")->with('success','Deleted Successfully.');
	}
}
