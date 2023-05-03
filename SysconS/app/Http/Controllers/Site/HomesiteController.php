<?php

namespace App\Http\Controllers;
namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
// use App\Models\Duty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App;

use App\Models\Employee;
use App\Models\Customer;
use App\Models\Workedbrand;

class HomesiteController extends Controller
{
    public function index()
    {
        $employees=Employee::paginate(20);
        $customers=Customer::paginate(200);
        $wbrand=Workedbrand::paginate(20);


        return view("pages.site.homesite",["employees"=>$employees,"customers"=>$customers,"wbrands"=>$wbrand]);

    }

    // public function lang_change(Request $request)
    // {
    //     App::setLocale($request->lang);
    //     session()->put('locale', $request->lang);
    //     return view('pages.site.homesite');
    //     // return redirect()->back();
    // }
}
