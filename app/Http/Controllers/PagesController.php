<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PagesController extends Controller
{
    //welcome page
    public function welcome(){
        return view('welcome');
    }

    // about page
    public function about(){
        return view('about');
    }

    public function blog(){
        return view('blog');
    }

    public function contact(){
        return view('contact');
    }

    public function detailRecherche(){
        return view('detailRecherche');
    }

    public function service(){
        return view('service');
    }

    public function login(){
        return view('login');
    }

}
