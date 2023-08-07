<?php

use App\Http\Controllers\Api\v1\CidadeController;
use App\Http\Controllers\Api\v1\MedicoController;
use App\Http\Controllers\Api\v1\PacienteController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'v1', 'middleware' => 'auth:api'], function () {
    Route::apiResource('pacientes', PacienteController::class);
    Route::post('medicos', [MedicoController::class, 'store'])->name('medicos.store');

    Route::post('/medicos/{id_medico}/pacientes', [MedicoController::class, 'storeMedicosPacientes'])->name('medicos.medicos-pacientes');
    Route::get('/medicos/{id_medico}/pacientes', [MedicoController::class, 'showMedicoPacientes'])->name('medicos.show-medicos-pacientes');
});

Route::group(['prefix' => 'v1'], function () {
    Route::apiResource('cidades', CidadeController::class)->except(['store', 'show', 'update', 'destroy']);
    Route::get('/cidades/{id_cidade}/medicos', [CidadeController::class, 'getMedicosPorCidade'])->name('cidades.medico-por-cidade');

    Route::get('medicos', [MedicoController::class, 'index'])->name('medicos.index');
});
