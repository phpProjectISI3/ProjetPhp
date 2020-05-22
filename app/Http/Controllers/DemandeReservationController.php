<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demandereservation;

class DemandeReservationController extends Controller
{
    public function historique()
    {
        $demandes = \DB::select("select personne.id_client, concat(personne.prenom , ' ' , personne.nom) as nom_complet  , personne.point_personne , demande_reservation.id_demande, demande_reservation.date_demande , demande_reservation.date_debut, demande_reservation.date_fin , logement.nom_logement , demande_reservation.refuse_par_admin,  demande_reservation.date_refus ,demande_reservation.annule_par_client, demande_reservation.date_annulation 
        from demande_reservation inner join logement on demande_reservation.logement_ = logement.id_logement 
                                 inner join personne on personne.id_client = demande_reservation.personne_");
        return view('Historique', compact('demandes'));
    }

    public function RefuserDemande(Request $request)
    {
        if ($request->ajax()) {
            $id_demande = $request->get('id_demande');
            // $per =  \App\DemandeReservation::find($id_demande)->personne_;
            \App\DemandeReservation::where('id_demande', $id_demande)
                ->update(["refuse_par_admin" => true, "date_refus" => \Carbon\Carbon::now()->format('Y-m-d')]);

            // DemandeReservation::where('id_demande', $id_demande)
            // ->update(['annule_par_client' => "true"]);
            echo json_encode("cool");
        }
    }
}
