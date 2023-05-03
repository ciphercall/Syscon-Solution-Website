<?php
namespace App\Http\Controllers;

namespace App\Http\Controllers\Site;
use App\Http\Controllers\Controller;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use App\Models\Procategorie;


class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $project = Procategorie::join('projects', 'procategories.id', '=', 'projects.p_category')
               ->get(['projects.*', 'procategories.p_name']);
            //    dd($project);
         return view('pages.site.project',["projects"=>$project]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function moreproject()
    {
        $project = Procategorie::join('projects', 'procategories.id', '=', 'projects.p_category')
        ->get(['projects.*', 'procategories.p_name']);
     //    dd($project);
        return view('pages.site.project',["projects"=>$project]);
    }

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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
	public function show($id){
		// $project=Project::find($id);
        $project = Project::join('procategories', 'projects.p_category', '=', 'procategories.id')
        ->where('projects.id', $id)
        ->get(['projects.*', 'procategories.p_name']);

        // $pro= Procategorie::join('projects', 'procategories.id', '=', 'projects.p_category')
        //        ->get(['projects.*', 'procategories.p_name']);

		return view("pages.site.projectdetails",["project"=>$project]);
	}
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
