<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Personne;
use App\Auth_Role_Personne;
use DB;
use Illuminate\Support\Str;

class PersonneController extends Controller
{
    public function editPerrsonnal(Request $request)
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {
            $userId = $request->session()->get('userObject')->id_client;
            $personnes = DB::select('select personne.*,sexe.libelle_sexe, grade.libelle_grade, auth_role_personne.username_email,auth_role_personne.mot_de_passe from personne 
            join grade on personne.grade_ = grade.id_grade 
            join sexe on personne.sexe_ = sexe.id_sexe
            join auth_role_personne on auth_role_personne.personne_role_ = personne.id_client
            where personne.id_client = ' . $userId);

            if ($request->has('personnalInformation')) {

                $nomComplet = explode(" ", $request->input('fullname'));
                $nom = $nomComplet[0];
                $prenom = $nomComplet[1];
                $sexe =  Str::lower($request->input('customRadioInline1'));
                $dateNaissance = $request->input('birthDate');
                $statutFamiliale = $request->input('familaleStatu');

                DB::table('personne')
                    ->where('id_client', $userId)
                    ->update(['nom' => $nom, 'prenom' => $prenom, 'sexe_' => $sexe, 'date_naissance' => $dateNaissance, 'est_marie' => $statutFamiliale]);
            }

            if ($request->has('calculSubmit')) {
                $nbreEnfantScholarise = $request->input('nbreEnfantScholarise');
                $nbreEnfantnonScholarise = $request->input('nbreEnfantNonScholarise');

                DB::table('personne')
                    ->where('id_client', $userId)
                    ->update(['nbr_enfant_scolarise' => $nbreEnfantScholarise, 'nbr_enfant_non_scolarise' => $nbreEnfantnonScholarise]);
            }

            if ($request->has('loginButon')) {
                $username = $request->input('username');
                $password = $request->input('password');

                DB::table('auth_role_personne')
                    ->where('personne_role_', $userId)
                    ->update([
                        'username_email' => $username,
                        'mot_de_passe' => $password
                    ]);
            }

            return back()->withUser(session()->get('userObject'));
        } else
            return \redirect()->action('Auth_Role_PersonneController@Profile')->withUser(session()->get('userObject'));
    }

    public function Clients()
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {

            if (session()->get('userObject')->libelle_grade == 'Administratif') {

                $clients =  DB::select("select personne.id_client, concat(personne.prenom , ' ' , personne.nom) as nom_complet , personne.point_personne , grade.libelle_grade
        from personne inner join grade on personne.grade_ = grade.id_grade
        where personne.id_client not in (1012, 1013, 1014, 1015)");
                return view("BackOfficeAdmin.GestionDesClients.Clients", compact("clients"));
            }
        } else
            return \redirect("/");
    }

    public function EnregistrerClient(Request $request)
    {
        $client = new Personne;
        $client->id_client = collect(DB::select("select id_client
                                                from personne
                                                order by id_client desc
                                                limit 1;"))->first()->id_client + 1;
        $client->nom = $request->get('InputNom');
        $client->prenom = $request->get('InputPrenom');
        $client->nbr_enfant_scolarise = $request->get('InputEnfant_sco');
        $client->nbr_enfant_non_scolarise = $request->get('InputEnfant_non_sco');
        $client->sexe_ = $request->get('InputSexe');
        $client->grade_ = $request->get('InputGrade');
        $client->est_marie = $request->get('InputSituation');
        $client->date_naissance = $request->get('InputDateN');
        $client->save();
        return \redirect('Admin/Clients');
    }
}
