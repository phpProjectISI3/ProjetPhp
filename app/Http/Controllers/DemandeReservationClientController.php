<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\DemandeReservation;
use Carbon\Carbon;

class DemandeReservationClientController extends Controller
{
    public function index(){
        // Pages des séjours (client)
    }

    public function store(Request $request){
        $demande_reservation = new DemandeReservation();
        $demande_reservation->date_demande = Carbon::now()->format('Y-m-d');
        $demande_reservation->personne_  = session()->get('userObject')->id_client;
        $demande_reservation->logement_  = explode("/",$request->get("PageActuel"))[4];
        $demande_reservation->date_debut = $request->get("InDateEntree");
        $demande_reservation->date_fin = $request->get("InDateSortie");

        $demande_reservation->save();
        return \redirect("/sejours");
    }
}