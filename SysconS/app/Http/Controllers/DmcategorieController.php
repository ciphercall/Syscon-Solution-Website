<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Dmcategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DmcategorieController extends Controller{

	public function index(){
		$dmcategories=Dmcategorie::paginate(10);
		return view("pages.erp.dmcategorie.index_dmcategorie",["dmcategories"=>$dmcategories]);
	}
	public function create(){

		return view("pages.erp.dmcategorie.create_dmcategorie",[]);
	}
	public function store(Request $request){
		$dmcategorie=new Dmcategorie;
		$dmcategorie->dmcategory=$request->txtDmcategory;
		$dmcategorie->commnet=$request->txtCommnet;
		$dmcategorie->deleted_at=$request->txtDeleted_at;

		$dmcategorie->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$dmcategorie=Dmcategorie::find($id);
		return view("pages.erp.dmcategorie.show_dmcategorie",["dmcategorie"=>$dmcategorie]);
	}
	public function edit(Dmcategorie $dmcategorie){

		return view("pages.erp.dmcategorie.edit_dmcategorie",["dmcategorie"=>$dmcategorie,]);
	}
	public function update(Request $request,Dmcategorie $dmcategorie){
//		$dmcategorie->update($request->all());
		$dmcategorie->dmcategory=$request->txtDmcategory;
		$dmcategorie->commnet=$request->txtCommnet;
		$dmcategorie->deleted_at=$request->txtDeleted_at;

		$dmcategorie->update();
		return redirect()->route("dmcategories.index")->with('success','Updated Successfully.');

	}
	public function destroy(Dmcategorie $dmcategorie){
		$dmcategorie->delete();
		return redirect()->route("dmcategories.index")->with('success','Deleted Successfully.');
	}
}
