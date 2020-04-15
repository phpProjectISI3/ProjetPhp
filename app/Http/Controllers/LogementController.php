<?php

namespace App\Http\Controllers;
use App\Logement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;

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
        //$test = DB::table('logement')
        //    ->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')
        //    ->select('detail_logement.description_logement')
        //    ->where('logement.id_logement',1)
        //    ->get()[];
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
        $listeCategories = DB::select("select concat(type_logement.libelle_type_logement,' ',detail_logement.id_detail) as libelle
                                       from  detail_logement inner join type_logement on detail_logement.type_logement_ = type_logement.id_type_logement
                                       where detail_logement.est_categorie = true;
                                       ");

        return view('BackOfficeAdmin.GestionDesLogements.create')->with('listeCategories',$listeCategories);
    }

    public function import_categories(Request $request){
		if($request->ajax()){
			$html_output = '';
			$requete = $request->get('query');
			$data = DB::table('detail_logement')->find(6);
			//->select('detail_logement.superficie_logement')
			//->Where('detail_logement.id_detail', '=', '6')
			//->value('detail_logement.superficie_logement');

			if($data != null)
				$html_output .= $data;
			else
				$html_output .= 'Pas de donnée disponible';

			$data = array(
			    'LesDonnee'=> $html_output
			    );
			echo json_encode($data);
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
        //
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
