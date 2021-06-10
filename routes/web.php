<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObjetivoController;

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


//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function() {
    return view('home');
});

//Route::get('/objetivos', 'ObjetivoController@index');
Route::get('/objetivos', [ObjetivoController::class, 'index']);

Route::get('/objetivo/{id}/criterios', function($id) {
	return view('objetivos.criterios');
});

Route::get('/objetivo/{id}/alternativas', function($id) {
	return view('objetivos.alternativas');
});