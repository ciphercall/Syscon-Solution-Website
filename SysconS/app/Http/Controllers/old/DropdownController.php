<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Response;
use Redirect;
use App\Models\Countries;
use App\Models\Division;
use App\Models\District;
use App\Models\Upazila;
use App\Models\Union;


use App\Models\Mahfil;

class DropdownController extends Controller
{
    // public function index()
    // {
    //     $data['countries'] = Country::get(["name", "id"]);
    //     return view('welcome', $data);
    // }
    public function fetchCountry(Request $request)
    {
        $data['countries'] = Countries::where("work_p_id",$request->work_p_id)->get(["name", "id"]);
        return response()->json($data);
    }


    public function fetchCity(Request $request)
    {
        $data['cities'] = Division::where("country_id",$request->country_id)->get(["bn_name", "id"]);
        return response()->json($data);
    }

    public function fetchDistrict(Request $request)
    {
        $data['districts'] = District::where("division_id",$request->division_id)->get(["bn_name", "id"]);
        return response()->json($data);
    }


    public function fetchUpazila(Request $request)
    {
        $data['Upazilas'] = Upazila::where("district_id",$request->district_id)->get(["bn_name", "id"]);
        return response()->json($data);
    }


    public function fetchUnion(Request $request)
    {
        $data['Unions'] = Union::where("upazilla_id",$request->upazilla_id)->get(["bn_name", "id"]);
        return response()->json($data);
    }
    // public function fetchBrunch(Request $request)
    // {
    //     $data['brunchs'] = Mahfil::where("brunch_name_id",$request->brunch_name_id)->get(["brunch_name_id", "id"]);
    //     return response()->json($data);


//


// upazilla_id
    // }
}
