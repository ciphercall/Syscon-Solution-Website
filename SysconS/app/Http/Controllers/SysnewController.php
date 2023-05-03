<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Sysnew;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class SysnewController extends Controller{

	public function index(){
		$sysnews=Sysnew::paginate(10);
		return view("pages.erp.sysnew.index_sysnew",["sysnews"=>$sysnews]);
	}
	public function create(){

		return view("pages.erp.sysnew.create_sysnew",[]);
	}
	public function store(Request $request){
//		Sysnew::create($request->all());
		$sysnew=new Sysnew;
		$sysnew->en_news_h=$request->txtEn_news_h;
		$sysnew->bn_news_h=$request->txtBn_news_h;
		$sysnew->jp_news_h=$request->txtJp_news_h;
		$sysnew->en_news_d=$request->txtEn_news_d;
		$sysnew->bn_news_d=$request->txtBn_news_d;
		$sysnew->jp_news_d=$request->txtJp_news_d;
		$sysnew->news_date=$request->txtNews_date;
		$sysnew->n_tag=$request->txtN_tag;
		$sysnew->news_category=$request->txtNews_category;
		$sysnew->n_b_photo=$request->txtN_b_photo;
		$sysnew->n_h_photo=$request->txtN_h_photo;
		$sysnew->pho_alt_text=$request->txtPho_alt_text;
		$sysnew->deleted_at=$request->txtDeleted_at;

		$sysnew->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$sysnew=Sysnew::find($id);
		return view("pages.erp.sysnew.show_sysnew",["sysnew"=>$sysnew]);
	}
	public function edit(Sysnew $sysnew){

		return view("pages.erp.sysnew.edit_sysnew",["sysnew"=>$sysnew,]);
	}
	public function update(Request $request,Sysnew $sysnew){
//		$sysnew->update($request->all());
		$sysnew->en_news_h=$request->txtEn_news_h;
		$sysnew->bn_news_h=$request->txtBn_news_h;
		$sysnew->jp_news_h=$request->txtJp_news_h;
		$sysnew->en_news_d=$request->txtEn_news_d;
		$sysnew->bn_news_d=$request->txtBn_news_d;
		$sysnew->jp_news_d=$request->txtJp_news_d;
		$sysnew->news_date=$request->txtNews_date;
		$sysnew->n_tag=$request->txtN_tag;
		$sysnew->news_category=$request->txtNews_category;
		$sysnew->n_b_photo=$request->txtN_b_photo;
		$sysnew->n_h_photo=$request->txtN_h_photo;
		$sysnew->pho_alt_text=$request->txtPho_alt_text;
		$sysnew->deleted_at=$request->txtDeleted_at;

		$sysnew->update();
		return redirect()->route("sysnews.index")->with('success','Updated Successfully.');

	}
	public function destroy(Sysnew $sysnew){
		$sysnew->delete();
		return redirect()->route("sysnews.index")->with('success','Deleted Successfully.');
	}
}
