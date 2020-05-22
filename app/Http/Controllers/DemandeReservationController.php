<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demandereservation;

class DemandeReservationController extends Controller
{
    public function index()
    {
        $demandes = \DB::select("select concat(personne.prenom , ' ' , personne.nom) as nom_complet  , demande_reservation.id_demande, demande_reservation.date_demande , demande_reservation.date_debut, demande_reservation.date_fin , logement.nom_logement , demande_reservation.refuse_par_admin, demande_reservation.annule_par_client, demande_reservation.date_annulation 
        from demande_reservation inner join logement on demande_reservation.logement_ = logement.id_logement 
                                 inner join personne on personne.id_client = demande_reservation.personne_");
        return view('demandereservation', compact('demandes'));
    }
}
