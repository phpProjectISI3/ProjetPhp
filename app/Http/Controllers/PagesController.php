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
}
