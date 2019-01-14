<?php

use Illuminate\Http\Request;


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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//admin login and register

Route::post('admin/register', 'LoginController@adminRegister');
Route::post('admin/login', 'LoginController@adminLogin');
Route::post('admin/logout', 'LoginController@adminLogout');
//prof login and register

Route::post('prof/register', 'LoginController@profRegister');
Route::post('prof/login', 'LoginController@profLogin');
Route::post('prof/logout', 'LoginController@profLogout');

//scolarite login
Route::post('scolarite/login', 'LoginController@scolariteLogin');
Route::post('scolarite/logout', 'LoginController@scolariteLogout');

//Admin urls
Route::middleware('jwt.auth')->group(function(){
    Route::resource('etudiants','RestAPI\EtudiantController');
});

//Route::resource('etudiants','RestAPI\EtudiantController');


//Prof urls
Route::middleware('jwt.auth')->group(function(){
    Route::resource('profs','RestAPI\ProfController');
});

Route::middleware('jwt.auth')->group(function(){
    Route::resource('scolarities','RestAPI\ScolariteController');
});



Route::middleware('jwt.auth')->get('me', function(Request $request){
    return auth()->user();
});





