<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Duty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DutyController extends Controller{

	public function index(){

        // $duties = Duty::latest()->paginate(10);
  
        // return view('pages.erp.dutie.index_dutie',compact('duties'))
        //     ->with('i', (request()->input('page', 1) - 1) * 5);
		$dutie=Duty::paginate(10);
        // dd($dutie);
		 return view("pages.erp.dutie.index_dutie",["duties"=>$dutie]);
	}


	public function create(){

		return view("pages.erp.dutie.create_dutie",[]);
	}


	public function store(Request $request){
//		Dutie::create($request->all());
		$dutie=new Duty;
		$dutie->name=$request->txtName;
		$dutie->deleted_at=$request->txtDeleted_at;

		$dutie->save();
		return back()->with('success','Created Successfully.');
  
	}

	public function show($id){
		$sdutie=Duty::find($id);
		return response()->json([
			'status'=>200,
			'sduty'=>$sdutie
		]);
	}
	public function edit($id){
		$duty=Duty::find($id);
		return response()->json([
			'status'=>200,
			'duty'=>$duty
		]);
	}



	public function update(Request $request){
//		$dutie->update($request->all());
		$dutieid=$request->input('cmbdutyId');

		$dutie = Duty::find($dutieid);
		$dutie->id=$request->cmbdutyId;
		$dutie->name=$request->txtName;
		$dutie->deleted_at=$request->txtDeleted_at;

		$dutie->update();
		return redirect()->route("dutys.index")->with('success','Updated Successfully.');
    
	}




	
	public function destroy(Request $request){
		
		$dutieid=$request->input('d_duty');
		$dutie= Duty::find($dutieid);
		$dutie->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
}
