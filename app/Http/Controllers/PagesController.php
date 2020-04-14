<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;


class PagesController extends Controller
{
    //welcome page
    public function welcome(){
        return view('welcome');
    }

    // about page
    public function about(){
        $logements = DB::select('select logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail');
        return view('about', ['logements'=>$logements]);
    }

    public function blog(){
        return view('blog');
    }

    public function contact(){
        return view('contact');
    }

    public function detailRecherche(){
        return view('detailRecherche');
    }

    public function service(){
        return view('service');
    }

    public function login(){
        return view('login');
    }

    public function review(){
        return view('review');
    }

    public function information(){
        return view('information');
    }

    public function confirmation(){
        return view('confirmation');
    }

}
