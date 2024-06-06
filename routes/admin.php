<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\EstadoController;
use App\Http\Controllers\Admin\LocalidadController;
use App\Http\Controllers\Admin\CuartoController;
use App\Http\Controllers\Admin\CircuitoController;
use App\Http\Controllers\Admin\NecesidadController;
use App\Http\Controllers\Admin\ServredController;

Route::get('/', function (){
    return view('admin.dashboard');
})->name('dashboard');

Route::resource('regions',RegionController::class);
Route::resource('estados',EstadoController::class);
Route::resource('localidades',LocalidadController::class); 
Route::resource('cuartos',CuartoController::class); 
Route::resource('circuitos',CircuitoController::class); 
Route::resource('servreds',ServredController::class);  
Route::resource('necesidads',NecesidadController::class);  