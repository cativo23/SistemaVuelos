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

Route::view('/pages/slick', 'pages.slick')->middleware('verified');
Route::view('/pages/datatables', 'pages.datatables')->middleware('verified');
Route::view('/pages/blank', 'pages.blank')->middleware('verified');;


/*
 * Cativo's Stuff START
 */

Route::group(['middleware' => ['verified'], 'prefix' => 'super', 'as' => 'super.', 'namespace' => 'Super'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::post('abilities/destroy', 'AbilitiesController@massDestroy')->name('abilities.massDestroy');
    Route::resource('abilities', 'AbilitiesController');
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

});

Auth::routes(['verify' => true]); //Auth Routes

Route::match(['get', 'post'], '/dashboard','DashboardController@index')->middleware('verified');

Route::get('/roles', 'RolesController@index')->middleware('verified');

Route::get('/getadmin', 'RolesController@asign_admin');

/*
 * Cativo's Stuff END
 */



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

Route::resource('/airport','AirportController');
Route::get('/airport/{id}/confirm', 'AirportController@confirm')->name('airport.confirm');

//FIN ARIEL ZELAYA
