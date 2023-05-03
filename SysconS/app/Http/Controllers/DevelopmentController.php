<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Development;
use App\Models\Devcategorie;
use App\Models\Devsubcategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Intervention\Image\Facades\Image;
use ImageResize;

class DevelopmentController extends Controller{

	public function index(){
		$developments=Development::paginate(10);
		return view("pages.erp.development.index_development",["developments"=>$developments]);
	}
	public function create(){
		$dcs=Devcategorie::all();
		$dscs=Devsubcategorie::all();

		return view("pages.erp.development.create_development",["dcs"=>$dcs,"dscs"=>$dscs]);
	}
	public function store(Request $request){
//		Development::create($request->all());
		$development=new Development;
		$development->en_page_title=$request->txtEn_page_title;
		$development->bn_page_title=$request->txtBn_page_title;
		$development->jp_page_title=$request->txtJp_page_title;
		$development->en_page_details=$request->txtEn_page_details;
		$development->bn_page_details=$request->txtBn_page_details;
		$development->jp_page_details=$request->txtJp_page_details;
		$development->dev_tag=$request->txtDev_tag;
		$development->page_url=$request->txtPage_url;
		$development->en_sevice_fea=$request->txtEn_sevice_fea;
		$development->bn_sevice_fea=$request->txtBn_sevice_fea;
		$development->jp_sevice_fea=$request->txtJp_sevice_fea;
		$development->en_sevice_f_d=$request->txtEn_sevice_f_d;
		$development->bn_sevice_f_d=$request->txtBn_sevice_f_d;
		$development->jp_sevice_f_d=$request->txtJp_sevice_f_d;
		$development->status=$request->txtStatus;

		$development->dev_faq=$request->txtDev_faq;
		$development->dev_faq_bn=$request->txtDev_faqbn;
		$development->dev_faq_jp=$request->txtDev_faqjp;
        //id, en_page_title, bn_page_title, jp_page_title, en_page_details, bn_page_details, jp_page_details, sevice_f_photo, dev_faq, dev_tag, page_url, en_sevice_fea, bn_sevice_fea, jp_sevice_fea, en_sevice_f_d, bn_sevice_f_d, jp_sevice_f_d, sevice_f_photo, status, created_at, updated_at, deleted-at, dc_id, dsc_id, benefits_text, dev_faq_bn, dev_faq_jp, benefits_text_bn, benefits_text_jp
        $development->benefits_text=$request->txtBenefits_text;
        $development->benefits_text_bn=$request->txtBenefits_text_bn;
        $development->benefits_text_jp=$request->txtBenefits_text_jp;

		$development->dc_id=$request->cmbDcId;
		$development->dsc_id=$request->cmbDscId;

         //  run composer require intervention/image
         if($request->hasFile('txtPage_bg_photo')) {
    
            $image = $request->file('txtPage_bg_photo');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filenametostore =$filename.'_'.time() . '.' . $extension;
            $thumbnailPath = public_path('../public/storage/filePhoto/thumbnail');
            $fullsize = public_path('../public/storage/filePhoto/');

            $img = Image::make($image->path());

            $img->resize(400, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnailPath . '/' . $filenametostore);

            $img->resize(700, 440, function ($constraint) {
                $constraint->aspectRatio();
            })->save($fullsize . '/' . $filenametostore);

            $image->move($fullsize, $filenametostore);
        }

        // 		$development->sevice_f_photo=$request->filenametostore;

		$development->page_bg_photo=$filenametostore;


        // ///////////////////////////////////
         //  run composer require intervention/image
         if($request->hasFile('txtService_s_photo')) {
            $image = $request->file('txtService_s_photo');
            $filename = pathinfo($image, PATHINFO_FILENAME);
            $extension = $image->getClientOriginalExtension();
            $filenametostore = $filename.'_'.time() . '.' . $extension;
            $thumbnailPath = public_path('../public/storage/filePhoto/thumbnail');
            $fullsize = public_path('../public/storage/filePhoto/');

            $img = Image::make($image->path());

            $img->resize(400, 80, function ($constraint) {
                $constraint->aspectRatio();
            })->save($thumbnailPath . '/' . $filenametostore);

            $img->resize(700, 440, function ($constraint) {
                $constraint->aspectRatio();
            })->save($fullsize . '/' . $filenametostore);

            $image->move($fullsize, $filenametostore);
        }

        // $development->sevice_f_photo=$request->filenametostore;
		$development->sevice_f_photo=$filenametostore;
	



		$development->save();
		return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$development=Development::find($id);
		return view("pages.erp.development.show_development",["development"=>$development]);
	}
	public function edit(Development $development){
		$dcs=Dc::all();
		$dscs=Dsc::all();

		return view("pages.erp.development.edit_development",["development"=>$development,"dcs"=>$dcs,"dscs"=>$dscs]);
	}
	public function update(Request $request,Development $development){
//		$development->update($request->all());
		$development->en_page_title=$request->txtEn_page_title;
		$development->bn_page_title=$request->txtBn_page_title;
		$development->jp_page_title=$request->txtJp_page_title;
		$development->en_page_details=$request->txtEn_page_details;
		$development->bn_page_details=$request->txtBn_page_details;
		$development->jp_page_details=$request->txtJp_page_details;
		$development->sevice_f_photo=$request->filenametostore;
		$development->dev_faq=$request->txtDev_faq;
		$development->dev_tag=$request->txtDev_tag;
		$development->page_url=$request->txtPage_url;
		$development->en_sevice_fea=$request->txtEn_sevice_fea;
		$development->bn_sevice_fea=$request->txtBn_sevice_fea;
		$development->jp_sevice_fea=$request->txtJp_sevice_fea;
		$development->en_sevice_f_d=$request->txtEn_sevice_f_d;
		$development->bn_sevice_f_d=$request->txtBn_sevice_f_d;
		$development->jp_sevice_f_d=$request->txtJp_sevice_f_d;
		$development->sevice_f_photo=$request->filenametostore;
		$development->status=$request->txtStatus;
		// $development->deleted-at=$request->txtDeleted-at;
		$development->dc_id=$request->cmbDcId;
		$development->dsc_id=$request->cmbDscId;

		$development->update();
		return redirect()->route("developments.index")->with('success','Updated Successfully.');

	}
	public function destroy(Development $development){
		$development->delete();
		return redirect()->route("developments.index")->with('success','Deleted Successfully.');
	}
}
