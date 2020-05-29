<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Auth_role_personne;
use App\Personne;
use App\Sauvegarde_Logement;
use App\Message_contact;


class Auth_Role_PersonneController extends Controller
{
    public function VerifyCredentials(Request $request)
    {
        $user = collect(DB::select("select id_client, nom, prenom, libelle_sexe, est_marie, nbr_enfant_scolarise, nbr_enfant_non_scolarise, libelle_grade, date_naissance, point_personne, username_email, mot_de_passe,description_role,libelle_role
        from sexe inner join personne on sexe.id_sexe = personne.sexe_ inner join grade on grade.id_grade = personne.grade_ inner join auth_role_personne on personne.id_client = auth_role_personne.personne_role_ inner join auth_role on auth_role_personne.auth_role_ = auth_role.id_role 
        where username_email = '" . $request->get('email') . "' and mot_de_passe = '" . $request->get('motdepasse') . "'"))
            ->first();
        if (isset($user) == true) {
            $request->session()->put('userObject', $user);
            return true;
        }
        // return Auth_Role_PersonneController::AuthentificatedGoingToPage("profilUser");
        //return $this->Profil();
        return false;
    }

    public static function AuthentificatedGoingToPage($MyUrl)
    {
        if (Auth_Role_PersonneController::IsAuthentificated())
            return \redirect($MyUrl);
        else
            return \redirect("/");
    }

    public static function IsAuthentificated()
    {
        if (session()->has('userObject'))
            return true;
        return false;
    }

    public function Profil(Request $request)
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {
            $userId = $request->session()->get('userObject')->id_client;
            $personnes = DB::select('select personne.*,sexe.libelle_sexe, grade.libelle_grade, auth_role_personne.username_email,auth_role_personne.mot_de_passe from personne 
            join grade on personne.grade_ = grade.id_grade 
            join sexe on personne.sexe_ = sexe.id_sexe
            join auth_role_personne on auth_role_personne.personne_role_ = personne.id_client
            where personne.id_client = ' . $userId);
            // $authentification = DB::table('auth_role_personne')->selectRaw('auth_role_personne.username_email, auth_role_personne.mot_de_passe')->where('auth_role_personne',$userId)->get();
            return \view("Profile", compact('personnes'))->withUser(session()->get('userObject'));
        } else
            return \redirect("/");
    }

    public function favories(Request $request)
    {

        if (Auth_Role_PersonneController::IsAuthentificated()) {
            $userId = $request->session()->get('userObject')->id_client;
            $logements = DB::select('select logement.*, detail_logement.* from logement join detail_logement on logement.detail_logement_ = detail_logement.id_detail where id_logement in (select sauvegarde_logement.logement_ from sauvegarde_logement join personne on sauvegarde_logement.client_ = personne.id_client where id_client =' . $userId . ')');

            return \view("favories", compact('logements'))->withUser(session()->get('userObject'));
        } else
            return \redirect("/");
    }

    public function messagerie()
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {
            $userId = session()->get('userObject')->id_client;

            $emetteur = DB::select("select message_contact.*,personne.* from message_contact join personne on message_contact.emetteur_ = personne.id_client where message_contact.emetteur_ = $userId ");

            $firstLetter = session()->get('userObject')->nom[0];

            $recepteur = DB::select("select message_contact.*,personne.* from message_contact join personne on message_contact.emetteur_ = personne.id_client where message_contact.recepteur_ = $userId order by message_contact.id_message  ");


            $totalMessage = Message_contact::where('message_contact.recepteur_', $userId)->count();


            return \view("messagerie", compact('emetteur', 'recepteur'))->withUser(session()->get('userObject'))
                ->with('firstLetter', $firstLetter)
                ->with('totalMessage', $totalMessage);
        } else
            return \redirect("/");
    }

    public function read_email($imessage)
    {

        if (Auth_Role_PersonneController::IsAuthentificated()) {
            $userId = session()->get('userObject')->id_client;

            $firstLetter = session()->get('userObject')->nom[0];

            $recepteur = DB::select("select message_contact.*,personne.*, auth_role_personne.* from message_contact join personne on message_contact.emetteur_ = personne.id_client join auth_role_personne on message_contact.emetteur_ = auth_role_personne.personne_role_ where message_contact.recepteur_ = $userId and  message_contact.id_message = $imessage");

            $Lu = DB::select("select message_contact.*,personne.* from message_contact join personne on message_contact.emetteur_ = personne.id_client where message_contact.recepteur_ = $userId and message_contact.vu = true");

            $nonLu = DB::select("select message_contact.*,personne.* from message_contact join personne on message_contact.emetteur_ = personne.id_client where message_contact.recepteur_ = $userId and message_contact.vu = false");



            $messages = Message_contact::Find($imessage);
            $messages->vu = 'true';
            $messages->save();


            $totalMessage = Message_contact::where('message_contact.recepteur_', $userId)->count();

            return \view("email_read", compact('recepteur'))
                ->withUser(session()->get('userObject'))
                ->with('firstLetter', $firstLetter)
                ->with('totalMessage', $totalMessage);
        } else
            return \redirect("/");
    }

    public function LogOut()
    {
        \Auth::logout();
        \Session::flush();
        return \redirect("/");
    }

    public function loginAndRedirectReview(Request $request)
    {
        if ($this->VerifyCredentials($request)) {
            $id_logement = explode("/", $request->get("PageActuel"))[4];
            return Auth_Role_PersonneController::AuthentificatedGoingToPage("review/" . $id_logement);
        } else
            return \redirect($request->get("PageActuel"));
    }

    public function loginAndRedirectProfil(Request $request)
    {
        if ($this->VerifyCredentials($request)) {
            if (session()->get('userObject')->libelle_grade == 'Administratif')
                return Auth_Role_PersonneController::AuthentificatedGoingToPage("Logements");
            return Auth_Role_PersonneController::AuthentificatedGoingToPage("profilUser");
        } else
            return \redirect("/");
    }

    public function sejours()
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {
            $demandes = DB::select("select demande_reservation.id_demande, demande_reservation.date_demande , demande_reservation.date_debut, demande_reservation.date_fin , logement.nom_logement , demande_reservation.refuse_par_admin, demande_reservation.annule_par_client, demande_reservation.date_annulation from demande_reservation inner join logement on demande_reservation.logement_ = logement.id_logement where personne_ = " . session()->get('userObject')->id_client);
            return \view("sejour", \compact('demandes'));
        } else
            return \redirect("/");
    }
}
