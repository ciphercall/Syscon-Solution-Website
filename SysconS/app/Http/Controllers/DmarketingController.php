<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Dmarketing;
use App\Models\Dmsubcategorie;
use App\Models\Dmcategorie;
use Intervention\Image\Facades\Image;
use ImageResize;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class DmarketingController extends Controller{

	public function index(){
        $dmsubcategories=Dmsubcategorie::all();
		$dmcategories=Dmcategorie::all();

		$dmarketings=Dmarketing::paginate(10);
		return view("pages.erp.dmarketing.index_dmarketing",["dmarketings"=>$dmarketings,"dmcs"=>$dmcategories,"dmscs"=>$dmsubcategories]);
	}
	public function create(){
		$dmsubcategories=Dmsubcategorie::all();
		$dmcategories=Dmcategorie::all();


		return view("pages.erp.dmarketing.create_dmarketing",["dmcs"=>$dmcategories,"dmscs"=>$dmsubcategories]);
	}
	public function store(Request $request){
		$dmarketing=new Dmarketing;
		$dmarketing->en_page_title=$request->txtEn_page_title;
		$dmarketing->bn_page_title=$request->txtBn_page_title;
		$dmarketing->jp_page_title=$request->txtJp_page_title;
		$dmarketing->en_page_details=$request->txtEn_page_details;
		$dmarketing->bn_page_details=$request->txtBn_page_details;
		$dmarketing->jp_page_details=$request->txtJp_page_details;
		// $dmarketing->page_bg_photo=$request->txtPage_bg_photo;
		$dmarketing->dev_faq=$request->txtDev_faq;
		$dmarketing->dev_faq_bn=$request->txtDev_tag_bn;
		$dmarketing->dev_faq_jp=$request->txtDev_tag_jp;

		$dmarketing->dev_tag=$request->txtDev_tag;
		// $dmarketing->dev_tag_bn=$request->txtDev_tag_bn;
		// $dmarketing->dev_tag_jp=$request->txtDev_tag_jp;

		$dmarketing->page_url=$request->txtPage_url;
		$dmarketing->en_sevice_fea=$request->txtEn_sevice_fea;
		$dmarketing->bn_sevice_fea=$request->txtBn_sevice_fea;
		$dmarketing->jp_sevice_fea=$request->txtJp_sevice_fea;
		$dmarketing->en_sevice_f_d=$request->txtEn_sevice_f_d;
		$dmarketing->bn_sevice_f_d=$request->txtBn_sevice_f_d;
		$dmarketing->jp_sevice_f_d=$request->txtJp_sevice_f_d;
		// $dmarketing->sevice_f_photo=$request->txtSevice_f_photo;
		$dmarketing->status=$request->txtStatus;
		$dmarketing->deleted_at=$request->txtDeleted_at;
		$dmarketing->dc_id=$request->cmbDcId;
		$dmarketing->dsc_id=$request->cmbDscId;
		$dmarketing->benefits_text=$request->txtBenefits_text;
		$dmarketing->benefits_text_bn=$request->txtBenefits_text_bn;
		$dmarketing->benefits_text_jp=$request->txtBenefits_text_jp;

        // id, en_page_title, bn_page_title, jp_page_title, en_page_details, bn_page_details, jp_page_details, page_bg_photo, dev_faq, dev_tag, page_url, en_sevice_fea, bn_sevice_fea, jp_sevice_fea, en_sevice_f_d, bn_sevice_f_d, jp_sevice_f_d, sevice_f_photo, status, created_at, updated_at, deleted_at, dc_id, dsc_id, benefits_text, benefits_text_bn, benefits_text_jp, dev_faq_bn, dev_faq_jp
          //  run composer require intervention/image
          if($request->hasFile('txtSevice_f_photo')) {
    
            $image = $request->file('txtSevice_f_photo');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $txtSevice_f_photo =$filename.'_'.time() . '.' . $extension;
            $thumbnailPath = public_path('../public/storage/filePhoto/thumbnail');
            $fullsize = public_path('../public/storage/filePhoto/');

            $img = Image::make($image->path());

            $img->resize(400, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnailPath . '/' . $txtSevice_f_photo);

            $img->resize(700, 440, function ($constraint) {
                $constraint->aspectRatio();
            })->save($fullsize . '/' . $txtSevice_f_photo);

            $image->move($fullsize, $txtSevice_f_photo);
        }

        // 		$dmarketing->page_bg_photo=$request->txtPage_bg_photo;

		$dmarketing->sevice_f_photo=$txtSevice_f_photo;


        // ///////////////////////////////////
         //  run composer require intervention/image
         if($request->hasFile('txtPage_bg_photo')) {
            $image = $request->file('txtPage_bg_photo');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $txtPage_bg_photo = $filename.'_'.time() . '.' . $extension;
            $thumbnailPath = public_path('../public/storage/filePhoto/thumbnail');
            $fullsize = public_path('../public/storage/filePhoto/');

            $img = Image::make($image->path());

            $img->resize(400, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnailPath . '/' . $txtPage_bg_photo);

            $img->resize(700, 440, function ($constraint) {
                $constraint->aspectRatio();
            })->save($fullsize . '/' . $txtPage_bg_photo);

            $image->move($fullsize, $txtPage_bg_photo);
        }

        // $dmarketing->page_bg_photo=$request->txtPage_bg_photo;
		$dmarketing->page_bg_photo=$txtPage_bg_photo;

		$dmarketing->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$dmarketing=Dmarketing::find($id);
		return view("pages.erp.dmarketing.show_dmarketing",["dmarketing"=>$dmarketing]);
	}
	public function edit(Dmarketing $dmarketing){
		// $dcs=Dc::all();
		// $dscs=Dsc::all();

		// return view("pages.erp.dmarketing.edit_dmarketing",["dmarketing"=>$dmarketing,"dcs"=>$dcs,"dscs"=>$dscs]);
	}
	public function update(Request $request,Dmarketing $dmarketing){
		$dmarketing->en_page_title=$request->txtEn_page_title;
		$dmarketing->bn_page_title=$request->txtBn_page_title;
		$dmarketing->jp_page_title=$request->txtJp_page_title;
		$dmarketing->en_page_details=$request->txtEn_page_details;
		$dmarketing->bn_page_details=$request->txtBn_page_details;
		$dmarketing->jp_page_details=$request->txtJp_page_details;
		$dmarketing->dev_faq=$request->txtDev_faq;
		$dmarketing->dev_tag=$request->txtDev_tag;
		$dmarketing->page_url=$request->txtPage_url;
		$dmarketing->en_sevice_fea=$request->txtEn_sevice_fea;
		$dmarketing->bn_sevice_fea=$request->txtBn_sevice_fea;
		$dmarketing->jp_sevice_fea=$request->txtJp_sevice_fea;
		$dmarketing->en_sevice_f_d=$request->txtEn_sevice_f_d;
		$dmarketing->bn_sevice_f_d=$request->txtBn_sevice_f_d;
		$dmarketing->jp_sevice_f_d=$request->txtJp_sevice_f_d;
		$dmarketing->status=$request->txtStatus;
        $dmarketing->deleted_at=$request->txtDeleted_at;

		$dmarketing->dc_id=$request->cmbDcId;
		$dmarketing->dsc_id=$request->cmbDscId;
		$dmarketing->benefits_text=$request->txtBenefits_text;

         //  run composer require intervention/image
         if($request->hasFile('txtSevice_f_photo')) {
            //get filename with extension
            $filenamewithextension = $request->file('txtSevice_f_photo')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('txtSevice_f_photo')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('txtSevice_f_photo')->storeAs('public/filePhoto', $filenametostore);
            $request->file('txtSevice_f_photo')->storeAs('public/filePhoto/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/filePhoto/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(700, 440, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }

        // 		$dmarketing->page_bg_photo=$request->txtPage_bg_photo;

		$dmarketing->sevice_f_photo=$filenametostore;


        // ///////////////////////////////////
         //  run composer require intervention/image
         if($request->hasFile('txtPage_bg_photo')) {
            //get filename with extension
            $filenamewithextension = $request->file('txtPage_bg_photo')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('txtPage_bg_photo')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;

            //Upload File
            $request->file('txtPage_bg_photo')->storeAs('public/filePhoto', $filenametostore);
            $request->file('txtPage_bg_photo')->storeAs('public/filePhoto/thumbnail', $filenametostore);

            //Resize image here
            $thumbnailpath = public_path('storage/filePhoto/thumbnail/'.$filenametostore);
            $img = Image::make($thumbnailpath)->resize(400, 80, function($constraint) {
                $constraint->aspectRatio();
            });
            $img->save($thumbnailpath);
            // return redirect('image')->with('success', "Image uploaded successfully.");
        }

        // $dmarketing->page_bg_photo=$request->txtPage_bg_photo;
		$dmarketing->page_bg_photo=$filenametostore;

		$dmarketing->update();
		return redirect()->route("dmarketings.index")->with('success','Updated Successfully.');

	}
	public function destroy(Dmarketing $dmarketing){
		$dmarketing->delete();
		return redirect()->route("dmarketings.index")->with('success','Deleted Successfully.');
	}
}
