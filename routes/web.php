<?php

//this line below imports routes from auth.php
require __DIR__ . '/auth.php';

use App\Models\Role;
use App\Models\Ruta;
use App\Models\User;
use App\Models\Combi;
use App\Models\Lugar;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RutaController;
use App\Http\Controllers\CombiController;
use App\Http\Controllers\LugarController;
use App\Http\Controllers\ChoferesController;
use App\Http\Controllers\Auth\UsuariosController;
use App\Http\Controllers\Auth\RegisteredUserController;

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
// -------------Home----------------
Route::get('/', 'HomeController@create')
    ->name('home');

Route::post('/', function () {

    return view('user.search', ['popup' => 'true']);
})
    ->name('homeredirect');


//----------------Rutas para todos los usuarios--------------------
Route::get(
    '/profile/{user}',
    function (User $user) {

        return view('user.profile', ['user' => $user]);
    }
)->middleware('auth')
    ->name('profile');



//-----------------------COMBI-------------------------------
Route::name('combi.')
     ->prefix('/combi')
     ->middleware('role:administrator')
     ->group(function () {

        //-----------------------------------------------------//
        Route::get('/alta', 'CombiController@create')
        ->name('new');

        //-----------------------------------------------------//
        Route::post('/alta/store', 'CombiController@store')
            ->name('store');;

        //-----------------------------------------------------//
        Route::get('/listar', 'CombiController@index')
        ->name('listar');

        //-----------------------------------------------------//
        Route::get('/{combi}','CombiController@show')
        ->name('info')
        ->withoutMiddleware('role:administrator');

        //-----------------------------------------------------//
        Route::get('/{combi}/edit','CombiController@edit')
        ->name('edit');

        //-----------------------------------------------------//
        Route::put('/{combi}/update', 'CombiController@update')
        ->name('update');

        //-----------------------------------------------------//
        Route::delete('/{combi}/delete', 'CombiController@destroy')
        ->name('delete');

    });

//Rutas para los choferes

    Route::name('chofer.')
     ->prefix('/chofer')
     ->middleware('role:administrator')
     ->group(function () {

        //-----------------------------------------------------//
        Route::get('/alta', 'ChoferesController@create')
        ->name('create');

        //-----------------------------------------------------//
        Route::post('/alta/store', 'ChoferesController@store')
        ->name('store');;

        //-----------------------------------------------------//
        Route::get('/listar', 'ChoferesController@index')
        ->name('index');

        //-----------------------------------------------------//
        Route::get('/{chofer}','ChoferesController@show')
        ->name('info')
        ->withoutMiddleware('role:administrator');

        //-----------------------------------------------------//
        Route::get('/{chofer}/edit','ChoferesController@edit')
        ->name('edit');

        //-----------------------------------------------------//
        Route::put('/{chofer}/update', 'UsuariosController@update')
        ->name('update');

        //-----------------------------------------------------//
        Route::delete('/{chofer}/delete', 'ChoferesController@destroy')
        ->name('delete');

    });



//Routes for administrator with prefix /administrator
//example: combi19/administrator/altachofer

//----------------LUGARES---------------------
Route::name('lugar.')
->prefix('/lugar')
->middleware('role:administrator')
->group(function () {

    //-------------------------------------------------------------//
    Route::get('/alta', 'LugarController@create')
    ->name('create');

    //------------------------------------------------------------//

    Route::post('/alta/store', 'LugarController@store')
    ->name('store');


    //------------------------------------------------------------//
    Route::get('/listar', 'LugarController@index')
    ->name('index');

    //-------------------------------------------------------------//
    Route::get('/{lugar}', 'LugarController@show')
   ->name('info');
   
    //-------------------------------------------------------------------------------------//
    Route::delete('{lugar}/delete', 'LugarController@destroy')
        ->name('delete');
    
    
    //-------------------------------------------------------------------------------------//
    Route::get('{lugar}/edit', 'LugarController@edit')
        ->name('edit');

        //-------------------------------------------------------------------------------------//
    Route::put('{lugar}/update', 'LugarController@update')
    ->name('update');



});




//-----------------RUTAS------------------------
Route::name('ruta.')
->prefix('/ruta')
->middleware('role:administrator')
->group(function () {


    //-------------------------------------------------------------------------------------//
    Route::get('/alta', 'RutaController@create')
    ->name('create');


    //-------------------------------------------------------------------------------------//
    Route::post('/alta/store', 'RutaController@store')
    ->name('store');



    //-------------------------------------------------------------------------------------//
    Route::get('/listar', 'RutaController@index')
        ->name('index');



    //-------------------------------------------------------------------------------------//
    Route::get( '/{ruta}', 'RutaController@show')
        ->name('info');



    //-------------------------------------------------------------------------------------//
    Route::delete('{ruta}/delete', 'RutaController@destroy')
        ->name('delete');



    //-------------------------------------------------------------------------------------//
    Route::get('{ruta}/edit', 'RutaController@edit')
    ->name('edit');



    //-------------------------------------------------------------------------------------//
    Route::put('{ruta}/update', [RutaController::class, 'update'])->name('update');



});


//-----------------VIAJES------------------------
Route::name('viaje.')
->prefix('/viaje')
->middleware('role:administrator')
->group(function () {


    //-------------------------------------------------------------------------------------//
    Route::get('/alta', 'ViajeController@create')
    ->name('create');
 //-------------------------------------------------------------------------------------//
    Route::post('/alta/store', 'ViajeController@store')
    ->name('store');
    
  
      //-------------------------------------------------------------------------------------//
      Route::get('/listar', 'ViajeController@index')
          ->name('index');
  
  
  
      //-------------------------------------------------------------------------------------//
      Route::get( '/{viaje}', 'ViajeController@show')
          ->name('info');
  
  
  
      //-------------------------------------------------------------------------------------//
      Route::delete('{viaje}/delete', 'ViajeController@destroy')
          ->name('delete');
  
  
  
      //-------------------------------------------------------------------------------------//
      Route::get('{viaje}/edit', 'ViajeController@edit')
      ->name('edit');
  
  
  
      //-------------------------------------------------------------------------------------//
      Route::put('{viaje}/update', [ViajeController::class, 'update'])->name('update');
  
  

} );








Route::get('editarusuario/{user}', [UsuariosController::class, 'edit'])
        ->name('user.edit');


Route::put('editarusuarios', [UsuariosController::class, 'update'])->name('editarusuarios');

