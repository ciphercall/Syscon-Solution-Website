<?php
 namespace App\Http\Controllers;
 namespace App\Http\Controllers\Site;
 use App\Http\Controllers\Controller;
 use App\Models\About;
 use App\Models\Employee;
 use App\Models\Customer;
 use App\Models\Workedbrand;


 use Illuminate\Http\Request;
 use Illuminate\Support\Facades\Redirect;
 use Illuminate\Support\Facades\DB;
 use Illuminate\Pagination\Paginator;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees=Employee::paginate(20);
        $customers=Customer::paginate(200);
        $wbrand=Workedbrand::paginate(20);


        return view("pages.site.about",["employees"=>$employees,"customers"=>$customers,"wbrands"=>$wbrand]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function addemployee()
    // {
    //     $employees=Employee::paginate(10);
	// 	return view("pages.site.about",["employees"=>$employees]);
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
