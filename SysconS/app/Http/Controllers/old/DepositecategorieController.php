<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Depositecategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DepositecategorieController extends Controller{

	public function index(){
		$depositecategories=Depositecategorie::paginate(10);
		return view("pages.erp.depositecategorie.index_depositecategorie",["depositecategories"=>$depositecategories]);
	}


	public function create(){

		return view("pages.erp.depositecategorie.create_depositecategorie",[]);
	}



	public function store(Request $request){
		$depositecategorie=new Depositecategorie;
		$depositecategorie->d_name=$request->txtD_name;
		$depositecategorie->comment=$request->txtComment;
		$depositecategorie->deleted_at=$request->txtDeleted_at;
		$depositecategorie->save();
		return back()->with('success','Created Successfully.');

	}



    public function show($id){
		$sdepositecategorie=Depositecategorie::find($id);
		return response()->json([
			'status'=>200,
			'sdepositecategorie'=>$sdepositecategorie
		]);
	}
	public function edit($id){
		$depositecategorie=Depositecategorie::find($id);
		return response()->json([
			'status'=>200,
			'depositecategorie'=>$depositecategorie
		]);
	}







	public function update(Request $request){
        $depositecategorieid=$request->input('cmbdepositecategorieId');

		$depositecategorie = Depositecategorie::find($depositecategorieid);
		$depositecategorie->id=$request->cmbdepositecategorieId;
		$depositecategorie->d_name=$request->txtD_name;
		$depositecategorie->comment=$request->txtComment;
		$depositecategorie->deleted_at=$request->txtDeleted_at;

		$depositecategorie->update();
		return redirect()->route("depositecategories.index")->with('success','Updated Successfully.');

	}


	public function destroy(Request $request){

		$depositecategorieid=$request->input('d_depositecategorie');
		$depositecategorie= Depositecategorie::find($depositecategorieid);
		$depositecategorie->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
}
