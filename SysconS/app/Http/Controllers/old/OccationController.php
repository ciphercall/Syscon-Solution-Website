<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Occation;
use Illuminate\Http\Request;

class OccationController extends Controller
{
    public function index(){
        $occation=Occation::all();
    //   dd($occation);
         return view("pages.erp.occation.index_occation",["occations"=>$occation]);
        // return view("pages.erp.occation.index_occation");

    }

    public function store(Request $request){
        //		Member::create($request->all());
        $occation=new Occation;
        $occation->name=$request->txtOccasion;
        $occation->deleted_at=$request->txtDeleted_at;
        $occation->save();

        return back()->with('success','Created Successfully.');

    }


    public function show($id){
		$soccation=Occation::find($id);
		return response()->json([
			'status'=>200,
			'soccation'=>$soccation
		]);
	}
	public function edit($id){
		$occation=Occation::find($id);
		return response()->json([
			'status'=>200,
			'occation'=>$occation
		]);
	}



    public function update(Request $request){
        $occationid=$request->input('cmboccationId');

		$occation = Occation::find($occationid);
		$occation->id=$request->cmboccationId;
        $occation->name=$request->txtName;
        $occation->deleted_at=$request->txtDeleted_at;
        $occation->update();
        return redirect()->route("occations.index")->with('success','Updated Successfully.');

    }



	public function destroy(Request $request){

		$occationid=$request->input('d_occation');
		$occation= Occation::find($occationid);
		$occation->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}

}
