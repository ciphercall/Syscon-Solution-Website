<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Devcategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DevcategorieController extends Controller{

	public function index(){
		$devcategories=Devcategorie::paginate(10);
		return view("pages.erp.devcategorie.index_devcategorie",["devcategories"=>$devcategories]);
	}
	public function create(){

		return view("pages.erp.devcategorie.create_devcategorie",[]);
	}
	public function store(Request $request){

		$devcategorie=new Devcategorie;
		return  $devcategorie->dcategory=$request->txtDcategory;
		$devcategorie->commnet=$request->txtCommnet;
		$devcategorie->deleted_at=$request->txtDeleted_at;

		$devcategorie->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$devcategorie=Devcategorie::find($id);
		return view("pages.erp.devcategorie.show_devcategorie",["devcategorie"=>$devcategorie]);
	}
	public function edit(Devcategorie $devcategorie){

		return view("pages.erp.devcategorie.edit_devcategorie",["devcategorie"=>$devcategorie,]);
	}
	public function update(Request $request,Devcategorie $devcategorie){
//		$devcategorie->update($request->all());
		$devcategorie->dcategory=$request->txtDcategory;
		$devcategorie->commnet=$request->txtCommnet;
		$devcategorie->deleted_at=$request->txtDeleted_at;

		$devcategorie->update();
		return redirect()->route("devcategories.index")->with('success','Updated Successfully.');

	}
	public function destroy(Devcategorie $devcategorie){
		$devcategorie->delete();
		return redirect()->route("devcategories.index")->with('success','Deleted Successfully.');
	}
}
