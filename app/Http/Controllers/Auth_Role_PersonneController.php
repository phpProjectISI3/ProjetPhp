<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Auth_role_personne;

class Auth_Role_PersonneController extends Controller
{
    public function VerifyCredentials(Request $request)
    {   
        $user = collect(DB::select("select id_client, nom, prenom, libelle_sexe, est_marie, nbr_enfant_scolarise, nbr_enfant_non_scolarise, libelle_grade, date_naissance, point_personne, username_email, mot_de_passe,description_role,libelle_role from sexe inner join personne on sexe.id_sexe = personne.sexe_ inner join grade on grade.id_grade = personne.grade_ inner join auth_role_personne on personne.id_client = auth_role_personne.personne_role_ inner join auth_role on auth_role_personne.auth_role_ = auth_role.id_role where username_email = '".$request->get('email')."' and mot_de_passe = '".$request->get('motdepasse')."'"))
                ->first();
        if(isset($user) == true){
            $request->session()->put('userObject',$user);
            return true;
        }
        // return Auth_Role_PersonneController::AuthentificatedGoingToPage("profilUser");
        //return $this->Profil();
        return false;
    }   

    public static function AuthentificatedGoingToPage($MyUrl)
    {
        if(Auth_Role_PersonneController::IsAuthentificated())
            return \redirect($MyUrl);
        else
            return \redirect("/");
    }

    public static function IsAuthentificated()
    {
        if(session()->has('userObject'))
           return true;
        return false;
    }

    public function Profil(){
        if(Auth_Role_PersonneController::IsAuthentificated())
            return \view("profil")->withUser(session()->get('userObject'));
        else
            return \redirect("/");
    }

    public function LogOut()
    {
        \Auth::logout();
        \Session::flush();
        return \redirect("/");
    }

    public function loginAndRedirectReview(Request $request){
       if($this->VerifyCredentials($request))
       {
         $id_logement = explode("/",$request->get("PageActuel"))[4]; 
         return Auth_Role_PersonneController::AuthentificatedGoingToPage("review/".$id_logement);
        }
        else
            return \redirect($request->get("PageActuel"));
    }

    public function loginAndRedirectProfil(Request $request){
        if($this->VerifyCredentials($request))
            return Auth_Role_PersonneController::AuthentificatedGoingToPage("profilUser");
        else
            return \redirect("/");
    }
}