<?php

use Illuminate\Http\Request;

use App\Http\Middleware\ApiKeyValidate;

use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ProvinciaController;
use App\Http\Controllers\Api\CiudadController;
use App\Http\Controllers\Api\CalleController;
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

Route::group(["middleware" => ApiKeyValidate::class], function(){
    Route::get('getRegiones', [RegionController::class,'getRegions']);
    Route::get('getProvincias/{id_region}', [ProvinciaController::class,'getProvincias']);
    Route::get('getCiudades/{id_provincia}', [CiudadController::class,'getCiudades']);
    Route::get('getCalles/{id_ciudad}', [CalleController::class,'getCalles']);
});






