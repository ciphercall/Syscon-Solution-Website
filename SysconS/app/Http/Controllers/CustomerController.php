<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;
use ImageResize;
// use App\Image;
class CustomerController extends Controller{

	public function index(){
		$customers=Customer::paginate(10);
		return view("pages.erp.customer.index_customer",["customers"=>$customers]);
	}
	public function create(){

		return view("pages.erp.customer.create_customer",[]);
	}
	public function store(Request $request){

        // $this->validate($request, [
        //     'txtC_name' => 'required',
        //     'filePhoto' => 'required|filePhoto|mimes:jpeg,png,jpg,gif,svg|max:3048',
        // ]);
		$customer=new Customer;
		$customer->c_name=$request->txtC_name;
		$customer->deg=$request->txtDeg;
		$customer->c_phone=$request->txtC_phone;
		$customer->c_email=$request->txtC_email;
		$customer->c_review=$request->txtC_review;
		$customer->status=$request->txtStatus;
		$customer->comment=$request->txtComment;
		$customer->deleted_at=$request->txtDeleted_at;
		$customer->bn_c_name=$request->txtBn_c_name;
		$customer->bn_c_deg=$request->txtBn_c_deg;
		$customer->bn_review=$request->txtBn_review;
		$customer->jp_c_name=$request->txtJp_c_name;
		$customer->jp_c_deg=$request->txtJp_c_deg;
		$customer->jp_c_review=$request->txtJp_c_review;
		$customer->status=1;

//
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
            $img = Image::make($thumbnailpath)->resize(400, 80, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }

        $customer->c_photo=$filenametostore;





		$customer->save();
		// return view("pages.erp.customer.index_customer")->with('success','Created Successfully.');
        return redirect()->route("customers.index")->with('success','Created Successfully.');
	}
	public function show($id){
		$customer=Customer::find($id);
		return view("pages.erp.customer.show_customer",["customer"=>$customer]);
	}
	public function edit(Customer $customer){

		return view("pages.erp.customer.edit_customer",["customer"=>$customer,]);
	}
	public function update(Request $request,Customer $customer){

		$customer->c_name=$request->txtC_name;
		$customer->deg=$request->txtDeg;
		$customer->c_phone=$request->txtC_phone;
		$customer->c_email=$request->txtC_email;
		$customer->c_review=$request->txtC_review;
		$customer->status=$request->txtStatus;
		$customer->comment=$request->txtComment;
		$customer->deleted_at=$request->txtDeleted_at;
		$customer->bn_c_name=$request->txtBn_c_name;
		$customer->bn_c_deg=$request->txtBn_c_deg;
		$customer->bn_review=$request->txtBn_review;
		$customer->jp_c_name=$request->txtJp_c_name;
		$customer->jp_c_deg=$request->txtJp_c_deg;
		$customer->jp_c_review=$request->txtJp_c_review;
        $customer->status=1;

        //
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
                    $img = Image::make($thumbnailpath)->resize(400, 80, function($constraint) {
                        $constraint->aspectRatio();
                    });
                    $img->save($thumbnailpath);
                    // return redirect('image')->with('success', "Image uploaded successfully.");
                }

                $customer->c_photo=$filenametostore;


		$customer->update();
		return redirect()->route("customers.index")->with('success','Updated Successfully.');

	}
	public function destroy(Customer $customer){
		$customer->delete();
		return redirect()->route("customers.index")->with('success','Deleted Successfully.');
	}
}
