<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Lineas_investigacion_Controller;
use App\Http\Controllers\HabilidadController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\http\Controllers\CelularController;
use GuzzleHttp\Middleware;

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

// grupo seguro Sanctum
Route::group(['middleware' => 'auth:sanctum'], function(){
    // Route::apiResource("member", MemberController::class);
    
    // insertar 
    Route::post('add',[CelularController::class,'add']);

    // eliminar
    Route::delete('delete/{id}',[CelularController::class,'delete']);
    
    // actualizar
    Route::put('update',[CelularController::class, 'update']);
    
    // traer
    Route::get('celular',[CelularController::class,'celular']);
    
    // -------------------------HABILIDAD-----------------------------------
    // traer
    Route::get('habilidad',[HabilidadController::class,'habilidad']);
    
    // salir 
    Route::post('logout',[UserController::class,'logout']);
    
    
} );
//nuevas rutas agregadas 
Route::post('register',[UserController::class,'register']);
Route::post('login',[UserController::class,'login']);

Route::post('logingoogle',[UserController::class,'logingoogle']);









