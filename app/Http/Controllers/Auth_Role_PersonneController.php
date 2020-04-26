<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auth_role_personne;

class Auth_Role_PersonneController extends Controller
{
    public function login(Request $request)
    {   
        // echo $request;
        $request->session()->put('userdata',$request->input());
        // return  $request->session()->get('userdata');
        if($request->session()->has('userata')){
            return \redirect('profile');
        }
        else
        return \view("welcome");
    }   

    public function profil()
    {
        return \view('profil');
    }
}