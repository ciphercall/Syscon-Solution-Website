<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Workedbrand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;
use ImageResize;
class WorkedbrandController extends Controller{

	public function index(){
		$workedbrands=Workedbrand::paginate(10);
		return view("pages.erp.workedbrand.index_workedbrand",["workedbrands"=>$workedbrands]);
	}
	public function create(){

		return view("pages.erp.workedbrand.create_workedbrand",[]);
	}
	public function store(Request $request){
		$workedbrand=new Workedbrand;
		$workedbrand->w_brand_name=$request->txtW_brand_name;
		$workedbrand->work_details=$request->txtWork_details;
		$workedbrand->bn_w_brand_name=$request->txtBn_w_brand_name;
		$workedbrand->jp_w_brand_name=$request->txtJp_w_brand_name;
		$workedbrand->bn_work_details=$request->txtBn_work_details;
		$workedbrand->jp_work_details=$request->txtJp_work_details;
		$workedbrand->comment=$request->txtComment;
		$workedbrand->deleted_at=$request->txtDeleted_at;

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
            $request->file('filePhoto')->storeAs('public/filePhoto/b_logo', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/filePhoto/b_logo/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 180, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }


		$workedbrand->b_logo=$filenametostore;


		$workedbrand->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$workedbrand=Workedbrand::find($id);
		return view("pages.erp.workedbrand.show_workedbrand",["workedbrand"=>$workedbrand]);
	}
	public function edit(Workedbrand $workedbrand){

		return view("pages.erp.workedbrand.edit_workedbrand",["workedbrand"=>$workedbrand,]);
	}
	public function update(Request $request,Workedbrand $workedbrand){
//		$workedbrand->update($request->all());
		$workedbrand->w_brand_name=$request->txtW_brand_name;
		$workedbrand->work_details=$request->txtWork_details;
		$workedbrand->bn_w_brand_name=$request->txtBn_w_brand_name;
		$workedbrand->jp_w_brand_name=$request->txtJp_w_brand_name;
		$workedbrand->bn_work_details=$request->txtBn_work_details;
		$workedbrand->jp_work_details=$request->txtJp_work_details;

		$workedbrand->comment=$request->txtComment;
		$workedbrand->deleted_at=$request->txtDeleted_at;

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
            $request->file('filePhoto')->storeAs('public/filePhoto/b_logo', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/filePhoto/b_logo/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(23, 18, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }


		$workedbrand->b_logo=$filenametostore;
		$workedbrand->update();
		return redirect()->route("workedbrands.index")->with('success','Updated Successfully.');

	}
	public function destroy(Workedbrand $workedbrand){
		$workedbrand->delete();
		return redirect()->route("workedbrands.index")->with('success','Deleted Successfully.');
	}
}
