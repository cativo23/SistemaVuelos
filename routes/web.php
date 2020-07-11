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
Route::view('/pages/blank', 'pages.blank')->middleware(['verified', 'logs-out-banned-user']);
Route::view('/banned', 'auth.banned')->name('banned');

/*
 * Cativo's Stuff START
 */

Route::group(['middleware' => ['verified', 'logs-out-banned-user'], 'prefix' => 'super', 'as' => 'super.', 'namespace' => 'Super'], function () {
    Route::get('/home', 'HomeController@index')->name('home');
    Route::delete('abilities/mass_destroy', 'AbilitiesController@mass')->name('abilities.mass');
    Route::resource('abilities', 'AbilitiesController');
    Route::delete('roles/mass_destroy', 'RolesController@mass')->name('roles.mass');
    Route::resource('roles', 'RolesController');
    Route::delete('users/mass_destroy', 'UsersController@mass')->name('users.mass');
    Route::resource('users', 'UsersController');
    Route::post('users/{user}/ban', 'UsersController@ban');
    Route::get('users/{user}/give_airport', 'UsersController@showGiveAirportPermission')->name('show_give_airport');
    Route::put('users/{user}/give_airport', 'UsersController@giveAirportPermission')->name('give_airport');
    Route::get('users/{user}/remove_airport', 'UsersController@removeAirportPermission')->name('remove_airport');
});

Auth::routes(['verify' => true]); //Auth Routes

Route::match(['get', 'post'], '/dashboard','DashboardController@index')->middleware('verified')->middleware('forbid-banned-user');

Route::resource('/flights', 'FlightController')->middleware('verified', 'forbid-banned-user');

Route::resource('/backups', 'BackupController')->middleware('verified', 'forbid-banned-user');

Route::delete('itineraries/mass_destroy', 'ItineraryController@mass')->name('itineraries.mass');
Route::resource('/itineraries', 'ItineraryController')->middleware('verified', 'forbid-banned-user');

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
Route::delete('airlines/mass_destroy', 'AirlineController@mass')->name('airlines.mass');
Route::resource('/airlines', 'AirlineController')->middleware(['verified']);
Route::get('/airlines/{id}/confirm', 'AirlineController@confirm')->name('airlines.confirm')->middleware(['verified']);


# CRUD Airplane
Route::delete('airplanes/mass_destroy', 'AirplaneController@mass')->name('airplanes.mass');
Route::resource('/airplanes', 'AirplaneController');
Route::get('/airplanes/{id}/confirm', 'AirplaneController@confirm')->name('airplanes.confirm');

# CRUD Seat
Route::resource('/seats', 'SeatController');
Route::get('/seats/{id}/confirm', 'SeatController@confirm')->name('seats.confirm');

# CRUD Cliente Natural
Route::resource('/clientNaturals', 'ClientNaturalController');
Route::get('/clientNaturals/{id}/confirm', 'ClientNaturalController@confirm')->name('clientNaturals.confirm');

# CRUD Cliente Empresa
Route::resource('/clientCompanys', 'ClientCompanyController');
Route::get('/clientCompanys/{id}/confirm', 'ClientCompanyController@confirm')->name('clientCompanys.confirm');

// Fin Ricardo Sosa





// Inicio ARIEL ZELAYA
//AIRPORT
Route::resource('/airports','AirportController');
Route::get('/airports/{id}/confirm', 'AirportController@confirm')->name('airports.confirm');
//GATEWAY
Route::resource('/gateways','TerminalController');
Route::get('/gateways/{id}/confirm', 'TerminalController@confirm')->name('gateways.confirm');
//PAYMENT
Route::resource('/payments','PaymentController');
//Route::get('/gateways/{id}/confirm', 'TerminalController@confirm')->name('gateway.confirm');
//FIN ARIEL ZELAYA
