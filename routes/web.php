<?php

//this line below imports routes from auth.php
require __DIR__ . '/auth.php';

use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/', 'HomeController@create')
    ->name('home');



//Routes for administrator with prefix /administrator
//example: combi19/administrator/altachofer


Route::group(['prefix' => 'administrator', 'middleware' => ['role:administrator']], function () {

    Route::get('altachofer', [RegisteredUserController::class, 'createChofer'])
        ->name('altachofer');

    Route::post('altachofer', [RegisteredUserController::class, 'storeChofer']);
});



//Routes for Choferes
Route::group(['prefix' => 'chofer', 'middleware' => ['role:chofer']], function () {
});


