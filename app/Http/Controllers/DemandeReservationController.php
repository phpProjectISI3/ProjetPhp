<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Demandereservation;
use App\ReservationLogement;
use Illuminate\Support\Facades\DB;

class DemandeReservationController extends Controller
{
    public function Facturation()
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {

            if (session()->get('userObject')->libelle_grade == 'Administratif') {
                $demandes_payees = DB::select("select personne.id_client, concat(personne.prenom , ' ' , personne.nom) as nom_complet , personne.point_personne , demande_reservation.id_demande, demande_reservation.date_demande , demande_reservation.date_debut, demande_reservation.date_fin , logement.nom_logement 
        from facturation inner join reservation_logement on facturation.reservation_logement_ = reservation_logement.id_reservation
                         inner join demande_reservation on demande_reservation.id_demande = reservation_logement.demande_reservation_
                         inner join personne on personne.id_client = demande_reservation.personne_
                         inner join logement on logement.id_logement = demande_reservation.logement_");
                return view("BackOfficeAdmin.Facturation", compact('demandes_payees'));
            }
        } else
            return \redirect("/");
    }

    public function Demandes()
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {

            if (session()->get('userObject')->libelle_grade == 'Administratif') {

                $demandes_enAttentes = DB::select("select personne.id_client, concat(personne.prenom , ' ' , personne.nom) as nom_complet , personne.point_personne , demande_reservation.id_demande, demande_reservation.date_demande , demande_reservation.date_debut, demande_reservation.date_fin , logement.nom_logement 
        from demande_reservation inner join personne on personne.id_client = demande_reservation.personne_
                                 inner join logement on logement.id_logement = demande_reservation.logement_ 
        where refuse_par_admin = false
        and annule_par_client = false
        and id_demande not in (select reservation_logement.demande_reservation_
                                  from reservation_logement)");
                return view("BackOfficeAdmin.Demandes", compact("demandes_enAttentes"));
            }
        } else
            return \redirect("/");
    }

    public function historique()
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {
            if (session()->get('userObject')->libelle_grade == 'Administratif') {

                $demandes = \DB::select("select personne.id_client, concat(personne.prenom , ' ' , personne.nom) as nom_complet  , personne.point_personne , demande_reservation.id_demande, demande_reservation.date_demande , demande_reservation.date_debut, demande_reservation.date_fin , logement.nom_logement , demande_reservation.refuse_par_admin,  demande_reservation.date_refus ,demande_reservation.annule_par_client, demande_reservation.date_annulation 
        from demande_reservation inner join logement on demande_reservation.logement_ = logement.id_logement 
                                 inner join personne on personne.id_client = demande_reservation.personne_
        order by logement.nom_logement, demande_reservation.date_debut, personne.point_personne asc");
                return view('BackOfficeAdmin.Historique', compact('demandes'));
            }
        } else
            return \redirect("/");
    }

    public function Reservation()
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {

            if (session()->get('userObject')->libelle_grade == 'Administratif') {

                $demandes_accordees = DB::select("select personne.id_client, concat(personne.prenom , ' ' , personne.nom) as nom_complet , personne.point_personne , demande_reservation.id_demande, demande_reservation.date_demande , demande_reservation.date_debut, demande_reservation.date_fin , logement.nom_logement 
                from demande_reservation inner join personne on personne.id_client = demande_reservation.personne_
                inner join logement on logement.id_logement = demande_reservation.logement_ 
                where refuse_par_admin = false
                and annule_par_client = false
                and id_demande in (select reservation_logement.demande_reservation_
                from reservation_logement)
                and id_demande not in (select reservation_logement.demande_reservation_
                from facturation inner join reservation_logement on facturation.reservation_logement_ = reservation_logement.id_reservation )");
                return view('BackOfficeAdmin.Reservation', compact('demandes_accordees'));
            }
        } else
            return \redirect("/");
    }

    public function RefuserDemande(Request $request)
    {
        if ($request->ajax()) {
            $id_demande = $request->get('id_demande');
            \App\DemandeReservation::where('id_demande', $id_demande)
                ->update(["refuse_par_admin" => true, "date_refus" => \Carbon\Carbon::now()->format('Y-m-d')]);
            echo json_encode("cool");
        }
    }

    public function AccepterDemande(Request $request)
    {
        if ($request->ajax()) {
            $id_demande = $request->get('id_demande');

            $date_debutt =  DB::table("demande_reservation")
                ->where('id_demande', '=', $id_demande)
                ->first()
                ->date_debut;
            $date_finn =  DB::table("demande_reservation")
                ->where('id_demande', '=', $id_demande)
                ->first()
                ->date_fin;

            $premier_tableau_dmd_refuse = DB::select("select demande_reservation.id_demande 
                                             from demande_reservation
                                             where demande_reservation.date_debut BETWEEN  '$date_debutt' and '$date_finn' 
                                             or demande_reservation.date_fin BETWEEN '$date_debutt' and '$date_finn'");
            $deuxieme_tableau_dmd_refuse = DB::select("select demande_reservation.id_demande 
                                             from demande_reservation
                                             where demande_reservation.date_debut BETWEEN  '$date_debutt' and '$date_finn' 
                                             or demande_reservation.date_fin BETWEEN '$date_debutt' and '$date_finn'");

            DB::select(DB::raw("
            update demande_reservation
            set refuse_par_admin = true, date_refus = CURRENT_DATE
            where id_demande in (
                select demande_reservation.id_demande 
                from demande_reservation
                where demande_reservation.date_debut BETWEEN  '$date_debutt' and '$date_finn' 
                    or demande_reservation.date_fin BETWEEN '$date_debutt' and '$date_finn' 
            )"));

            DB::select(DB::raw("
            update demande_reservation
            set refuse_par_admin = true, date_refus = CURRENT_DATE
            where id_demande in (
                select demande_reservation.id_demande 
                from demande_reservation
                where '$date_debutt' BETWEEN demande_reservation.date_debut and demande_reservation.date_fin
                and '$date_finn' BETWEEN demande_reservation.date_debut and demande_reservation.date_fin 
            )"));

            \App\DemandeReservation::where('id_demande', $id_demande)
                ->update(['refuse_par_admin' => false, 'date_refus' => NULL]);

            $reservation = new ReservationLogement;
            $reservation->demande_reservation_ = $id_demande;
            $reservation->save();

            $dmd_refusees = array(
                'premier_tableau' => $premier_tableau_dmd_refuse,
                'deuxieme_tableau' => $deuxieme_tableau_dmd_refuse,
                'dmd_exception' => $id_demande
            );

            echo json_encode($dmd_refusees);
        }
    }
}
