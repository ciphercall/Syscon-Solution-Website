<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Project;
use App\Models\Procategorie;

use Intervention\Image\Facades\Image;
use ImageResize;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class ProjectController extends Controller{

	public function index(){
		$projects=Project::paginate(10);
		return view("pages.erp.project.index_project",["projects"=>$projects]);
	}
	public function create(){
        $procategories=Procategorie::all();

		return view("pages.erp.project.create_project",["procategories"=>$procategories]);
	}
	public function store(Request $request){
//		Project::create($request->all());
		$project=new Project;
		$project->en_p_title=$request->txtEn_p_title;
		$project->bn_p_title=$request->txtBn_p_title;
		$project->jp_p_title=$request->txtJp_p_title;
		$project->en_p_details=$request->txtEn_p_details;
		$project->bn_p_details=$request->txtBn_p_details;
		$project->jp_p_details=$request->txtJp_p_details;
		$project->p_category=$request->txtP_category;

		$project->alt_text=$request->txtAlt_text;
		$project->p_tag=$request->txtP_tag;
		$project->client=$request->txtClient;
		$project->p_date=$request->txtP_date;
		$project->p_url=$request->txtP_url;
		$project->p_facility=$request->txtP_facility;


        if($request->hasFile('txtP_b_photo')) {
            //get filename with extension
            $filenamewithextension = $request->file('txtP_b_photo')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('txtP_b_photo')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('txtP_b_photo')->storeAs('public/filePhoto', $filenametostore);
            $request->file('txtP_b_photo')->storeAs('public/filePhoto/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/filePhoto/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(700, 440, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }

        // $project->p_b_photo=$request->txtP_b_photo;


		$project->p_b_photo=$filenametostore;

        if($request->hasFile('txtP_h_photo')) {
            //get filename with extension
            $filenamewithextension = $request->file('txtP_h_photo')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('txtP_h_photo')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('txtP_h_photo')->storeAs('public/filePhoto', $filenametostore);
            $request->file('txtP_h_photo')->storeAs('public/filePhoto/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/filePhoto/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(700, 440, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }

        // $project->p_h_photo=$request->txtP_h_photo;
		$project->p_h_photo=$filenametostore;
		$project->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$project=Project::find($id);
		return view("pages.erp.project.show_project",["project"=>$project]);
	}
	public function edit(Project $project){

		return view("pages.erp.project.edit_project",["project"=>$project,]);
	}
	public function update(Request $request,Project $project){
//		$project->update($request->all());
		$project->en_p_title=$request->txtEn_p_title;
		$project->bn_p_title=$request->txtBn_p_title;
		$project->jp_p_title=$request->txtJp_p_title;
		$project->en_p_details=$request->txtEn_p_details;
		$project->bn_p_details=$request->txtBn_p_details;
		$project->jp_p_details=$request->txtJp_p_details;
		$project->p_category=$request->txtP_category;
		// $project->p_b_photo=$request->txtP_b_photo;
		// $project->p_h_photo=$request->txtP_h_photo;
		$project->alt_text=$request->txtAlt_text;
		$project->p_tag=$request->txtP_tag;
		$project->client=$request->txtClient;
		$project->p_date=$request->txtP_date;
		$project->p_url=$request->txtP_url;
		$project->p_facility=$request->txtP_facility;


        if($request->hasFile('txtP_b_photo')) {
            //get filename with extension
            $filenamewithextension = $request->file('txtP_b_photo')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('txtP_b_photo')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('txtP_b_photo')->storeAs('public/filePhoto', $filenametostore);
            $request->file('txtP_b_photo')->storeAs('public/filePhoto/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/filePhoto/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(700, 440, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }

        // $project->p_b_photo=$request->txtP_b_photo;


		$project->p_b_photo=$filenametostore;

        if($request->hasFile('txtP_h_photo')) {
            //get filename with extension
            $filenamewithextension = $request->file('txtP_h_photo')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('txtP_h_photo')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('txtP_h_photo')->storeAs('public/filePhoto', $filenametostore);
            $request->file('txtP_h_photo')->storeAs('public/filePhoto/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/filePhoto/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(700, 440, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }

        // $project->p_h_photo=$request->txtP_h_photo;
		$project->p_h_photo=$filenametostore;

		$project->update();
		return redirect()->route("projects.index")->with('success','Updated Successfully.');

	}
	public function destroy(Project $project){
		$project->delete();
		return redirect()->route("projects.index")->with('success','Deleted Successfully.');
	}
}
