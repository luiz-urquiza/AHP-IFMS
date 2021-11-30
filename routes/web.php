<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjetivoController;
use App\Http\Controllers\AHPController;
use App\Http\Controllers\NodesController;

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function() {
    return view('home');
});

//Route::get('/objetivos', 'ObjetivoController@index');
Route::get('/objetivos', [ObjetivoController::class, 'index']);
Route::get('/formCreateObjetivo', [ObjetivoController::class, 'formCreate']);
Route::get('/formCreateCriterio/{id}', [ObjetivoController::class, 'formCreateCriterio']);
Route::post('/createObjetivo', [ObjetivoController::class, 'create']);
Route::post('/createCriterio', [ObjetivoController::class, 'createCriterio']);

//Route::get('/objetivo/{id}/criterios', function($id=1) {
//	return view('objetivos.criterios');
//});

Route::get('/objetivo/{id}/criterios', [ObjetivoController::class, 'criterios']);

//Route::get('/objetivo/{id}/alternativas', function($id) {
//	return view('objetivos.alternativas');
//});

Route::get('/objetivo/{id}/alternativas', [ObjetivoController::class, 'alternativas']);

Route::get('/criterio/{id}/excluir', [ObjetivoController::class, 'excluirCriterio']);
Route::get('/criterio/{id}/alterar', [ObjetivoController::class, 'formUpdateCriterio']);

Route::post('/updateCriterio', [ObjetivoController::class, 'updateCriterio']);

Route::get('/objetivo/{id}/alterar', [ObjetivoController::class, 'formUpdateObjetivo']);

Route::get('/objetivo/{id}/excluir', [ObjetivoController::class, 'excluirObjetivo']);

Route::post('/updateObjetivo', [ObjetivoController::class, 'updateObjetivo']);

Route::get('/AHP', [AHPController::class, 'AHP']);

Route::get('/nodes', [NodesController::class, 'index']);