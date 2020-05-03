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
})->middleware('verified');;
Route::view('/pages/slick', 'pages.slick')->middleware('verified');
Route::view('/pages/datatables', 'pages.datatables')->middleware('verified');
Route::view('/pages/blank', 'pages.blank')->middleware('verified');;

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');




// Inicio Ricardo Sosa

# CRUD Destionation
Route::resource('/destinations', 'DestinationController');

Route::get('/cancelar', function(){
	return redirect()->route('destinations.index');
})->name('cancelar');

Route::get('/destinations/{id}/confirm', 'DestinationController@confirm')->name('destinations.confirm');


# CRUD Airline
Route::resource('/airlines', 'AirlineController');

Route::get('/cancelarAerolinea', function(){
	return redirect()->route('airlines.index');
})->name('cancelarAerolinea');

Route::get('/airlines/{id}/confirm', 'AirlineController@confirm')->name('airlines.confirm');


// Fin Ricardo Sosa


// Inicio ARIEL ZELAYA

Route::resource('/airport','AirportController');



Route::get('/airport/{id}/confirm', 'AirportController@confirm')->name('airport.confirm');

//FIN ARIEL ZELAYA
