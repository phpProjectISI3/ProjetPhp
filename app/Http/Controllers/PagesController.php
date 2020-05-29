<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;
use DB;
use App\Logement;
use App\TypeLogement;
use App\Detail_logement;
use App\Message_contact;
use App\Sauvegarde_logement;

class PagesController extends Controller
{
    public function welcome()
    {
        // Select tous les éléments de la table Type Logement
        $types = TypeLogement::All();

        return view('welcome', compact('types'));
    }

    // methode pour multicritère : Accueil ==> About
    public function multipleabout(Request $request)
    {
        // retourne l'id selectionner par select
        $optionValue = $request->input('type', -1);

        // creer une varibale de session contien la date_debut saisi par le client
        $request->session()->put('datedebut', Carbon::parse($request->input('date-start'))->format('Y-m-d'));
        // variable pour stocker la date_debut
        $datedebut = $request->session()->get('datedebut');

        // creer une varibale de session contien la date_fin saisi par le client
        $request->session()->put('datefin', Carbon::parse($request->input('date-end'))->format('Y-m-d'));
        // variable pour stocker la date_fin
        $datefin = $request->session()->get('datefin');

        // test si l'option n'est pas selectionner
        if ($optionValue == -1) {
            //select tous les types
            $types = TypeLogement::All();
            //select toutes les capacites des personnes
            $CapacitePersonne = DB::table('detail_logement')->select(DB::raw('detail_logement.capacite_personne_max'))->groupBy('detail_logement.capacite_personne_max')->get();
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail ');
            $villes = DB::select("select split_part(logement.adress_logement,',',1) as adress_logement from logement group by split_part(logement.adress_logement,',',1)");
        } else {
            //select tous les types
            $types = TypeLogement::All();
            //select toutes les capacites des personnes
            $CapacitePersonne = DB::table('detail_logement')->select(DB::raw('detail_logement.capacite_personne_max'))->groupBy('detail_logement.capacite_personne_max')->get();
            // test pour verifier si le client a saisi des dates
            $logements = DB::select(DB::raw("select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail
                join planning_logement on logement.id_logement = planning_logement.logement_ where detail_logement.type_logement_ = $optionValue and planning_logement.date_debut <= ' $datedebut ' and planning_logement.date_fin >= ' $datefin'"));
            $villes = DB::select("select split_part(logement.adress_logement,',',1) as adress_logement from logement group by split_part(logement.adress_logement,',',1)");
        }
        return view('about', ['logements' => $logements, 'types' => $types, 'CapacitePersonne' => $CapacitePersonne, 'villes' => $villes]);
    }

    public function selectType(Request $request)
    {
        $types = TypeLogement::All();
        //select toutes les capacites des personnes
        $CapacitePersonne = DB::table('detail_logement')->select(DB::raw('detail_logement.capacite_personne_max'))->groupBy('detail_logement.capacite_personne_max')->get();
        //select villes
        $villes = DB::select("select split_part(logement.adress_logement,',',1) as adress_logement from logement group by split_part(logement.adress_logement,',',1)");
        //prend la valeur de type selectionné
        $type = $request->input('typeid');
        //prend la valeur de nombre de personnes selectionné
        $capacitePersonne = $request->input('capacitepersonne');
        //prend la valeur de la ville selectionné
        $ville = $request->input('ville');
        //si la session est  définie on l'affecte 
        if (Session()->has('datedebut')) {
            if ($request->input('date-start') != null) {
                // creer une varibale de session contien la date_debut saisi par le client
                $request->session()->put('datedebut', Carbon::parse($request->input('date-start'))->format('Y-m-d'));
                $dateStart = $request->session()->get('datedebut');
            } else
                $dateStart = $request->session()->get('datedebut');
        } else {
            // creer une varibale de session contien la date_debut saisi par le client
            $request->session()->put('datedebut', Carbon::parse($request->input('date-start'))->format('Y-m-d'));
            $dateStart = $request->session()->get('datedebut');
        }

        if (Session()->has('datefin')) {
            if ($request->input('date-end') != null) {

                // creer une varibale de session contien la date_fin saisi par le client
                $request->session()->put('datefin', Carbon::parse($request->input('date-end'))->format('Y-m-d'));
                $dateEnd = $request->session()->get('datefin');
            } else
                $dateEnd = $request->session()->get('datefin');
        } else {
            // creer une varibale de session contien la date_fin saisi par le client
            $request->session()->put('datefin', Carbon::parse($request->input('date-end'))->format('Y-m-d'));
            $dateEnd = $request->session()->get('datefin');
        }

        //test si tous les inputs ne sont pas null
        if ($type != null && $capacitePersonne != null && $ville != null && $dateStart != null && $dateEnd != null) {
            $logements = DB::select(DB::raw("select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail join planning_logement on logement.id_logement = planning_logement.logement_ where detail_logement.type_logement_ = $type and detail_logement.capacite_personne_max = $capacitePersonne and split_part(logement.adress_logement,',',1) = '$ville' and '$dateStart' BETWEEN planning_logement.date_debut and planning_logement.date_fin and '$dateEnd' BETWEEN planning_logement.date_debut and planning_logement.date_fin"));
        } else {
            //select les logement
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail ');
        }

        return view('about', ['logements' => $logements, 'types' => $types, 'CapacitePersonne' => $CapacitePersonne, 'villes' => $villes]);
    }

    public function about($id)
    {
        if ($id == -1) {
            //select tous les types
            $types = TypeLogement::All();
            //select toutes les capacites des personnes
            $CapacitePersonne = DB::table('detail_logement')->select(DB::raw('detail_logement.capacite_personne_max'))->groupBy('detail_logement.capacite_personne_max')->get();
            //select les logement
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail ');

            $villes = DB::select("select split_part(logement.adress_logement,',',1) as adress_logement from logement group by split_part(logement.adress_logement,',',1)");
        } else {
            //select tous les types
            $types = TypeLogement::All();
            //select toutes les capacites des personnes
            $CapacitePersonne = DB::select('select detail_logement.capacite_personne_max from detail_logement group by detail_logement.capacite_personne_max  order by detail_logement.capacite_personne_max asc');
            //select les logement
            $logements = DB::select('select logement.id_logement, logement.adress_logement, logement.nom_logement, detail_logement.tarif_par_nuit_hs, detail_logement.description_logement from logement join  detail_logement on logement.detail_logement_= detail_logement.id_detail where detail_logement.type_logement_ = ' . $id);

            $villes = DB::select('select logement.adress_logement from logement group by logement.adress_logement');
        }
        return view('about', ['logements' => $logements, 'types' => $types, 'CapacitePersonne' => $CapacitePersonne, 'villes' => $villes]);
    }

    public function blog()
    {
        return view('blog');
    }


    public function contact()
    {
        return view('contact');
    }

    public function EnvoyerMessage(Request $request)
    {
        $message = new Message_contact();
        $message->emetteur_ = $request->emeteur;
        $message->message_ecrit = $request->message;
        $message->recepteur_ = 1012;
        $message->save();

        $message = new Message_contact();
        $message->emetteur_ = $request->emeteur;
        $message->message_ecrit = $request->message;
        $message->recepteur_ = 1013;
        $message->save();

        $message = new Message_contact();
        $message->emetteur_ = $request->emeteur;
        $message->message_ecrit = $request->message;
        $message->recepteur_ = 1014;
        $message->save();

        $message = new Message_contact();
        $message->emetteur_ = $request->emeteur;
        $message->message_ecrit = $request->message;
        $message->recepteur_ = 1015;
        $message->save();

        return response()->json(['success' => 'submitted !']);
    }

    public function detailRecherche(Request $request, $id)
    {
        $logement = DB::table('logement')
            ->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')
            ->select('*')
            ->where('logement.id_logement', $id)
            ->first();

        $photo_logement = DB::table('photo_logement')
            ->select('photo_logement.chemin_photo')
            ->where('photo_logement.logement_', $id)
            ->get();

        // stocke la valeur de la variable de session(datedebut)
        $datedebut = Carbon::parse($request->session()->get('datedebut'))->format('Y-m-d');
        // stocke la valeur de la variable de session(datefin)
        $datefin = Carbon::parse($request->session()->get('datefin'))->format('Y-m-d');
        // calcule l'interval entre les dates (nombre de jours)
        $interval = (strtotime($datefin) - strtotime($datedebut)) / (60 * 60 * 24);

        //reformater la date sous format par exemple : 15 juillet 2020
        setlocale(LC_TIME, 'French');
        $datedebut = Carbon::parse($request->session()->get('datedebut'))->formatLocalized('%d %B %Y');
        $datefin = Carbon::parse($request->session()->get('datefin'))->formatLocalized('%d %B %Y');

        // calcule tarif par saison
        $tarif_bs = $logement->tarif_par_nuit_bs * $interval;
        $tarif_hs = $logement->tarif_par_nuit_hs * $interval;

        return view('detailRecherche', compact('logement', 'photo_logement'))
            ->with('datedebut', $datedebut)
            ->with('datefin', $datefin)
            ->with('interval', $interval)
            ->with('tarif_bs', $tarif_bs)
            ->with('tarif_hs', $tarif_hs);
    }

    public function service()
    {
        return view('service');
    }

    public function favorit(Request $request)
    {
        if ($request->ajax()) {
            $sauvegarde = new Sauvegarde_logement;
            $sauvegarde->client_ = session()->get('userObject')->id_client;
            $sauvegarde->logement_ = $request->get("ID");
            $sauvegarde->save();

            $nomLogement = Logement::find($request->get("ID"))->nom_logement;

            $success = array(
                'nomLogement' => $nomLogement,
            );
            echo json_encode($success);
        }
    }

    public function NonFavorit(Request $request)
    {
        if ($request->ajax()) {
            $sauvegarde = DB::table('sauvegarde_logement')
                ->where('sauvegarde_logement.client_', session()->get('userObject')->id_client)
                ->where('sauvegarde_logement.logement_', $request->get("ID"));
            $sauvegarde->delete();

            $nomLogement = Logement::find($request->get("ID"))->nom_logement;

            $suprime = array(
                'nomLogement' => $nomLogement,
            );
            echo json_encode($suprime);
        }
    }

    public function review($id_logement)
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {
            $logement = DB::table('logement')
                ->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')
                ->select('*')
                ->where('logement.id_logement', $id_logement)
                ->first();

            // calcule l'interval entre les dates (nombre de jours)
            $datedebutNoFormat = Carbon::parse(session()->get('datedebut'))->format('Y-m-d');
            $datefinNoFormat = Carbon::parse(session()->get('datefin'))->format('Y-m-d');
            $interval = (strtotime($datefinNoFormat) - strtotime($datedebutNoFormat)) / (60 * 60 * 24);

            //reformater la date sous format par exemple : 15 juillet 2020
            setlocale(LC_TIME, 'French');

            // calcule tarif par saison
            $tarif_bs = $logement->tarif_par_nuit_bs * $interval;
            $tarif_hs = $logement->tarif_par_nuit_hs * $interval;

            return view('review')
                ->with('logement', $logement)
                ->with('datedebut', Carbon::parse(session()->get('datedebut'))->formatLocalized('%d %B %Y'))
                ->with('datefin', Carbon::parse(session()->get('datefin'))->formatLocalized('%d %B %Y'))
                ->with('datedebutNoFormat', $datedebutNoFormat)
                ->with('datefinNoFormat', $datefinNoFormat)
                ->with('interval', $interval)
                ->with('tarif_bs', $tarif_bs)
                ->with('tarif_hs', $tarif_hs);
        } else
            return \redirect("/");
    }

    public function finalisation($demande_reservation)
    {
        if (Auth_Role_PersonneController::IsAuthentificated()) {
            $data = DB::table('logement')
                ->join('demande_reservation', 'logement.id_logement', '=', 'demande_reservation.logement_')
                ->join('detail_logement', 'logement.detail_logement_', '=', 'detail_logement.id_detail')
                ->select('*')
                ->where('demande_reservation.id_demande', $demande_reservation)
                ->first();
            setlocale(LC_TIME, 'French');
            $datedebut = Carbon::parse($data->date_debut)->formatLocalized('%d %B %Y');
            $date_fin = Carbon::parse($data->date_fin)->formatLocalized('%d %B %Y');

            $interval = (strtotime(Carbon::parse($data->date_fin)->format('Y-m-d')) - strtotime(Carbon::parse($data->date_debut)
                ->format('Y-m-d')))
                / (60 * 60 * 24);
            $tarif_bs = $data->tarif_par_nuit_bs * $interval;
            $tarif_hs = $data->tarif_par_nuit_hs * $interval;

            return view('finalisation')
                ->with('logement', $data)
                ->with('interval', $interval)
                ->with('tarif_bs', $tarif_bs)
                ->with('tarif_hs', $tarif_hs)
                ->with('datedebut', utf8_encode($datedebut))
                ->with('datefin', utf8_encode($date_fin));
        } else
            return \redirect("/");
    }
}
