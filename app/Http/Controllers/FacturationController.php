<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturation;

class FacturationController extends Controller
{
    public function verifierNumero(Request $request)
    {
        if ($request->ajax()) {

            $numero_telephone = $request->get("numero");

            $request->session()->put("code", "Co-" . rand(99, 1000) . "-" . rand(99, 1000));
            $request->session()->put("telephone", $numero_telephone);

            $basic  = new \Nexmo\Client\Credentials\Basic('08cfc43b', 'LKJg86mrJhdR9EWs');
            $client = new \Nexmo\Client($basic);

            // $message = $client->message()->send([
            //     'to' => '212666201740',
            //     'from' => 'isi3 grp2',
            //     'text' => 'Voici votre code de confirmation :  ' . session()->get('code'),
            // ]);

            $success = array(
                'code' => session()->get('code'),
            );
            echo json_encode($success);
        }
    }

    public function verifierCode(Request $request)
    {
        if ($request->ajax()) {
            $code = $request->get("code");

            if ($code == session()->get('code'))
                $verification = true;
            else
                $verification = false;
            $success = array(
                'feedback' => $verification
            );
            echo json_encode($success);
        }
    }

    public function verifiePaiyement(Request $request)
    {
        if ($request->ajax()) {

            if (true) {
                $data = array(
                    'feedback' => true,
                    'numero_telephone_confirme' =>  session()->get('telephone'),
                );
            } else {
                $data = array(
                    'feedback' => 'pas cool',
                    'valid' => false,
                );
            }
            echo json_encode($data);
        }
    }
}
