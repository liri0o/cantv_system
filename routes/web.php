<?php

use App\Http\Controllers\Apps\CuartoController;
use App\Http\Controllers\Apps\CircuitoController;
use App\Http\Controllers\Apps\NecesidadController;
use App\Http\Controllers\Apps\ServredController;
use App\Http\Controllers\DashboardController;
use App\Models\Necesidad;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

 /* Route::get('/', function () {
    return view('auth.login');
});  */
 Route::redirect('/', 'login'); 

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');       
});
//Rutas de los cuartos
Route::get('cuartos', [CuartoController::class, 'index'])
    ->name('cuartos'); 
Route::get('cuartos/{cuarto}', [CuartoController::class, 'show'])
    ->name('cuartos.show'); 

//Rutas de los circuitos   
Route::get('circuitos', [CircuitoController::class, 'index'])
    ->name('circuitos');  
Route::get('circuitos/{circuito}', [CircuitoController::class, 'show'])
    ->name('circuitos.show'); 

//Rutas de los equipos de red  
Route::get('servreds', [ServredController::class, 'index'])
    ->name('servreds');  
Route::get('servreds/{servred}', [ServredController::class, 'show'])
    ->name('servreds.show');  

//Rutas de las necesidades 
Route::get('necesidads', [NecesidadController::class, 'index'])
    ->name('necesidads');  
Route::get('necesidads/{necesidad}', [NecesidadController::class, 'show'])
    ->name('necesidads.show');  




 