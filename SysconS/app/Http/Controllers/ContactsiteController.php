<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Contactsite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ContactsiteController extends Controller{

	public function index(){
		$contactsites=Contactsite::paginate(10);
		return view("pages.erp.contactsite.index_contactsite",["contactsites"=>$contactsites]);
	}
	public function create(){

		return view("pages.erp.contactsite.create_contactsite",[]);
	}
	public function store(Request $request){
//		Contactsite::create($request->all());
		$contactsite=new Contactsite;
		$contactsite->c_name=$request->txtC_name;
		$contactsite->c_email=$request->txtC_email;
		$contactsite->c_details=$request->txtC_details;
		$contactsite->comment=$request->txtComment;
		$contactsite->deleted_at=$request->txtDeleted_at;

		$contactsite->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$contactsite=Contactsite::find($id);
		return view("pages.erp.contactsite.show_contactsite",["contactsite"=>$contactsite]);
	}
	public function edit(Contactsite $contactsite){

		return view("pages.erp.contactsite.edit_contactsite",["contactsite"=>$contactsite,]);
	}
	public function update(Request $request,Contactsite $contactsite){
//		$contactsite->update($request->all());
		$contactsite->c_name=$request->txtC_name;
		$contactsite->c_email=$request->txtC_email;
		$contactsite->c_details=$request->txtC_details;
		$contactsite->comment=$request->txtComment;
		$contactsite->deleted_at=$request->txtDeleted_at;

		$contactsite->update();
		return redirect()->route("contactsites.index")->with('success','Updated Successfully.');

	}
	public function destroy(Contactsite $contactsite){
		$contactsite->delete();
		return redirect()->route("contactsites.index")->with('success','Deleted Successfully.');
	}


}
