<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Logement;

class PagesController extends Controller
{
    //welcome page
    public function welcome(){
        return view('welcome');
    }

    public function import_photos(Request $request){
		//if($request->ajax()){
		//    $data = DB::select('select photo_logement.chemin_photo
		//                        from logement  inner join photo_logement on logement.id_logement = photo_logement.logement_
		//                        where logement.id_logement = 4;
		//                        ');
		//    if($data != null){
		//        echo json_encode($data);

		//    }
		//}
	}

    // about page
    public function about($id){
        if($id == -1)
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail ');
        else
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail where detail_logement.type_logement_ = ' . $id);

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
