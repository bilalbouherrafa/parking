<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/TEST', function () {
    return view('test');
});


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/EditMembres', 'controllerMembres@affMembres')->name('editMembres');

Route::get('/SupprimerMembres/{user}', 'controllerMembres@delMembres')->name('editmembresDel');

Route::get('/premdpMembre/{user}', 'controllerMembres@premdpMembres')->name('editmembrespreMdp');

Route::post('/EditedMdp/{user}', 'controllerMembres@mdpMembres')->name('editmembresMdp');

Route::get('/EditPlaces', 'controllerPlaces@affPlaces')->name('editPlaces');

Route::post('/CreerPlaces', 'controllerPlaces@creerPlaces')->name('creerPlaces');

Route::get('/SupprimerPlace/{place}', 'controllerPlaces@supprimerPlaces')->name('supprimerPlaces');

Route::get('/ReserverPlace/', 'controllerReservations@preresPlace')->name('preresPlace');

Route::post('/ReserveePlace/', 'controllerReservations@reserverPlace')->name('reserverPlace');

Route::get('/premodifDatePlaces/{place}', 'controllerPlaces@premodifDatePlace')->name('premodifDatePlaces');

Route::post('/modifDatePlace/{place}', 'controllerPlaces@modifDatePlace')->name('modifDatePlace');

Route::get('/preattribuerPlaces/{place}', 'controllerPlaces@preattribuerPlace')->name('preattribuerPlaces');

Route::post('/attribuerPlace/{place}', 'controllerPlaces@attribuerPlace')->name('attribuerPlace');

Route::get('/EditListe', 'controllerMembres@affListe')->name('editListe');

Route::get('/Historique', 'controllerReservations@affHistorique')->name('historique');

