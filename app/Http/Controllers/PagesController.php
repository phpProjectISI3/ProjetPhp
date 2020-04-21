<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Logement;
use App\TypeLogement;
use App\Detail_logement;

class PagesController extends Controller
{
    //welcome page
    public function welcome(){
        // Select tous les éléments de la table Type Logement
        $types = TypeLogement::All();

        return view('welcome',compact('types'));
    }



    // methode pour multicritère page
    public function multipleabout(Request $request){
        // retourne l'id selectionner par select
        $optionValue = $request->input('type', -1);

        // creer une varibale de session contien la date_debut saisi par le client
        $request->session()->put('datedebut',Carbon::parse($request->input('date-start'))->format('Y-m-d'));
        // variable pour stocker la date_debut
        $datedebut = $request->session()->get('datedebut');
        
        // creer une varibale de session contien la date_fin saisi par le client
        $request->session()->put('datefin',Carbon::parse($request->input('date-end'))->format('Y-m-d'));
        // variable pour stocker la date_fin
        $datefin = $request->session()->get('datefin');

        // test si l'option n'est pas selectionner
        if($optionValue == -1){
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail ');
        }
        else{
            // test pour verifier si le client a saisi des dates
            if($datedebut == '' && $datefin == ''){

                $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail where detail_logement.type_logement_ = ' . $optionValue);
            }else{
                $logements = DB::select(DB::raw("select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail
                join planning_logement on logement.id_logement = planning_logement.logement_ where detail_logement.type_logement_ = $optionValue and planning_logement.date_debut <= ' $datedebut ' and planning_logement.date_fin >= ' $datefin'"));
            }

        }
        return view('about', ['logements'=>$logements]);
    }

    public function about($id){

        if($id == -1){
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail ');
        }
        else{
                $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail where detail_logement.type_logement_ = ' . $id);


            }
        return view('about', ['logements'=>$logements]);
    }

    public function blog(){
        return view('blog');
    }


    public function contact(){
        return view('contact');
    }

    public function detailRecherche(Request $request,$id){
        $logement = DB::table('logement')
                    ->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')
                    ->select('*')
                    ->where('logement.id_logement',$id)
                    ->first();

        // stocke la valeur de la variable de session(datedebut)
        $datedebut = Carbon::parse($request->session()->get('datedebut'))->format('Y-m-d');
        // stocke la valeur de la variable de session(datefin)
        $datefin = Carbon::parse($request->session()->get('datefin'))->format('Y-m-d');
        // calcule l'interval entre les dates (nombre de jours)
        $interval = (strtotime($datefin) - strtotime($datedebut))/(60*60*24);
        
        // calcule tarif par saison
        $tarif_bs = $logement->tarif_par_nuit_bs * $interval;
        $tarif_hs = $logement->tarif_par_nuit_hs * $interval;

        

		return view('detailRecherche',compact('logement'))
               ->with('datedebut',$datedebut)
               ->with('datefin',$datefin)
               ->with('interval',$interval)
               ->with('tarif_bs',$tarif_bs)
               ->with('tarif_hs',$tarif_hs);
    }

    public function service(){
        return view('service');
    }

    public function login(){
        return view('login');
    }

    public function review($id_logement, $datedebut, $datefin){
       $logement = DB::table('logement')
                    ->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')
                    ->select('*')
                    ->where('logement.id_logement',$id_logement)
                    ->first();
		return view('review')
				->with('logement',$logement)
				->with('datedebut',$datedebut)
				->with('datefin',$datefin);
    }

    public function finalisation()
	{
		$logement = DB::table('logement')
			 ->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')
			 ->select('*')
			 ->where('logement.id_logement',1)
			 ->first();
		return view('finalisation')
				->with('logement',$logement)
				->with('datedebut','debut')
				->with('datefin','fin');
	}


    public function information(){
        return view('information');
    }

    public function confirmation(){
        return view('confirmation');
    }

}
