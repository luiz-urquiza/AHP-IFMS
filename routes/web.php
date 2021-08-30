<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjetivoController;



//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function() {
    return view('home');
});

//Route::get('/objetivos', 'ObjetivoController@index');
Route::get('/objetivos', [ObjetivoController::class, 'index']);
Route::get('/createObjetivo', [ObjetivoController::class, 'formCreate']);

//Route::get('/objetivo/{id}/criterios', function($id=1) {
//	return view('objetivos.criterios');
//});

Route::get('/objetivo/{id}/criterios', [ObjetivoController::class, 'criterios']);

//Route::get('/objetivo/{id}/alternativas', function($id) {
//	return view('objetivos.alternativas');
//});

Route::get('/objetivo/{id}/alternativas', [ObjetivoController::class, 'alternativas']);