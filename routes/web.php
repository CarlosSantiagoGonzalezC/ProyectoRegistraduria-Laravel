<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CandidateController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VoteController;
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

Route::get('/', function () {
    return view('login');
});

Route::get('/login', function () {
    return view('login');
});

Route::get('/vistaUsuario', function () {
    return view('usuario');
});

Route::get('/vistaAdmin', function () {
    return view('administrador');
});

Route::get('/candidatos', function () {
    return view('candidatos');
});

// ----------- RUTA LOGIN ----------------
Route::post('auth', [AuthController::class, 'login']);

Route::resource('/usuario', UserController::class)->only('index', 'store', 'update', 'destroy');
Route::resource('/candidato', CandidateController::class)->only('index', 'store', 'update', 'destroy');
Route::resource('/voto', VoteController::class)->only('index', 'store', 'update', 'destroy');