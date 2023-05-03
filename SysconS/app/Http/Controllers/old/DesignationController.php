<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Designation;
use Illuminate\Http\Request;

class DesignationController extends Controller
{
    public function index(){

        $designation=Designation::all();
        return view("pages.erp.designation.index_designation",["designations"=>$designation]);
        
    }


    public function store(Request $request){

        $designation=new Designation; 
        $designation->name=$request->txtDesignation;
        $designation->deleted_at=$request->txtDeleted_at;
        $designation->save();
               
        return back()->with('success','Created Successfully.');
          
    }


    public function update(Request $request){
        $designationid=$request->input('cmbdesignationId');

		$designation = Designation::find($designationid);
		$designation->id=$request->cmbdesignationId;
        $designation->name=$request->txtDesignation;
        $designation->deleted_at=$request->txtDeleted_at;		   
        $designation->update();
        return redirect()->route("designations.index")->with('success','Updated Successfully.');
                    
    }

 
	public function show($id){
		$sdesignation=Designation::find($id);
		return response()->json([
			'status'=>200,
			'sdesignation'=>$sdesignation
		]);
	}
	public function edit($id){
		$designation=Designation::find($id);
		return response()->json([
			'status'=>200,
			'designation'=>$designation
		]);
	}



	
	public function destroy(Request $request){
		
		$designationid=$request->input('d_designation');
		$designation= Designation::find($designationid);
		$designation->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
    

}
