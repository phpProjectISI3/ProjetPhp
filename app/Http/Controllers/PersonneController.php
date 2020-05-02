<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personne;
use App\Auth_Role_Personne;
use DB;
use Illuminate\Support\Str;

class PersonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
       
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
    public function editPerrsonnal(Request $request)
    {
        //
        
        if(Auth_Role_PersonneController::IsAuthentificated())
        {
            $userId = $request->session()->get('userObject')->id_client;
            $personnes = DB::select('select personne.*,sexe.libelle_sexe, grade.libelle_grade, auth_role_personne.username_email,auth_role_personne.mot_de_passe from personne 
            join grade on personne.grade_ = grade.id_grade 
            join sexe on personne.sexe_ = sexe.id_sexe
            join auth_role_personne on auth_role_personne.personne_role_ = personne.id_client
            where personne.id_client = ' . $userId);

            if($request->has('personnalInformation') ){

                $nomComplet = explode(" ", $request->input('fullname'));
                $nom = $nomComplet[0];
                $prenom = $nomComplet[1];
                $sexe =  Str::lower($request->input('customRadioInline1'));
                $dateNaissance = $request->input('birthDate');
                $statutFamiliale = $request->input('familaleStatu');
                
                DB::table('personne')
                ->where('id_client',$userId)
                ->update(['nom'=>$nom, 'prenom'=>$prenom, 'sexe_'=>$sexe, 'date_naissance'=>$dateNaissance, 'est_marie'=>$statutFamiliale]);

            }

            if($request->has('calculSubmit') ){
                $nbreEnfantScholarise = $request->input('nbreEnfantScholarise');
                $nbreEnfantnonScholarise = $request->input('nbreEnfantNonScholarise');

                DB::table('personne')
                ->where('id_client',$userId)
                ->update(['nbr_enfant_scolarise'=>$nbreEnfantScholarise,'nbr_enfant_non_scolarise'=>$nbreEnfantnonScholarise]);
            }

            if($request->has('loginButon')){
                $username = $request->input('username');
                $password = $request->input('password');

                DB::table('auth_role_personne')
                ->where('personne_role_',$userId)
                ->update(['username_email'=>$username,
                'mot_de_passe'=>$password]);
            }
            
            return \view("Profile",compact('personnes'))->withUser(session()->get('userObject'));
        }
        else
            return \redirect()->action('Auth_Role_PersonneController@Profile')-withUser(session()->get('userObject'));
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