<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DemandeReservation;
use App\Personne;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DemandeReservationClientController extends Controller
{
    public function store(Request $request)
    {
        $demande_reservation = new DemandeReservation();
        $demande_reservation->date_demande = Carbon::now()->format('Y-m-d');
        $demande_reservation->personne_  = session()->get('userObject')->id_client;
        $demande_reservation->logement_  = explode("/", $request->get("PageActuel"))[4];
        $demande_reservation->date_debut = $request->get("InDateEntree");
        $demande_reservation->date_fin = $request->get("InDateSortie");

        $demande_reservation->save();
        return \redirect("/sejours");
    }

    public function InfoAnnulationDemande(Request $request)
    {
        if ($request->ajax()) {
            $id_demande = $request->get('id_demande');
            $info_logement = collect(DB::select('select logement.id_logement , logement.nom_logement , photo_logement.chemin_photo from demande_reservation inner join logement ON logement.id_logement = demande_reservation.logement_ inner join photo_logement ON photo_logement.logement_ = logement.id_logement where demande_reservation.id_demande = ' . $id_demande . ' limit 1;'))->first();

            $MesDonneesJson = array(
                'id_logement' => $info_logement->id_logement,
                'nom_logement' => $info_logement->nom_logement,
                'photo_logement' => $info_logement->chemin_photo
            );

            echo json_encode($MesDonneesJson);
        }
    }

    public function AnnulationDemande($id_demande)
    {
        Personne::where('id_client', session()->get('userObject')->id_client)
            ->update(['point_personne' => (Personne::find(session()->get('userObject')->id_client)->point_personne - 1)]);

        DemandeReservation::where('id_demande', $id_demande)
            ->update(['annule_par_client' => "true"]);

        DemandeReservation::where('id_demande', $id_demande)
            ->update(['date_annulation' => Carbon::now()]);

        return \redirect("/sejours");
    }
}
