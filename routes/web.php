<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ModulController;
use App\Http\Controllers\ActivitatController;
use App\Http\Controllers\ProgramacionController;
use App\Http\Controllers\UfController;
use App\Http\Controllers\RaController;
use App\Http\Controllers\ContingutController;
use App\Http\Controllers\CriteriController;


/*
|----------crear de los demas controllers, importar----------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/obtener-ufs/{modulId}', [ModulController::class, 'obtenerUfs']);
Route::get('/obtener-ras/{ufId}', [UfController::class, 'obtenerRas']);
Route::get('/obtener-criteris/{raId}', [CriteriController::class, 'obtenerCriteris']);


Route::get('/', function () {
    return view('auth.login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::resource('/moduls', ModulController::class);
Route::resource('/ufs', UfController::class);
Route::resource('/ras', RaController::class);
Route::resource('/criteris', CriteriController::class);
Route::resource('/continguts', ContingutController::class);
Route::resource('/programacions', ProgramacionController::class);
Route::resource('/activitats', ActivitatController::class);
