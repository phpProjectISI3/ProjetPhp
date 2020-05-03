<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Auth_role_personne;
use App\Personne;


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

    public function Profil(Request $request){
        if(Auth_Role_PersonneController::IsAuthentificated())
        {
            $userId = $request->session()->get('userObject')->id_client;
            $personnes = DB::select('select personne.*,sexe.libelle_sexe, grade.libelle_grade, auth_role_personne.username_email,auth_role_personne.mot_de_passe from personne 
            join grade on personne.grade_ = grade.id_grade 
            join sexe on personne.sexe_ = sexe.id_sexe
            join auth_role_personne on auth_role_personne.personne_role_ = personne.id_client
            where personne.id_client = ' . $userId);
            // $authentification = DB::table('auth_role_personne')->selectRaw('auth_role_personne.username_email, auth_role_personne.mot_de_passe')->where('auth_role_personne',$userId)->get();
            return \view("Profile",compact('personnes'))->withUser(session()->get('userObject'));
        }
        else
            return \redirect("/");
    }

    public function favories(){
        
        return view('favories');
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

    // public function CurrentUser(){
    //     if(Auth_Role_PersonneController::IsAuthentificated()){
    //         return session()->get('userObject');
    //     }
    // }
}