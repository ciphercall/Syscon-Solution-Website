<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Dmsubcategorie;
use App\Models\Dmcategorie;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DmsubcategorieController extends Controller{

	public function index(){
		$dmsubcategories=Dmsubcategorie::paginate(20);
		return view("pages.erp.dmsubcategorie.index_dmsubcategorie",["dmsubcategories"=>$dmsubcategories]);
	}
	public function create(){
		$dmcategories=Dmcategorie::all();

		return view("pages.erp.dmsubcategorie.create_dmsubcategorie",["dmcategories"=>$dmcategories]);
	}
	public function store(Request $request){
		$dmsubcategorie=new Dmsubcategorie;
		$dmsubcategorie->dmsubcategory=$request->txtDmsubcategory;
		$dmsubcategorie->category=$request->txtCategory;
		$dmsubcategorie->d_url=$request->txtD_url;

		$dmsubcategorie->comment=$request->txtComment;
		$dmsubcategorie->deleted_at=$request->txtDeleted_at;

		$dmsubcategorie->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$dmsubcategorie=Dmsubcategorie::find($id);
		return view("pages.erp.dmsubcategorie.show_dmsubcategorie",["dmsubcategorie"=>$dmsubcategorie]);
	}
	public function edit(Dmsubcategorie $dmsubcategorie){

		return view("pages.erp.dmsubcategorie.edit_dmsubcategorie",["dmsubcategorie"=>$dmsubcategorie,]);
	}
	public function update(Request $request,Dmsubcategorie $dmsubcategorie){
		$dmsubcategorie->dmsubcategory=$request->txtDmsubcategory;
		$dmsubcategorie->category=$request->txtCategory;
		$dmsubcategorie->comment=$request->txtComment;
		$dmsubcategorie->deleted_at=$request->txtDeleted_at;
		$dmsubcategorie->d_url=$request->txtD_url;

		$dmsubcategorie->update();
		return redirect()->route("dmsubcategories.index")->with('success','Updated Successfully.');

	}
	public function destroy(Dmsubcategorie $dmsubcategorie){
		$dmsubcategorie->delete();
		return redirect()->route("dmsubcategories.index")->with('success','Deleted Successfully.');
	}
}
