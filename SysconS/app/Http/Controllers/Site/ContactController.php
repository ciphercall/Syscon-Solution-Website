<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\Contactsite;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Mail\SendMail;
use App;
use Mail;


class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.site.contact');
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
        return view('pages.site.contact');
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
        $this->validate($request, [
            'txtName' => 'required',
            // 'txtEmail' => 'required|email',
            'txtEmail' => 'required|email',
            // 'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            // 'subject'=>'required',
            'txtMessage' => 'required'
         ]);
		$contact=new Contactsite;
		$contact->c_name=$request->txtName;
		$contact->c_email=$request->txtEmail;
		$contact->c_details=$request->txtMessage;


		$contact->save();

         //  Send mail to admin

        $data= array(
            'txtName'      =>  $request->txtName,
            'txtEmail'   =>   $request->txtEmail,
            'txtMessage'   =>   $request->txtMessage


        );

        Mail::to('info@sysconsolution.com')->send(new SendMail($data));
        //  return back()->with('success', 'Thanks for contacting us!');

        if ($contact) {
            return back()->with('success', 'Success! Created Successfully');
        }
        else {
            return back()->with('failed', 'Failed! to created');
        }
		 return back()->with('success','Created Successfully.');

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
