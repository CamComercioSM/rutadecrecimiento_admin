<?php

use App\Http\Controllers\DiagnosticoController;
use App\Http\Controllers\InicioController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\RegistroController;
use App\Http\Controllers\ProgramaController;
use Illuminate\Support\Facades\Artisan;
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


Route::get('/grafico-radial/{id}', [PerfilController::class, 'grafico'])->name('company.graph.radial');
Route::get('/clear', function(){
    Artisan::call('optimize');
    dump('Optmize done');
});

Route::get('/link', function () { Artisan::call('storage:link'); });
