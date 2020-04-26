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


// Login & Auth
Route::post('login','Auth_Role_PersonneController@VerifyCredentials')->name('login');

Route::get('logout', 'Auth_Role_PersonneController@LogOut')->name("logout");

Route::get('profilUser','Auth_Role_PersonneController@Profil')->name("profil");

//Front Office
Route::get('/', 'PagesController@welcome');

Route::get('about/{id}', 'PagesController@about')->name('about');

Route::get('multipleabout', 'PagesController@multipleabout');

Route::get('detailRecherche/{id}', 'PagesController@detailRecherche');

Route::get('Finalisation', 'PagesController@finalisation');

Route::get('contact', 'PagesController@contact');
Route::post('contact', 'PagesController@EnvoyerMessage');

Route::get('review/{id}-{datedebut}-{datefin}', 'PagesController@review');

// static
Route::get('blog', 'PagesController@blog');
Route::get('service', 'PagesController@service');


// Back Office
Route::resource('Logements', 'LogementController');
Route::get('/Logements/import_categories', 'LogementController@import_categories')->name('LogementController.import_categories');

Route::resource('demandereservation', 'DemandeReservationController')->only('index');

