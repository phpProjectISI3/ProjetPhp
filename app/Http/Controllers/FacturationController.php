<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Facturation;

class FacturationController extends Controller
{
    public function verifierNumero(Request $request){
		if($request->ajax()){

            $numero_telephone = $request->get("numero");

            //envoyer sms
            // au numero de telephone


            $success = array(
                'feedback' => 'cool',
            );
		    echo json_encode($success);
        }
    }

    public function verifierCode(Request $request){
		if($request->ajax()){
            $code = $request->get("code");

            //envoyer code
            // au numero de telephone


            $success = array(
                'feedback' => 'cool',
            );
		    echo json_encode($code);
        }
    }
    
    public function verifiePaiyement(Request $request){
		if($request->ajax()){
            $code = $request->get("code");

            if(true){
                $data = array(
                    'feedback' => 'cool',
                    'valid' => true,
                    'numero_telephone_confirme' => '06 66201740'
                );
            }
            else{
                $data = array(
                    'feedback' => 'pas cool',
                    'valid' => false,
                );
            }
		    echo json_encode($data);
        }
    }

}