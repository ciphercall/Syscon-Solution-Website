<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Branchdutie;
use App\Models\Brunch;
use App\Models\Designation;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class BranchdutieController extends Controller{

	public function index(){
        $branch=Brunch::all();
        $deg=Designation::all();

		$branchduties=Branchdutie::paginate(10);
		return view("pages.erp.branchdutie.index_branchdutie",["branchduties"=>$branchduties,"branchs"=>$branch,"degs"=>$deg]);
	}
	public function create(){
		$branchs=Branch::all();

		return view("pages.erp.branchdutie.create_branchdutie",["branchs"=>$branchs]);
	}
	public function store(Request $request){
		$branchdutie=new Branchdutie;
		$branchdutie->branch_id=$request->cmbBranchId;
		$branchdutie->branch_name=$request->txtBranch_name;
		$branchdutie->b_h_name=$request->txtB_h_name;
		$branchdutie->b_h_phone=$request->txtB_h_phone;
		$branchdutie->b_h_email=$request->txtB_h_email;
		$branchdutie->b_h_address=$request->txtB_h_address;
		$branchdutie->assign_date=$request->txtAssign_date;
		$branchdutie->designation=$request->txtdesignation;


        if(isset($request->filePhoto)){
            $branchdutie->b_h_photo=$request->filePhoto;

         }


		$branchdutie->comment=$request->txtComment;
		$branchdutie->status=$request->txtStatus;
		$branchdutie->deleted_at=$request->txtDeleted_at;

		$branchdutie->save();
    	if(isset($request->filePhoto)){
            $imageName = time().'.'.$request->filePhoto->extension();
            $branchdutie->b_h_photo=$imageName;
			$branchdutie->update();

            $request->filePhoto->move(public_path('img'),$imageName);
        }
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$sbranchdutie=Branchdutie::find($id);
		return response()->json([
			'status'=>200,
			'sbranchdutie'=>$sbranchdutie
		]);
	}

	public function edit($id){
		$branchdutie=Branchdutie::find($id);
		return response()->json([
			'status'=>200,
			'branchdutie'=>$branchdutie
		]);
	}



	public function update(Request $request){
        $branchdutieid=$request->input('cmbbhdId');

		$branchdutie = Branchdutie::find($branchdutieid);
		$branchdutie->id=$request->cmbbhdId;

		$branchdutie->branch_id=$request->cmbBranchId;
		$branchdutie->branch_name=$request->txtBranch_name;
		$branchdutie->b_h_name=$request->txtB_h_name;
		$branchdutie->b_h_phone=$request->txtB_h_phone;
		$branchdutie->b_h_email=$request->txtB_h_email;
		$branchdutie->b_h_address=$request->txtB_h_address;
		$branchdutie->assign_date=$request->txtAssign_date;

		$branchdutie->designation=$request->txtdesignation;

        if(isset($request->filePhoto)){
            $branchdutie->b_h_photo=$request->filePhoto;

         }

		$branchdutie->comment=$request->txtComment;
		$branchdutie->status=$request->txtStatus;
		$branchdutie->deleted_at=$request->txtDeleted_at;

        if(isset($request->filePhoto)){
            $imageName = time().'.'.$request->filePhoto->extension();
            $branchdutie->b_h_photo=$imageName;
            $request->filePhoto->move(public_path('img'),$imageName);
        }
		$branchdutie->update();
		return redirect()->route("branchduties.index")->with('success','Updated Successfully.');

	}


    public function destroy(Request $request){

		$branchdutieid=$request->input('d_bhd');
		$branchdutie= Branchdutie::find($branchdutieid);
		$branchdutie->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}

}
