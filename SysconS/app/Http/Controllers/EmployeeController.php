<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Employee;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;
use ImageResize;

class EmployeeController extends Controller{

	public function index(){
		$employees=Employee::paginate(10);
		return view("pages.erp.employee.index_employee",["employees"=>$employees]);
	}
	public function create(){


		return view("pages.erp.employee.create_employee");
	}
	public function store(Request $request){

		$employee=new Employee;
		$employee->e_name=$request->txtE_name;
		$employee->deg=$request->txtDeg;
		$employee->it_background=$request->txtIt_background;
		$employee->fb_link=$request->txtFb_link;
		$employee->linkdin_link=$request->txtLinkdin_link;
		$employee->instagram_link=$request->txtInstagram_link;
		$employee->twitter_link=$request->txtTwitter_link;
		$employee->status=1;
		$employee->emp_id=$request->cmbEmpId;
		$employee->deleted_at=$request->txtDeleted_at;


        //  run composer require intervention/image
        if($request->hasFile('filePhoto')) {
            //get filename with extension
            $filenamewithextension = $request->file('filePhoto')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('filePhoto')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('filePhoto')->storeAs('public/filePhoto', $filenametostore);
            $request->file('filePhoto')->storeAs('public/filePhoto/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/filePhoto/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(450, 280, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }


		$employee->e_photo=$filenametostore;

		$employee->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$employee=Employee::find($id);
		return view("pages.erp.employee.show_employee",["employee"=>$employee]);
	}
	public function edit(Employee $employee){
		$emps=Emp::all();

		return view("pages.erp.employee.edit_employee",["employee"=>$employee,"emps"=>$emps]);
	}
	public function update(Request $request,Employee $employee){
//		$employee->update($request->all());
		$employee->e_name=$request->txtE_name;
		$employee->deg=$request->txtDeg;
		$employee->it_background=$request->txtIt_background;
		$employee->e_photo=$request->txtE_photo;
		$employee->fb_link=$request->txtFb_link;
		$employee->linkdin_link=$request->txtLinkdin_link;
		$employee->instagram_link=$request->txtInstagram_link;
		$employee->twitter_link=$request->txtTwitter_link;
		$employee->status=$request->txtStatus;
		$employee->emp_id=$request->cmbEmpId;
		$employee->deleted_at=$request->txtDeleted_at;

		$employee->update();
		return redirect()->route("employees.index")->with('success','Updated Successfully.');

	}
	public function destroy(Employee $employee){
		$employee->delete();
		return redirect()->route("employees.index")->with('success','Deleted Successfully.');
	}
}
