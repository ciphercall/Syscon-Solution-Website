<?php



namespace App\Http\Controllers;
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Inquiry;

use App\Models\Contactsite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Mail\SendMailinquery;
use App;
use Mail;


class InquiryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.site.inquiry_form');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function lang_change(Request $request)
    {
        App::setLocale($request->lang);
        session()->put('locale', $request->lang);
        return view('pages.site.inquiry');
        // return redirect()->back();
    }
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        // id, com_name, p_in_charge, c_phone, c_email, dev_target, schedule, content_inquiry, created_at, deleted_at, updated_at
        $this->validate($request, [
            'txtcom_name' => 'required|max:100',
            'txtp_in_charge' => 'required|max:80',
            'txtc_email' => 'required|email',
            'txtc_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:11',
            'txtcontent_inquiry'=>'required|max:650'
            // 'txtMessage' => 'required'
         ]);
		 $inquiry=new Inquiry;

		$inquiry->com_name=$request->txtcom_name;
		$inquiry->p_in_charge=$request->txtp_in_charge;
		$inquiry->c_phone=$request->txtc_phone;
        $inquiry->c_email=$request->txtc_email;

         $inquiry['dev_target']=$request->dev_target;


        $inquiry['schedule'] = $request->txtschedule;

		// $inquiry->schedule=$request->txtschedule;
		 $inquiry->content_inquiry=$request->txtcontent_inquiry;

		//   $inquiry->save();

        //   return back()->with('success','Inquiry Information Submitted Successfully.');

        //   Send mail to admin
        $data= array(
            'txtcom_name'      =>  $request->txtcom_name,
            'txtp_in_charge'   =>   $request->txtp_in_charge,
            'txtc_phone'   =>   $request->txtc_phone,
            'txtc_email'   =>   $request->txtc_email,
            'dev_target'   =>   $request->dev_target,
            'txtschedule'   =>   $request->txtschedule,
            'txtcontent_inquiry'   =>   $request->txtcontent_inquiry



        );


        //  Mail::send('pages.contactMail', array(
        //     'brunch_id' => $jakat['brunch_id'],
        //     'brunch_name' => $jakat['brunch_name'],
        //     'donor' => $jakat['donor'],
        //     'comment' => $jakat['comment'],
        //     // 'message' => $input['message'],
        // ), function($message) use ($request){
        //     $message->from($request->comment);
        //     $message->to('tanvirshibli8@gmail.com', 'Admin')->subject($request->get('donor'));
        // });
        // $data= array(
        //     'txtName'      =>  $request->txtName,
        //     'txtEmail'   =>   $request->txtEmail,
        //     'txtMessage'   =>   $request->txtMessage


        // );

        Mail::to('info@sysconsolution.com')->send(new SendMailinquery($data));
        return back()->with('success', 'Inquiry Information Submitted Successfully.Thanks for contacting us!');

        // if ($contact) {
        //     return back()->with('success', 'Success! Created Successfully');
        // }
        // else {
        //     return back()->with('failed', 'Failed! to created');
        // }
		// return back()->with('success','Created Successfully.');

	}

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function show(c $c)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function edit(c $c)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, c $c)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\c  $c
     * @return \Illuminate\Http\Response
     */
    public function destroy(c $c)
    {
        //
    }
}

