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

// Login & Auth
Route::post('login', 'Auth_Role_PersonneController@VerifyCredentials')->name('login');

Route::get('logout', 'Auth_Role_PersonneController@LogOut')->name("logout");

Route::get('profilUser', 'Auth_Role_PersonneController@Profil')->name("profil");

Route::post('loginAndRedirectReview', 'Auth_Role_PersonneController@loginAndRedirectReview')->name("loginAndRedirectReview");

Route::post('loginAndRedirectProfil', 'Auth_Role_PersonneController@loginAndRedirectProfil')->name("loginAndRedirectProfil");

Route::post('editPerrsonnal', 'PersonneController@editPerrsonnal');

//Front Office
Route::get('/', 'PagesController@welcome');

Route::get('about/{id}', 'PagesController@about')->name('about');

Route::get('multipleabout', 'PagesController@multipleabout');

Route::get('detailRecherche/{id}', 'PagesController@detailRecherche');

Route::get('Finalisation/{id}', 'PagesController@finalisation');

Route::get('contact', 'PagesController@contact');
Route::post('contact', 'PagesController@EnvoyerMessage');

Route::get('review/{id}', 'PagesController@review');

Route::post('store', 'DemandeReservationClientController@store')->name('saveDemande');

Route::get('favorit', 'PagesController@favorit')->name('PagesController.favorit');
Route::get('NonFavorit', 'PagesController@NonFavorit')->name('PagesController.NonFavorit');

Route::get('selectType', 'PagesController@selectType')->name('PagesController.selectType');

Route::get('verifieNum', 'FacturationController@verifierNumero')->name('FacturationController.verifierNumero');
Route::get('verifieCode', 'FacturationController@verifierCode')->name('FacturationController.verifierCode');
Route::get('verifiePaiyement', 'FacturationController@verifiePaiyement')->name('FacturationController.verifiePaiyement');

Route::get('favories', 'Auth_Role_PersonneController@favories')->name('favories');

Route::get('messagerie', 'Auth_Role_PersonneController@messagerie')->name('messagerie');

Route::get('email_compose', 'Auth_Role_PersonneController@email_compose')->name('email_compose');
Route::post('sendMessage', 'Auth_Role_PersonneController@sendMessage')->name('sendMessage');

Route::get('sejours', 'Auth_Role_PersonneController@sejours')->name('sejours');

Route::get('InfoAnnulationDemande', 'DemandeReservationClientController@InfoAnnulationDemande')->name('DemandeReservationClientController.InfoAnnulationDemande');
Route::get('AnnulationDemande/{id}', 'DemandeReservationClientController@AnnulationDemande')->name('DemandeReservationClientController.AnnulationDemande');

Route::get('read_email/{idmessage}', 'Auth_Role_PersonneController@read_email')->name('Auth_Role_PersonneController.read_email');

// static
Route::get('blog', 'PagesController@blog');
Route::get('service', 'PagesController@service');


// Back Office
Route::resource('Logements', 'LogementController');
Route::get('/Logements/import_categories', 'LogementController@import_categories')->name('LogementController.import_categories');

Route::get('Admin/Statistiques', 'LogementController@Statistiques');
Route::get('Admin/Historique', 'DemandeReservationController@historique');
Route::get('Admin/Facturation', 'DemandeReservationController@Facturation');
Route::get('Admin/Demandes', 'DemandeReservationController@Demandes');
Route::get('Admin/Reservation', 'DemandeReservationController@Reservation');
Route::get('Admin/Clients', 'PersonneController@Clients');

Route::post('RefuserDemande', 'DemandeReservationController@RefuserDemande')->name("RefuserDemande");
Route::post('AccepterDemande', 'DemandeReservationController@AccepterDemande')->name("AccepterDemande");

Route::post('EnregistrerClient', 'PersonneController@EnregistrerClient')->name("EnregistrerClient");
