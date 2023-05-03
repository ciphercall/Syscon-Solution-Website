<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\Submenu;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class SubmenuController extends Controller{

	public function index(){
		$menus=Menu::all();

		$submenus=Submenu::paginate(10);
		return view("pages.erp.submenu.index_submenu",["submenus"=>$submenus,"menus"=>$menus]);
	}


	public function create(){
		$menus=Menu::all();

		return view("pages.erp.submenu.create_submenu",["menus"=>$menus]);
	}



	public function store(Request $request){
		$submenu=new Submenu;
		$submenu->sm_name=$request->txtSm_name;
		$submenu->menu_id=$request->cmbMenuId;
		$submenu->slug=$request->txtSlug;
		// $submenu->m_photo=$request->txtM_photo;
		$submenu->comment=$request->txtComment;
		$submenu->deleted_at=$request->txtDeleted_at;

        if(isset($request->txtM_photo)){
            $submenu->m_photo=$request->filePhoto;
            }

        if(isset($request->txtM_photo)){
                $imageName = time().'.'.$request->txtM_photo->extension();
                $submenu->m_photo=$imageName;
                $submenu->update();
                $request->txtM_photo->move(public_path('img'),$imageName);
            }
		$submenu->save();

            if ($submenu) {
                return back()->with('success', 'Success! Created Successfully');
            }
            else {
                return back()->with('failed', 'Failed! to created');
            }
		// return back()->with('success','Created Successfully.');

	}


	public function show($id){
		$ssubmenu=Submenu::find($id);
		return response()->json([
			'status'=>200,
			'ssubmenu'=>$ssubmenu
		]);
	}
	public function edit($id){
		$submenu=Submenu::find($id);
		return response()->json([
			'status'=>200,
			'submenu'=>$submenu
		]);
	}

    // public function update(Request $request)
    // {
    //     $singleCat = Categories::find($request->id);
    //     $singleCat->category_name = $request->category_name;
    //     $singleCat->category_slug = $request->category_slug;

    //     if ($request->parent_category != "") {
    //         $singleCat->parent_id = $request->parent_category;
    //         $cat = Categories::find($request->parent_category);
    //         $level = $cat->level + 1;
    //         $singleCat->level = $level;
    //     } else {
    //         $level = $request->parent_category;
    //         $singleCat->level = $level;
    //     }

    //     if ($request->category_icon_edit) {

    //         $image_path = public_path('../img/' . $singleCat->icon);
    //         if (file_exists($image_path)) {
    //             unlink($image_path);
    //         }

    //         $image = $request->file('category_icon_edit');
    //         $input['imagename'] = time() . '.' . $image->extension();
    //         $destinationPath = public_path('../img');
    //         $img = Image::make($image->path());
    //         $img->resize(100, 100, function ($constraint) {
    //             $constraint->aspectRatio();
    //         })->save($destinationPath . '/' . $input['imagename']);

    //         $singleCat->icon = $input['imagename'];
    //     }

    //     $singleCat->update();
    //     return redirect('admin/categories');
    // }

	public function update(Request $request){
        $submenuid=$request->input('cmbsubmenuId');

		$submenu = Submenu::find($submenuid);
		$submenu->id=$request->cmbsubmenuId;
		$submenu->sm_name=$request->txtSm_name;
		$submenu->menu_id=$request->cmbMenuId;
		$submenu->slug=$request->txtSlug;
		// $submenu->m_photo=$request->txtM_photo;
		$submenu->comment=$request->txtComment;
		$submenu->deleted_at=$request->txtDeleted_at;

        if(isset($request->txtM_photo)){
            $submenu->m_photo=$request->filePhoto;
            }

        if(isset($request->txtM_photo)){
                $imageName = time().'.'.$request->txtM_photo->extension();
                $submenu->m_photo=$imageName;
                // $submenu->update();
                $request->txtM_photo->move(public_path('img'),$imageName);
            }

            $submenu->update();

            if ($submenu) {
                return back()->with('success', 'Success! Created Successfully');
            }
            else {
                return back()->with('failed', 'Failed! to created');
            }

		// return redirect()->route("submenus.index")->with('success','Updated Successfully.');

	}

    public function destroy(Request $request){

        $submenuid=$request->input('d_submenu');
        $submenu= Submenu::find($submenuid);
        $submenu->delete();


        return redirect()->back()
            ->with('success',' Deleted successfully');
    }
}
