<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('about', function(){
//     $bitfumes = ['this', 'is', 'Bitfumes'];
//     // first methode to send data to a view
//     // return view('about',['bitfums'=>$bitfumes]);

//     // send methode is 
//     // return view('about',)->with(['bitfumes'=>$bitfumes]);

//     // the 3rd is with + the name of variable contain data
//     // return view('about')->withBitfumes($bitfumes);

//     // 4th methode is 
//         return view('about',compact('bitfumes'));
// });


Route::get('/','PagesController@welcome');

Route::get('about','PagesController@about');

Route::get('blog', 'PagesController@blog');

Route::get('service','PagesController@service');

Route::get('detailRecherche', 'PagesController@detailRecherche');

Route::get('contact', 'PagesController@contact');

Route::get('login','PagesController@login');