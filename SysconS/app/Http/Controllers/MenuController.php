<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class MenuController extends Controller{



	public function index(){
		$menus=Menu::paginate(10);
		return view("pages.erp.menu.index_menu",["menus"=>$menus]);
	}



	public function create(){

		return view("pages.erp.menu.create_menu",[]);
	}



	public function store(Request $request){

		$menu=new Menu;
		$menu->m_name=$request->txtM_name;
		$menu->slag=$request->txtSlag;
		$menu->comment=$request->txtComment;
		$menu->deleted_at=$request->txtDeleted_at;

		$menu->save();
		return back()->with('success','Created Successfully.');

	}

	public function show($id){
		$smenu=Menu::find($id);
		return response()->json([
			'status'=>200,
			'smenu'=>$smenu
		]);
	}



	public function edit($id){
		$menu=Menu::find($id);
		return response()->json([
			'status'=>200,
			'menu'=>$menu
		]);
	}





	public function update(Request $request){
        $menuid=$request->input('cmbmenuId');

		$menu = Menu::find($menuid);
		$menu->id=$request->cmbmenuId;
		$menu->m_name=$request->txtM_name;
		$menu->slag=$request->txtSlag;
		$menu->comment=$request->txtComment;
		$menu->deleted_at=$request->txtDeleted_at;

		$menu->update();
		return redirect()->route("menus.index")->with('success','Updated Successfully.');

	}

	public function destroy(Request $request){

		$menuid=$request->input('d_menu');
		$menu= Menu::find($menuid);
		$menu->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
}
