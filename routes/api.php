<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
/*
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

Route::get('/create_backup', 'APIController@aws_make_backup');
Route::get('/describe_backups','APIController@aws_describe_backups');
Route::get('/restore_backup', 'APIController@aws_restore_backup');
Route::get('/airlines', 'APIController@get_airlines');
Route::get('/airports', 'APIController@get_airports');
Route::get('/airplanes', 'APIController@get_airplanes');
