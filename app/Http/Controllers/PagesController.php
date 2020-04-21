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
        // $types = DB::select('select * from type_logement');
        $types = TypeLogement::All();

        return view('welcome',compact('types'));
    }



    // , $id = null,
    // about page
    public function multipleabout(Request $request){
        // $datedebut = getdate();
        // $datefin = '';
        $optionValue = $request->input('type', -1);

        $datedebut = Carbon::parse($request->input('date-start'))->format('Y-m-d');
        $datefin = Carbon::parse($request->input('date-end'))->format('Y-m-d');

        if($optionValue == -1){
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail ');
        }
        else{
            if($datedebut == '' && $datefin == ''){

                $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail where detail_logement.type_logement_ = ' . $optionValue);
            }else{
                $logements = DB::select(DB::raw("select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail
                join planning_logement on logement.id_logement = planning_logement.logement_ where detail_logement.type_logement_ = $optionValue and planning_logement.date_debut <= ' $datedebut ' and planning_logement.date_fin >= ' $datefin'"));
                // $logements = DB::table('logement')->select('logement.id_logement, logement.adress_logement, logement.nom_logement')->join('detail_logement','logement.detail_logement_','=','detail_logement.id_detail')->select('detail_logement.tarif_par_nuit_hs, detail_logement.description_logement ')->join('planning_logement','logement.id_logement','=','planning_logement.logement_')->where(' detail_logement.type_logement_','=',$optionValue)->whereDate('planning_logement.date_debut','=',$datedebut)->whereDate('planning_logement.date_fin','=',$datefin);
            }

        }
            // dd ($optionValue . ' ' . $datedebut . ' ' . $datefin);
        return view('about', ['logements'=>$logements]);
    }

    public function about($id){

        if($id == -1){
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail ');
        }
        else{
            // if($date_debut == '' && $date_fin == ''){
                $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail where detail_logement.type_logement_ = ' . $id);
            // }else{

            // }

        }
        return view('about', ['logements'=>$logements]);
    }

    public function blog(){
        return view('blog');
    }


    public function contact(){
        return view('contact');
    }

    public function detailRecherche($id){
        $logement = DB::table('logement')
                    ->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')
                    ->select('*')
                    ->where('logement.id_logement',$id)
                    ->first();

		return view('detailRecherche',compact('logement'));
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


    public function information(){
        return view('information');
    }

    public function confirmation(){
        return view('confirmation');
    }

}
