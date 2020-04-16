<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;
use App\Logement;
use App\TypeLogement;
use App\Detail_logement;

class LogementController extends Controller
{
    /**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function index()
    {
        $logements = Logement::All();
        return view
                   ('BackOfficeAdmin.GestionDesLogements.index',
                    compact('logements')
                   );
    }

    /**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
    public function create()
    {
        $listeCategories = DB::select("select detail_logement.id_detail as id , concat(type_logement.libelle_type_logement,' ',detail_logement.id_detail) as libelle
                                       from  detail_logement inner join type_logement on detail_logement.type_logement_ = type_logement.id_type_logement
                                       where detail_logement.est_categorie = true;
                                       ");

		$listeTypes = TypeLogement::select('id_type_logement','libelle_type_logement')
									->get();

        return view('BackOfficeAdmin.GestionDesLogements.create')
			   ->with('listeCategories',$listeCategories)
			   ->with('listeTypes',$listeTypes);
    }

    public function import_categories(Request $request){
		if($request->ajax()){
			$html_output = '';
			$ID_DETAIL= $request->get('ID');
			$data = DB::table('detail_logement')
					->Where('detail_logement.id_detail', '=', $ID_DETAIL)
					->first();

			if($data != null)
			{
				$MesDonneesJson= array(
					'MaxReservation'=> $data->max_reserv,
					'Superficie'=> $data->superficie_logement,
					'NombrePiece'=>$data->nbr_piece,
					'MaxPersonne'=>$data->capacite_personne_max,
					'Description'=>$data->description_logement,
					'Massage'=>$data->massage_disponible,
					'Piscine'=>$data->piscine_disponible,
					'Jardin'=>$data->jardin_cours,
					'Parking'=>$data->parking_disponible,
					'MargeAnnulation'=>$data->marge_annulation,
					'PrixAnnulation'=>$data->tarif_annulation,
					'PrixHS'=>$data->tarif_par_nuit_hs,
					'PrixBS'=>$data->tarif_par_nuit_bs,
					'TypeLogement'=> $data->type_logement_
					);
			}

			echo json_encode($MesDonneesJson);
		}
	}

    /**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
    public function store(Request $request)
    {
		if(true){
			$detail_logement = new Detail_logement;
			$detail_logement->type_logement_ = $request->get('');
			$detail_logement->superficie_logement = $request->get('');
			$detail_logement->nbr_piece = $request->get('');
			$detail_logement->capacite_personne_max = $request->get('');
			$detail_logement->tarif_par_nuit_HS = $request->get('');
			$detail_logement->tarif_par_nuit_BS = $request->get('');
			$detail_logement->type_logement_ = $request->get('');
			$detail_logement->type_logement_ = $request->get('');
		}

        $logement = new Logement;
        $logement->nom_logement = $request->get('nom');
		$logement->adress_logement = $request->get('adresse');
		//$logement->localisation_logement = $request->get(''); ******TODO******
		$logement->detail_logement_ = $request->get('categorie');

        $logement->save();
    }

    /**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return \Illuminate\Http\Response
	 */
    public function show($id)
    {
        //
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
