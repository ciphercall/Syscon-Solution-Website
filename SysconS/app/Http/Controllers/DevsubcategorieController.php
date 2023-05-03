<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Devsubcategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Devcategorie;

class DevsubcategorieController extends Controller{

	public function index(){
		$devsubcategories=Devsubcategorie::all();
		return view("pages.erp.devsubcategorie.index_devsubcategorie",["devsubcategories"=>$devsubcategories]);
	}
	public function create(){
		$devcategories=Devcategorie::paginate(10);

		return view("pages.erp.devsubcategorie.create_devsubcategorie",["devcategories"=>$devcategories]);
	}
	public function store(Request $request){
//		Devsubcategorie::create($request->all());
		$devsubcategorie=new Devsubcategorie;
		$devsubcategorie->devsubcategory=$request->txtDevsubcategory;
		$devsubcategorie->category=$request->txtCategory;
		$devsubcategorie->p_url=$request->txtP_url;

		$devsubcategorie->comment=$request->txtComment;
		$devsubcategorie->deleted_at=$request->txtDeleted_at;

		$devsubcategorie->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$devsubcategorie=Devsubcategorie::find($id);
		return view("pages.erp.devsubcategorie.show_devsubcategorie",["devsubcategorie"=>$devsubcategorie]);
	}
	public function edit(Devsubcategorie $devsubcategorie){

		return view("pages.erp.devsubcategorie.edit_devsubcategorie",["devsubcategorie"=>$devsubcategorie,]);
	}
	public function update(Request $request,Devsubcategorie $devsubcategorie){
//		$devsubcategorie->update($request->all());
        $devsubcategorie->devsubcategory=$request->txtDevsubcategory;
        $devsubcategorie->category=$request->txtCategory;
        $devsubcategorie->p_url=$request->txtP_url;

        $devsubcategorie->comment=$request->txtComment;
        $devsubcategorie->deleted_at=$request->txtDeleted_at;

		$devsubcategorie->update();
		return redirect()->route("devsubcategories.index")->with('success','Updated Successfully.');

	}
	public function destroy(Devsubcategorie $devsubcategorie){
		 $devsubcategorie->delete();
	     return redirect()->route("devsubcategories.index")->with('success','Deleted Successfully.');
	}
}
