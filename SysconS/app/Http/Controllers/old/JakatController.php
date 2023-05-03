<?php

namespace App\Http\Controllers;
use App\Mail\SendMail;

use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use App\Models\Jakat;
use App\Models\Brunch;
use App\Models\Mcategory;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;

class JakatController extends Controller{

	public function index(){
		$brunchs=Brunch::all();
		$r_categorys=Mcategory::all();

		$jakats=Jakat::paginate(10);
		return view("pages.erp.jakat.index_jakat",["jakats"=>$jakats,"brunchs"=>$brunchs,"m_categorys"=>$r_categorys]);
	}
	public function create(){
		$brunchs=Brunch::all();

		return view("pages.erp.jakat.create_jakat",["brunchs"=>$brunchs]);
	}
	public function store(Request $request){

		$jakat=new Jakat;
		$jakat->brunch_id=$request->cmbBrunchId;
		$jakat->brunch_name=$request->txtBrunch_name;
		$jakat->donor=$request->txtDonor;
		$jakat->category=$request->txtCategory;
		$jakat->mediam=$request->txtMediam;
		$jakat->amount=$request->txtAmount;
		$jakat->comment=$request->txtComment;
		$jakat->j_m_category=$request->j_m_category;


		$jakat->deleted_at=$request->txtDeleted_at;

		$jakat->save();

         //  Send mail to admin
        //  \Mail::send('pages.contactMail', array(
        //     'brunch_id' => $jakat['brunch_id'],
        //     'brunch_name' => $jakat['brunch_name'],
        //     'donor' => $jakat['donor'],
        //     'comment' => $jakat['comment'],
        //     // 'message' => $input['message'],
        // ), function($message) use ($request){
        //     $message->from($request->comment);
        //     $message->to('tanvirshibli8@gmail.com', 'Admin')->subject($request->get('donor'));
        // });
        $data = array(
            'txtBrunch_name'      =>  $request->txtBrunch_name,
            'txtDonor'   =>   $request->txtDonor
        );

     Mail::to('afsana1996sultana@gmail.com')->send(new SendMail($data));
    //  return back()->with('success', 'Thanks for contacting us!');

        if ($jakat) {
            return back()->with('success', 'Success! Created Successfully');
        }
        else {
            return back()->with('failed', 'Failed! to created');
        }
		// return back()->with('success','Created Successfully.');

	}
	public function show($id){
		$sjakat=Jakat::find($id);
		return response()->json([
			'status'=>200,
			'sjakat'=>$sjakat
		]);
	}
	public function edit($id){
		$jakat=Jakat::find($id);
		return response()->json([
			'status'=>200,
			'jakat'=>$jakat
		]);
	}

	public function update(Request $request){

		$jakatid=$request->input('cmbjakatId');

		$jakat = Jakat::find($jakatid);
		$jakat->id=$request->cmbjakatId;
		$jakat->brunch_id=$request->cmbBrunchId;
		$jakat->brunch_name=$request->txtBrunch_name;
		$jakat->donor=$request->txtDonor;
		$jakat->category=$request->txtCategory;
		$jakat->mediam=$request->txtMediam;
		$jakat->amount=$request->txtAmount;
		$jakat->deleted_at=$request->txtDeleted_at;
		$jakat->j_m_category=$request->j_m_category;

		$jakat->update();
		return redirect()->route("jakats.index")->with('success','Updated Successfully.');

	}


	public function destroy(Request $request){

		$jakatid=$request->input('d_jakat');
		$jakat= Jakat::find($jakatid);
		$jakat->delete();


		return redirect()->back()
			   ->with('success',' Deleted successfully');
	}
}
