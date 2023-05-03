<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Newscategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class NewscategorieController extends Controller{

	public function index(){
		$newscategories=Newscategorie::paginate(10);
		return view("pages.erp.newscategorie.index_newscategorie",["newscategories"=>$newscategories]);
	}
	public function create(){

		return view("pages.erp.newscategorie.create_newscategorie",[]);
	}
	public function store(Request $request){
//		Newscategorie::create($request->all());
		$newscategorie=new Newscategorie;
		$newscategorie->news_category_name=$request->txtNews_category_name;
		$newscategorie->deleted_at=$request->txtDeleted_at;

		$newscategorie->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$newscategorie=Newscategorie::find($id);
		return view("pages.erp.newscategorie.show_newscategorie",["newscategorie"=>$newscategorie]);
	}
	public function edit(Newscategorie $newscategorie){

		return view("pages.erp.newscategorie.edit_newscategorie",["newscategorie"=>$newscategorie,]);
	}
	public function update(Request $request,Newscategorie $newscategorie){
//		$newscategorie->update($request->all());
		$newscategorie->news_category_name=$request->txtNews_category_name;
		$newscategorie->deleted_at=$request->txtDeleted_at;

		$newscategorie->update();
		return redirect()->route("newscategories.index")->with('success','Updated Successfully.');

	}
	public function destroy(Newscategorie $newscategorie){
		$newscategorie->delete();
		return redirect()->route("newscategories.index")->with('success','Deleted Successfully.');
	}
}
