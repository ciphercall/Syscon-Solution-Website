<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use App\Models\Devsubcategorie;
use App\Models\Procategorie;
use App\Models\Dmsubcategorie;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */


    public function boot()
    {
       // Paginator::useBootstrap();
    //    ///// Development

       $devsubc['devsubcs'] = Devsubcategorie::where("devsubcategory", 1)
       ->get();


       view()->share($devsubc);
       $devecom['devecoms'] = Devsubcategorie::where("devsubcategory", 2)
       ->get();


       view()->share($devecom);
       $devcms['devcmss'] = Devsubcategorie::where("devsubcategory", 3)
       ->get();


       view()->share($devcms);

       $devmob['devmobs'] = Devsubcategorie::where("devsubcategory", 4)
       ->get();


       view()->share($devmob);

    //    ///// Digital Marketing

    $dmseo['dmseos'] = Dmsubcategorie::where("dmsubcategory", 1)
    ->get();


    view()->share($dmseo);
    $dmsmm['dmsmms'] = Dmsubcategorie::where("dmsubcategory", 2)
    ->get();


    view()->share($dmsmm);
    $dmpaidm['dmpaidms'] = Dmsubcategorie::where("dmsubcategory", 3)
    ->get();


    view()->share($dmpaidm);

    $dmadv['dmadvs'] = Dmsubcategorie::where("dmsubcategory", 4)
    ->get();


    view()->share($dmadv);
    /////////////////////

       $pro['projects']  = Procategorie::join('projects', 'procategories.id', '=', 'projects.p_category')
        ->get(['projects.*', 'procategories.p_name']);

        view()->share($pro);

        //
    }
}
