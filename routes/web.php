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

// Example Routes
Route::view('/', 'landing');

Route::match(['get', 'post'], '/dashboard', function(){
    return view('dashboard');
})->middleware('verified');


Route::view('/pages/slick', 'pages.slick')->middleware('verified');
Route::view('/pages/datatables', 'pages.datatables')->middleware('verified');
Route::view('/pages/blank', 'pages.blank')->middleware('verified');;

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');




// Inicio Ricardo Sosa

/*
 * CRUD Destinations
 */
Route::resource('/destinations', 'DestinationController')->middleware('verified');

Route::get('/destinations/{id}/confirm', 'DestinationController@confirm')->name('destinations.confirm')->middleware('verified');


# CRUD Airline
Route::resource('/airlines', 'AirlineController')->middleware('verified');
Route::get('/airlines/{id}/confirm', 'AirlineController@confirm')->name('airlines.confirm')->middleware('verified');


// Fin Ricardo Sosa


// Inicio ARIEL ZELAYA
//AIRPORT
Route::resource('/airport','AirportController');
Route::get('/airport/{id}/confirm', 'AirportController@confirm')->name('airport.confirm');
//GATEWAY
Route::resource('/gateway','TerminalController');
Route::get('/gateway/{id}/confirm', 'TerminalController@confirm')->name('gateway.confirm');
//FIN ARIEL ZELAYA
